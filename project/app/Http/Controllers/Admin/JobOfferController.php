<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobOffer;
class JobOfferController extends Controller
{
 

public $path = 'admin.modules.jobs.';

#-----------------------------------------------------------------------------------------------------------------------
# Jobs
#-----------------------------------------------------------------------------------------------------------------------


public function index($value='')
{
  return view($this->path.'index');
}



#-----------------------------------------------------------------------------------------------------------------------
# Jobs
#-----------------------------------------------------------------------------------------------------------------------


public function create($lang="EN",$id=0)
{
   
  if($id == 0){
         return view($this->path.'create')
              ->with('lang',$lang)
              ->with('url',route('admin.jobs.create')); 
    }
         $category = JobOffer::find($id);
         return view($this->path.'create')
              ->with('url',route('admin.jobs.edit',[$lang,$id]))
              ->with('lang',$lang)
              ->with('category',$category); 
}



#--------------------------------------------------------------------------------------------
# store
#--------------------------------------------------------------------------------------------

public function store(Request $request,$lang="EN",$id=0)
{




	 
	 $v = \Validator::make($request->all(),[
           'title' => 'required',
           'job_type' => 'required',
           'job_timing' => 'required',
           'location' => 'required',
           'description' => 'required',
           'job_role' => 'required'
            
	 ]);
     if($v->fails()){
	 	$status = ['status' => 0,'errors' => $v->errors()];
	 }else{

        $other = [];

        if(!empty($request->other_title)){
        	foreach ($request->other_title as $key => $value) {
        		$descr = !empty($request->other_description) ? $request->other_description[$key] : '';
        		 $arr = ['title' => $value,'description' => $descr];
        		 array_push($other,$arr);
        	}
        }

	 	$c = $id > 0 ? JobOffer::find($id) : new JobOffer;
	 	$c->title = $request->title;
	 	$c->job_type = $request->job_type;
	 	$c->location = $request->location;
	 	$c->job_timing = $request->job_timing;
	 	$c->description = $request->description;
	 	$c->role = $request->job_role;
	  $c->other = json_encode($other);
    $c->lang = $lang;
	  $c->status=1;
	 	$c->save();
    $this->createDulplicate($c,$lang,$id);
        $status = ['status' => 1,'messages' => 'Job saved successfully!','url' => route('admin.jobs')];
     }
	 return response()->json($status);
}





#--------------------------------------------------------------------------------------------
# store
#--------------------------------------------------------------------------------------------

public function createDulplicate($cms,$lang,$id)
{
   if($lang == "EN"){
       $c = JobOffer::where('parent',$cms->id)->where('lang','AR');
       if($c->count() == 0){
            $c = new JobOffer;
            $c->title = $cms->title;
            $c->parent = $cms->id;
            $c->job_type = $cms->job_type;
            $c->location = $cms->location;
            $c->job_timing = $cms->job_timing;
            $c->description = $cms->description;
            $c->role = $cms->job_role;
            $c->other = $cms->other;
            $c->lang = "AR";
            $c->status=1;
            $c->save();
       }
   }
}



#--------------------------------------------------------------------------------------------------
# Category ajax
#--------------------------------------------------------------------------------------------------

public function ajax()
{
  $categories = JobOffer::where('status',1)->where('lang','EN')->paginate(10);
  $vv = view($this->path.'ajax')->with('categories',$categories)->render();
  return response()->json(['data' => $vv]); 
}



#--------------------------------------------------------------------------------------------
# Delete Multiple
#--------------------------------------------------------------------------------------------

public function filter(Request $request)
{
	$ids = $request->category_ids;
    $category = JobOffer::whereIn('id',$ids);
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
	 
    $category = JobOffer::where('id',$id);
    if($category->count() > 0){
    	    $cate = $category->first();
    		$cate->status = 0;
    		$cate->save();
      }

    $status = ['status' => 1,'messages' => 'Deleted saved successfully!'];
    return response()->json($status);
}







}
