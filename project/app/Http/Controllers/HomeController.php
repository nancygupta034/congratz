<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
class HomeController extends Controller
{
     




    public function logout()
    {
        if(Auth::check()){

            $url = Auth::user()->role.'/login';
             \Auth::logout();
          return redirect($url);
        }


       
        return redirect('login');
    }



#---------------------------------------------------------------------------------------
#  login check and redirect to further...
#---------------------------------------------------------------------------------------

    public function check(Request $request)
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
        if (Auth::attempt([$field => $request->email, 'password' => $request->password,'role' => 'user'],$remember_me))
        { 

               $url = !empty($request->redirect_link) ? $request->redirect_link : $this->checkAuthLoginRedirection();
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


 






#-----------------------------------------------------------------------------------------
#  auth check
#-----------------------------------------------------------------------------------------

public function checkAuthLoginRedirection()
{ 
    $role = Auth::user()->role;
    switch ($role) {
        case 'admin':
             return route('admin.dashboard');
            break;
        case 'artist':
             return route('artist.dashboard');
            break;
        case 'user':
             return route('user.dashboard');
            break;
        
        default:
            # code...
            break;
    }
}







}
