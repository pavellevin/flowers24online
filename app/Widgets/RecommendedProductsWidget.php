<?php
namespace App\Widgets;

use App\Catalog;
use App\Product;
use App\Widgets\Contract\ContractWidget;

class RecommendedProductsWidget implements ContractWidget
{
    public function execute(){
        $products = Product::limit(4)->orderByDesc('id')->get();
        return view('Widgets::recommended_products', [
            'products' => $products
        ]);
    }
}
