<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
//    public function getProductsAttribute()
//    {
//        $content = '';
//        $orders = Order::where('order_key', $this->order_key)->get();
//        foreach ($orders->toArray() as $key => $item) {
//            $product = Product::find($item['product_id']);
//            $content .= '<a href="' . route('product', $product->slug) . '">' . $product->name . '</a> ';
//            $content .= 'количество -' .$item['quantity'] . ' шт ';
//            $content .= 'стоимость - ₴'.$item['price'];
//            $content .= '</br></br>';
//        }
//        return $content;
//    }


    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function district()
    {
        return $this->belongsTo('App\District');
    }

    public function period()
    {
        return $this->belongsTo('App\Period');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'order_product', 'order_id', 'product_id')->withPivot('quantity', 'price');
    }

    public function priceCount()
    {
        return $this->products()->sum('order_product.price');
    }

    public  function getTotal(){
        $tot = 0;
        $total = [];
//        $order = \App\Order::find(12);

        $datas = $this->products()->withPivot('quantity', 'price')->get();
        foreach ($datas as $data){
            $tot += $data->pivot->quantity * $data->pivot->price;
        }
        $total['total'] = $tot;
//        return $tot;
        dd($tot);

    }
}
