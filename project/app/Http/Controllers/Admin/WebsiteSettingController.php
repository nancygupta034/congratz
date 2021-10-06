<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WebsiteSettings;
use App\Traits\WebsiteSettingTrait;
class WebsiteSettingController extends Controller
{
use WebsiteSettingTrait;
 public $viewPath ='admin.modules.settings.';

 public $restricted =[
     '_token','about_image','type',
     'signup_image',
     'booking_image',
     'choose_celebrity_image',
     'request_to_celebrity_image',
     'fulfill_request_image',
     'receive_videolink_image',
     'download_main_image',
     'download_google_play',
     'download_apple_store',
 ];


 public $types = [
   'about-us-page','contact-us-page','global-settings','homepage'
 ];

#-----------------------------------------------------------------------------------------------------
# Settings Listing
#-----------------------------------------------------------------------------------------------------

 public function index()
 {
 	 $WebsiteSettings = WebsiteSettings::whereIn('type',$this->types)->groupBy('type')->get();
 	 return view($this->viewPath.'index')->with('data',$WebsiteSettings);
 }

#-----------------------------------------------------------------------------------------------------
# Settings Add Function
#-----------------------------------------------------------------------------------------------------

 public function add($type,$lang="EN")
 {
 	//return $this->getDatas($type);
   return view($this->viewPath.$type)->with('data',$this->getDatas($type,$lang))->with('lang',$lang); 
 }

#-----------------------------------------------------------------------------------------------------
# Settings Add Function
#-----------------------------------------------------------------------------------------------------

 public function store(Request $request,$lang="EN")
 {
 
 
  foreach ($request->all() as $key => $value) {
  	   if(!in_array($key, $this->restricted)){
  	   	   $this->updateInsertData($request->type,$key,$lang,$value);
  	   }
  }
  $this->updateFiles($request,$lang);
  return redirect()->route('admin.website.settings.lang.add',[$request->type,$lang])->with('messages','Settings saved successfully!');

 }



#-------------------------------------------------------------------------------------------------------
#  File uplaoding
#-------------------------------------------------------------------------------------------------------

public function updateFiles($request,$lang="EN")
{
	$type = $request->type;



    // about_image

	if(!empty($request->about_image)){
		if($request->hasFile('about_image')){
			$data = json_decode($this->updateInsertData($request->type,'about_image',$lang));

			$arr = !empty($data) && count($data) > 0 ? $data : [];
			foreach ($request->file('about_image') as $key => $value) {
				  $destinationPath = 'images/settings/' ;
                  $fileName = uploadFileWithAjax($destinationPath,$value,1);
                  array_push($arr, $fileName);
			}
             $this->updateInsertData($request->type,'about_image',$lang,json_encode($arr));
		}
	}


 

$ar = ['_token','type'];
	$files = $this->restricted;

    foreach($files as $k){   

			if(!empty($request->$k)){
				if($request->hasFile($k)){
					   $destinationPath = 'images/settings/' ;
		               $fileName = uploadFileWithAjax($destinationPath,$request->file($k),1);
		               $this->updateInsertData($request->type,$k,$lang,$fileName);
				}
			 
     }
   }








if($request->hasFile('logo_footer')){
             $destinationPath = 'images/settings/' ;
                   $fileName = uploadFileWithAjax($destinationPath,$request->file('logo_footer'),1);
                   $this->updateInsertData($request->type,'logo_footer',$lang,$fileName);
}






if($request->hasFile('logo')){
             $destinationPath = 'images/settings/' ;
                   $fileName = uploadFileWithAjax($destinationPath,$request->file('logo'),1);
                   $this->updateInsertData($request->type,'logo',$lang,$fileName);
}











}


#--------------------------------------------------------------------------------------------------
# Testimonials ajax
#--------------------------------------------------------------------------------------------------

public function testimonialAjax()
{
  $categories = WebsiteSettings::where('type','testimonials')->where('lang','EN')->paginate(20);
  $vv = view('admin.modules.testimonials.ajax')->with('categories',$categories)->render();
  return response()->json(['data' => $vv]); 
}



#--------------------------------------------------------------------------------------------------
# Testimonials ajax
#--------------------------------------------------------------------------------------------------

public function languageAjax()
{
  $categories = WebsiteSettings::where('type','languages')->paginate(20);
   
  $vv = view($this->viewPath.'language_ajax')->with('categories',$categories)->render();
  return response()->json(['data' => $vv]); 
}


#-----------------------------------------------------------------------------------------------------
# Testimonials Listing
#-----------------------------------------------------------------------------------------------------

 public function testimonials()
 {
   return view('admin.modules.testimonials.index');
 }

#-----------------------------------------------------------------------------------------------------
# Testimonials Listing
#-----------------------------------------------------------------------------------------------------

 public function languages()
 {
  //$categories = WebsiteSettings::where('type','languages')->get();
   return view($this->viewPath.'languages');
 }

#-----------------------------------------------------------------------------------------------------
# Testimonials Listing
#-----------------------------------------------------------------------------------------------------

