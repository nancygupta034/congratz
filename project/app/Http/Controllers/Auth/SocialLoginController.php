<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use Exception;
use Auth;
use App\User;
class SocialLoginController extends Controller
{
    
  

public function redirectToSocialLogin($type)
{

	 switch ($type) {
	 	case 'facebook':
	 		return Socialite::driver('facebook')->redirect();
	 		break;
	 	 case 'google':
	 		return Socialite::driver('google')->redirect();
	 		break;
	 	 default:
	 		# code...
	 		break;
	 }
}



#-------------------------------------------------------------------------------------
# handleSocialLoginCallback
#-------------------------------------------------------------------------------------

public function handleSocialLoginCallback(Request $request,$type)
{
	 try{
     		$user = Socialite::driver($type)->user();
     		switch ($type) {
     			case 'facebook':
     				    $create['name'] = $user->getName();
			            $create['email'] = $user->getEmail();
			            $create['avatar'] = $user->getAvatar();
			            $create['id'] = $user->getId();
			          
			         return $this->createUserOrLogin('google_id',$create);
     				break;
     			case 'google':
     				    $create['name'] = $user->getName();
			            $create['email'] = $user->getEmail();
			            $create['avatar'] = $user->getAvatar();
			            $create['id'] = $user->getId();
			          
			         return $this->createUserOrLogin('facebook_id',$create);
     				break;
     			
     			default:
     				# code...
     				break;
     		}
       	
       }catch(Exception $e) {
       	
       }           
}






 

public function createUserOrLogin($social_type,$create)
{
	  
        $user = User::where($social_type,$create['id'])->where('role','user');
      if($user->count() > 0){
      	    Auth::login($user->first());
            //$this->updateVerificationStatusWhileProcess(1,'login',$otp=1010101);
      	    return redirect()->route('user.dashboard');
      }else{
		      	$u = new User;
		      	$u->name = $create['name']; 
		      	$u->email = $create['email'];
		      	$u->$social_type = $create['id'];
		      	$u->profile_picture = $create['avatar'];
		      	$u->role = 'user';
		      	$u->save();
		      		Auth::login($u);
		      		//$this->updateVerificationStatusWhileProcess(1,'login',$otp=1010101);
		      	    return redirect()->route('user.dashboard');

	   }
         return redirect()->route('custom.login');

}
 






}
