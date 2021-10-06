<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
 


 #----------------------------------------------------------------------------------------------------------
 # User
 #----------------------------------------------------------------------------------------------------------

	public function user($value='')
	{
		return $this->belongsTo('App\User','user_id');
	}

 #----------------------------------------------------------------------------------------------------------
 # User
 #----------------------------------------------------------------------------------------------------------

	public function celebrity($value='')
	{
		return $this->belongsTo('App\User','celebrity_id');
	}
 #----------------------------------------------------------------------------------------------------------
 # User
 #----------------------------------------------------------------------------------------------------------

	public function review($value='')
	{
		return $this->hasMany('App\Models\CelebrityReview','booking_id');
	}

    

    public function profile_review($value='')
    {
    	 if(!empty($this->review)){
    	 	foreach ($this->review as $key => $r) {
    	 		$r->profile = $this->profile_review == 1 ? 1 : 0;
    	 		$r->save();
    	 	}
    	 }
    }

 #----------------------------------------------------------------------------------------------------------
 # User
 #----------------------------------------------------------------------------------------------------------

	public function ocassion($value='')
	{
		return $this->belongsTo('App\Models\Event','event_id');
	} 

 #----------------------------------------------------------------------------------------------------------
 # User
 #----------------------------------------------------------------------------------------------------------

	public function geUserStatus($value='')
	{
		switch ($this->status) {
			case 0:
				return $text = '<span class="badge badge-primary btn-pending">Pending</span>';
				break;
			case 1:
				 return $text ='<span class="badge badge-info btn-refund">Processing</span>';
				break;
			case 2:
				return '<span class="badge badge-warning btn-refund">Ready</span>';
				break;
			case 3:
				return '<span class="badge badge-success btn-refund">Completed</span>';
				break;
			case 4:
				       $text ='<span class="badge badge-dark btn-refund">Refund Raised</span>';
				return $text .='<span class="message">Refund under processing</span>';
				break;
			case 5:
				return '<span class="badge badge-secondary btn-refund">Refunded</span>';
				break;
			case 6:
				return '<span class="badge badge-danger btn-refund">Rejected</span>';
				break;
			default:
				# code...
				break;
		}
	}
	
 #----------------------------------------------------------------------------------------------------------
 # User
 #----------------------------------------------------------------------------------------------------------

	public function getTopStatus($value='')
	{
		switch ($this->status) {
			case 0:
				return $text = '<span class="btn staus-btn btn-pending">Waiting for Confirmation</span>';
				break;
			case 1:
				 return $text ='<a href="javascript:void(0);" class="accept-btn"><i class="fa fa-check" aria-hidden="true"></i>Accepted</a>';
				break;
			case 2:
				return '<a href="javascript:void(0);" class="accept-btn"><i class="fa fa-check" aria-hidden="true"></i>Ready</a>';
				break;
			case 3:
				return '<a href="javascript:void(0);" class="accept-btn"><i class="fa fa-check" aria-hidden="true"></i>Completed</a>';
				break;
			case 4:
				return '<a href="javascript:void(0);" class="accept-btn"><i class="fa fa-check" aria-hidden="true"></i>Refund Raised</a><';
				break;
			case 5:
				return '<a href="javascript:void(0);" class="accept-btn"><i class="fa fa-check" aria-hidden="true"></i>Refunded</a>';
				break;
			case 6:
				return '<a href="javascript:void(0);" class="accept-btn"><i class="fa fa-check" aria-hidden="true"></i>Rejected</a>';
				break;
			default:
				# code...
				break;
		}
	}

 #----------------------------------------------------------------------------------------------------------
 # User
 #----------------------------------------------------------------------------------------------------------

	public function getStatus($value='')
	{
		switch ($this->status) {
			case 0:
				 $text = '<span class="btn staus-btn btn-pending">Pending</span>';
				break;
			case 1:
				 $text ='<span class="btn staus-btn btn-refund">Approved</span>';
				 return $text .='<a href="'.route('artist.changeBookingDetail',$this->id).'" class="btn staus-btn btn-booking-detail">Detail</a>';
				break;
			case 2:
				return '<span class="btn staus-btn btn-refund">Ready</span>';
				break;
			case 3:
				return '<span class="btn staus-btn btn-refund">Completed</span>';
				break;
			case 4:
				return '<span class="btn staus-btn btn-refund">Refund Raised</span>';
				break;
			case 5:
				return '<span class="btn staus-btn btn-refund">Refunded</span>';
				break;
			case 6:
				return '<span class="btn staus-btn btn-refund">Rejected</span>';
				break;
			default:
				# code...
				break;
		}
	}#----------------------------------------------------------------------------------------------------------
 # User
 #----------------------------------------------------------------------------------------------------------

	public function getStatusButton()
	{
		$text = '';
		$url = route('artist.changeBookingDetail',$this->id);
		switch ($this->status) {
			case 0:
			     $url_approve = route('artist.changeBookingStatus',[1,$this->id]);
			     $url_cancel = route('artist.changeBookingStatus',[6,$this->id]);
				 $text .= '<a href="javascript:void(0);" data-action="'.$url_approve.'" class="changeBookingStatus btn btn-primary">Approve</a>';
				 $text .= '<a href="javascript:void(0);" data-action="'.$url_cancel.'" class="changeBookingStatus btn btn-danger">Cancel</a>';
				break;
			case 1:
				$text .= '<a href="'.$url.'" class=" btn btn-primary">Detail</a>';
				break;
			case 3:
				$text .= '<a href="'.$url.'" class=" btn btn-primary">Detail</a>';
				break;
			case 4:
				$text .= '<a href="'.$url.'" class=" btn btn-primary">Detail</a>';
				break;
			case 5:
				$text .= '<a href="'.$url.'" class=" btn btn-primary">Detail</a>';
				break;
			
			default:
				# code...
				break;
		}

		return $text;
	}
}
