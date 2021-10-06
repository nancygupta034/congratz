@extends('home.layouts.layout')
@section('content')
<style type="text/css">
.my-custom-category-slick .slick-slide.active.slick-current.slick-active {
    background: var(--primary-color);
    color: #fff !important;
}
.my-custom-category-slick a.cele-list-link.get-celebrity-category.active {
    color: #fff !important;
    background: var(--primary-color);
}

.my-custom-category-slick a.cele-list-link.get-celebrity-category.active h4 {
    color: #fff;
}

#nav-tabContent .cele-list-link:hover, #nav-tabContent .slick-center .cele-list-link {
    background: transparent;
    color: #fff;
}
.cele_info_body .celeb-feature-card .celeb-info {
    opacity: 1;
    visibility: visible;
}
.featured-celebs-slider .slick-item.slick-center .celeb-feature-card {
    transform: scale(1);
    box-shadow: none;
}
.featured-celebs-slider .slick-item.active .celeb-feature-card,
.featured-celebs-slider .slick-item.active.slick-center .celeb-feature-card {
    transform: scale(1);
    box-shadow: var(--white-bg-outer-shadow);
}

.featured-celebs-slider .slick-item.active .celeb-feature-card .celeb-img,
.featured-celebs-slider .slick-item.active.slick-center .celeb-feature-card .celeb-img {
    border-color: var(--secondary-color);
}

figure.tr_profile img {
    
    width: 100%;
    height: 100%;
    object-fit: cover;
}

figure.tr_profile {
    width: 300px;
    height: 300px;
    /* padding: 10px; */
    /* background: #fff; */
    border: 5px solid #fff;
    box-shadow: var(--white-bg-outer-shadow);
}
.cele-listing-content-block {
    width: calc(100% - 200px);
    display: inline-block;
    padding-left: 100px;
}
.cleb-nav-col {
    width: 200px;
    display: inline-block;
}
div#getCelebrityInfo {
    margin-bottom: 60px;
}
.my-custom-category-slick .cele-list-link {
    padding: 48px 10px;
 }
 .main-btn.active {
    box-shadow: var(--gray-bg-inner-shadow);
}
</style>

  <!-- Breadcrum code -->
     <div class="breadcrumb-sec"> 
      <div class="container">
         <ol class="breadcrumb lighten-4">
            <li class="breadcrumb-item"><a class="black-text" href="{{url('/')}}">{{_lang('Homepage')}}</a><i class="fa fa-angle-right mx-2" aria-hidden="true"></i></li>                                    
            <li class="breadcrumb-item active">{{$category->label}}</li>
        </ol> 
      </div>
    </div>
      <!-- Celebrities listing -->
      <section class="celebrities-list-sec">
        <div class="container">
          <div class="cele-listing-block">
            <div class="cleb-nav-col">
                <div class="cele-listing-nav my-custom-category-slick">
       
               <?php 
               $categories = \App\Models\Category::where('status',1)->where('lang','EN')->orderBy('label','ASC')->get(); $list=''; ?>
               @foreach($categories as $key => $c) 
                      <?php $cate = (Session::has('locale') && Session::get('locale') == 'AR') && $c->arabic != null ? $c->arabic : $c; 
                       $active =$category->id == $cate->id ? ' active' : '';
                       $activeList = $category->id == $cate->id ? 'active slick-current slick-active' : '';
                       ?>
                    
                      <div class="slick-slide {{$activeList}}">
                        <a href="javascript:void(0);" class="cele-list-link get-celebrity-category {{$active}}" 
                        data-action="{{route('home.allCelebrity.celebrity',[$c->slug,'all'])}}">
                          <span class="nav-icon">{!!$c->getIcon()!!}</span>
                          <h4>{{$cate->label}}</h4>
                        </a>
                      </div>

                      
              @endforeach
           </div>
          </div>
         <div class="cele-listing-content-block">
		      <div class="cele-listing-content">
		        <div class="" id="nav-tabContent">
		         
		        </div>
		         
		      </div>
        </div>
        </div>
      </div>
      </section>
      <!-- Celebrities listing -->

@endsection

@section('my-js')
<script type="text/javascript">


$("body").on('click','.get-celebrity-category',function(e){
e.preventDefault();
var $this = $(this);
    $div = $("body").find('.get-celebrity-category');
    $parent = $("body").find('.my-custom-category-slick .slick-slide');
    $div.removeClass('active');
    $parent.removeClass('slick-current active');
    $this.addClass('active');
    $this.closest('.slick-slide').addClass('slick-current active');
    // $this.closest('.slick-slide').addClass('slick-current');
    getCelebrityAjaxFunc($this);
});


$("body").on('click','.get-celebrity-type',function(e){
e.preventDefault();
var $this = $(this);
    $div = $("body").find('.get-celebrity-type');
    
    $div.removeClass('active');
    
    $this.addClass('active');
   // $this.closest('.slick-slide').addClass('slick-current active');
    // $this.closest('.slick-slide').addClass('slick-current');
    getCelebrityAjaxFunc($this);
});


