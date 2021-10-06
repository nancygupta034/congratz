@extends('home.layouts/main-layout')
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="<?= url('frontend/css/login.css')?>">
@endsection
@section('top-main-content')
    <div class="container" id="formContainer">
      <a href="{{url('/')}}" class="back-btn-icon"><i class="fi-br-angle-left"></i></a>
      <div class="forms-container">
        <div class="signin-signup">
          <form class="sign-in-form" data-action="{{route('ajax.login')}}" name="login">
                      <div class="messageDiv {{Request::has('type') ? 'alert alert-warning' : ''}} ">
                           {{Request::has('type') ? Request::get('type') : ''}}
                      </div>
                      @csrf
                <div class="form_body">
                    <h2 class="title">Sign in</h2>
                      
                      <div class="form-group">
                                          <div class="input-wrap">
                                               <input type="email" name="email" placeholder="Enter Email" class="form-control" autocomplete="email" autofocus>
                                              <span class="input-icon"><i class="fas fa-user"></i></span>
                                          </div>                                          
                                        </div>
                                 <div class="form-group">
                                  <div class="input-wrap">
                                       <input type="password" name="password" placeholder="Enter Password" minlength="6" id="login_password" class="form-control" autocomplete="current-password">
                                       <span class="input-icon"><i class="fas fa-lock"></i></span>
                                       <a href="javascript:void(0)" class="input-icon right showPassword password-icon" data-id="#login_password"><i class="fas fa-eye"></i></a>
                                       
                                  </div>                                          
                                </div>
                                 <div class="form-group">
                                  <div class="custom-control custom-checkbox text-left">
                                     <input type="checkbox" name="remember" value="1" class="custom-control-input" id="customCheck1" {{ old('remember') ? 'checked' : '' }}>
                                     <label class="custom-control-label" for="customCheck1">Remember me</label>
                                   </div>
                                 </div>

                                  
                     <input type="submit" value="Login" class="main-btn white-btn" >

                     @if(Request::has('redirect_link'))
                         <input type="hidden" name="redirect_link" value="{{Request::get('redirect_link')}}">
                      @endif
        
 
                </div>
                        <div class="form_footer text-center">
                    <p class="social-text">Or Sign in with social platforms</p>

                    <div class="social-media">
                      <a href="{{route('auth.social.media','facebook')}}" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                      </a>
                       
                      <a href="{{route('auth.social.media','google')}}" class="social-icon">
                        <i class="fab fa-google"></i>
                      </a>
                      
                    </div>
                        </div>
          </form>
        

