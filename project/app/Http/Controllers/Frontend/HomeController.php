<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobOffer;
use App\Models\FAQs;
use App\Models\JobApply;
use App\Models\Category;
use Session;
use App\User;
use Auth;
class HomeController extends Controller
{
   
#--------------------------------------------------------------------------------------------
#  Home page
#--------------------------------------------------------------------------------------------
     
    public function index()
    {
    	$pageTitle = '<h1>'._lang("Gifted").' <br>'._lang("Memories").'</h1>';
        return view('home.index')
        ->with('pageTitle',$pageTitle);
    }


   
#--------------------------------------------------------------------------------------------
#  About Us page
#--------------------------------------------------------------------------------------------
     
    public function aboutus()
    {
        $pageTitle = '<h1>'._lang("About").' <br>'._lang("Us").'</h1>';
        return view('home.aboutus')
             ->with('pageTitle',$pageTitle);
    }


   
#--------------------------------------------------------------------------------------------
#  About Us page
#--------------------------------------------------------------------------------------------
     
    public function jobs()
    {
        $pageTitle = '<h1>'._lang("Our").' <br>'._lang("Opening").'</h1>';
        $jobs = JobOffer::where('status',1)->where('lang','EN')->orderBy('created_at','DESC')->get();
       // $job = Session::get('locale') == "AR" && $jobs->arabic != null ? $jobs->arabic : $jobs;
        return view('home.job-opening')
             ->with('jobs',$jobs)
             ->with('pageTitle',$pageTitle);
    }




   
#--------------------------------------------------------------------------------------------
#  About Us page
#--------------------------------------------------------------------------------------------
     
    public function job_apply($id)
    {
        $jobs = JobOffer::find($id);
        $job = Session::get('locale') == "AR" && $jobs->arabic != null ? $jobs->arabic : $jobs;
        $pageTitle = '<h1>'._lang("Our").' <br>'._lang("Opening").'</h1>';
        return view('home.job-apply')
             ->with('jobs',$job)
             ->with('job',$jobs)
             ->with('back_link',route('home.job.detail',$id))
             ->with('customClass','no-header-footer')
             ->with('pageTitle',$pageTitle);
    }



   
#--------------------------------------------------------------------------------------------
#  About Us page
#--------------------------------------------------------------------------------------------
     
    public function post_job_apply(Request $request,$id)
    {
         

         $v = \Validator::make($request->all(),[
                'name' => 'required',
                'email' => 'required',
                'phone_number' => 'required',
                 
                'resume' => 'required',
                'cover_letter' => 'required',
                'race_ethnicity' => 'required',
                'gender' => 'required',
         ]);
         if($v->fails()){
            $status = ['status' => 0,'message' => $v->errors()];

         }else{
                  $destinationPath = 'images/settings/' ;
                  $resume = uploadFileWithAjax($destinationPath,$request->resume,1);
            $j = new JobApply;
            $j->name = $request->name;
            $j->job_id = $id;
            $j->email = $request->email;
            $j->phone_number = $request->phonecode.$request->phone_number;
            $j->resume = $resume;
            $j->cover_letter = $request->cover_letter;
            $j->race_ethnicity = $request->race_ethnicity;
            $j->gender = $request->gender;
            $j->exprience_summary = $request->exprience_summary;
            $j->company_details = json_encode($this->getWorksDetails($request));
            $j->education_details = json_encode($this->getEducationDetails($request));
            $j->terms_condition = !empty($request->terms_condition) ? 1 :0;
            $j->save();
            $status = ['status' => 1,'message' => 'Your job application has been sent successfully'];
         }
         return response()->json($status);
    }



public function getWorksDetails($request)
{
    $education = [];
    foreach ($request->company_name as $key => $value) {
      $company_name = !empty($request->company_name[$key]) ? $request->company_name[$key] : 'NA';
      $work_summary = !empty($request->work_summary[$key]) ? $request->work_summary[$key] : 'NA';
      

            $data = [
            'company_name' => $company_name,
            'work_summary' => $work_summary,
            
           ];

           $education[] = $data;
    }
    return $education;
}

   
#--------------------------------------------------------------------------------------------
#  About Us page
#--------------------------------------------------------------------------------------------
     
public function getEducationDetails($request)
{
    $education = [];
    foreach ($request->education_school as $key => $value) {
      $education_school = !empty($request->education_school[$key]) ? $request->education_school[$key] : 'NA';
      $education_degree = !empty($request->education_degree[$key]) ? $request->education_degree[$key] : 'NA';
      $education_study_field = !empty($request->education_study_field[$key]) ? $request->education_study_field[$key] : 'NA';
      $education_study_Grade = !empty($request->education_study_Grade[$key]) ? $request->education_study_Grade[$key] : 'NA';
      $education_study_start_year = !empty($request->education_study_start_year[$key]) ? $request->education_study_start_year[$key] : 'NA';
      $education_study_end_year = !empty($request->education_study_end_year[$key]) ? $request->education_study_end_year[$key] : 'NA';

            $data = [
            'education_school' => $education_school,
            'education_degree' => $education_degree,
            'education_study_field' => $education_study_field,
            'education_study_Grade' => $education_study_Grade,
            'education_study_start_year' => $education_study_start_year,
            'education_study_end_year' => $education_study_end_year
           ];

           $education[] = $data;
    }
    return $education;
}

   
#--------------------------------------------------------------------------------------------
#  About Us page
#--------------------------------------------------------------------------------------------
     