$("body").on('click','.get-celebrity-detail',function(e){
  e.preventDefault();
  var $this = $(this);
  $("body").find('.get-celebrity-detail').removeClass('active');
 
  $this.addClass('active');
  getCelebrityAjaxFunc($this,'#getCelebrityInfo');
});

getCelebrityAjaxFunc($("body").find('.get-celebrity-category.active'));
//--------------------------------------------------------------------------------------------
// GET CELEBRITY (RECENT JOINED)
//--------------------------------------------------------------------------------------------

function loadDefaultFunc() {


// celebrity listing vertical carousel
//  $('#getCelebrityInfo').slick({
//   slidesToShow: 1,
//   slidesToScroll: 1,
//   arrows: false,
//   fade: true,
//   asNavFor: '.cele-listing-nav'
// });
// $('.cele-listing-nav').slick({
//   vertical: true,
//   verticalSwiping: true,
//   slidesToShow: 5,
//   slidesToScroll: 1,
//   centerPadding: 0,
//   asNavFor: '.cele-listing-content',
//   dots: false,
//    nextArrow: '<span class="slick-arrow right-arrow"><i class="fas fa-chevron-down"></i></span>',
//         prevArrow: '<span class="slick-arrow left-arrow"><i class="fas fa-chevron-up"></i></span>',
//   centerMode: true,
//   focusOnSelect: false,
// });
//  $('a[data-slide]').click(function(e) {
//    e.preventDefault();
//    var slideno = $(this).data('slide');
//    $('.cele-listing-nav').slick('slickGoTo', slideno - 1);
//  });


// $("body").find('#celeCateSlider').slick({
//         slidesToShow: 3,
//         slidesToScroll: 1,
//         dots: false, 
//         arrows: true,
//         centerMode: true,
//         focusOnSelect: false,
//         centerPadding: '0px',
//         nextArrow: '<span class="slick-arrow right-arrow"><i class="fas fa-arrow-right"></i></span>',
//         prevArrow: '<span class="slick-arrow left-arrow"><i class="fas fa-arrow-left"></i></span>',
//         responsive: [
//             {
//               breakpoint: 1500,
//               settings: {
//                 dots: false,
//                 slidesToShow: 3,  
//                 centerPadding: '0px',
//                 }
//             },
//             {
//               breakpoint: 1300,
//               settings: {
//                 dots: false,
//                 slidesToShow: 3,  
//                 centerPadding: '0px',
//                 }
//             },
//             {
//               breakpoint: 420,
//               settings: {
//                 autoplay: true,
//                 dots: false,
//                 slidesToShow: 1,
//                 centerMode: false,
//                 }
//             }
//         ]
//     }); 


// $('.cele-listing-nav').slick({
//   vertical: true,
//   verticalSwiping: true,
//   slidesToShow: 5,
//   slidesToScroll: 1,
//   centerPadding: 0,
//  // asNavFor: '.cele-listing-content2',
//   dots: false,
//   arrows: true,
//   nextArrow: '<span class="slick-arrow right-arrow"><i class="fas fa-chevron-down"></i></span>',
//         prevArrow: '<span class="slick-arrow left-arrow"><i class="fas fa-chevron-up"></i></span>',
//   centerMode: true,
//   focusOnSelect: false,
// });
  
  
    $("body").find('#featured-celebs-slider').slick({
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

      getCelebrityAjaxFunc($("body").find('.get-celebrity-detail.active'),'#getCelebrityInfo');
      $("body").find('.custom-loading').hide();
}





 $("body").find('.cele-listing-nav').slick({
       vertical: true,
        verticalSwiping: true,
        slidesToShow: 5,
        // slidesToScroll: 1,
        // dots: false,
        // arrows: true,
        // centerMode: true,
        // focusOnSelect: false,
        // centerPadding: '0px',
        nextArrow: '<span class="slick-arrow right-arrow"><i class="fas fa-chevron-down"></i></span>',
        prevArrow: '<span class="slick-arrow left-arrow"><i class="fas fa-chevron-up"></i></span>',
        
    }); 
 //--------------------------------------------------------------------------------------------
// GET CELEBRITY (RECENT JOINED)
//--------------------------------------------------------------------------------------------

function getCelebrityAjaxFunc($this,$div='#nav-tabContent') {
  
      $.ajax({
           url:$this.data('action'),
           method:"GET",
           
           dataType:'JSON',
           beforeSend: function() {
            
               // $("body").find('.custom-loading').show();

           },
           success:function(data)
           {
             if(data.status == 1){
               $("body").find($div).html(data.list);

               loadDefaultFunc();
             }
                $("body").find('.custom-loading').hide();
             
           } 

          });
}
  
</script>
@endsection