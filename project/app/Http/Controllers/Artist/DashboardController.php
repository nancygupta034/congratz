<?php

namespace App\Http\Controllers\Artist;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use Auth;
use Session;
use App\User;
use App\Models\Booking;
use App\Models\Event;
use App\Models\MySubscription;
use App\Models\CelebrityReview;
class DashboardController extends Controller
{

public $view = 'artists.modules.';

#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

public function index()
{
	 
  $countries = \App\Models\Country::get();
  $state = \App\Models\State::where('country_id',\Auth::user()->country_id)->get();
  $city = \App\Models\City::where('state_id',\Auth::user()->state_id)->get();
	   return view($this->view.'index')  
			->with('state',$state)
		    ->with('city',$city)
		    ->with('user',Auth::user())
		    ->with('countries',$countries);
}

#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

public function editProfile()
{
	 
  $countries = \App\Models\Country::get();
  $state = \App\Models\State::where('country_id',\Auth::user()->country_id)->get();
  $city = \App\Models\City::where('state_id',\Auth::user()->state_id)->get();
	   return view($this->view.'account.edit')  
			->with('state',$state)
		    ->with('city',$city)
		    ->with('user',Auth::user())
		    ->with('countries',$countries);
}

#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

public function myProfile()
{
  return view($this->view.'account.index');
}

#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

public function Availability()
{
  return view($this->view.'account.availability');
}

#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

public function myBooking()
{
	  $booking = Booking::where('celebrity_id',Auth::user()->id)->where('admin_status',1)->where('status','!=',6)->orderBy('created_at','DESC')->groupBy('event_id')->pluck('event_id')->toArray();
	 $events = Event::whereIn('id',$booking)->orderBy('label','ASC')->get();
  return view($this->view.'myBooking.index')->with('events',$events);
}


#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

public function changeBookingDetail($id)
{
	 $booking = Booking::where('celebrity_id',Auth::user()->id)->where('status','!=',6)->where('admin_status',1)->orderBy('created_at','DESC');
	 if($booking->count() == 0){
	 	abort(404);
	 }
  return view($this->view.'myBooking.detail')->with('book',$booking->first());
}



#---------------------------------------------------------------------------------------------------------------------------
# 'artist.bookingUploadVideo'
#---------------------------------------------------------------------------------------------------------------------------

   public function bookingUploadVideo(Request $request,$id)
   {
         $booking = Booking::where('celebrity_id',Auth::user()->id)->where('id',$id)->where('status',1)->where('admin_status',1);
	 if($booking->count() == 0){
	 	     $status = ['status' => 0, 'message' => 'Booking Not found'];
	 }else{
	 	     $b = $booking->first();
	 	     $destinationPath = 'images/artists/';
         $b->video_link = $request->hasFile('video') ? uploadFileWithAjax($destinationPath,$request->file('video'),1) : null;
         $b->status = 2;
         $b->celebrity_message = $request->celebrity_message;
         $b->save();
	 	     $status = ['status'=> 1,'message' => 'video uploaded successfully!'];
	 }
	 return response()->json($status);
   }



#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

public function myBookingStatus(Request $request)
{
 //return Auth::user()->id;
  $booking = Booking::where('celebrity_id',Auth::user()->id)
       ->where(function($t) use($request){
       	   if($request->status != "All"){
       	   	$t->where('status',$request->status);
       	   }

       	   $date = date('Y-m-d');
       	   $eDate = date('Y-m-d', strtotime($date. ' + 30 days'));
       	    if($request->event != "All"){
       	   	$t->where('event_id',$request->event);
       	   }

       	   if(!empty($request->booking)){
       	   	$t->whereDate('created_at','>=',$eDate);
       	   }else{
       	   	$t->whereDate('created_at','<=',$eDate);
       	   }
       })
       ->where('admin_status',1)
  ->orderBy('created_at','DESC');
  $vv = view($this->view.'myBooking.ajax')->with('booking',$booking)->render();
  return response()->json(['list' => $vv]);
}




public function changeBookingStatus($status_code,$id)
{
	 $booking = Booking::where('celebrity_id',Auth::user()->id)->where('id',$id)->where('admin_status',1);
	 if($booking->count() == 0){
	 	$status = ['status' => 0, 'message' => 'Booking Not found'];
	 }else{
	 	 $b = $booking->first();
	 	$status = ['status'=> 0,'message' => 'Unable to change!'];
	 	switch ($status_code) {
	 		case 1:
	 			 if($b->status == 0){
	 			 	$b->status = 1;
	 			 	$b->save();
	 			 	$status = ['status'=> 1,'message' => 'Status has been changed successfully!'];
	 			 }
	 			break;
	 		case 2:
	 			 if($b->status == 0){
	 			 	$b->status = 1;
	 			 	$b->save();
	 			 	$status = ['status'=> 1,'message' => 'Status has been changed successfully!'];
	 			 }
	 			break;
	 		
	 		default:
	 			# code...
	 			break;
	 	}
	 }
	 return response()->json($status);
}

#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

public function myvideos()
{ 
  $booking = Booking::where('celebrity_id',Auth::user()->id)->where('status','!=',6)->orderBy('created_at','DESC')->groupBy('event_id')->pluck('event_id')->toArray();
  $events = Event::whereIn('id',$booking)->orderBy('label','ASC')->get();
  return view($this->view.'myvideos.index')->with('events',$events);
}


#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

public function myvideosDetail($id)
{
   $booking = Booking::where('celebrity_id',Auth::user()->id)->where('status',3)->orderBy('created_at','DESC');
   if($booking->count() == 0){
    abort(404);
   }
   // $b= $booking->first();
   // $b->profile_showable = 0;
   // $b->save();
   // \Artisan::call('migrate');
  return view($this->view.'myvideos.detail')->with('book',$booking->first());
}

 
#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

public function myvideosAjax(Request $request)
{ 
 $booking = Booking::where('celebrity_id',Auth::user()->id)
       ->where(function($t) use($request){
             
           if($request->event != "All"){
               $t->where('event_id',$request->event);
           }

           if(!empty($request->start_date)){
            $t->whereDate('created_at','>=',$request->start_date);
           }


           if(!empty($request->end_date)){
            $t->whereDate('created_at','<=',$request->end_date);
           } 
       })
  ->orderBy('created_at','DESC')->where('status',3);
  $vv = view($this->view.'myvideos.ajax')->with('booking',$booking)->render();
  return response()->json(['list' => $vv]);
}





#---------------------------------------------------------------------------------------------------------------------------
# 'artist.bookingUploadVideo'
#---------------------------------------------------------------------------------------------------------------------------

