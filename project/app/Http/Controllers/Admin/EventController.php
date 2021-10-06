<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Event;
class EventController extends Controller
{
    
public $viewPath ='admin.modules.events.';

#--------------------------------------------------------------------------------------------------
# Category Index
#--------------------------------------------------------------------------------------------------

public function index()
{
  $categories = Event::where('status',1)->paginate(10);
  return view($this->viewPath.'list')->with('categories',$categories); 
}


#--------------------------------------------------------------------------------------------------
# Category ajax
#--------------------------------------------------------------------------------------------------

public function ajax()
{
  $categories = Event::where('status',1)->where('user_id',0)->where('lang','EN')->paginate(10);
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
              ->with('url',route('admin.event.create'))->with('lang',$lang); 
    }
         $category = Event::find($id);
         return view($this->viewPath.'create')
              ->with('url',route('admin.event.edit',[$lang,$id]))->with('lang',$lang)
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
           
            
	 ]);
    if($v->fails()){
	 	$status = ['status' => 0,'errors' => $v->errors()];
	 }else{
	 	$c = $id > 0 ? Event::find($id) : new Event;

     $destinationPath = 'images/artists/';
    if($request->hasFile('image')){
      $c->image = uploadFileWithAjax($destinationPath,$request->file('image'),1);
    }

    $c->icon_class = $request->icon_class;
	 	$c->label = $request->label;
    $c->status = 1;
    $c->lang = $lang;
	 	$c->save();
    $this->createDulplicate($c,$lang,$id);
	 	$status = ['status' => 1,'messages' => 'Event saved successfully!','url' => route('admin.event.list')];
     }
	 return response()->json($status);
}



#--------------------------------------------------------------------------------------------
# store
#--------------------------------------------------------------------------------------------

public function createDulplicate($cms,$lang,$id)
{
   if($lang == "EN"){
       $c = Event::where('has_parent',$cms->id)->where('lang','AR');
       if($c->count() == 0){
          $c = new Event;
          $c->label = $cms->label;
          $c->has_parent = $cms->id;
          $c->slug = $cms->slug;
          $c->icon_class = $cms->icon_class;
          $c->image = $cms->image;
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
    $category = Event::whereIn('id',$ids);
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
	 
    $category = Event::where('id',$id);
    if($category->count() > 0){
    	    $cate = $category->first();
    		$cate->status = 0;
    		$cate->save();
      }

    $status = ['status' => 1,'messages' => 'Deleted saved successfully!'];
    return response()->json($status);
}


}
