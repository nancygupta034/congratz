<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
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

	
}
