<?php
namespace App\Widgets;

use App\Catalog;
use App\Product;
use App\Widgets\Contract\ContractWidget;

class ProductsWidget implements ContractWidget
{
    public function execute(){
        $products = Product::limit(5)->orderByDesc('id')->get();
        return view('Widgets::products', [
            'products' => $products
        ]);
    }
}
