<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\Catalog;
use App\City;
use App\District;
use App\News;
use App\Newsletter;
use App\Period;
use App\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Events\PostHasViewed;
use Illuminate\Support\Facades\Session;

class FrontController extends Controller
{
    private function getSort($products)
    {
        switch ($_COOKIE['sortBy']){
            case 'newness':
                $products = $products->Newness();
                return $products;
                break;
            case 'popularity':
                $products = $products->Popularity();
                return $products;
                break;
            case 'lowerprice':
                $products = $products->Lowerprice();
                return $products;
                break;
            case 'highestprice':
                $products = $products->Highestprice();
                return $products;
                break;
            default:
                return $products = $products->Newness();
        }
    }

    private function getWant($want){
        if ($want == 'on')
            return true;
        return false;
    }

//    private function getSort($products, $sortby)
//    {
//        switch ($sortby) {
//            case 'newness':
//                return $products = $products->newness();
//                break;
//            case 'popularity':
//                return $products = $products->popularity();
//                break;
//            case 'lowerprice':
//                return $products = $products->lowerprice();
//                break;
//            case 'highestprice':
//                return $products = $products->highestprice();
//                break;
//        }
//    }
//
    public function index()
    {
        $products = Product::where('is_slider', 'on')->with('catalog')->get();
//        dd($products);
//        foreach ($products as $product){
//            dd($product);
//            dd($product->getMedia()->getFullUrl());
//        }
        return view('site.index', [
            'products' => $products
        ]);

    }

    public function shop($sortby = false)
    {
        $products = Product::with('catalog');
//        dd($products);

        switch ($sortby) {
            case 'newness':
                $products = $products->newness();
                break;
            case 'popularity':
                $products = $products->popularity();
                break;
            case 'lowerprice':
                $products = $products->lowerprice();
                break;
            case 'highestprice':
                $products = $products->highestprice();
                break;
        }
        $products = $products->paginate();

        return view('site.shop', [
            'products' => $products,
            'sortby' => $sortby
        ]);
    }

    public function getProduct($slug)
    {
        if (is_numeric($slug)) {

            $product = Product::findOrFail($slug);
            return Redirect::to(route('product', $product->slug), 301);

        }
        $product = Product::where('slug', $slug)->firstOrFail();

        $products = Product::with('catalog')->limit(6)->get();

        event(new PostHasViewed($product));

        return view('site.product', [
            'products' => $products,
            'product' => $product
        ]);
    }

    public function getProducts($slug, $sortby = false)
    {
        if (is_numeric($slug)) {

            $catalog = Catalog::findOrFail($slug);
            return Redirect::to(route('catalog', $catalog->slug), 301);

        }
        $catalog = Catalog::where('slug', $slug)->firstOrFail();
        $products = $catalog->products()->active();

        if (isset($_COOKIE['sortBy']) && !empty($_COOKIE['sortBy'])) {
            $products = $this->getSort($products);
        }

        $products = $products->paginate();
//        dd($products);
        foreach ($products as $key => $product) {
            $products[$key]['image'] = $product->image;
        }

        return view('site.catalog', [
            'products' => $products,
            'catalog' => $catalog,
            'filters' => '',
            'minPrice' => Product::orderBy('price')->value('price'),
            'maxPrice' => Product::orderBy('price', 'desc')->value('price')

        ]);
    }

    public function getProductsByFilter($slug, $sfilters, $sortby = false)
    {
        $prices = [];
        $catalog = Catalog::where('slug', $slug)->first();

        $products = $catalog->products()->active();

        $minPrice = $products->orderBy('price')->value('price');
        $maxPrice = $products->orderBy('price', 'desc')->value('price');

        if (isset($sfilters) && !empty($sfilters)) {
            $filters = array_filter(explode("&", $sfilters));

            foreach ($filters as $key => $filter) {
                if (is_numeric($filter)) {
                    $prices[] = $filter;
                    unset($filters[$key]);
                }
            }

            if (is_array($filters) && sizeof($filters)) {
                foreach ($filters as $filter) {
                    $products = $products->whereHas('attributes', function ($query) use ($filter) {
                        $query->where('name_en', 'like', $filter);
                    })//                        ->whereHas('catalog')
                    ;
                }
            }

            if (is_array($prices) && sizeof($prices))
                $products = $products->whereBetween('price', [$prices[0], $prices[1]]);

            if (isset($sortby) && !empty($sortby))
                $products = $this->getSort($products, $sortby);

            $products = $products->paginate();
//            dd($products);
            foreach ($products as $key => $product) {
                $products[$key]['image'] = $product->image;
            }

            return view('site.catalog', [
                'products' => $products,
                'catalog' => $catalog,
                'filters' => $sfilters,
                'sortby' => $sortby,
                'minPrice' => Product::orderBy('price')->value('price'),
                'maxPrice' => Product::orderBy('price', 'desc')->value('price')

            ]);
        }
    }

