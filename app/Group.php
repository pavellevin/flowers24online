<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function attributes()
    {
        return $this->hasMany('App\Attribute');
    }

    public function getValueGroupName($attribute)
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