    public function job_detail($id)
    {

        $jobs = JobOffer::find($id);
        $job = Session::get('locale') == "AR" && $jobs->arabic != null ? $jobs->arabic : $jobs;
        $pageTitle = '<h1>'._lang("Our").' <br>'._lang("Opening").'</h1>';
        return view('home.job-detail')
             ->with('jobs',$job)
           
             ->with('pageTitle',$pageTitle);
    }



   
#--------------------------------------------------------------------------------------------
#  Category page
#--------------------------------------------------------------------------------------------
     
    public function celebrityList($slug)
    {
        $category = Category::where('status',1)->where('lang',Session::get('locale'))->where('slug',$slug);
        if($category->count() == 0){
            abort(404);
        }
        $pageTitle = '<h1>'.$category->first()->label.'</h1>';
        $users = User::where('category_id',$category->first()->id)->orderBy('name','DESC')->where('role','artist')->get();
        return view('home.modules.celebrity.listing')
             ->with('category',$category->first())
             ->with('users',$users)
             ->with('pageTitle',$pageTitle);
    }




   
#--------------------------------------------------------------------------------------------
#  Category page
#--------------------------------------------------------------------------------------------
     
    public function category()
    {
        $pageTitle = '<h1>'._lang("Categories").'</h1>';
        $category = Category::where('status',1)->where('lang',Session::get('locale'))->orderBy('label','ASC')->get();
        return view('home.modules.category.index')
             ->with('category',$category)
             ->with('pageTitle',$pageTitle);
    }





   
#--------------------------------------------------------------------------------------------
#  Category page
#--------------------------------------------------------------------------------------------
     
    public function celebrityDetails($id)
    {
        
        $user = User::where('role','artist')
        ->where('id',$id)
        
        ->first();
        return view('home.modules.celebrity.detail')
             ->with('user',$user) ;

        //return response()->json(['status' => 1,'list'=>$vv]);
    }





   
#--------------------------------------------------------------------------------------------
#  Category page
#--------------------------------------------------------------------------------------------
     
    public function celebrityDetail($id)
    {
        
        $user = User::where('role','artist')
        ->where('id',$id)
        
        ->first();
        $vv = view('home.includes.cele_info')
             ->with('user',$user)->render();

        return response()->json(['status' => 1,'list'=>$vv]);
    }



   
#--------------------------------------------------------------------------------------------
#  Category page
#--------------------------------------------------------------------------------------------
     
    public function getCelebrityProfileVideo($id,$event)
    {
        
       $booking = \App\Models\Booking::where('celebrity_id',$id)
       ->where('profile_video',1)
       ->where(function($t) use($event){
             
           if($event != 0){
               $t->where('event_id',$event);
           }
        })
       ->orderBy('created_at','DESC')->where('status',3);
      $vv = view('home.modules.celebrity.videos')->with('booking',$booking)->render();
  return response()->json(['list' => $vv]);
    }





   
#--------------------------------------------------------------------------------------------
#  Category page
#--------------------------------------------------------------------------------------------
     
