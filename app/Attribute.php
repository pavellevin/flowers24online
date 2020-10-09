<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public function group(){
        return $this->belongsTo('App\Group');
    }

    public function products(){
        return $this->belongsToMany('App\Product', 'attribute_product', 'attribute_id', 'product_id');
    }
}
