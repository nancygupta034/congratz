<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Category;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
class CountryController extends Controller
{
    
public $viewPath ='admin.modules.country.';

#--------------------------------------------------------------------------------------------------
# Category Index
#--------------------------------------------------------------------------------------------------

public function index()
{
  $categories = Country::where('status',1)->paginate(10);
  return view($this->viewPath.'list')->with('categories',$categories); 
}


#--------------------------------------------------------------------------------------------------
# Category ajax
#--------------------------------------------------------------------------------------------------

public function ajax()
{
//  return $categories = Country::where('status','1')->where('lang','EN')->paginate(10);
  $countries = Country::orderBy('name', 'asc')->where('deleted', '0')->where('lang','EN')->paginate(10);
  $vv = view($this->viewPath.'ajax')->with('categories',$countries)->render();
  return response()->json(['data' => $vv]); 
}



#--------------------------------------------------------------------------------------------------
# Category Index
#--------------------------------------------------------------------------------------------------

public function create($lang="EN",$id=0)
{
	if($id == 0){
         return view($this->viewPath.'create')
              ->with('url',route('admin.country.create'))->with('lang',$lang); 
    }
        $category = Country::find($id);
         return view($this->viewPath.'create')
              ->with('url',route('admin.country.edit',[$lang,$id]))->with('lang',$lang)
              ->with('country',$category); 
}

#--------------------------------------------------------------------------------------------
# store
#--------------------------------------------------------------------------------------------

public function store(Request $request,$lang="EN",$id=0)
{
	 
	 $v = \Validator::make($request->all(),[
           // 'name' => function($id){
           //    if($id == 0){
           //    	return 'required|unique:categories';
           //    }else{
           //    	return 'required|unique:categories,'.$id;
           //    }
           // },
           'name' => 'required',
           'sortname' => 'required',
           'country_code' => 'required',
           'phonecode' => 'required'
            
	 ]);
     if($v->fails()){
	 	$status = ['status' => 0,'errors' => $v->errors()];
	 }else{
    $destinationPath = 'images/settings/' ;
            
	 	$c = $id > 0 ? Country::find($id) : new Country;
	 	$c->name = $request->name;
	 	$c->sortname = $request->sortname;
	 	$c->country_code = $request->country_code;
	 	$c->phonecode = $request->phonecode;
    $c->image = $request->hasFile('image') ? uploadFileWithAjax($destinationPath,$request->file('image'),1) : $c->image;
	 	$c->status = 1;
    $c->lang = $lang;
	 	$c->save();
    $this->createDulplicate($c,$lang,$id);
	 	$status = ['status' => 1,'messages' => 'Country saved successfully!','url' => route('admin.country.list')];
     }
	 return response()->json($status);
}



#--------------------------------------------------------------------------------------------
# store
#--------------------------------------------------------------------------------------------

public function createDulplicate($cms,$lang,$id)
{
   if($lang == "EN"){
       $c = Country::where('has_parent',$cms->id)->where('lang','AR');
       if($c->count() == 0){
          $c = new Country;
          $c->name = $cms->name;
          $c->has_parent = $cms->id;
          $c->slug = $cms->slug;
          $c->sortname = $cms->sortname;
          $c->image = $cms->image;
          $c->country_code = $cms->country_code;
          $c->phonecode = $cms->phonecode;
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
    $category = Country::whereIn('id',$ids);
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
	 
    $category = Country::where('id',$id);
    if($category->count() > 0){
    	    $cate = $category->first();
    		$cate->status = 0;
    		$cate->save();
      }

    $status = ['status' => 1,'messages' => 'Deleted saved successfully!'];
    return response()->json($status);
}


}