   public function myvideosreview(Request $request,$id,$review_id)
   {
      $booking = Booking::where('celebrity_id',Auth::user()->id)->where('id',$id)->where('status',3);
      $review = CelebrityReview::where('id',$review_id)->where('booking_id',$id);
   if($booking->count() == 0){
         $status = ['status' => 0, 'message' => 'Booking Not found'];
   }elseif($review->count() == 0){
         $status = ['status' => 0, 'message' => 'Review not found.'];
   }else{
         $b = $booking->first();
         $r = new CelebrityReview;
         $r->parent = $review_id;
         // $r->celebrity_id = $b->celebrity_id;
         // $r->booking_id = $b->id;
         // $r->title = $request->title;
         // $r->rating = $request->rating;
         $r->reviews = $request->review;
         $r->status = 1;
         $r->save();
         $status = ['status'=> 1,'message' => 'Reply added successfully!'];
   }
   return response()->json($status);
   }



#---------------------------------------------------------------------------------------------------------------------------
# 'artist.bookingUploadVideo'
#---------------------------------------------------------------------------------------------------------------------------

   public function myvideoProfileSetting(Request $request,$id)
   {
      $booking = Booking::where('celebrity_id',Auth::user()->id)->where('id',$id)->where('status',3)->where('profile_showable',0);
       
   if($booking->count() == 0){
         $status = ['status' => 0, 'message' => 'Booking Not found'];
   }else{
         $b = $booking->first();
         if(!empty($request->type) && $request->type == "profile_video"){
           $b->profile_video = $request->val;
           $b->save();
            $status = ['status'=> 1,'message' => 'Video Settings changed successfully!'];
         }elseif(!empty($request->type) && $request->type == "profile_review"){
             $b->profile_review = $request->val;
             $b->save();
             $b->profile_review();
              $status = ['status'=> 1,'message' => 'Video Settings changed successfully!'];
          }else{
             $status = ['status'=> 0,'message' => 'Something wrong!'];
          }
         
        
   }
   return response()->json($status);
   }



#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

public function inviteUser()
{
  return view($this->view.'inviteUser');
}

#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

public function subscriptionList(Request $request)
{
	 
       	 
   return view($this->view.'subscription.list');
}

#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

public function subscription()
{
   return view($this->view.'subscription.index');
}

#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

public function AvailabilityAjax(Request $request)
{
   $user = \Auth::user();
   $user->availability = $request->availability;
   $user->save();
   return response()->json(['status' => 1, 'message' => 'Availability status changed successfully!']);
}


#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------
 
public function updateProfile(Request $request)
{
	    $destinationPath = 'images/artists/';
	    $u = Auth::user();
		//$u->category_id = $request->category;
		$u->name = $request->name;
	    $u->username = $request->username;
		$u->email = $request->email;
		$u->phone_number = $request->phone_number;
		$u->phone_code = $request->phone_code;
		$u->facebook_url = $request->facebook_url;
		$u->insta_url = $request->insta_url;
		$u->twitter_url = $request->twitter_url;
		$u->youtube_url = $request->youtube_url;
		//$u->password = \Hash::make($request->password);
		$u->category_id = json_encode($request->category);
		$u->address = $request->address;
		$u->about = $request->about;
	    $u->gender = $request->gender;
	    $u->country_id = $request->country;
	    $u->state_id = $request->state_name;
	    $u->city_id = $request->city_name;
	    $u->dob = $request->dob;
	    $u->pincode = $request->pincode;
	    $u->where_can_we_find = $request->where_can_we_find;
	    $u->profile_id = $request->profile_id;
	    $u->followers = $request->followers;
	    $u->delivery_within = $request->delivery_within;
	    $u->charge = $request->charge;
        $u->profile_picture = $request->hasFile('profile_picture') ? uploadFileWithAjax($destinationPath,$request->file('profile_picture'),1) : $u->profile_picture;
        $u->cover_picture = $request->hasFile('cover_picture') ? uploadFileWithAjax($destinationPath,$request->file('cover_picture'),1) : $u->cover_picture;
        
	    $u->save();
	     $u->createCategories();
	    $status = ['status' => 1,'message' => 'updated successfully!','url' => route('artist.profile')];

	    return response()->json($status);
}


#---------------------------------------------------------------------------------------
# Basic Information
#---------------------------------------------------------------------------------------

