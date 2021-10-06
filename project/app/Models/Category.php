<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
class Category extends Model
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


    public function userCategory()
    {
        return $this->hasOne('App\Models\UserCategory','category_id');
    }



    public function categoryAllCelebrity($value='')
    {
          $delivery_within = date('Y-m-d');
          $delivery_date = date('Y-m-d', strtotime('+ 30 days',strtotime($delivery_within)));
         
          $user_IDs = !empty($this->userCategory) ? $this->userCategory->pluck('user_id')->toArray() : [];

         return \App\User::whereIn('id',$user_IDs)
          ->where('role','artist')
          
          ->where('status',1);
    }




    public function categoryFeaturedCelebrity($value='')
    {
          $delivery_within = date('Y-m-d');
          $delivery_date = date('Y-m-d', strtotime('+ 30 days',strtotime($delivery_within)));
         
          $user_IDs = !empty($this->userCategory) ? $this->userCategory->pluck('user_id')->toArray() : [];

         return \App\User::whereIn('id',$user_IDs)
          ->where('role','artist')
          ->whereDate('subscription_end_date','>=',$delivery_within)
           
          ->where('status',1);
    }



    public function categoryNewCelebrity($value='')
    {
           
         
          $user_IDs = !empty($this->userCategory) ? $this->userCategory->pluck('user_id')->toArray() : [];
                        $delivery_within = date('Y-m-d');
                         $date_new_celebrity = date('Y-m-d', strtotime('- 1 day',strtotime($delivery_within)));
                         
                          
         return \App\User::whereIn('id',$user_IDs)
          ->where('role','artist')
          ->whereDate('created_at','>=',$date_new_celebrity)
          ->where('status',1);
    }



    public function categoryOnlineCelebrity($value='')
    {
          $delivery_within = date('Y-m-d');
          $delivery_date = date('Y-m-d', strtotime('+ 30 days',strtotime($delivery_within)));
         
          $user_IDs = !empty($this->userCategory) ? $this->userCategory->pluck('user_id')->toArray() : [];

         return \App\User::whereIn('id',$user_IDs)
          ->where('role','artist')
          ->whereDate('current_login_datetime','>=',date('Y-m-d H:i'))
          ->where('status',1);
    }


    public function artists($type='all')
    {
          $delivery_within = date('Y-m-d');
          $delivery_date = date('Y-m-d', strtotime('+ 30 days',strtotime($delivery_within)));
         
          $user_IDs = !empty($this->userCategory) ? $this->userCategory->pluck('user_id')->toArray() : [];

         return \App\User::whereIn('id',$user_IDs)
         ->where(function($t) use($type){
             $delivery_within = date('Y-m-d');
             $date_new_celebrity = date('Y-m-d', strtotime('- 1 day',strtotime($delivery_within)));
             if($type == "new"){
                $t->whereDate('created_at','>=',$date_new_celebrity);
             }

             if($type == "featured"){

                $t->whereDate('subscription_end_date','>=',$delivery_within);
             }
         })
         ->where('role','artist')
         ->where('status',1)
         ->orderBy('created_at','DESC')
         ->get();
    }

   
    public function getIcon($value='')
    {
         $icon = !empty($this->image) ? '<img src="'.url($this->image).'" class="cate-icon">' : '<i class="'.$this->icon_class.'"></i>';

         return empty($this->image) && empty($this->image) ? '<i class="fas fa-th"></i>' : $icon;
    }

}
