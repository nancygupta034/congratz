@extends('home.layouts.layout')
@section('content')




     
     <!-- Featured Celebs Code-->
     <section class="featured-celebs-sec">
       <div class="container">         
          <div class="sec-heading text-center" data-aos="fade-left" data-aos-duration="1000">
                 <h2>{{langText('Featured Celebs')}}</h2>
                 <span class="sec-heading-icon" data-aos="zoom-in" data-aos-duration="2000"><i class="icon-review"></i></span>
               </div>
         <div class="featured-celebs-slider slick" id="featureSlider1">
         	     <?php 
               $Featured_cele = \App\User::
               join('user_categories','user_categories.user_id','=','users.id')
               ->join('categories','categories.id','=','user_categories.category_id')
               ->join('my_subscriptions',function($on){
                   $on->on('my_subscriptions.user_id','=','users.id')
                   ->on('my_subscriptions.category_id','user_categories.category_id')
                   ->whereDate('my_subscriptions.end_date','>=',date('Y-m-d'));
               })
                ->select('categories.label as cateName','categories.id as cateID','users.*')
               ->where('users.role','artist')
               ->where('categories.status',1)
               ->whereDate('users.subscription_end_date','>=',date('Y-m-d'))
               ->groupBy('categories.id')
               ->get();
                ?>
               @foreach($Featured_cele as $usr)
<?php 
               $cate_column = (Session::has('locale') && Session::get('locale') == 'AR') && $category->arabic != null ? 'parent' : 'id'; 
               $category =  \App\Models\Category::where($cate_column,$usr->cateID);
                  
                ?>

		           <div class="slick-item">
		             <div class="celeb-feature-card text-center">
		                <figure class="celeb-img">
		                	<img src="<?= url($usr->profile_picture)?>">
		                 </figure>
		                <div class="celeb-info">
		                	    <a href="javascript:void(0);">
		                		     <h3>{{_lang($usr->name)}}</h3>
		                	    </a>
		                        <h5>{{_lang('Category')}} - {{ $category->count() > 0 ? $category->first()->label : $usr->cateName }}</h5>
		                        <span class="cele-price">${{$usr->charge}}</span>
		                        <a href="{{route('celebrity.detail',$usr->id)}}" class="main-btn white-btn mt-3">{{_lang('Book Now')}}</a>
		                </div>
		             </div>
		           </div>
                @endforeach
         </div>
       </div>
     </section>
     <!-- Featured Celebs Code End-->


 <!-- Testing section -->
<section class="philosophie about-us-sec">
  <div class="container">
  <div class="wrapper">
    <div class="indicators">
      <div class="indicator"></div>
      <div class="indicator"></div>
      <div class="indicator"></div>
      <div class="indicator"></div>
      <div class="indicator"></div>
    </div>
    <div class="point">
      <article>
        <div class="about-us-content">               
               <div class="sec-heading text-center" data-aos="fade-left" data-aos-duration="1000">
                 <h2>{{WebsiteSettings('homepage','home_about_us')}}</h2>
                 <span class="sec-heading-icon" data-aos="zoom-in" data-aos-duration="2000"><i class="icon-review"></i></span>
               </div>
               <div class="about-text" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom"> 
                  {!!WebsiteSettings('homepage','home_about_description')!!}
               </div>
               <div class="btn-wrap mt-4">
                 <a href="{{route('about.us')}}" class="main-btn blue-btn">{{langText('Read More')}}</a>
               </div>
             </div>
      </article>

    <?php $about_image = json_decode(WebsiteSettings('homepage','about_image')); $images=''; ?>
     @if(!empty($about_image) && is_array($about_image))
         @foreach($about_image as  $key => $image)
             @if($key == 0)
                 <img src="{{url($image)}}" alt="random"/>
             @else
                 <?php
                  $images .='<div class="point">';
                  $images .='<article></article>';
                  $images .='<img src="'.url($image).'" alt="random" />';
                  $images .='</div>';
                 ?>
            @endif
          @endforeach
     @endif

    </div>
  

     {!!$images!!}


  </div>
</div>
</section>
     <!-- About us code End-->








