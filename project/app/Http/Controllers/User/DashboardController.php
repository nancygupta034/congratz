<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Models\Booking;
use App\Models\Event;
use App\Models\Wishlist;
use App\Models\CelebrityReview;
 
class DashboardController extends Controller
{
public $view = 'users.modules.';
#---------------------------------------------------------------------------------------------------------
# Dashboard
#---------------------------------------------------------------------------------------------------------

	public function index()
	{
		return view('users.modules.dashboard');
	}
#---------------------------------------------------------------------------------------------------------
# myProfile 
#---------------------------------------------------------------------------------------------------------
 
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

public function inviteUser()
{
  return view($this->view.'inviteUser');
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

public function myBooking(Request $request)
{
 
$booking = Booking::where('user_id',Auth::user()->id)->where('status','!=',6)->orderBy('created_at','DESC')->groupBy('event_id')->pluck('event_id')->toArray();
$events = Event::whereIn('id',$booking)->orderBy('label','ASC')->get();
return view($this->view.'myBooking.index')->with('events',$events);
}




#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

public function myBookingDetail($id)
{
   $booking = Booking::where('user_id',Auth::user()->id)->where('status','!=',6)->orderBy('created_at','DESC');
   if($booking->count() == 0){
    abort(404);
   }
  return view($this->view.'myBooking.detail')->with('book',$booking->first());
}


#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

public function myvideos()
{ 
  $booking = Booking::where('user_id',Auth::user()->id)->where('status','!=',6)->orderBy('created_at','DESC')->groupBy('event_id')->pluck('event_id')->toArray();
  $events = Event::whereIn('id',$booking)->orderBy('label','ASC')->get();
  return view($this->view.'myvideos.index')->with('events',$events);
}


#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

public function myvideosDetail($id)
{
   $booking = Booking::where('user_id',Auth::user()->id)->where('status',3)->orderBy('created_at','DESC');
   if($booking->count() == 0){
    abort(404);
   }
   // \Artisan::call('migrate');
  return view($this->view.'myvideos.detail')->with('book',$booking->first());
}


#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

public function myBookingAjax(Request $request)
{
  $booking = Booking::where('user_id',Auth::user()->id)
       ->where(function($t) use($request){
           if($request->status != "All"){
            $t->where('status',$request->status);
           }

           $date = date('Y-m-d');
           $eDate = date('Y-m-d', strtotime($date. ' +30 days'));
            if($request->event != "All"){
            $t->where('event_id',$request->event);
           }

           if(!empty($request->booking)){
            $t->whereDate('created_at','>=',$eDate);
           }else{
            $t->whereDate('created_at','<',$eDate);
           }
       })
  ->orderBy('created_at','DESC');
  $vv = view($this->view.'myBooking.ajax')->with('booking',$booking)->render();
  return response()->json(['list' => $vv]);
}



#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

public function changeBookingStatus($id,$status_code)
{
   $booking = Booking::where('user_id',Auth::user()->id)->where('id',$id);
   if($booking->count() == 0){
    $status = ['status' => 0, 'message' => 'Booking Not found'];
   }else{
     $b = $booking->first();
    $status = ['status'=> 0,'message' => 'Unable to change!'];
    switch ($status_code) {
      case 5:
         if($b->status == 0){
            $b->status = 5;
            $b->save();
            $status = ['status'=> 1,'message' => 'Status has been changed successfully!'];
         }
        break;
      case 3:
         if($b->status == 2){
            $b->status = 3;
            $b->save();
            $status = ['status'=> 1,'message' => 'Status has been changed successfully!'];
         }
        break;
      case 4:
         if($b->status != 3 && $b->status != 4){
            $b->status = 4;
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

public function raiseRefund(Request $request,$id)
{
   $booking = Booking::where('user_id',Auth::user()->id)->where('id',$id);
   if($booking->count() == 0){
    $status = ['status' => 0, 'message' => 'Booking Not found'];
   }elseif($booking->first()->status != 3 && $booking->first()->status != 4){
            $b = $booking->first();
            $b->status = 4;
            $b->celebrity_message = $request->refund_message;
            $b->save();
            $status = ['status'=> 1,'message' => 'Status has been changed successfully!'];
         
   }else{
     $status = ['status'=> 1,'message' => 'Something wrong!'];
   }
   return response()->json($status);
}


#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

public function myvideosAjax(Request $request)
{ 
 $booking = Booking::where('user_id',Auth::user()->id)
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

#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

public function getOcassionsForBookingPage()
{
  return view($this->view.'myvideos.index');
}


#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

public function mywishlist()
{
   $wishlists = Wishlist::where('user_id',Auth::user()->id)->orderBy('created_at','ASC')->paginate(20);
  return view($this->view.'mywishlist.index')->with('wishlists',$wishlists);
}


#-----------------------------------------------------------------------------
# celebrityBooking
#-----------------------------------------------------------------------------

public function celebrityBooking(Request $request,$slug)
{
  
    $v = \Validator::make($request->all(),[
               'booking_for' => 'required',
               'email' => 'required',
               'instructions' => 'required',
               'ocassion' => 'required',
               'email' => 'required'
                
    ]);

    $login = Auth::check() && Auth::user()->role == "user" ? 1 : 0;

     $u = User::where('role','artist')
                     ->where('slug',$slug);

     if($u->count() == 0){
            $status = ['status' => 2, 'message' => 'Something wrong!'];
     }elseif($login == 0){

       $status = ['status' => 1, 'message' => 'Please login first!','url' => route('home.booking',$slug)];

     }elseif($v->fails()){

        $status = ['status' => 0, 'message' => 'Please add all required fields!'];

    }else{

        $b = new Booking;
        $b->booking_for = $request->booking_for;
        $b->email = $request->email;
        $b->to = $request->to;
        $b->from = $request->from;
        $b->event_id = $request->ocassion;
        $b->user_id = Auth::user()->id;
        $b->celebrity_id = $u->first()->id;
        $b->profile_showable = !empty($request->profile_showable) ? 1 : 0;
        $b->instructions = $request->instructions;
        $b->status = 0;
        $b->save();
         
        $status = ['status' => 1, 'message' => 'Your booking request has been sent successfully!','url' => route('user.myBooking')];
    }

    return response()->json($status);


}



#---------------------------------------------------------------------------------------------------------------------------
# 'artist.bookingUploadVideo'
#---------------------------------------------------------------------------------------------------------------------------

   public function myvideosreview(Request $request,$id)
   {
         $booking = Booking::where('user_id',Auth::user()->id)->where('id',$id)->where('status',3);
   if($booking->count() == 0){
         $status = ['status' => 0, 'message' => 'Booking Not found'];
   }elseif(!empty($booking->first()->review) && $booking->first()->review->count() > 0){
         $status = ['status' => 0, 'message' => 'You already added review for this video.'];
   }else{
         $b = $booking->first();
         $r = new CelebrityReview;
         $r->user_id = Auth::user()->id;
         $r->celebrity_id = $b->celebrity_id;
         $r->booking_id = $b->id;
         $r->title = $request->title;
         $r->rating = $request->rating;
         $r->reviews = $request->review;
         $r->status = 1;
         $r->save();
         $status = ['status'=> 1,'message' => 'Review submitted successfully!'];
   }
   return response()->json($status);
   }




#-----------------------------------------------------------------------------
# celebrityBooking
#-----------------------------------------------------------------------------

public function addOcassion(Request $request)
{

	$event = Event::where('label',$request->label);
    $lang="EN";
	if($event->count() == 0){
			$c = new Event;
			$c->label = $request->label;
			$c->status = 1;
			$c->lang = $lang;
			$c->user_id = Auth::user()->id;
			$c->save();

		$this->createDulplicate($c,$lang,$c->id);
     }
	 	$status = ['status' => 1,'message' => 'Ocassion saved successfully!'];

	 	return response()->json($status);

}



#--------------------------------------------------------------------------------------------
# store
#--------------------------------------------------------------------------------------------

public function createDulplicate($cms,$lang,$id)
{
   if($lang == "EN"){
       $c = Event::where('has_parent',$cms->id)->where('lang','AR');
       if($c->count() == 0){
          $c = new Event;
          $c->label = $cms->label;
          $c->has_parent = $cms->id;
          $c->slug = $cms->slug;
          $c->status = 1;
          $c->user_id = $cms->user_id;
          $c->lang = 'AR';
          $c->save();
       }
   }
}



#-----------------------------------------------------------------------------
# celebrityBooking
#-----------------------------------------------------------------------------

public function celebrityWishlist(Request $request,$slug)
{ 
    $login = Auth::check() && Auth::user()->role == "user" ? 1 : 0;

     $u = User::where('role','artist')
                     ->where('slug',$slug);


     if($login == 0){

       $status = ['status' => 1, 'message' => 'Please login first!','url' => url('login')];

     }elseif($u->count() == 0){
            $status = ['status' => 2, 'message' => 'Celebrity not found!'];
     }else{
        $celebrity = $u->first();
        $Wishlist = Wishlist::where('user_id',Auth::user()->id)->where('celebrity_id',$celebrity->id);

         if($Wishlist->count() > 0){
             $Wishlist->delete();
             $message = 'The celebrity has been removed from wishlist successfully!';
         }else{
            $b = new Wishlist;
            $b->celebrity_id = $celebrity->id;
            $b->user_id = Auth::user()->id;
            $b->save();
             $message = 'The celebrity has been added to wishlist successfully!';
             

         }

        $status = ['status' => 2, 'message' => $message];
    }

    return response()->json($status);


}




#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

public function settings()
{
  return view($this->view.'account.settings');
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
















#-----------------------------------------------------------------------------
# controller end
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
    $u->about = $request->about;
    $u->address = $request->address;
    $u->about = $request->about;
    $u->gender = $request->gender;
    $u->country_id = $request->country;
    $u->state_id = $request->state_name;
    $u->city_id = $request->city_name;
    $u->dob = $request->dob;
    $u->pincode = $request->pincode;
    $u->profile_picture = $request->hasFile('profile_picture') ? uploadFileWithAjax($destinationPath,$request->file('profile_picture'),1) : $u->profile_picture;
    $u->cover_picture = $request->hasFile('cover_picture') ? uploadFileWithAjax($destinationPath,$request->file('cover_picture'),1) : $u->cover_picture;
        
      $u->save(); 
      $status = ['status' => 1,'message' => 'updated successfully!','url' => route('user.profile')];

      return response()->json($status);
}

public function updateImage(Request $request)
{
    $destinationPath = 'images/artists/';
    $u = Auth::user();
    //$u->category_id = $request->category;
    if($request->type ==  "profile") {
      $u->profile_picture = $request->hasFile('image') ? uploadFileWithAjax($destinationPath,$request->file('image'),1) : $u->profile_picture;
    }
    else {
        $u->cover_picture = $request->hasFile('image') ? uploadFileWithAjax($destinationPath,$request->file('image'),1) : $u->cover_picture;
    }
        
    $u->save(); 
    $status = ['status' => 1,'message' => 'Updated successfully','url' => route('user.profile')];

    return response()->json($status);
}


}
