<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\UserCategory;
class RegisterController extends Controller
{

#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

public function artistLogin()
{
	return view('auth.artistLogin')->with('login',1);
}



#---------------------------------------------------------------------------------------
#  login check and redirect to further...
#---------------------------------------------------------------------------------------

    public function artistCheck(Request $request)
    {
 
        $v= \Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required'
        ]);

        if($v->fails()){
            $status = [
                 'status' => 0,
                 'messages' => 'Please fill the required fields.'
            ];
        }


        $field = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $remember_me = $request->has('remember') ? true : false;
        if (Auth::attempt([$field => $request->email, 'password' => $request->password,'role' => 'artist'],$remember_me))
        { 

               $url = !empty($request->redirect_link) ? $request->redirect_link : route('artist.dashboard');
               $message = 'Login successfully, Redirecting to dashboard in';
               $status = [
                 'status' => 1,
                 'messages' => $message,
                 'url' => $url
               ];
        }else{
            $status = [
                 'status' => 0,
                 'messages' => 'Email and Password do not matched.'

            ];
        }
        
        return response()->json($status);
    }


 



#---------------------------------------------------------------------------------------
#  login check and redirect to further...
#---------------------------------------------------------------------------------------

    public function adminCheck(Request $request)
    {
 
        $v= \Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required'
        ]);

        if($v->fails()){
            $status = [
                 'status' => 0,
                 'messages' => 'Please fill the required fields.'
            ];
        }


        $field = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $remember_me = $request->has('remember') ? true : false;
        if (Auth::attempt([$field => $request->email, 'password' => $request->password,'role' => 'admin'],$remember_me))
        { 

               $url = !empty($request->redirect_link) ? $request->redirect_link : route('admin.dashboard');
               $message = 'Login successfully, Redirecting to dashboard in';
               $status = [
                 'status' => 1,
                 'messages' => $message,
                 'url' => $url
               ];
        }else{
            $status = [
                 'status' => 0,
                 'messages' => 'Email and Password do not matched.'

            ];
        }
        
        return response()->json($status);
    }


 




#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

public function adminLogin()
{
	return view('auth.adminLogin')->with('login',1);
}

#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

public function index()
{
	return view('auth.celebrityRegister')->with('login',1);
}

#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

public function createUser(Request $request)
{
	$v = \Validator::make($request->all(),[
           'username' => 'required|unique:users|max:255',
           'email' => 'required|unique:users|email',
           'phone_number' => 'required|unique:users',
	]);

	if($v->fails()){
		$status = ['status' => 2,'errors' =>$v->errors()];
	}else{
		$url = !empty($request->redirect_link) ? $request->redirect_link : route('user.dashboard');
		$status = ['status' => 1,'message' => 'Registration completed successfully!','url' => $url];
        $destinationPath = 'images/artists/';
		$u = new User;
		 
		$u->name = $request->name;
	    $u->username = $request->username;
		$u->email = $request->email;
		$u->phone_number = $request->phone_number;
		$u->phone_code = $request->phone_code;
		$u->password = \Hash::make($request->password);
		$u->gender = $request->gender;
	  $u->slug = strtotime(date('d-m-Y h:i:s'));
		$u->role = "user";
		$u->save();
    $u->slug = encrypt_decrypt($u->id);
    $u->save();
 
    
		Auth::login($u);
	}
	return response()->json($status);
}

#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

public function createCelebrity(Request $request)
{
	$v = \Validator::make($request->all(),[
           'username' => 'required|unique:users|max:255',
           'email' => 'required|unique:users|email',
           'phone_number' => 'required|unique:users',
	]);

	if($v->fails()){
		$status = ['status' => 2,'errors' =>$v->errors()];
	}else{
		$url = route('artist.dashboard');
		$status = ['status' => 1,'message' => 'Registration completed successfully!','url' => $url];
        $destinationPath = 'images/artists/';
		$u = new User;
		$u->category_id = $request->category;
		$u->name = $request->name;
	    $u->username = $request->username;
		$u->email = $request->email;
		$u->phone_number = $request->phone_number;
		$u->phone_code = $request->phone_code;
		$u->password = \Hash::make($request->password);
		$u->category_id = json_encode($request->category);
		$u->address = $request->address;
		$u->about = $request->about;
	    $u->gender = $request->gender;
	    $u->country_id = $request->country;
	    $u->state_id = $request->state_name;
	    $u->city_id = $request->city_name;
	    $u->dob = $request->dob;
	    $u->pincode = $request->pincode;
	    $u->where_can_we_find = $request->where_can_we_find;
	    $u->profile_id = $request->profile_id;
	    $u->followers = $request->followers;
	    $u->delivery_within = $request->delivery_within;
	    $u->charge = $request->charge;
        $u->profile_picture = $request->hasFile('profile_picture') ? uploadFileWithAjax($destinationPath,$request->file('profile_picture'),1) : $u->profile_picture;
        $u->cover_picture = $request->hasFile('cover_picture') ? uploadFileWithAjax($destinationPath,$request->file('cover_picture'),1) : $u->cover_picture;
		$u->role = "artist";
		$u->slug = strtotime(date('d-m-Y h:i:s'));
		$u->save();
     $u->slug = encrypt_decrypt($u->id);
    $u->save();
        $u->createCategories();

		Auth::login($u);
	}
	return response()->json($status);
}

#-----------------------------------------------------------------------------
# index
#-----------------------------------------------------------------------------

public function checkExistEscortFieldold(Request $request)
{
	$user_id = Auth::check() ? Auth::user()->id : 0;
  if(!empty($request->email)){
    $user = User::where('email',$request->email)->where('id','!=',$user_id)->count();
   }elseif(!empty($request->username)){
    $user = User::where('username',$request->username)->where('id','!=',$user_id)->count();
   }elseif(!empty($request->phone_number)){
    $user = User::where('phone_number',$request->phone_number)->where('id','!=',$user_id)->count();
   }

   echo $user == 0 ? 'true' : 'false';

}

}
