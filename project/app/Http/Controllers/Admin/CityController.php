<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Category;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
class CityController extends Controller
{
    
public $viewPath ='admin.modules.cities.';

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
//  return $categories = City::where('status','1')->where('lang','EN')->paginate(10);
  $countries = City::orderBy('name', 'asc')->where('status',1)->where('deleted', '0')->where('lang','EN')->paginate(10);
  $vv = view($this->viewPath.'ajax')->with('categories',$countries)->render();
  return response()->json(['data' => $vv]); 
}



#--------------------------------------------------------------------------------------------------
# Category Index
#--------------------------------------------------------------------------------------------------

public function create($lang="EN",$id=0)
{
   $countries = Country::orderBy('name', 'asc')->where('has_parent',0)->where('deleted', '0')->where('lang','EN')->get();
	if($id == 0){
         return view($this->viewPath.'create')
              ->with('countries',$countries)
              ->with('url',route('admin.city.create'))->with('lang',$lang); 
    }
        $category = City::find($id);
         return view($this->viewPath.'create')
              ->with('countries',$countries)
              ->with('url',route('admin.city.edit',[$lang,$id]))->with('lang',$lang)
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
           'country_id' => 'required',
           'state_id' => 'required',
            
            
	 ]);
     if($v->fails()){
	 	$status = ['status' => 0,'errors' => $v->errors()];
	 }else{
    $destinationPath = 'images/settings/' ;
            
	 	$c = $id > 0 ? City::find($id) : new City;
	 	$c->name = $request->name;
	  $c->state_id = $request->state_id;
    $c->status = 1;
    $c->lang = $lang;
	 	$c->save();
    $this->createDulplicate($c,$lang,$id);
	 	$status = ['status' => 1,'messages' => 'City saved successfully!','url' => route('admin.city.list')];
     }
	 return response()->json($status);
}



#--------------------------------------------------------------------------------------------
# store
#--------------------------------------------------------------------------------------------

public function createDulplicate($cms,$lang,$id)
{
   if($lang == "EN"){
       $c = City::where('has_parent',$cms->id)->where('lang','AR');
       if($c->count() == 0){
          $c = new City;
          $c->name = $cms->name;
          $c->has_parent = $cms->id;
          $c->slug = $cms->slug;
          $c->state_id = $cms->state_id;
          
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
    $category = City::whereIn('id',$ids);
    if($category->count() > 0){
    	foreach ($category->get() as $cate) {
    		$cate->status = 0;
        $cate->deleted = 0;
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
	 
    $category = City::where('id',$id);
    if($category->count() > 0){
    	    $cate = $category->first();
    		$cate->status = 0;
    		$cate->save();
      }

    $status = ['status' => 1,'messages' => 'Deleted saved successfully!'];
    return response()->json($status);
}


}
