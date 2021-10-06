<!DOCTYPE html>
<html>
   <head>
      <title>Customer Dashboard</title>
      <link rel="shortcut icon" href="images/favicon1.ico" type="image/x-icon">
      <meta charset="utf-8">
      <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
      <link rel="stylesheet" href="{{url('celeb-dashboard/css/bootstrap.min.css')}}">
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  
      <link rel="stylesheet" type="text/css" href="{{url('celeb-dashboard/css/animate.css')}}">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="{{url('celeb-dashboard/css/style.css')}}">
      <link rel="stylesheet" type="text/css" href="{{url('celeb-dashboard/css/responsive.css')}}">
      <link rel="stylesheet" type="text/css" href="{{url('customer-dashboard/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('customer-dashboard/css/responsive.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
 @yield('stylesheets')
      <style type="text/css">
        .input-list{
          list-style: none;
          
           width: 100%;
        }
        .input-list li{
          float: left;
          margin-top: 20px;
          padding-right: 15px;
        }
        .input-list li label{
          font-size: 12px;
        }
        .input-list li.w-50{
          width:calc(50% - 15px);
        }
        .input-list li.w-100{
          width:calc(100% - 15px);
        }
        .input-list li.w-33{
          width:calc(33.3% - 15px);
        }
        figure.profile_logo {
    position: relative;
}

label.upload_image_label {
    position: absolute;
    bottom: 10px;
    background: #ed1e7f;
    z-index: 99999;
    width: 30px;
    height: 30px;
    right: 51px;
    overflow: hidden;
    border-radius: 3px;
    text-align: center;
    line-height: 30px;
}
label.upload_image_label input {
    opacity: 0;
    position: absolute;
}

label.upload_image_label i {
    font-size: 22px;

}
.btn-wraped{
  position: relative;
  min-height: 37px

}
      </style>
   </head>
  <body 
   class="lang-{{ Session::get('locale') }} {{(Session::has('locale') && Session::get('locale') == 'AR') ? 'rtl' : ''}}"
   data-theme="<?= Session::get("data-theme") ?>"
   <?=(Session::has('locale') && Session::get('locale') == 'AR') ? 'dir="rtl"' : ''?>
  >
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
      <!-- Sidebar navigation starts here -->
       @include('artists.includes.sidebar')
      <!-- Sidebar navigation Ends here -->
      <!-- Dashboard main content -->
      <main class="main_layout">
          <div class="container-fluid p-0">
             
                 @yield('content')
              
          </div>
      </main>
       <!-- Dashboard main content End -->
<input type="hidden" value="{{route('artist.checkFields')}}" id="authCheckFields">
      <!-- Scripting starts here -->
         <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
     <!--  <script src="{{url('celeb-dashboard/js/jquery-3.1.0.js')}}"></script> -->
      <script src="{{url('celeb-dashboard/js/popper.min.js')}}"></script>
      <script src="{{url('celeb-dashboard/js/bootstrap.min.js')}}"></script> 
    
      <script src="{{url('celeb-dashboard/js/animation.js')}}"></script>
      <script type="text/javascript" src="{{url('celeb-dashboard/js/smooth-scrollbar.js')}}"></script>
      <script type="text/javascript" src="{{url('celeb-dashboard/js/custom.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
   @yield('js')
      <script type="text/javascript">
           var Scrollbar = window.Scrollbar;
  Scrollbar.init(document.querySelector('.sidebar_block'));

    $(window).load(function() {
        $('#loading').hide();
     });


function keepOnlined() {
  setInterval(function(){
ajaxx();
  },1000);
}
keepOnlined();

function ajaxx() {
      $.ajax({
             url:"<?= route('celebrity.keepOnlined') ?>",
             method:'GET',
             beforeSend: function(msg){
             },
             success: function(result){
              
             }
         });
}







      </script>

   </body>
</html>