<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function district()
    {
        return $this->belongsTo('App\District');
    }

    public function period()
    {
        return $this->belongsTo('App\Period');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'order_product', 'order_id', 'product_id')->withPivot('quantity', 'price');
    }

    public function priceCount()
    {
        return $this->products()->sum('order_product.price');
    }

    public function getTotal()
    {
        $tot = 0;
        $total = [];

        $datas = $this->products()->withPivot('quantity', 'price')->get();
        foreach ($datas as $data) {
            $tot += $data->pivot->quantity * $data->pivot->price;
        }
        $total['total'] = $tot;
        return $total;
    }
}
