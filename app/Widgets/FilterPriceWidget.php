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

        return view('Widgets::filter_price', [
            'filters' => $this->filters
        ]);
    }
}
