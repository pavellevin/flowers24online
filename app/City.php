<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function districts()
    {
        return $this->belongsTo('App\District');
    }
}
