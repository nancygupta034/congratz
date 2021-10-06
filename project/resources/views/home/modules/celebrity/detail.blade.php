@extends('home.layouts.layout')
@section('stylesheets') 
<meta property="og:url"  content="{{\Request::fullUrl()}}" />
<meta property="og:type" content="website"/>

<meta property="og:title" content="<?= $user->name ?>"/>
<meta property="og:description" content="<?= $user->about ?>"/>

<meta property="og:image" content="<?= url($user->profile_picture) ?>"/>

   
@endsection
@section('content')





  <!-- Breadcrum code -->
     <div class="breadcrumb-sec"> 
      <div class="container">
         <ol class="breadcrumb lighten-4">
            <li class="breadcrumb-item"><a class="black-text" href="{{url('/')}}">{{_lang('Homepage')}}</a><i class="fa fa-angle-right mx-2" aria-hidden="true"></i></li>                                    
            <li class="breadcrumb-item active">Celebrity Detail</li>
        </ol> 
      </div>
    </div>
      <!-- Celebrities listing -->
      <section class="celebrities-list-sec">
        <div class="container">

          <div class="celeb_detail-block">
          	<div class="row">
          		<div class="col-lg-7">
          			<div class="celeb_profile_info">
          				<div class="btn_grp mb-4"> 											         
				           @if(!empty($user->categories)) 
						            @foreach ($user->categories as $key => $c) 
						           <a href="javascript:void(0);" class="theme_btn mr-3">{{$c->category->label}}</a>
						               
						            @endforeach
						          @endif
				        </div>
				        <h3 class="tr_name mb-3"><?= $user->name ?></h3>
				        <p><?= $user->about ?></p>
				        <div class="priceing-n-sharing d-f a-i-c j-c-s-b my-4">
				        	<div class="left_info d-i-f a-i-c">
				        		<h4 class="tr_price mr-3">${{$user->charge}}</h4>
				        	 <a href="javascript:void(0);" class="icon-btn rounded-circle mr-3 wishlisted-adding {{Auth::check() && Auth::user()->isWishlisted($user->id) > 0 ? 'wishlisted' : ''}}" data-action="{{route('home.celebrityWishlist',$user->slug)}}"><i class="far fa-heart"></i> <i class="fas fa-heart"></i></a>


				        	 <a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal-share" class="icon-btn rounded-circle"><i class="fas fa-share-alt"></i></a>
				        	</div>
				        	<div class="left_info d-i-f a-i-c">
				        		<a href="{{route('home.booking',$user->slug)}}" class="main-btn white-btn">{{langText('Book Now')}}</a>
				        	</div>
				        </div>
				        <h3 class="mini-heading mb-3">Typically responses in 1 Day</h3>
				         <div class="tr-cate-rating d-f a-i-c">
                   @if(!empty($user->reviews))
                     <?php $rating = $user->celebrityRate(); ?>
                     <div class="tr_rating">
                       <span class="rating-count">{{custom_format($rating['rate'],1)}}</span>
                       <span class="rating-star">{!!$rating['stars']!!}</span>
                       <a href="javascript:void(0);" class="see-reviews" data-toggle="modal" data-target="#AllReviewModal">See all reviews</a>
                     </div>
                     @endif
				              
				          </div>



           
            
				         
				          <ul class="social-links mt-4">
     	 		     		 @if(!empty($user->facebook_url))
			                  <li>
			                    <a href="{{$user->facebook_url}}" target="_blank" class="social-link"><span class="icon-facebook"></span></a></li>
			                   
			                  @endif
			                   @if(!empty($user->twitter_url))
			                  <li>
			                    <a href="{{$user->twitter_url}}" target="_blank" class="social-link"><span class="icon-twitter"></span></a></li>
			                  
			                  @endif
			                   @if(!empty($user->youtube_url))
			                  <li>
			                    <a href="{{$user->youtube_url}}" target="_blank" class="social-link"><span class="icon-linked-in-logo-of-two-letters"></span></a></li>
			                 
			                  @endif
			                   @if(!empty($user->insta_url))
			                  <li>
			                    <a href="{{$user->insta_url}}" target="_blank" class="social-link"><span class="icon-pinterest"></span></a></li>
			                   
			                  @endif
			                   
			                </ul>
          			</div>
          		</div>
          		<div class="col-lg-5">
          			<figure class="celeb-full-img">
                   <span class="status_str {{($user->current_login_datetime >= date('Y-m-d H:i')) ? 'Online' : 'Offline'}}">{{($user->current_login_datetime >= date('Y-m-d H:i')) ? 'Online' : 'Offline'}}</span>
          				<img src="<?= url($user->profile_picture)?>" class="img-thumbnail">
          			</figure>
          		</div>
          		<div class="col-lg-12">
          			  <nav class="Joined-tabs-wrap mt-5">
            <ul class="nav nav-tabs tab-btn-slider" id="celebDetailSlider" role="tablist">                             
                      <li class="active">
                        <span class="tab-radio-btn">
                       <input type="radio" name="event" class="get-celebrity-profile-video" id="all_event" value="0" data-action="{{route('home.getCelebrityProfileVideo',[$user->id,0])}}" checked="">
                        <label  class="main-btn" for="all_event">All</label>
                        </span>                        
                     </li> 
                      
                    <?php $events = $user->getAllEvents(); ?>

                    @if($events->count() > 0)
                        @foreach($events->get() as $event)
                             <li>
                              <span class="tab-radio-btn">
                                <input type="radio" name="event" class="get-celebrity-profile-video" id="all_event_{{$event->id}}" value="0" data-action="{{route('home.getCelebrityProfileVideo',[$user->id,$event->id])}}">
                                  <label  class="main-btn" for="all_event_{{$event->id}}">{{$event->label}}</label>
                              </span>                        
                            </li>
                        @endforeach
                    @endif
                      
              </ul>
         </nav>

         <div class="celeb-detail-video-slider mt-5" id="celebVideoSliders">
         	 
          
          
         	
         </div>
          		</div>
          	</div>
          </div>

      </div>
      </section>
      <!-- Celebrities listing -->
    