   public function countries(Request $request)
   {    


   	     
   	    if($request->country_id > 0){
   	   $data = \App\Models\State::where('country_id',$request->country_id)
         // ->where('lang',Session::get('locale'))
         //->where('deleted',0)
         ->where('status',1)
         ->where('has_parent',0)
		   	    ->orderBy('name','ASC')
		   	    ->get();
   	    	
   	    }

   	    if($request->state_id > 0){
   	     $data = \App\Models\City::where('state_id',$request->state_id)
         ->where('deleted',0)
         ->where('has_parent',0)
         ->where('status',1)
         // ->where('lang',Session::get('locale'))
		   	    ->orderBy('name','ASC')
		   	    ->get();
   	    	
   	    }
            $text ='<option value="">Select</option>';
   	    foreach ($data as $key => $value) {
   	    	 $selected = $request->val == $value->id ? 'selected' : '';
           $name = (Session::has('locale') && Session::get('locale') == 'AR') && !empty($value->arabic) ? $value->arabic->name : $value->name;
   	    	$text .='<option value="'.$value->id.'" '.$selected.'>'.$name.'</option>';
   	    }

   	    return response()->json($text);

   	    

   }

#---------------------------------------------------------------------------------------
# Basic Information
#---------------------------------------------------------------------------------------

   public function subscription_post(Request $request)
   {    
        $date = Auth::user()->subscriptionEndDate($request->category_id);
        $Start_date = date('Y-m-d');
        if(strtotime($date) >= strtotime(date('Y-m-d'))){
          $Start_date = $date;
        } 

       $package = \App\Models\SubscriptionPackage::where('id',$request->package_id);

       if($package->count() == 0){
         $status = ['status' => 0, 'message' => 'Package not found!'];
       }else{
       	$p = $package->first();
          $end = date('Y-m-d', strtotime($Start_date. ' + '.$p->days.' days'));
       	 $s = new MySubscription;
       	 $s->user_id = Auth::user()->id;
       	 $s->package_id = $request->package_id;
       	 $s->category_id = $request->category_id;
       	 $s->start_date = $Start_date;
       	 $s->end_date = $end;
       	 $s->save();

       	 $user = Auth::user();
       	 $user->subscription_end_date = $end;
       	 $user->save();


         $status = ['status' => 1, 'message' => 'Subscription Package added successfully!','url' => route('artist.subscription.list')];
       }

   	    return response()->json($status);
   }




#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

public function changePassword(Request $request)
{
   
       $v = \Validator::make($request->all(), [
                 'old_password' => ['required'],
                 'new_password' => ['required'],
                  
       ]);
       if($v->fails()){
                 $status = [
                      'status' => 0,
                      'message' => 'Please fill all fields!'
                 ];
       }else{
             $u = Auth::user();
                if (\Hash::check($request->old_password , $u->password)){
                    $password = \Hash::make($request->new_password);    
                    $u->password = $password;
                    $u->save();
                    $status = [
                          'status' => 1,
                          'message' => 'Password updated sucessfully'
                           
                    ];  

          }else{
            $status = [
                          'status' => 2,
                          'message' => 'Old password doesnot match with our records.'
                     ];
          }

       }
    
        return response()->json($status);
}







}
