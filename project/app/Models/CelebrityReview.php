<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CelebrityReview extends Model
{
  
#--------------------------------------------------------------------------------------------------
# USER
#--------------------------------------------------------------------------------------------------
  public function user($value='')
  {
  	return $this->belongsTo('App\User','user_id');
  }
#--------------------------------------------------------------------------------------------------
# celebrity
#--------------------------------------------------------------------------------------------------
  public function celebrity($value='')
  {
  	return $this->belongsTo('App\User','celebrity_id');
  }
#--------------------------------------------------------------------------------------------------
# celebrity
#--------------------------------------------------------------------------------------------------
  public function replies($value='')
  {
  	return $this->hasMany($this,'parent');
  }


}