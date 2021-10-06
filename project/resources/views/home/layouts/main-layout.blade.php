<!DOCTYPE html>
<html lang="{{ Session::get('locale') }}">
   <head>
      <title>{{_lang('Congratz')}}</title> 
      <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
      <link rel="icon" href="images/favicon.ico" type="image/x-icon">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdn.rawgit.com/michalsnik/aos/2.0.4/dist/aos.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <link href="{{url('frontend/css/owl.carousel.min.css')}}" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{url('frontend/css/animate.css')}}">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
      <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/lightcase/2.5.0/css/lightcase.css">
      <link rel="stylesheet" type="text/css" href="{{url('frontend/css/inputFlag.css')}}">
      <link rel="stylesheet" type="text/css" href="{{url('frontend/css/style.css')}}">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      @yield('stylesheets')
      @if((Session::has('locale') && Session::get('locale') == 'AR'))
      <link rel="stylesheet" type="text/css" href="{{url('frontend/css/custom-rtl.css')}}">
      @endif
      <link rel="stylesheet" type="text/css" href="{{url('frontend/css/responsive.css')}}">

      <style type="text/css">
        .ui-widget.ui-widget-content{
          z-index: 99999999999 !important;
        }
      </style>
    </head>
    <?php $langs = (Session::has('locale') && Session::get('locale') == 'AR') ? 'AR' : 'EN';?>
   <body 
   class="lang-{{ Session::get('locale') }} {{!empty($bookingUrl) ? 'account-page' : ''}} {{!empty($customClass) ? $customClass : ''}} {{(Session::has('locale') && Session::get('locale') == 'AR') ? 'rtl' : ''}}"
   <?=(Session::has('locale') && Session::get('locale') == 'AR') ? 'dir="rtl"' : ''?>
   data-theme="<?= Session::get("data-theme") ?>"
  >

   <div class="responsive-layout" style="display: none;">
     <div class="sec-heading mb-5">
       <h2>Website is not meant to used for mobile environment</h2>
     </div>
     <div class="apps-environment">
       <h3 class="mini-heading">Tap here to download android and ios app:</h3>
       <div class="app-store-buttons mt-3">
                 <a href="" class="app-store-link mr-3"><img src="/images/settings/1610372513t7UDPEbWFDGUUbEfUOqNgoogleplay.png"></a> 
                 <a href="" class="app-store-link"><img src="/images/settings/1610372513TH4YEoz7M56vVDcMddeVappstore.png"></a>
               </div>
     </div>
   </div>
 <div id="loading" class="page-loader custom-loading">
     <div class="loader loader-18">
      <div class="css-star star1"></div>
      <div class="css-star star2"></div>
      <div class="css-star star3"></div>
      <div class="css-star star4"></div>
      <div class="css-star star5"></div>
      <div class="css-star star6"></div>
      <div class="css-star star7"></div>
      <div class="css-star star8"></div>
    </div>
</div>
     @yield('top-main-content')
      @if(empty($login))
       
    <main class="layout-container smooth-scroll scroller" id="scroller">
      <div class="scroller-inn">
           @yield('main-content')
      </div>
    </main>
@endif
 @yield('bottom-main-content')
<a href="javascript:void(0);" class="scroll-to-top" id="scrollTop"><i class="fas fa-arrow-alt-circle-up"></i></a>
<div class="site-setting">
  <a href="javascript:void(0);" class="site-setting-toggle" id="site-setting-toggle"><i class="icon-settings"></i></a>
   <div class="settings-container">
     <div class="from-group">
       <div class="switch-holder">
            <div class="switch-label">
                <i class="fas fa-moon"></i><span>{{_lang('Dark Mode')}}</span>
            </div>
            <div class="switch-toggle">
                <input type="checkbox" 
                name="toggleTheme"
                id="data-theme"
                data-dark='<?= route('home.theme.mode','dark') ?>' 
                <?= Session::has('data-theme') && Session::get('data-theme') == 'dark' ? 'checked' : '' ?> 
                data-light='<?= route('home.theme.mode','light') ?>' 
                >
                <label for="data-theme"></label>
            </div>
        </div>
     </div>
     <div class="from-group">
       <div class="switch-holder">
           <?php $Switch = Session::has('locale') && Session::get('locale') == 'AR' ? 'Switch to English' : 'Switch to Arabic'; ?>
            <div class="switch-label">
                <i class="fas fa-language"></i><span>{{_lang($Switch)}}</span>
            </div>
            <div class="switch-toggle">
                <input type="checkbox" id="langSwitch" 
                data-EN='<?= route('home.lang','EN') ?>'
                data-AR='<?= route('home.lang','AR') ?>'
                <?= Session::has('locale') && Session::get('locale') == 'AR' ? 'checked' : '' ?>
                >
                <label for="langSwitch"></label>
            </div>
        </div>
     </div>
      <div class="from-group">
       <div class="switch-holder">
            <div class="switch-label">
                <i class="fas fa-cookie"></i><span>{{_lang('Enable Cookies')}}</span>
            </div>
            <div class="switch-toggle">
                <input type="checkbox" id="CookiesSwitch">
                <label for="CookiesSwitch"></label>
            </div>
        </div>
     </div>
   </div>
 </div>