<form id="artistForm" class="sign-up-form" name="register" data-action="{{route('register.customer.ajax')}}">

  @if(Request::has('redirect_link'))
     <input type="hidden" name="redirect_link" value="{{Request::get('redirect_link')}}">
  @endif
            <div class="form_body">
            <h2 class="title">Sign up</h2> 
             <div class="messageDiv {{Request::has('type') ? 'alert alert-warning' : ''}} ">
                           {{Request::has('type') ? Request::get('type') : ''}}
                      </div>
                      @csrf
                      <?php $countries = \App\Models\Country::get(); ?>
                      <div class="form-group"> 
                        <div class="input-wrap">
                               <input type="text" name="name" placeholder="{{_lang('Full name')}}" class="form-control">
                              <span class="input-icon"><i class="fas fa-user"></i></span>
                          </div>                            
                      </div>
                      <div class="form-group"> 
                        <div class="input-wrap">
                               <input type="text" name="username" placeholder="{{_lang('Username')}}" class="form-control">
                              <span class="input-icon"><i class="fas fa-user"></i></span>
                          </div>                            
                      </div>
                      <div class="form-group"> 
                        <div class="input-wrap">
                               <input type="text" name="email" placeholder="{{_lang('Email')}}" class="form-control">
                              <span class="input-icon"><i class="fas fa-envelope"></i></span>
                          </div>                            
                      </div>                              
                           
                            
                            <div class="form-group">
                              <div class="input-wrap">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <!-- <span class="input-group-text input_grp_icon"> <i class="fas fa-phone"></i></span> -->
                                    <span class="input-group-text input-grp-select">
                                       <select class="form-control" name="phone_code">
                                          @foreach($countries as $cate)
                                            <option value="+{{$cate->phonecode}}">+{{$cate->phonecode}}</option>
                                          @endforeach
                                          </select>
                                    </span>
                                  </div>
                                  <input type="text" name="phone_number" class="form-control" placeholder="{{_lang('Phone Number')}}">
                                  <span class="input-icon"><i class="fas fa-envelope"></i></span>
                                </div>
                              </div>
                             </div>

                            <!--  <div class="form-group"> 
                                <div class="input-wrap">
                                       <input type="password" placeholder="Password" name="password" id="password" class="form-control">
                                      <span class="input-icon"><i class="fas fa-lock"></i></span>
                                  </div>                            
                              </div>
                              <div class="form-group"> 
                                <div class="input-wrap">
                                       <input type="password" placeholder="Re-Enter Password" name="password_confirmation" class="form-control">
                                      <span class="input-icon"><i class="fas fa-lock"></i></span>
                                  </div>                            
                              </div> 
 -->
                               <div class="form-group">
                                  <div class="input-wrap">
                                       <input type="password" placeholder="Password" name="password" id="password" class="form-control">
                                       <span class="input-icon"><i class="fas fa-lock"></i></span>
                                       <a href="javascript:void(0)" class="input-icon right showPassword password-icon" data-id="#password"><i class="fas fa-eye"></i></a>
                                       
                                  </div>                                          
                                </div>

                               <div class="form-group">
                                  <div class="input-wrap">
                                       <input type="password" placeholder="Re-Enter Password" name="password_confirmation" id="password_confirmation" class="form-control">
                                       <span class="input-icon"><i class="fas fa-lock"></i></span>
                                       <a href="javascript:void(0)" class="input-icon right showPassword password-icon" data-id="#password_confirmation"><i class="fas fa-eye"></i></a>
                                       
                                  </div>                                          
                                </div>                             
                              
                           <button id="artistFormBtn" class="main-btn white-btn" type="submit">Register</button>
                      











 
          </div>
            <div class="form_footer text-center">
                    <p class="social-text">Or Sign in with social platforms</p>

                    <div class="social-media">
                      <a href="{{route('auth.social.media','facebook')}}" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                      </a>
                       
                      <a href="{{route('auth.social.media','google')}}" class="social-icon">
                        <i class="fab fa-google"></i>
                      </a>
                      
                    </div>
              </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel pb-0">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <button class="main-btn blue-btn" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="{{url('frontend/images/login.png')}}" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="main-btn blue-btn" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="{{url('frontend/images/Signup.png')}}" class="image" alt="" />
        </div>
      </div>
    </div>

   

<input type="hidden" value="{{route('artist.checkFields')}}" id="authCheckFields">
@endsection
@section('my-js')

 <script src="{{url('adminLte')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script> 
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script> -->
<!-- <script src="{{url('js/home/register.js')}}"></script>
<script src="{{url('js/home/ajax.js')}}"></script> -->
<script type="text/javascript" src="{{url('admin_assets/login.js')}}"></script>

 <script type="text/javascript">
  $('#site-setting-toggle').click(function(){
  $('.site-setting').toggleClass('active');
})

//   $('.showPassword').click(function(){
//       $(this).toggleClass('show-pass');


// });

$("body").on('click','.password-icon',function(){
      var $this = $(this);
      var $div = $this.attr('data-id');
          $this.toggleClass('show-pass');

         $("body").find($div).attr('type') == 'password' ? $("body").find($div).attr("type", "text") :  $("body").find($div).attr("type", "password") ; 
});


  $(window).load(function() {
    $('#loading').hide();
  });
const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector("#formContainer");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});
 </script>
     <script>
// AOS.init();
// input number js


var telInput = $("#phone"),
  errorMsg = $("#error-msg"),
  validMsg = $("#valid-msg");

// initialise plugin
telInput.intlTelInput({

  allowExtensions: true,
  formatOnDisplay: true,
  autoFormat: true,
  autoHideDialCode: true,
  autoPlaceholder: true,
  defaultCountry: "auto",
  ipinfoToken: "yolo",

  nationalMode: false,
  numberType: "MOBILE",
  //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
  preferredCountries: ['sa', 'ae', 'qa','om','bh','kw','ma'],
  preventInvalidNumbers: true,
  separateDialCode: true,
  initialCountry: "auto",
  geoIpLookup: function(callback) {
  $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
    var countryCode = (resp && resp.country) ? resp.country : "";
    callback(countryCode);
  });
},
   utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"
});

var reset = function() {
  telInput.removeClass("error");
  errorMsg.addClass("hide");
  validMsg.addClass("hide");
};

// on blur: validate
telInput.blur(function() {
  reset();
  if ($.trim(telInput.val())) {
    if (telInput.intlTelInput("isValidNumber")) {
      validMsg.removeClass("hide");
    } else {
      telInput.addClass("error");
      errorMsg.removeClass("hide");
    }
  }
});

// on keyup / change flag: reset
telInput.on("keyup change", reset);




      </script>
 
@endsection
