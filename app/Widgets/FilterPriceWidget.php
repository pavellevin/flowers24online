<?php
namespace App\Widgets;

use App\Catalog;
use App\Product;
use App\Widgets\Contract\ContractWidget;

class FilterPriceWidget implements ContractWidget
{
    protected $filters = '';

    public function __construct($filters = []){
        if (isset($filters)){
            $this->filters = $filters;
        }
    }

    public function execute(){
        $minPrice = Product::orderBy('price')->value('price');
        $maxPrice = Product::orderBy('price', 'desc')->value('price');

        return view('Widgets::filter_price', [
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
            'filters' => $this->filters
        ]);
    }
}
