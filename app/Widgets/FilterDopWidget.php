<?php
namespace App\Widgets;

use App\Attribute;
use App\Catalog;
use App\Group;
use App\Widgets\Contract\ContractWidget;

class FilterDopWidget implements ContractWidget
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
        $attribute = Group::with('attributes')->find('5');
//        $attributes = Attribute::with('group')->get();
//        dd($attributes);
        return view('Widgets::filter_dop', [
            'attribute' => $attribute,
            'slug' => $this->slug,
            'filters' => $this->filters
        ]);
    }
}