@endsection


@section('footer_section')

  <!-- video modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                   <div class="modal-body p-0">
                    <div class="embed-responsive embed-responsive-16by9">
                     <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                  </div>
                </div>
              </div>
              </div>

              
<!-- Modal -->
<div class="modal fade" id="exampleModal-share" tabindex="-1" role="dialog" aria-labelledby="exampleModal-shareLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal-shareLabel">Share</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox social-links mt-4"></div>
      </div>
       
    </div>
  </div>
</div>


<div class="modal fade modal-center" id="AllReviewModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="AllReviewModal" aria-hidden="true">
   <div class="modal-dialog" role="document" style="max-width: 1000px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal-OcassionsLabel">Latest Reviews</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <ul class="reviews-listing">

            @if(!empty($user->reviews) && $user->reviews->count() > 0)
            @foreach($user->reviews as $review)
            <li>
              <div class="review-card">
                <div class="tr_rating mb-2">                       
                     <span class="rating-star">{!!rattingStar($review->rating)!!}</span>
                       <span class="rating-count">{{$review->rating}} {{$review->rating > 1 ? 'Stars' : 'Star'}}</span>
                     </div>
                      <h4 class="review_by mt-2">Reviewed by {{$review->user->name}} in {{date('M d, Y',strtotime($review->created_at))}}</h4>
                     <div class="review-text">
                       <p>{{$review->reviews}}</p>
                     </div>

              </div>
                    @if(!empty($review->replies) && $review->replies->count() > 0)
                           <h4 class="review_by mt-2">Replies</h4>
                           @foreach($review->replies as $r)
                              <div class="tr_rating"> 
                                <hr>
                               <p class="review-message d-inline">{{$r->reviews}}</p>
                             </div>
                            @endforeach
                      @endif
            </li>
            @endforeach
             @endif
 

             
          </ul>
      </div>
      
    </div>
  </div>
</div>
@endsection
@section('my-js')
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-60db3b955fee0d04"></script>

<script type="text/javascript">




//===========================================================================================

$("body").on('click','.wishlisted-adding',function(e){
     e.preventDefault();
     $this = $(this);
     $loader = $("body").find('.custom-loading');
            $.ajax({
                      url : $this.data('action'),
                      type: 'GET',  
                      
                      dataTYPE:'JSON',
                      headers: {
                       'X-CSRF-TOKEN': $('input[name=_token]').val()
                      },
                      beforeSend: function() {
                                $this.find('button').attr('disabled');    
                                $loader.show();
                      },
                      success: function (result) {
                         $loader.hide();
                          alert(result.message);
                           if(result.status == 1){
                              window.location.href = result.url;
                           }else if(result.status == 2){
                              window.location.reload();
                           } 
                      },
                      complete: function() {
                      },
                      error: function (jqXhr, textStatus, errorMessage) {
                          
                      }
              });
});







$("body").on('change','.get-celebrity-profile-video',function(e){
  e.preventDefault();
     getProfileVideos();
});


getProfileVideos();

function getProfileVideos() {
   $this = $("body").find('.get-celebrity-profile-video:checked');
     $loader = $("body").find('.custom-loading');
            $.ajax({
                      url : $this.data('action'),
                      type: 'GET',  
                      
                      dataTYPE:'JSON',
                      headers: {
                       'X-CSRF-TOKEN': $('input[name=_token]').val()
                      },
                      beforeSend: function() {
                                $this.find('button').attr('disabled');    
                                $loader.show();
                      },
                      success: function (result) {
                         $loader.hide();
                          $("#celebVideoSliders").html(result.list);

    $('a[data-rel^=lightcase]').lightcase({
      swipe: false,
      transition: 'scrollHorizontal', // 'none', 'fade', 'fadeInline', 'elastic', 'scrollTop', 'scrollRight', 'scrollBottom', 'scrollLeft', 'scrollHorizontal' and 'scrollVertical'.
      showSequenceInfo: false,
      showTitle: false
    });

                      },
                      complete: function() {
                      },
                      error: function (jqXhr, textStatus, errorMessage) {
                          
                      }
              });
}






  $('#celebDetailSlider').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
         // centerMode: true,
        focusOnSelect: false,
        centerPadding: '0px',
        nextArrow: '<span class="slick-arrow right-arrow"><i class="fas fa-arrow-right"></i></span>',
        prevArrow: '<span class="slick-arrow left-arrow"><i class="fas fa-arrow-left"></i></span>',
        responsive: [
            {
              breakpoint: 1500,
              settings: {
                dots: false,
                slidesToShow: 4,  
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

    $('#celebVideoSlider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
         centerMode: true,
        focusOnSelect: false,
        centerPadding: '0px',
        nextArrow: '<span class="slick-arrow right-arrow"><i class="fas fa-arrow-right"></i></span>',
        prevArrow: '<span class="slick-arrow left-arrow"><i class="fas fa-arrow-left"></i></span>',
        responsive: [
            {
              breakpoint: 1500,
              settings: {
                dots: false,
                slidesToShow: 4,  
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
  </script>
@endsection