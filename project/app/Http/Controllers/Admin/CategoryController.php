<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Category;
class CategoryController extends Controller
{
    
public $viewPath ='admin.modules.category.';

#--------------------------------------------------------------------------------------------------
# Category Index
#--------------------------------------------------------------------------------------------------

public function index()
{
  $categories = Category::where('status',1)->paginate(10);
  return view($this->viewPath.'list')->with('categories',$categories); 
}


#--------------------------------------------------------------------------------------------------
# Category ajax
#--------------------------------------------------------------------------------------------------

public function ajax()
{
  $categories = Category::where('status',1)->where('lang','EN')->paginate(10);
  $vv = view($this->viewPath.'ajax')->with('categories',$categories)->render();
  return response()->json(['data' => $vv]); 
}


#--------------------------------------------------------------------------------------------------
# Category ajax
#--------------------------------------------------------------------------------------------------

public function menuLink(Request $request,$lang,$id,$check)
{
   $c = Category::where('id',$id)->orWhere('has_parent',$id);

   foreach ($c->get() as $cate) {
    $cate->menu_active = $check;
    $cate->save();
   }
   return $this->ajax();
}



#--------------------------------------------------------------------------------------------------
# Category Index
#--------------------------------------------------------------------------------------------------

public function create($lang="EN",$id=0)
{
	if($id == 0){
         return view($this->viewPath.'create')
              ->with('url',route('admin.category.create'))->with('lang',$lang); 
    }
         $category = Category::find($id);
         return view($this->viewPath.'create')
              ->with('url',route('admin.category.edit',[$lang,$id]))->with('lang',$lang)
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
           'meta_title' => 'required',
           'meta_tags' => 'required',
           'meta_description' => 'required'
            
	 ]);
     if($v->fails()){
	 	$status = ['status' => 0,'errors' => $v->errors()];
	 }else{
	 	$c = $id > 0 ? Category::find($id) : new Category;

    $destinationPath = 'images/artists/';
    if($request->hasFile('image')){
      $c->image = uploadFileWithAjax($destinationPath,$request->file('image'),1);
    }

	 	$c->label = $request->label;
	 	$c->meta_title = $request->meta_title;
	 	$c->meta_tags = $request->meta_tags;
	 	$c->meta_description = $request->meta_description;
    $c->icon_class = $request->icon_class;
	 	$c->status = 1;
    $c->lang = $lang;
	 	$c->save();
   
    $this->createDulplicate($c,$lang,$id);
	 	$status = ['status' => 1,'messages' => 'Category saved successfully!','url' => route('admin.category.list')];
     }
	 return response()->json($status);
}



#--------------------------------------------------------------------------------------------
# store
#--------------------------------------------------------------------------------------------

public function createDulplicate($cms,$lang,$id)
{
   if($lang == "EN"){
       $c = Category::where('has_parent',$cms->id)->where('lang','AR');
       if($c->count() == 0){
          $c = new Category;
          $c->label = $cms->label;
          $c->has_parent = $cms->id;
          $c->slug = $cms->slug;
          $c->meta_title = $cms->meta_title;
          $c->icon_class = $cms->icon_class;
          $c->image = $cms->image;
          $c->meta_tags = $cms->meta_tags;
          $c->meta_description = $cms->meta_description;
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
    $category = Category::whereIn('id',$ids);
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
	 
    $category = Category::where('id',$id);
    if($category->count() > 0){
    	    $cate = $category->first();
    		$cate->status = 0;
    		$cate->save();
      }

    $status = ['status' => 1,'messages' => 'Deleted saved successfully!'];
    return response()->json($status);
}


}
