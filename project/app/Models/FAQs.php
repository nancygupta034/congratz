<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQs extends Model
{


public function category()
{
	return $this->belongsTo($this,'parent');
}




public function arabic()
{
    return $this->hasOne($this,'has_parent');
}






}
