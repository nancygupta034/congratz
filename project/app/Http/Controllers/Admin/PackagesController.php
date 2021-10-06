<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\SubscriptionPackage;
class PackagesController extends Controller
{
    
public $viewPath ='admin.modules.packages.';

#--------------------------------------------------------------------------------------------------
# Category Index
#--------------------------------------------------------------------------------------------------

public function index()
{
  $categories = SubscriptionPackage::where('status',1)->paginate(10);
  return view($this->viewPath.'list')->with('categories',$categories); 
}


#--------------------------------------------------------------------------------------------------
# Category ajax
#--------------------------------------------------------------------------------------------------

public function ajax()
{
  $categories = SubscriptionPackage::where('status',1)->where('lang','EN')->paginate(10);
  $vv = view($this->viewPath.'ajax')->with('categories',$categories)->render();
  return response()->json(['data' => $vv]); 
}



#--------------------------------------------------------------------------------------------------
# Category Index
#--------------------------------------------------------------------------------------------------

public function create($lang="EN",$id=0)
{
	if($id == 0){
         return view($this->viewPath.'create')
              ->with('url',route('admin.packages.create'))->with('lang',$lang); 
    }
         $category = SubscriptionPackage::find($id);
         return view($this->viewPath.'create')
              ->with('url',route('admin.packages.edit',[$lang,$id]))->with('lang',$lang)
              ->with('category',$category); 
}

#--------------------------------------------------------------------------------------------
# store
#--------------------------------------------------------------------------------------------

public function store(Request $request,$lang="EN",$id=0)
{
	 
	 $v = \Validator::make($request->all(),[
           // 'label' => function($id){
           //    if($id == 0){
           //    	return 'required|unique:categories';
           //    }else{
           //    	return 'required|unique:categories,'.$id;
           //    }
           // },
           'label' => 'required',
           'days' => 'required',
           'description' => 'required',
           'title' => 'required'
            
	 ]);
     if($v->fails()){
	 	$status = ['status' => 0,'errors' => $v->errors()];
	 }else{
	 	$c = $id > 0 ? SubscriptionPackage::find($id) : new SubscriptionPackage;
	 	$c->label = $request->label;
	 	$c->days = $request->days;
	 	$c->description = $request->description;
	 	$c->title = $request->title;
	 	$c->status = 1;
    $c->lang = $lang;
	 	$c->save();
    $this->createDulplicate($c,$lang,$id);
	 	$status = ['status' => 1,'messages' => 'Package saved successfully!','url' => route('admin.packages.list')];
     }
	 return response()->json($status);
}



#--------------------------------------------------------------------------------------------
# store
#--------------------------------------------------------------------------------------------

public function createDulplicate($cms,$lang,$id)
{
   if($lang == "EN"){
       $c = SubscriptionPackage::where('has_parent',$cms->id)->where('lang','AR');
       if($c->count() == 0){
          $c = new SubscriptionPackage;
          $c->label = $cms->label;
          $c->has_parent = $cms->id;
          $c->slug = $cms->slug;
          $c->days = $cms->days;
          $c->description = $cms->description;
          $c->title = $cms->title;
          $c->status = 1;
          $c->lang = 'AR';
          $c->save();
       }
   }
}


#--------------------------------------------------------------------------------------------
# Delete Multiple
#--------------------------------------------------------------------------------------------

public function filter(Request $request)
{
	$ids = $request->category_ids;
    $category = SubscriptionPackage::whereIn('id',$ids);
    if($category->count() > 0){
    	foreach ($category->get() as $cate) {
    		$cate->status = 0;
    		$cate->save();
    	}
    }

    $status = ['status' => 1,'messages' => 'Deleted saved successfully!'];
    return response()->json($status);
}


#--------------------------------------------------------------------------------------------
# store
#--------------------------------------------------------------------------------------------

public function delete(Request $request,$id)
{
	 
    $category = SubscriptionPackage::where('id',$id);
    if($category->count() > 0){
    	    $cate = $category->first();
    		$cate->status = 0;
    		$cate->save();
      }

    $status = ['status' => 1,'messages' => 'Deleted saved successfully!'];
    return response()->json($status);
}


}
