<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\UserCategory;
class UserCategory extends Model
{


#----------------------------------------------------------------------------------------------------------------------
# artists
#----------------------------------------------------------------------------------------------------------------------

public function celebrity()
{
    // $user_ids = UserCategory::where('')
    // $users = User::where('role','artist')->where('user_id',)
	
}


    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }


}
