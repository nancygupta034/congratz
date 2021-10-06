<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
class EmailTemplateController extends Controller
{
public $viewPath ='admin.modules.emails.';

#--------------------------------------------------------------------------------------------------
# Category Index
#--------------------------------------------------------------------------------------------------

public function index()
{
  $categories = EmailTemplate::where('status',1)->paginate(10);
  return view($this->viewPath.'list')->with('categories',$categories); 
}


#--------------------------------------------------------------------------------------------------
# Category ajax
#--------------------------------------------------------------------------------------------------

public function ajax()
{
  $categories = EmailTemplate::where('status',1)->where('lang','EN')->paginate(10);
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
              ->with('url',route('admin.emailTemplate.create'))->with('lang',$lang); 
    }
         $category = EmailTemplate::find($id);
         return view($this->viewPath.'create')
              ->with('url',route('admin.emailTemplate.edit',[$lang,$id]))->with('lang',$lang)
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
           'title' => 'required',
           'subject' => 'required',
           'content' => 'required', 
            
	 ]);
     if($v->fails()){
	 	$status = ['status' => 0,'errors' => $v->errors()];
	 }else{
	 	$c = $id > 0 ? EmailTemplate::find($id) : new EmailTemplate;

    
	 	$c->subject = $request->subject;
	 	$c->title = $request->title;
	 	 
	 	$c->content = $request->content;
   
	 	$c->status = 1;
        $c->lang = $lang;
	 	$c->save();
   
    $this->createDulplicate($c,$lang,$id);
	 	$status = ['status' => 1,'messages' => 'Email Template saved successfully!','url' => route('admin.emailTemplate.list')];
     }
	 return response()->json($status);
}



#--------------------------------------------------------------------------------------------
# store
#--------------------------------------------------------------------------------------------

public function createDulplicate($cms,$lang,$id)
{
   if($lang == "EN"){
       $c = EmailTemplate::where('has_parent',$cms->id)->where('lang','AR');
       if($c->count() == 0){
          $c = new EmailTemplate;
          $c->title = $cms->title;
          $c->has_parent = $cms->id;
          $c->slug = $cms->slug;
          $c->subject = $cms->subject;
          $c->content = $cms->content;
           
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
    $category = EmailTemplate::whereIn('id',$ids);
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
	 
    $category = EmailTemplate::where('id',$id);
    if($category->count() > 0){
    	    $cate = $category->first();
    		$cate->status = 0;
    		$cate->save();
      }

    $status = ['status' => 1,'messages' => 'Deleted saved successfully!'];
    return response()->json($status);
}

}
