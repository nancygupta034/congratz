<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteSettings extends Model
{
    


    public function arabic($value='')
    {
        return $this->hasOne($this,'has_parent');
    }



    public function english($value='')
    {
    	return $this->belongsTo($this,'has_parent');
    }


}
