<?php
namespace App\Widgets;

use App\Attribute;
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
        $attributes = Group::with('attributes')->find(['1', '2', '3', '4']);
//        $attributes = Attribute::with('group')->get();
//        dd($attributes);
        return view('Widgets::filter_flower', [
            'attributes' => $attributes,
            'slug' => $this->slug,
            'filters' => $this->filters
        ]);
    }
}
