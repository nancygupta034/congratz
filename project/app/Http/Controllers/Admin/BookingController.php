<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
class BookingController extends Controller
{
    
public $viewPath ='admin.modules.booking.';

#--------------------------------------------------------------------------------------------------
# Category Index
#--------------------------------------------------------------------------------------------------

public function index($type)
{ 
  return view($this->viewPath.'list')->with('type',$type); 
}


#--------------------------------------------------------------------------------------------------
# Category ajax
#--------------------------------------------------------------------------------------------------

public function ajax(Request $request,$type)
{
  $booking = Booking::where(function($t) use($type){
           if($type == "pending"){
              $t->where('admin_status',0);
           }else{
           	$t->where('admin_status',1);
           }

           // $date = date('Y-m-d');
           // $eDate = date('Y-m-d', strtotime($date. ' +30 days'));
           //  if($request->event != "All"){
           //  $t->where('event_id',$request->event);
           // }

           // if(!empty($request->booking)){
           //  $t->whereDate('created_at','>=',$eDate);
           // }else{
           //  $t->whereDate('created_at','<',$eDate);
           // }
       })

  ->orderBy('created_at','DESC')->paginate(20);
  $vv = view($this->viewPath.'ajax')->with('booking',$booking)->render();
  return response()->json(['data' => $vv]); 
}



#--------------------------------------------------------------------------------------------------
# Category ajax
#--------------------------------------------------------------------------------------------------

public function detail(Request $request,$id)
{
  $c = Booking::where('id',$id);
  if($c->count() == 0){
    abort(404);
  }
  return view($this->viewPath.'detail')->with('book',$c->first()); 
}



#--------------------------------------------------------------------------------------------------
# Category ajax
#--------------------------------------------------------------------------------------------------

public function statusChnage(Request $request,$id,$check)
{
   $c = Booking::where('id',$id)->first();
   $c->admin_status = $check;
   $c->save();
   
   return $this->ajax($request);
}



}
