<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
class Country extends Model
{
   protected $fillable = ['id', 'name', 'sortname', 'phonecode', 'deleted', 'status','currency_id'];



use HasSlug;
    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
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



    public function states()
    {
        return $this->hasMany('App\Models\State');
    } 

    public function arabic($value='')
    {
        return $this->hasOne($this,'has_parent');
    }

    public function english($value='')
    {
        return $this->belongsTo($this,'has_parent');
    }


    public function currency()
    {
       	 return $this->belongsTo('App\Models\Variation','currency_id');
    }   
}