@yield('footer_section') 
    
      <!-- Scripting starts here -->
      <!-- <script src="https://code.jquery.com/jquery-3.1.0.js"></script> -->
      <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="https://cdn.rawgit.com/michalsnik/aos/2.0.4/dist/aos.js"></script>
      <script src="{{url('frontend/js/animation.js')}}"></script>    
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/plugins/debug.addIndicators.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.6/gsap.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.6/MotionPathPlugin.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TimelineMax.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
      <script type="text/javascript" src="{{url('frontend/js/owl.carousel.min.js')}}"></script>
      <script type="text/javascript" src="https://www.land-of-web.com/wp-content/uploads/2016/08/parallax.js"></script> 


       <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>   
      <!-- Smooth scroll -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.2/gsap.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.2/ScrollTrigger.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lightcase/2.5.0/js/lightcase.js"></script>
     <!--  ===================== -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scrollbar/8.3.1/smooth-scrollbar.js"></script>
      <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/layout-containermotive-scroll@3.5.4/dist/locomotive-scroll.min.js"></script> -->
      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scrollbar/8.5.2/smooth/z-scrollbar.js"></script>   -->

      @if(!empty($login))
       
      @else
      <script type="text/javascript" src="<?= url('frontend/js/EN/custom.js')?>"></script>
      <script type="text/javascript" src="<?= url('frontend/js/EN/custom-gsap.js')?>"></script>         
      @endif
  
  <!-- Validate Js -->
 
  <!-- Accept only image -->

  
      @if((Session::has('locale') && Session::get('locale') == 'AR'))
         <script type="text/javascript" src="<?= url('frontend/js/EN/custom-ar.js')?>"></script>
      @endif
    


@yield('my-js') 

<script>
  $( function() {
    function log( message ) {
      $( "<div>" ).text( message ).prependTo( "#log" );
      $( "#log" ).scrollTop( 0 );
    }
 
    $( "#searchbox" ).autocomplete({
      source: "{{route('home.searchItem')}}",
      minLength: 2,
      select: function( event, ui ) {
        log( "Selected: " + ui.item.value + " aka " + ui.item.id );
      }
    });
  } );
  </script>
<script type="text/javascript">


   
$("body").on('click','.change-lang',function(e){
  e.preventDefault();
  var $url = $(this).attr('data-action');
  Global_Settings($url);
});



$("body").on('change','#langSwitch',function(e){
  //e.preventDefault(); 
  var $url = $(this).is(":checked") ? $(this).attr('data-AR') : $(this).attr('data-EN');
  Global_Settings($url);
});



$("body").on('change','#data-theme',function(e){
  //e.preventDefault(); 
  var $url = $(this).is(":checked") ? $(this).attr('data-dark') : $(this).attr('data-light');
  Global_Settings($url);
});




function Global_Settings($url) {
                $.ajax({
                      url : $url,
                      type: 'GET',  
                      dataTYPE:'JSON',
                      headers: {
                       'X-CSRF-TOKEN': $('input[name=_token]').val()
                      },
                      beforeSend: function() {
                               
                      },
                      success: function (result) {
                           if(result.status == 1){
                              window.location.reload();
                           }
                      },
                      complete: function() {
                      },
                      error: function (jqXhr, textStatus, errorMessage) {
                          
                      }
              });
}


</script>  
   </body>
</html>