<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Image\Manipulations;

class News extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = ['name', 'slug', 'text', 'active', 'count_view'];
    protected $perPage = 16;
    protected $appends = array('image');

    public function getImageAttribute()
    {
        $images = [];
        foreach ($this->getMedia('news') as $key => $media) {
            $images[$key] = $media->getUrl();
        }
        return $images;
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('news')
            ->fit(Manipulations::FIT_FILL, 570, 380)
            ->sharpen(10);

        $this->addMediaConversion('new')
            ->fit(Manipulations::FIT_FILL, 770, 590)
            ->sharpen(10);
    }


}