<!-- Recently Joined code -->
     <section class="recently-joined-sec">
       <div class="container">        
          <div class="sec-heading text-center" data-aos="fade-left" data-aos-duration="1000">
             <h2>{{langText('Recently Joined')}}</h2>
               <span class="sec-heading-icon" data-aos="zoom-in" data-aos-duration="2000"><i class="icon-review"></i></span>
            </div>

         <div class="tab-content" id="nav-tabContent">


             
         
 
         </div>

          <nav class="Joined-tabs-wrap mt-5">
            <ul class="nav nav-tabs tab-btn-slider" id="recentJoined" role="tablist">               
              <?php 
               $categories = \App\Models\Category::where('status',1)->where('lang','EN')->orderBy('label','ASC')->get(); $list=''; ?>
               @foreach($categories as $key => $c) 
                      <?php $cate = (Session::has('locale') && Session::get('locale') == 'AR') && $c->arabic != null ? $c->arabic : $c; 
                       $active = $key == 0 ? 'show active' : '';
                       $activeList = $key == 0 ? 'active' : '';
                       ?>
                      <li class="{{$activeList}}">
                        <a href="javascript:void(0);" class="main-btn get-celebrity-category {{$activeList}}" data-action="{{route('home.recentJoined.celebrity',$c->slug)}}">
                       <span class="btn-icon">{!!$c->getIcon()!!}</span>{{$cate->label}}</a>
                     </li> 

                      
              @endforeach
            </ul>
         </nav>
         
       </div>
     </section>
<!-- How It Works code -->
     <section class="how-it-works-sec">
    <div class="container work-process  pb-5 pt-5">
        <div class="sec-heading text-center" data-aos="fade-left" data-aos-duration="1000">
                 <h2>{{langText('How It Works')}}</h2>
                     <span class="sec-heading-icon" data-aos="zoom-in" data-aos-duration="2000"><i class="icon-review"></i></span>
                 </div>

               <div class="timeline-row">
        <!-- ============ step 1 =========== -->
        <div class="row">
            <div class="col-md-5 timeline-left-col">
                <div class="process-box process-left" data-aos="fade-right" data-aos-duration="1000">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="process-step">
                                 <i class="icon-signup"></i>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h5>{{langText('Signup')}}</h5>
                            <p><small>{!!WebsiteSettings('homepage','signup_content')!!}</small></p>
                        </div>
                    </div>
                    <div class="process-line-l"></div>
                </div>
            </div>
            <div class="col-md-2 timeline-mid-col"></div>
            <div class="col-md-5 timeline-right-col">
                <div class="process-point-right"></div>
            </div>
        </div>
        <!-- ============ step 2 =========== -->
        <div class="row">
            
            <div class="col-md-5 timeline-left-col">
                <div class="process-point-left"></div>
            </div>
            <div class="col-md-2 timeline-mid-col"></div>
            <div class="col-md-5 timeline-right-col">
                <div class="process-box process-right" data-aos="fade-left" data-aos-duration="1000">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="process-step">
                                <i class="icon-choose-celeb"></i>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h5>{{langText('Choose Your Celebrity')}}</h5>
                            <p><small>{!!WebsiteSettings('homepage','choose_celebrity_content')!!}</small></p>
                        </div>
                    </div>
                    <div class="process-line-r"></div>
                </div>
            </div>

        </div>
        <!-- ============ step 3 =========== -->
        <div class="row">
            <div class="col-md-5 timeline-left-col">
                <div class="process-box process-left" data-aos="fade-right" data-aos-duration="1000">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="process-step">
                                <i class="icon-booking-white"></i>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h5>{{langText('Complete Your Booking')}}</h5>
                            <p><small>{!!WebsiteSettings('homepage','request_to_celebrity_content')!!}</small></p>
                        </div>
                    </div>
                    <div class="process-line-l"></div>
                </div>
            </div>
            <div class="col-md-2 timeline-mid-col"></div>
            <div class="col-md-5 timeline-right-col">
                <div class="process-point-right"></div>
            </div>
        </div>
        <!-- ============ step 4 =========== -->
        <div class="row">
            <div class="col-md-5 timeline-left-col">
                <div class="process-point-left"></div>
            </div>
            <div class="col-md-2 timeline-mid-col"></div>
            <div class="col-md-5 timeline-right-col">
                <div class="process-box process-right" data-aos="fade-left" data-aos-duration="1000">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="process-step">
                                <i class="icon-celeb-received-request"></i>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h5>{{langText('Your Request is Sent')}}</h5>
                            <p><small>{!!WebsiteSettings('homepage','signup_content')!!}</small></p>
                        </div>
                    </div>
                    <div class="process-line-r"></div>
                </div>
            </div>
            
            
        </div>
        <!-- ============ step 5 =========== -->
        <div class="row">
            <div class="col-md-5 timeline-left-col">
                <div class="process-box process-left" data-aos="fade-right" data-aos-duration="1000">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="process-step">
                                <i class="icon-celeb-fulfil-request"></i>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h5>{{langText('CongratZ... Your Request is Completed')}}</h5>
                            <p><small>{!!WebsiteSettings('homepage','fulfill_request_content')!!}</small></p>
                        </div>
                    </div>
                    <div class="process-line-l"></div>
                </div>
            </div>
            <div class="col-md-2 timeline-mid-col"></div>
            <div class="col-md-5 timeline-right-col">
                <div class="process-point-right"></div>
            </div>
        </div>
        <!-- ============ -->
          <!-- ============ step 6 =========== -->
        <div class="row">
            <div class="col-md-5 timeline-left-col">
                <div class="process-point-left process-last"></div>
            </div>
            <div class="col-md-2 timeline-mid-col"></div>
            <div class="col-md-5 timeline-right-col">
                <div class="process-box process-right" data-aos="fade-left" data-aos-duration="1000">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="process-step">
                                <i class="icon-gift-box"></i>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h5>{{langText('Customer Receive Video link over Email')}}</h5>
                            <p><small>{!!WebsiteSettings('homepage','receive_videolink_content')!!}</small></p>
                        </div>
                    </div>
                    <div class="process-line-r"></div>
                </div>
            </div>
            
            
        </div>
      </div>
    </div>