    public function showShoppingCard()
    {
        return view('site.shopping_card');
    }

    public function showCheckout()
    {
        $cities = City::all();
        $periods = Period::all();
        $dopproducts = Catalog::find('28')->products;
        foreach ($dopproducts as $product) {
            $product['img'] = $product->getFirstMediaUrl('products', 'thumb');
        }
//        dd($dopproducts[0]);
        return view('site.checkout', [
            'cities' => $cities,
            'periods' => $periods,
            'dopproducts' => $dopproducts,
        ]);
    }

    public function getDistricts($id)
    {
        $districts = District::where('city_id', $id)->get();
        return json_encode($districts);
    }

    public function createOrder(Request $request)
    {
        $order = new \App\Order();
        $order->order_key = $request->order_key;
        $order->user_id = $request->user_id;
        $order->phone = $request->phone;
        $order->recipient_name = $request->recipient_name;
        $order->recipient_phone = $request->recipient_phone;
        $order->city_id = $request->city_id;
        $order->district_id = $request->district_id;
        $order->adress = $request->adress;
        $order->period_id = $request->period_id;
        $order->date_delivery = Carbon::parse($request->date_delivery)->format('Y-m-d');
        $order->comment = $request->comment;
        $order->reminder = $request->reminder;
        $order->want_postcard = $request->want_postcard;
        $order->postcard_text = $request->postcard_text;
        $order->want_time = $request->want_time;
        $order->want_foto = $request->want_foto;
        $order->want_call = $request->want_call;
        $order->time_delivery = Carbon::parse($request->time_delivery)->format('H:i:s');
        $order->status_id = 1;
        if ($this->getWant($request->want_time)) {
            $order->period_id = null;
            $order->want_time =  \App\Setting::findOrFail(5)->value;
        }
        if ($this->getWant($request->want_postcard)) {
            $order->want_postcard =  \App\Setting::findOrFail(4)->value;
        }
        if ($this->getWant($request->want_foto)) {
            $order->want_foto =  \App\Setting::findOrFail(3)->value;
        }
        if ($this->getWant($request->want_call)) {
            $order->want_call =  \App\Setting::findOrFail(2)->value;
        }
        if ($order->save()) {
            $carts = json_decode($request->cart, TRUE);
            foreach ($carts as $cart) {
                $this->setRelation('order_product', [
                    'order_id' => $order->id,
                    'product_id' => $cart['id'],
                    'quantity' => $cart['quantity'],
                    'price' => \App\Product::find($cart['id'])->price
                ]);
            }
        }
        return $order->id;
    }

    public function confirm($order_id)
    {
        return view('site.confirm', ['order_id' => $order_id]);
    }

    public function mailing(Request $request)
    {
        $newsletter = new Newsletter();
        $newsletter->email = $request->email;
        if ($newsletter->save()) {
            Session::flash('success', 'Мы добавили вас в список и уже готовим для вас новости и акции');
            return back();
        } else {
            Session::flash('danger', 'Что-то пошло не так');
            return back()->withInput();
        }

    }

    public function getProductsBySearch(Request $request, $sortby = false)
    {
        $array = explode(' ', $request->input('search'));

        foreach ($array as $ar) {
            $products = Product::where('name', 'like', '%' . $ar . '%');
        }
        $products = $products->paginate();

        return view('site.shop', [
            'products' => $products,
            'sortby' => $sortby,
            'filters' => false
        ]);

    }

    public function getNews()
    {
        $news = News::all();

        return view('site.news', [
            'news' => $news
        ]);
    }

    public function getNew($slug)
    {
        if (is_numeric($slug)) {

            $new = News::findOrFail($slug);
            return Redirect::to(route('new', $new->slug), 301);

        }
        $new = News::where('slug', $slug)->firstOrFail();
        $media = $new->getFirstMedia('news');
        event(new PostHasViewed($new));

        return view('site.new', [
            'new' => $new,
            'media' => $media
        ]);
    }

    private function setRelation($table, $values)
    {
        DB::table($table)->insert($values);
    }
}