<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Session;
use Carbon\Carbon;
use App\Models\UserCategory;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
class User extends Authenticatable
{
    use Notifiable;

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('username')
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
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','slug'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id')->where('lang',Session::get('locale'));
    }


    public function country()
    {   $column = 'id';//Session::get('locale') == 'AR' ? 'parent' : 'id';
        return $this->belongsTo('App\Models\Country','country_id',$column)->where('lang',Session::get('locale'));
    }



    public function state()
    {   $column = 'id';//Session::get('locale') == 'AR' ? 'parent' : 'id';
        return $this->belongsTo('App\Models\State','state_id',$column)->where('lang',Session::get('locale'));
    }



    public function city()
    {   $column = 'id';//Session::get('locale') == 'AR' ? 'parent' : 'id';
        return $this->belongsTo('App\Models\City','city_id',$column)->where('lang',Session::get('locale'));
    }


    public function categories()
    {    
        return $this->hasMany('App\Models\UserCategory','user_id');
    }

    public function wishlists()
    {    
        return $this->hasMany('App\Models\Wishlist','user_id');
    }


    public function isWishlisted($id)
    {
        return \App\Models\Wishlist::where('user_id',$this->id)->where('celebrity_id',$id)->count();
    }

    
    public function more_cates($value='')
    {
        $text = '';
        $text2 = '';
        $i=0;
        
           $count = $this->categories->count();
        if(!empty($this->categories)){
            foreach ($this->categories as $key => $c) {
                if($i < 2){
                   $text .= !empty($c->category) ? '<span class="badge">'.$c->category->label.'</span>' : '';
                }
                    $i++;
                   $text2 .= !empty($c->category) ? $c->category->label.', ' : '';
                
            }
        }
            
        if($count > 2){ 
            $text .='<span class="badge" data-toggle="tooltip" title="'.$text2.'"><i class="fa fa-plus"></i></span>';
        } 

        return $text;

    }


    public function myCategories()
    {
        $column = Session::get('locale') == 'AR' ? 'has_parent' : 'id';
        $category_ids = !empty($this->category_id) ? json_decode($this->category_id) : [];
        return \App\Models\Category::whereIn($column,$category_ids)->where('status',1)->orderBy('label','ASC')->get();
    }



 #----------------------------------------------------------------------------------------------------------
 # User
 #----------------------------------------------------------------------------------------------------------

    public function reviews($value='')
    {
        return $this->hasMany('App\Models\CelebrityReview','celebrity_id')->where('parent',0)->where('profile',1);
    }
    


 #----------------------------------------------------------------------------------------------------------
 # User
 #----------------------------------------------------------------------------------------------------------

    public function getAllEvents($value='')
    {
         $booking = \App\Models\Booking::where('celebrity_id',$this->id)->where('profile_video',1)->groupBy('event_id')->pluck('event_id')->toArray();
         return $events = \App\Models\Event::whereIn('id',$booking)->orderBy('label','ASC');

    }
    

 #----------------------------------------------------------------------------------------------------------
 # User
 #----------------------------------------------------------------------------------------------------------


#===================================================================================================
# Category
#===================================================================================================

public function celebrityRate()
{
    $total_rating=0;
  if(!empty($this->reviews) && $this->reviews->count() > 0){
    $Star5 = $this->reviews->where('rating',5)->count();
    $Star4 = $this->reviews->where('rating',4)->count();
    $Star3 = $this->reviews->where('rating',3)->count();
    $Star2 = $this->reviews->where('rating',2)->count();
    $Star1 = $this->reviews->where('rating',1)->count();
    $total = (($Star5 * 5) + ($Star4 * 4) + ($Star3 * 3) + ($Star2 * 2) + ($Star1 * 1));
    $total_rating = round($total / $this->reviews->count(),1);

    // $this->rating = $total_rating;
    // $this->save(); 


   }  
   return [
      'rate' => $total_rating,
      // 'Star5_percent' => round((($Star5 * 5) / $total) * 100,1),
      // 'Star4_percent' => round((($Star4 * 4) / $total) * 100,1),
      // 'Star3_percent' => round((($Star3 * 3) / $total) * 100,1),
      // 'Star2_percent' => round((($Star2 * 2) / $total) * 100,1),
      // 'Star1_percent' => round((($Star1 * 1) / $total) * 100,1),
      // 'Star5' => $Star5,
      // 'Star4' => $Star4,
      // 'Star3' => $Star3,
      // 'Star2' => $Star2,
      // 'Star1' => $Star1,
      'stars' => $this->getRateInStar($total_rating)
    ];
   
}