</section>
<!-- Faq section code -->
<?php
 $category = \App\Models\FAQs::where('status',1)->where('parent',0);
?>
@if($category->count() > 0)
<section class="faq-sec">
  <div class="container">
       <div class="sec-heading text-center" data-aos="fade-left" data-aos-duration="1000">
          <h2>{{_lang("FAQ's")}}</h2> <span class="sec-heading-icon" data-aos="zoom-in" data-aos-duration="2000"><i class="icon-review"></i></span>
        </div>
        <div class="faqs-wrap mb-5">
             <div id="accordion" class="myaccordion">
<?php
$category_id = $category->count() > 0 ? $category->first()->id : null;
 $FAQs = \App\Models\FAQs::where('status',1)->where('lang',Session::get('locale'))->where('parent',$category_id)->take(5)->get();

?>
    @foreach($FAQs as $k => $f)
  <div class="card" data-aos="fade-left">
    <div class="card-header" id="headingOne-{{$f->id}}">
      <h2 class="mb-0">
        <button 
        class="d-flex align-items-center justify-content-between btn btn-link" 
        data-toggle="collapse" 
        data-target="#collapseOne-{{$f->id}}" 
        aria-expanded="true" 
        aria-controls="collapseOne-{{$f->id}}">{{$f->title}}
          <span class="fa-stack fa-sm">
            <i class="fas fa-circle fa-stack-2x"></i>
            <i class="fas fa-{{$k == 0 ? 'minus' : 'plus'}} fa-stack-1x fa-inverse"></i>
          </span>
        </button>
      </h2>
    </div>
    <div id="collapseOne-{{$f->id}}" class="collapse {{$k == 0 ? 'show' : ''}}" aria-labelledby="headingOne-{{$f->id}}" data-parent="#accordion">
      <div class="card-body">
        <div class="faq-des">
          <p>{{$f->answer}}</p>
        </div>
      </div>
    </div>
  </div>
   @endforeach
 
</div>
    </div>
    <div class="btn-wrap text-center">
       <a href="{{route('Category.FAQs',$category_id)}}" class="main-btn white-btn">{{langText('View More')}}</a>
    </div>
  </div>
</section>

