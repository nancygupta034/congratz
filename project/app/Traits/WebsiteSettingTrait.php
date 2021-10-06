<?php
namespace App\Traits;
use Illuminate\Http\Request;

use App\Models\WebsiteSettings;
trait WebsiteSettingTrait {


private $data = [
     'homepage' => [
     	            'home_about_us',
                    'home_about_description',
                    'about_image',
                    'signup_image',
                    'signup_content',
                    'booking_image',
                    'booking_content',
                    'choose_celebrity_image',
                    'choose_celebrity_content',
                    'request_to_celebrity_image',
                    'request_to_celebrity_content',
                    'fulfill_request_image',
                    'fulfill_request_content',
                    'receive_videolink_image',
                    'receive_videolink_content',
                    'download_title',
                    'download_description',
                    'download_main_image',
                    'download_google_play',
                    'download_apple_store',
                    'download_google_play_link',
                    'download_apple_store_link',
                ],
     'global-settings' => [
                    'email',
                    'phone_number',
                    'pinterest',
                    'facebook',
                    'twitter',
                    'instagram',
                    'google_plus',
                    'logo',
                    'logo_footer',
                    'address',
                    'max_day_delivery_limit',
     ],
     'about-us-page' => [
                    'about_us_page' 
     ],
     'contact-us-page' => [
      'contact_us_title',
      'contact_us_tagline',
     ]
 ];



#------------------------------------------------------------------------------------------------------
#  getDatas
#------------------------------------------------------------------------------------------------------

public function getDatas($type,$lang="EN")
{
	$data = !empty($this->data[$type]) ? $this->data[$type] : [];
    return $this->createDataWithType($type,$data,$lang);
}


#------------------------------------------------------------------------------------------------------
#  getDatas
#------------------------------------------------------------------------------------------------------

public function createDataWithType($type,$data,$lang)
{
	$arr = [];
	foreach ($data as $key) {
	     $arr[$key] = $this->updateInsertData($type,$key,$lang);
	 } 
    return $arr;
}


#------------------------------------------------------------------------------------------------------
#  getDatas
#------------------------------------------------------------------------------------------------------

public function updateInsertData($type,$key,$lang,$value = null)
{
	$d = WebsiteSettings::where('type',$type)->where('lang',$lang)->where('key',$key);
     $w = $d->count() > 0 ? $d->first() : new WebsiteSettings;
     $w->key = $key;
     $w->type = $type;
     if($value != null){
         $w->key_value = $value;
     }
     $w->lang = $lang;
     $w->save();
     $this->createDulplicateWebsiteSettings($w,$lang);
     return $w->key_value;
}



#--------------------------------------------------------------------------------------------
# store
#--------------------------------------------------------------------------------------------

public function createDulplicateWebsiteSettings($cms,$lang)
{
   if($lang == "EN"){
       $c = WebsiteSettings::where('has_parent',$cms->id)->where('key',$cms->key)->where('type',$cms->type)->where('lang','AR');
       if($c->count() == 0){
            $w = new WebsiteSettings;
            $w->parent = 0;
            $w->has_parent = $cms->id;
            $w->key = $cms->key;
            $w->lang = "AR";
            $w->key_value = $cms->key_value; 
            $w->type = $cms->type;
            $w->save();
       }
   }
}


}