    public function recentJoined($slug)
    {

    // return$Featured_cele = \App\User::
    //            join('user_categories','user_categories.user_id','=','users.id')
    //            ->join('categories','categories.id','=','user_categories.category_id')
    //            ->join('my_subscriptions',function($on){
    //                $on->on('my_subscriptions.user_id','=','users.id')
    //                ->on('my_subscriptions.category_id','user_categories.category_id')
    //                ->whereDate('my_subscriptions.end_date','>=',date('Y-m-d'));
    //            })
              
    //            ->where('users.role','artist')
    //            ->where('categories.status',1)
    //            ->whereDate('users.subscription_end_date','>=',date('Y-m-d'))->get();;                    
        $category = Category::where('status',1)
        ->where('slug',$slug)
        ->orderBy('label','ASC')
        ->first();
        $vv = view('home.includes.recent_joined')
             ->with('category',$category)->render();

        return response()->json(['status' => 1,'list'=>$vv]);
    }





   
#--------------------------------------------------------------------------------------------
#  Category page
#--------------------------------------------------------------------------------------------
     
    public function allCelebrity($slug,$type="all")
    {
        
         $delivery_within = date('Y-m-d');
         $date_new_celebrity = date('Y-m-d', strtotime('- 1 day',strtotime($delivery_within)));
         $category = Category::where('status',1)
        ->where('slug',$slug)
        ->orderBy('label','ASC')
        ->first();

         $user_IDs = !empty($category->userCategory) ? $category->userCategory->pluck('user_id')->toArray() : [];
         $celebritries = \App\User::whereIn('id',$user_IDs)->where(function($t) use($type){
                         $delivery_within = date('Y-m-d');
                         $date_new_celebrity = date('Y-m-d', strtotime('- 1 day',strtotime($delivery_within)));
                         if($type == "new"){
                            $t->whereDate('created_at','>=',$date_new_celebrity);
                         }
                         if($type == "featured"){
                           $t->whereDate('subscription_end_date','>=',$delivery_within);
                         } 
 
                         if($type == "online"){
                           $t->whereDate('current_login_datetime','>=',date('Y-m-d H:i'));
                         }
                     })
                     ->where('role','artist')
                     ->where('status',1)
                     ->orderBy('created_at','DESC');
        $vv = view('home.includes.celebrity_listing_item')
             ->with('type',$type)
             ->with('celebritries',$celebritries)
             ->with('category',$category)->render();

        return response()->json(['status' => 1,'list'=>$vv]);
    }



#--------------------------------------------------------------------------------------------
#  About Us page
#--------------------------------------------------------------------------------------------
     
    public function faqs(Request $request,$id=null)
    {

           
        $category = FAQs::where('status',1)->where('parent',0);
        $title =  $category->count() > 0 ? $category->first()->title : 'FAQs';
        if($category->count() > 0 && Session::get('locale') == "AR" && $category->first()->arabic != null){
         $title = $category->first()->arabic->title;
        }
        $categoryList = FAQs::where('status',1)->where('parent',0)->get();
        if($id == null){
           $category_id = $category->count() > 0 ? $category->first()->id : $id;

           $pageTitle = '<h1>'._lang('FAQs').'</h1>';
        }else{
           $cate = FAQs::where('status',1)->where('parent',0)->where('id',$id);
           $category_id = $id;
            if($cate->count() > 0 && $cate->first()->arabic != null){
                  $title =  Session::get('locale') == "AR" ? $cate->first()->arabic->title : $cate->first()->title;
             }
        }
        $pageTitle ='<h1>'._lang('FAQs').'</h1>';
        $FAQs = FAQs::where('status',1)->where('lang',Session::get('locale'))->where('parent',$category_id)->get();
        return view('home.faqs')
             ->with('category',$categoryList)
             ->with('FAQs',$FAQs)
             ->with('category_id',$category_id)
            ->with('cate_title',$title)
             ->with('pageTitle',$pageTitle);
    }





   
#--------------------------------------------------------------------------------------------
#  About Us page
#--------------------------------------------------------------------------------------------
     
    public function contactUs()
    {
        $pageTitle = '<h1>'._lang("Contact Us").'</h1>';
        return view('home.contact_us')
              ->with('customClass','contact-us')
             ->with('pageTitle',$pageTitle);
    }





   
#--------------------------------------------------------------------------------------------
#  About Us page
#--------------------------------------------------------------------------------------------
     
    public function booking($slug)
    {
        $u = User::where('role','artist')
                     ->where('slug',$slug);

        if($u->count() == 0){
            abort(404);
        }
        return view('home.modules.booking.booking')
             ->with('bookingUrl',1)
             ->with('user',$u->first());
    }





   
#--------------------------------------------------------------------------------------------
#  About Us page
#--------------------------------------------------------------------------------------------
     