@endif
<!-- What Our Client's Say code -->
<section class="testimonial-sec">
    <div class="container">
      <div class="sec-heading text-center" data-aos="fade-left" data-aos-duration="1000">
          <h2>{{langText("What Our Client's Say")}}</h2>
            <span class="sec-heading-icon" data-aos="zoom-in" data-aos-duration="2000"><i class="icon-review"></i></span>
        </div>

       <div class="testimonial-slider">
<?php
$testimonials = \App\Models\WebsiteSettings::where('type','testimonials')->where('lang','EN')->get();
?>
@foreach($testimonials as $cate)
 <?php
$data = Session::get('locale') == "AR" && $cate->arabic != null ? json_decode($cate->arabic->key_value) :  json_decode($cate->key_value);
?>

@if(!empty($data))
         <div class="slider-item">
          <div class="testimonial-card text-center">
               <figure class="client-img">
                 <img src="{{url($data->picture)}}">
               </figure>
                <div class="testimonial-text">
                   <span class="testimonial-icon">
                     <i class="icon-quotation-marks"></i>
                   </span>
                   <p>{{$data->testimonial}}</p>
                </div>
                <div class="testimonial-ftr">
                  <div class="client-rating">
                    @for($i = 0; $i < $data->rating;$i++)
                    <span><i class="fas fa-star"></i></span> 
                    @endfor
                  </div>
                  <h4 class="clent-name">{{$data->name}}</h4>
                </div>
            </div>
         </div> 
@endif
@endforeach

         
       </div>
    </div>
</section>

@endsection
@section('my-js')
<script type="text/javascript">


$("body").on('click','.get-celebrity-category',function(e){
e.preventDefault();
var $this = $(this);
$("body").find('.get-celebrity-category').removeClass('active');
$this.addClass('active');
getCelebrityAjaxFunc($this);
});
;
getCelebrityAjaxFunc($("body").find('.get-celebrity-category.active'));
//--------------------------------------------------------------------------------------------
// GET CELEBRITY (RECENT JOINED)
//--------------------------------------------------------------------------------------------

function loadDefaultFunc() {
  
     $("body").find('#featured-celebs-slider').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        rtl: {{(Session::has('locale') && Session::get('locale') == 'AR') ? 'true' : 'false'}},
        centerMode: false,
        focusOnSelect: false,
        centerPadding: '0px',
        nextArrow: '<span class="slick-arrow right-arrow"><i class="fas fa-arrow-right"></i></span>',
        prevArrow: '<span class="slick-arrow left-arrow"><i class="fas fa-arrow-left"></i></span>',
        responsive: [
            {
              breakpoint: 1500,
              settings: {
                dots: false,
                slidesToShow: 5,  
                centerPadding: '0px',
                }
            },
            {
              breakpoint: 1300,
              settings: {
                dots: false,
                slidesToShow: 3,  
                centerPadding: '0px',
                }
            },
            {
              breakpoint: 420,
              settings: {
                autoplay: true,
                dots: false,
                slidesToShow: 1,
                centerMode: false,
                }
            }
        ]
    }); 

// Testimonial slider
$("body").find('.testimonial-slider').slick({
  dots: false,
  infinite: true,
  speed: 300,
  rtl: {{(Session::has('locale') && Session::get('locale') == 'AR') ? 'true' : 'false'}},
  slidesToShow: 3,
  slidesToScroll: 1,
  arrows: true,
  nextArrow: '<span class="slick-arrow right-arrow"><i class="fas fa-arrow-right"></i></span>',
        prevArrow: '<span class="slick-arrow left-arrow"><i class="fas fa-arrow-left"></i></span>',
  responsive: [
    {
      breakpoint: 1300,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});


     
}



 //--------------------------------------------------------------------------------------------
// GET CELEBRITY (RECENT JOINED)
//--------------------------------------------------------------------------------------------

function getCelebrityAjaxFunc($this) {
  
      $.ajax({
           url:$this.data('action'),
           method:"GET",
           
           dataType:'JSON',
           beforeSend: function() {
            
               $("body").find('.custom-loading').show();

           },
           success:function(data)
           {
             if(data.status == 1){
                $("body").find('.custom-loading').hide();
               $("body").find('#nav-tabContent').html(data.list);

               loadDefaultFunc();
             }
             
           } 

          });
}
  
</script>
@endsection