<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\CmsPage;
class CmsPageController extends Controller
{
public $viewPath ='admin.modules.cms.';  



#-----------------------------------------------------------------------------------------------------------------
# Listing Page
#-----------------------------------------------------------------------------------------------------------------

public function index()
{
  $categories = CmsPage::where('status',1)->paginate(10);
  return view($this->viewPath.'index')->with('categories',$categories); 
}



#--------------------------------------------------------------------------------------------------
# Category Index
#--------------------------------------------------------------------------------------------------

public function create($lang="EN",$id=0)
{
	  if($id == 0){
         return view($this->viewPath.'create')
              ->with('url',route('admin.cms.add')); 
    }
    $category = CmsPage::where('lang',$lang)->where('id',$id);
    if($category->count() == 0){
      abort(404);
    }
    return view($this->viewPath.'create')
         ->with('url',route('admin.cms.edit',[$lang,$id]))
         ->with('category',$category->first()); 
}
#--------------------------------------------------------------------------------------------------
# Category ajax
#--------------------------------------------------------------------------------------------------

public function ajax()
{
  $categories = CmsPage::where('status',1)->where('parent',0)->paginate(10);
  $vv = view($this->viewPath.'ajax')->with('categories',$categories)->render();
  return response()->json(['data' => $vv]); 
}


#--------------------------------------------------------------------------------------------
# store
#--------------------------------------------------------------------------------------------

public function store(Request $request,$lang="EN",$id=0)
{
	 
	 $v = \Validator::make($request->all(),[
           'title' => 'required',
           'meta_title' => 'required',
           'meta_tags' => 'required',
           'description' => 'required',
           'meta_description' => 'required'
            
	 ]);
     if($v->fails()){
	 	$status = ['status' => 0,'errors' => $v->errors()];
	 }else{
	 	$c = $id > 0 ? CmsPage::find($id) : new CmsPage;
    $c->title = $request->title;
    // $c->parent = $id ;
    $c->lang = $lang;
	 	$c->description = $request->description;
	 	$c->meta_title = $request->meta_title;
	 	$c->meta_tags = $request->meta_tags;
	 	$c->meta_description = $request->meta_description;
	 	$c->status = 1;
	 	$c->save();
    $this->createDulplicate($c,$lang,$id);
    $status = ['status' => 1,'messages' => 'CMS Page saved successfully!','url' => route('admin.cms')];
  }
	 return response()->json($status);
}




#--------------------------------------------------------------------------------------------
# store
#--------------------------------------------------------------------------------------------

public function createDulplicate($cms,$lang,$id)
{
   if($lang == "EN"){
       $c = CmsPage::where('parent',$cms->id)->where('lang','AR');
       if($c->count() == 0){
            $c = new CmsPage;
            $c->title = $cms->title;
            $c->slug = $cms->slug;
            $c->parent = $cms->id;
            $c->lang = 'AR';
            $c->description = $cms->description;
            $c->meta_title = $cms->meta_title;
            $c->meta_tags = $cms->meta_tags;
            $c->meta_description = $cms->meta_description;
            $c->status = 1;
            $c->save();
       }
   }
}


#--------------------------------------------------------------------------------------------
# store
#--------------------------------------------------------------------------------------------

public function delete(Request $request,$id)
{
	 
    $category = CmsPage::where('id',$id);
    if($category->count() > 0){
    	    $cate = $category->first();
    		$cate->status = 0;
    		$cate->save();
      }
    $status = ['status' => 1,'messages' => 'Deleted saved successfully!'];
    return response()->json($status);
}

#--------------------------------------------------------------------------------------------
# Delete Multiple
#--------------------------------------------------------------------------------------------

public function filter(Request $request)
{
	$ids = $request->category_ids;
    $category = CmsPage::whereIn('id',$ids);
    if($category->count() > 0){
    	foreach ($category->get() as $cate) {
    		$cate->status = 0;
    		$cate->save();
    	}
    }

    $status = ['status' => 1,'messages' => 'Deleted saved successfully!'];
    return response()->json($status);
}


}