    public function getOcassions()
    {
        $users = \Auth::check() ? [0,\Auth::user()->id] : [0];
        $categories = \App\Models\Event::where('status',1)
        ->whereIn('user_id',$users)
        ->where('lang','EN')
        ->orderBy('label','ASC')->get();  
        $text = '';
        foreach($categories as $key => $c){
            $cate = (Session::has('locale') && Session::get('locale') == 'AR') && $c->arabic != null ? $c->arabic : $c; 
            $checked = $key == 0 ? 'checked' : '';
            $text .='<li> ';
            $text .='<label for="Occassion-'.$c->id.'">';
            $text .='<input type="radio" name="ocassion" id="Occassion-'.$c->id.'" value="'.$c->id.'" '.$checked.'>';
            $text .='<span class="cate_icon">'.$c->getIcon().'</span> <h5>'.$cate->label.'</h5>';
            $text .='</label>';
            $text .='</li>';
       }
      return response()->json(['list' => $text]);
                      
    }





   
#--------------------------------------------------------------------------------------------
#  About Us page
#--------------------------------------------------------------------------------------------
     
    public function bookingAcount($slug)
    {
        $u = User::where('role','artist')
                     ->where('slug',$slug);

        if($u->count() == 0){
            abort(404);
        }
                     
        
        return view('home.modules.booking.account')
             ->with('bookingUrl',1)
             ->with('user',$u->first());
    }


 
#--------------------------------------------------------------------------------------------
#  About Us page
#--------------------------------------------------------------------------------------------
     
    public function sellerDetail()
    {
        $pageTitle = '<h1>'._lang("Seller Detail").'</h1>';
        return view('home.seller_detail')
             ->with('pageTitle',$pageTitle);
    }





   
#--------------------------------------------------------------------------------------------
#  About Us page
#--------------------------------------------------------------------------------------------
     
    public function sellerListing()
    {
        $pageTitle = '<h1>'._lang("Contact Us").'</h1>';
        return view('home.seller_listing')
             ->with('pageTitle',$pageTitle);
    }






   
#--------------------------------------------------------------------------------------------
#  About Us page
#--------------------------------------------------------------------------------------------
     
    public function cms()
    {
        $slug = \Request::segment(1);
        $CmsPage = \App\Models\CmsPage::where('status',1)->where('slug',$slug)->first();

         $CmsPage = Session::get('locale') == "AR" && $CmsPage->arabic != null ? $CmsPage->arabic : $CmsPage;

        $pageTitle = '<h1>'.$CmsPage->title.'</h1>';
        return view('home.modules.cms.index')
             ->with('data',$CmsPage)
             ->with('pageTitle',$pageTitle);
    }





   
#--------------------------------------------------------------------------------------------
#  About Us page
#--------------------------------------------------------------------------------------------
     
    public function login()
    {
        return view('admin.login')->with('login',1);
    }



   
#--------------------------------------------------------------------------------------------
#  Online User
#--------------------------------------------------------------------------------------------
     
    public function keepOnlined()
    {

            date_default_timezone_set('Asia/Kolkata');
            $current_login_datetime=0;
            $minutes_to_add = 2;

            $time = new \DateTime();
            $time->add(new \DateInterval('PT' . $minutes_to_add . 'M'));

            $stamp = $time->format('Y-m-d H:i');
            if(Auth::check() && Auth::user()->role == "artist"){
                $u = Auth::user();
                $u->current_login_datetime = $stamp;
                $u->save();
            }
            return 1;
    }



   
#--------------------------------------------------------------------------------------------
#  Online User
#--------------------------------------------------------------------------------------------
     
    public function searchItem(Request $request)
    {
        $result = User::where('name','LIKE','%'.$request->term.'%')->where('role','artist')->orderBy('name','ASC')->take(20)->get();
        $users = $result->map(function($t){
            return [
              'id' => $t->id,
              'label' => $t->name,
              'value' => $t->name
            ];
        });

       return response()->json($users);
            
    }



   
#--------------------------------------------------------------------------------------------
#  Online User
#--------------------------------------------------------------------------------------------
     
    public function search(Request $request)
    {
         $result = User::where('name','LIKE','%'.$request->search.'%')->where('role','artist')->orderBy('name','ASC')->paginate(20);
        
         return view('home.modules.search.search')->with('result',$result);
            
    }




}