 public function languageCreate($id=0)
 {
   $categories = WebsiteSettings::where('type','languages')->where('id',$id);
   return view($this->viewPath.'language_create')->with('cate',$categories);
 }


#-----------------------------------------------------------------------------------------------------
# Testimonials Listing
#-----------------------------------------------------------------------------------------------------

 public function testimonialCreate($lang="EN",$id=0)
 {
    $arr = [
            'name' => null,
            'picture' => null,
            'rating' => null,
            'testimonial' => null,
    ];
   $url = route('admin.website.testimonials.create');
   if($id > 0){
       $data = WebsiteSettings::where('id',$id)->where('lang',$lang)->where('type','testimonials');
       if($data->count() > 0){
          $d = json_decode($data->first()->key_value);
          $arr = [
              'name' => $d->name,
              'picture' => $d->picture,
              'rating' => $d->rating,
              'testimonial' => $d->testimonial,
          ];
       }
       $url = route('admin.website.testimonials.edit',[$lang,$id]);
   }
   return view('admin.modules.testimonials.create')->with('record',(object)$arr)->with('url',$url)->with('lang',$lang);
 }

#-----------------------------------------------------------------------------------------------------
# Testimonials Store
#-----------------------------------------------------------------------------------------------------

 public function testimonialStore(Request $request,$lang="EN",$id=0)
 {


   $v = \Validator::make($request->all(),[
            
           'name' => 'required',
          // 'picture' => 'image',
           'rating' => 'required',
           'testimonial' => 'required'
            
   ]);
   $url = route('admin.website.testimonials');
   if($v->fails()){
    $status = ['status' => 6,'messages' => 'Fill the fields!','errors' => $v->errors()];
   }else{
    
    $destinationPath = 'images/settings/' ;
    $data = WebsiteSettings::where('id',$id)->where('type','testimonials');
    if($data->count() > 0){
          $d = json_decode($data->first()->key_value);
          $fileName = $request->hasFile('picture') ? uploadFileWithAjax($destinationPath,$request->file('picture'),1) : $d->picture;
          $arr = [
              'name' => $request->name,
              'picture' => $fileName,
              'rating' => $request->rating,
              'testimonial' => $request->testimonial,
          ];
     }else{
          $fileName = $request->hasFile('picture') ? uploadFileWithAjax($destinationPath,$request->file('picture'),1) : '';
          $arr = [
              'name' => $request->name,
              'picture' => $fileName,
              'rating' => $request->rating,
              'testimonial' => $request->testimonial,
          ];
     }
     
     $w =($data->count() > 0) ? WebsiteSettings::find($id) : new WebsiteSettings;
     $w->parent = 0;
     $w->key = 'testimonial';
     $w->lang = $lang;
     $w->key_value = json_encode($arr); 
     $w->type = 'testimonials';
     $w->save();
     $this->createDulplicate($w,$lang,$id);
     $status = ['status' => 1,'messages' => 'Testimonial saved successfully!','url' => $url];
   }
   return response()->json($status);
}


#--------------------------------------------------------------------------------------------
# store
#--------------------------------------------------------------------------------------------

public function createDulplicate($cms,$lang,$id)
{
   if($lang == "EN"){
       $c = WebsiteSettings::where('has_parent',$cms->id)->where('lang','AR');
       if($c->count() == 0){
            $w = new WebsiteSettings;
            $w->parent = 0;
            $w->has_parent = $cms->id;
            $w->key = 'testimonial';
            $w->lang = "AR";
            $w->key_value = $cms->key_value; 
            $w->type = 'testimonials';
            $w->save();
       }
   }
}

public function languageStore(Request $request,$id=0)
{
     $l = WebsiteSettings::where('key',$request->key)->where('type','languages');
     $w = $l->count() > 0 ? $l->first() : new WebsiteSettings;
     $w->parent = 0;
     $w->key = trim($request->key);
     $w->key_value = trim($request->key_value); 
     $w->type = 'languages';
     $w->save();
     $status = ['status' => 1,'messages' => 'Word saved successfully!','url' => route('admin.website.languages')];
     return response()->json($status);
}

#--------------------------------------------------------------------------------------------
# store
#--------------------------------------------------------------------------------------------

public function testimonialditDelete(Request $request,$id)
{
   
    WebsiteSettings::where('id',$id)->orWhere('has_parent',$id)->delete();
    $status = ['status' => 1,'messages' => 'Deleted saved successfully!'];
    return response()->json($status);
}


#--------------------------------------------------------------------------------------------
# Delete Multiple
#--------------------------------------------------------------------------------------------

public function filter(Request $request)
{
    $ids = $request->category_ids;
    $category = WebsiteSettings::whereIn('id',$ids)->delete();
     
    $status = ['status' => 1,'messages' => 'Deleted saved successfully!'];
    return response()->json($status);
}







}
