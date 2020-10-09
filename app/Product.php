<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Image\Manipulations;

class Product extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = ['catalog_id', 'name', 'slug', 'old_price', 'price', 'description', 'quantity', 'is_slider', 'count_view'];
    protected $perPage = 16;
    protected $appends = array('image');

    public function setProductsAttribute()
    {

    }

    public function getImageAttribute()
    {
        $images = [];
        foreach ($this->getMedia('products') as $key => $media) {
            $images[$key] = $media->getUrl();
        }
        return $images;
    }

    public function getColorAttribute()
    {
        $colors = '';

        foreach ($this->attributes()->pluck('name_ru') as $atrribute) {
            $colors .= $atrribute . ' - ';
        }
        return $colors;
    }

    public function order()
    {
        return $this->belongsToMany('App\Order');
    }

    public function catalog()
    {
        return $this->belongsTo('App\Catalog');
    }

    public function attributes()
    {
        return $this->belongsToMany('App\Attribute', 'attribute_product', 'product_id', 'attribute_id');
    }

    public function reviews()
    {
        return $this->belongsToMany('App\User', 'reviews', 'product_id', 'user_id')->withPivot('text', 'active')->ActiveReview()->withTimestamps();
    }

    public function scopeNewness($query)
    {
        return $query->orderBy('id', 'DESC');
    }

    public function scopePopularity($query)
    {
        return $query->orderBy('count_view', 'DESC');
    }

    public function scopeLowerprice($query)
    {
        return $query->orderBy('price', 'ASC');
    }

    public function scopeHighestprice($query)
    {
        return $query->orderBy('price', 'DESC');
    }

    public function scopeActive($query)
    {
        return $query->where('quantity', '>', 0);
    }

    public function scopeSortingPosition($query)
    {
//        return $query->orderBy('position', 'ASC');
        return $query->orderBy(\DB::raw('-`position`'), 'desc');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('admin_thumb')
            ->fit(Manipulations::FIT_FILL, 100, 100)
            ->sharpen(10);

        $this->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_FILL, 115, 115)
            ->sharpen(10);

        $this->addMediaConversion('item_img')
            ->fit(Manipulations::FIT_FILL, 210, 210)
            ->sharpen(10);

        $this->addMediaConversion('main_img')
            ->fit(Manipulations::FIT_FILL, 630, 630)
            ->sharpen(10);

        $this->addMediaConversion('full-size')
            ->withResponsiveImages();
    }
}
