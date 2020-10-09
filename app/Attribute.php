<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'attribute_product', 'attribute_id', 'product_id');
    }

    public function getValueAttributeName($attribute)
    {
        switch (app()->getLocale()) {
            case "en":
                return $attribute->name_en;
                break;
            case "ru":
                return $attribute->name_ru;
                break;
            case "uk":
                return $attribute->name_uk;
                break;
        }
    }
}
