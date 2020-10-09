<?php

namespace App;
// use Media Library
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Image\Manipulations;

class Catalog extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $table = 'catalogs';
    protected $fillable = ['name','content','slug', 'description'];

    protected $appends = array('image');

    public function getImageAttribute()
    {
        return $this->getFirstMediaUrl('catalog', 'admin_thumb');
    }

    public function products(){
        return $this->hasMany('App\Product');
    }

    public function scopeSortingPosition($query){
        return $query->orderBy('position', 'ASC');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('admin_thumb')
            ->fit(Manipulations::FIT_FILL, 100, 100)
            ->sharpen(10);

        $this->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_FILL, 115, 115)
            ->sharpen(10);

        $this->addMediaConversion('main_img')
            ->fit(Manipulations::FIT_FILL, 630, 630)
            ->sharpen(10);

        $this->addMediaConversion('item_img')
            ->fit(Manipulations::FIT_FILL, 630, 630)
            ->sharpen(10);

        $this->addMediaConversion('full-size')
            ->withResponsiveImages();
    }

}
