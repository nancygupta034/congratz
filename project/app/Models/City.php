<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
class City extends Model
{
   	 protected $fillable = ['id', 'name', 'state_id', 'deleted'];

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


 
    public function arabic($value='')
    {
        return $this->hasOne($this,'has_parent');
    }
    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }
}
