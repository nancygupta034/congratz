<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
class Event extends Model
{


use HasSlug;
    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('label')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function arabic($value='')
    {
        return $this->hasOne($this,'has_parent');
    }

    public function english($value='')
    {
        return $this->belongsTo($this,'has_parent');
    }


    public function getIcon($value='')
    {
         $icon = !empty($this->image) ? '<img src="'.url($this->image).'" class="cate-icon">' : '<i class="'.$this->icon_class.'"></i>';

         return empty($this->image) && empty($this->image) ? '<i class="icon-gift-box"></i>' : $icon;
    }

    
}
