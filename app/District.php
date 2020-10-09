<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function cities()
    {
        return $this->belongsToMany('App\City');
    }

}
