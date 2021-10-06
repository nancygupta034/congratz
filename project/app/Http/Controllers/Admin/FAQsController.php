<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FAQs;
class FAQsController extends Controller
{
     
public $viewPath ='admin.modules.faqs.';

#--------------------------------------------------------------------------------------------------
# Category Index
#--------------------------------------------------------------------------------------------------

public function index()
{
  $categories = FAQs::where('status',1)->where('parent','!=',0)->paginate(10);
  return view($this->viewPath.'list')->with('categories',$categories); 
}


#--------------------------------------------------------------------------------------------------
# Category ajax
#--------------------------------------------------------------------------------------------------

public function ajax()
{
  $categories = FAQs::where('status',1)->where('parent','!=',0)->where('has_parent',null)->paginate(10);
  $vv = view($this->viewPath.'ajax')->with('categories',$categories)->render();
  return response()->json(['data' => $vv]); 
}



#--------------------------------------------------------------------------------------------------
# Category Index
#--------------------------------------------------------------------------------------------------

public function category($lang="EN",$id=0)
{
	$cate = FAQs::where('parent',0)->where('lang','EN')->orderBy('title','ASC')->get();
	if($id == 0){
         return view($this->viewPath.'category')
              ->with('url',route('admin.FAQs.edit.category',[$lang,$id]))->with('cates',$cate); 
    }

     $category = FAQs::where('lang',$lang)->where('id',$id);
     if($category->count() == 0){
      abort(404);
     }
        $cat = FAQs::find($id);
         return view($this->viewPath.'category')
              ->with('url',route('admin.FAQs.edit',[$lang,$id]))
              ->with('category',$cat)
              ->with('lang',$lang)
              ->with('cates',$cate); 
}



#--------------------------------------------------------------------------------------------------
# Category Index
#--------------------------------------------------------------------------------------------------

public function create($lang="EN",$id=0)
{
  $cate = FAQs::where('parent',0)->orderBy('title','ASC')->get();
  if($id == 0){
         return view($this->viewPath.'create')
              ->with('url',route('admin.FAQs.create'))->with('lang',$lang)->with('cates',$cate); 
    }

     $category = FAQs::where('lang',$lang)->where('id',$id);
     if($category->count() == 0){
      abort(404);
     }
        $cat = FAQs::find($id);
         return view($this->viewPath.'create')
              ->with('url',route('admin.FAQs.edit',[$lang,$id]))
              ->with('category',$cat)
              ->with('lang',$lang)
              ->with('cates',$cate); 
}

#--------------------------------------------------------------------------------------------
# store
#--------------------------------------------------------------------------------------------

public function store(Request $request,$lang="EN",$id=0)
{
	 
  $v = \Validator::make($request->all(),[
          'title' => 'required'
     ]);
     if($v->fails()){
	 	$status = ['status' => 0,'errors' => $v->errors()];
	 }else{
	 	   $c = $id > 0 ? FAQs::find($id) : new FAQs;
	 	   if(!empty($request->type) && $request->type == "faqs"){
	 	   $c->answer = $request->answer;
	 	   $c->parent = $request->parent;
	 	   }
	   	$c->title = $request->title;
      $c->lang = $lang;
      
	    $c->save();
      $this->createDulplicate($c,$lang,$id);
        $status = ['status' => 1,'messages' => 'Category saved successfully!','url' => $request->redirect_link];
     }
	 return response()->json($status);
}



#--------------------------------------------------------------------------------------------
# store
#--------------------------------------------------------------------------------------------

public function createDulplicate($cms,$lang,$id)
{
   if($lang == "EN"){
       $c = FAQs::where('has_parent',$cms->id)->where('lang','AR');
       if($c->count() == 0){
              $c = new FAQs;
              $c->answer = $cms->answer;
              $c->parent = $cms->parent;
              $c->title = $cms->title;
              $c->has_parent = $cms->id;
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
    $category = FAQs::whereIn('id',$ids);
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
	 
    $category = FAQs::where('id',$id);
    if($category->count() > 0){
    	    $cate = $category->first();
    		$cate->status = 0;
    		$cate->save();
      }

    $status = ['status' => 1,'messages' => 'Deleted saved successfully!'];
    return response()->json($status);
}


}