public function getRates()
{
    $text ='';
  if($this->reviews->count() > 0):
    $arr = $this->ProductRate();
    $text .='<div class="rating-wrap">';
    $text .='<div class="rating-container">';
    $text .='<i class="fas fa-star"></i>';
    $text .='<span>'.$arr['rate'].'</span>';
    $text .='</div>';
    $text .='<span>('.$this->reviews->count().')</span>';
    $text .='</div>';
  endif;
  return $text;
}




public function getRateInStar($id)

{
     if($id == 1){
         return  "<i class='fa fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i>";
     }elseif($id > 1 && $id < 2){
         return  "<i class='fa fa-star'></i><i class='fa fa-star-half-o'></i><i class='far fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i>";
     }elseif($id == 2){
         return  "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i>";  
     }elseif($id > 2 && $id < 3){
         return  "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-half-o'></i><i class='far fa-star'></i><i class='far fa-star'></i>";
     }elseif($id == 3){
         return  "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i>";
     }elseif($id > 3 && $id < 4){
         return  "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-half-o'></i><i class='far fa-star'></i>";
     }elseif($id == 4){
         return  "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='far fa-star' ></i>";
     }elseif($id > 4 && $id < 5){
         return "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-half-o' ></i>";
     }elseif($id == 5){
         return "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i>";
     }else{
         return  "<i class='far fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i>";
     }
}

    
 #----------------------------------------------------------------------------------------------------------
 # User
 #----------------------------------------------------------------------------------------------------------


    public function createCategories()
    {    
         $category_ids = !empty($this->category_id) ? json_decode($this->category_id) : [];
         $UserCategory = UserCategory::whereIn('category_id',$category_ids)->where('user_id',$this->id)->delete();
         foreach ($category_ids as $key => $category_id) {
             $UserCategory =new UserCategory;
             $UserCategory->user_id = $this->id;
             $UserCategory->category_id = $category_id;
             $UserCategory->save();
         }
         return 1;
    }

    #-----------------------------------------------------------------------------------------------------------------------
    # My Feature
    #-----------------------------------------------------------------------------------------------------------------------


    public function subscriptionEndDate($category_id)
    {
        $mySubscription = \App\Models\MySubscription::where('category_id',$category_id)->orderBy('end_date','DESC');

        $Date = date('Y-m-d');
        $end = date('Y-m-d', strtotime($Date. ' - 1 days'));
 
        return $mySubscription->count() > 0 ? $mySubscription->first()->end_date : $end;
    }
    #-----------------------------------------------------------------------------------------------------------------------
    # My Feature
    #-----------------------------------------------------------------------------------------------------------------------


    public function getAge()
    {
        $timestring = strtotime($this->dob);
        $Born = Carbon::create(date('Y',$timestring),date('m',$timestring),date('d',$timestring));
        return $age = $Born->diff(Carbon::now())->format('%y');
    }
    #-----------------------------------------------------------------------------------------------------------------------
    # My Feature
    #-----------------------------------------------------------------------------------------------------------------------


    public function delivery_date()
    {
       $delivery_within = $this->delivery_within;
       return $delivery_date = date('Y-m-d', strtotime('+ '.$delivery_within.' days',strtotime(date('Y-m-d'))));
    }
}
