<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MySubscription extends Model
{
   

#-------------------------------------------------------------------------------------------------------------
#  Category
#-------------------------------------------------------------------------------------------------------------

	public function category($value='')
	{
		return $this->belongsTo('App\Models\Category','category_id');
	}

#-------------------------------------------------------------------------------------------------------------
#  Category
#-------------------------------------------------------------------------------------------------------------

	public function package($value='')
	{
		return $this->belongsTo('App\Models\SubscriptionPackage','package_id');
	}

}
