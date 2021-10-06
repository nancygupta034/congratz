<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
class CategoryController extends Controller
{


#--------------------------------------------------------------------------------------------
# store
#--------------------------------------------------------------------------------------------

public function store(Request $request,$id=0)
{
	 
	 $v = \Validator::make($request->all(),[
           'label' => 'required|unique:categories',
           'meta_title' => 'required',
           'meta_tags' => 'required',
           'meta_description' => 'required'
            
	 ]);

	 if($v->fails()){
	 	$status = ['status' => 0,'errors' => $v->errors()];
	 }else{
	 	$c = $id > 0 ? Category::find($id) : new Category;
	 	$c->label = $request->label;
	 	$c->meta_title = $request->meta_title;
	 	$c->meta_tags = $request->meta_tags;
	 	$c->meta_description = $request->meta_description;
	 	$c->status = 1;
	 	$c->save();
	 	$status = ['status' => 1,'messages' => 'Category saved successfully!'];

	 }
	 return response()->json($status);
}

#--------------------------------------------------------------------------------------------
# store
#--------------------------------------------------------------------------------------------

public function listing(Request $request)
{
    $categories = Category::where('status',1)->paginate(10);


	return response()->json(['status' => 1,'category' => $categories]);
}




}
