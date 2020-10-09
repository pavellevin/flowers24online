<?php
namespace App\Widgets;

use App\Catalog;
use App\Group;
use App\Widgets\Contract\ContractWidget;

class FilterFlowerWidget implements ContractWidget
{
    protected $slug = '';
    protected $filters = '';

    public function __construct($slug = [], $filters = []){
        if (isset($slug)){
            $this->slug = $slug;
        }
        if (isset($filters)){
            $this->filters = $filters;
        }
    }

    public function execute(){
        $colors = Group::find(1)->attributes()->get();
        return view('Widgets::filter_flower', [
            'colors' => $colors,
            'slug' => $this->slug,
            'filters' => $this->filters
        ]);
    }
}
