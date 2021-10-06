<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
 


    public function arabic($value='')
    {
        return $this->hasOne($this,'parent');
    }



    public function english($value='')
    {
    	return $this->belongsTo($this,'parent');
    }


}
