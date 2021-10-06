<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class CustomerController extends Controller
{
   
public $viewPath ='admin.modules.customers.';
 

#--------------------------------------------------------------------------------------------------
# Category Index
#--------------------------------------------------------------------------------------------------

public function index()
{ 
  return view($this->viewPath.'list'); 
}


#--------------------------------------------------------------------------------------------------
# Category ajax
#--------------------------------------------------------------------------------------------------

public function ajax()
{
  $categories = User::where('role','user')->paginate(10);
  $vv = view($this->viewPath.'ajax')->with('categories',$categories)->render();
  return response()->json(['data' => $vv]); 
}



#--------------------------------------------------------------------------------------------------
# Category ajax
#--------------------------------------------------------------------------------------------------

public function statusChnage(Request $request,$lang,$id,$check)
{
   $c = User::where('id',$id);

   foreach ($c->get() as $cate) {
    $cate->status = $check;
    $cate->save();
   }
   return $this->ajax();
}



}
