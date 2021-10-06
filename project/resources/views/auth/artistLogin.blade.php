@extends('home.layouts/main-layout')
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="<?= url('frontend/css/login.css')?>">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style type="text/css">
  label.error {
    position: absolute;
    color: red;
    bottom: -16px;
    font-size: 12px;
    right: 0;
}
.form-group { 
    position: relative;
}
  .custom_file_upload {
    position: relative;
    overflow: hidden;
    display: inline-block;
    width: 100%;
}
.upload_image img {
    width: 80%;
    margin: auto;
    text-align: center;
    display: block;
}

.custom_file_upload input[type=file] {
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
    width: 100%;
    height: 100%;
    cursor: pointer;
}
.input-group-prepend .input-group-text:last-child {
    padding: 0px;
    border: none;
}
.input-group-prepend select.form-control {
    height: 50px !important;
    border-radius: 0px;
}
.select2 .selection {
    width: 100%;
    height: 50px;
    display: flex;
    align-items: center;
}
.select2-container--default.select2-container--focus .select2-selection--multiple {
    border: none;
    background: transparent;
}
.select2-container--default .select2-selection--multiple{
  border: none;
  height: 50px;
  width: 100%;
  background: transparent;
  display: flex;
  align-items: center;
}
.select2-container{
  height: 50px;
}
</style>
@endsection
@section('top-main-content')
    @include('home.includes.header') 
<div class="form-banner" style="background-image: url('{{url('/frontend/images/Banner-image.png')}}');"></div>
     
<div class="sign-in-container">
  <form class="sign-in-form" data-action="{{route('artist.login')}}" name="login">
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
                         <input type="password" name="password" placeholder="Enter Password" minlength="6" id="password" class="form-control" autocomplete="current-password">
                         <span class="input-icon"><i class="fas fa-lock"></i></span>
                         <a href="javascript:void(0)" class="input-icon right showPassword password-icon" data-id="#password"><i class="fas fa-eye"></i></a>
                         
                    </div>                                          
                  </div>
                    <div class="form-group">                            
                         <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                              <label class="form-check-label" for="remember">
                                 {{ __('Remember Me') }}
                              </label>
                          </div>                             
                        </div>
                    <div class="btn-wrap text-center">
                     <input type="submit" value="Login" class="main-btn white-btn" >
                   </div> 
                </div>
                <!-- <div class="form_footer text-center mt-4">
                    <p class="social-text">Or Create new account?</p>
                    <div class="btn-wrap text-center mb-4">
                    	<a href="{{route('artist.signup')}}" class="main-btn white-btn"> {{_lang('Become Celebrity')}}</a>
                    </div>                     
                  </div> -->

                   <div class="form_footer text-center mt-4">
                       <p class="social-text">Or Create new account? Click here to <a href="{{route('artist.signup')}}" class="normal-link">{{_lang('Become Celebrity')}}</a></p>
                        <!-- <div class="btn-wrap text-center mb-4">
                         <a href="{{route('artist.login')}}" class="main-btn white-btn"> {{_lang('Login as Celeb')}}</a>
                        </div> -->                           
                    </div>                
                 </form>
              </div>
      

 
<input type="hidden" value="{{route('artist.checkFields')}}" id="authCheckFields">
@endsection
@section('my-js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 <script src="{{url('adminLte')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script> 
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script> -->
<!-- <script src="{{url('js/home/register.js')}}"></script>
<script src="{{url('js/home/ajax.js')}}"></script> -->
<script src="{{url('js/imageShow.js')}}"></script>
<script type="text/javascript" src="{{url('admin_assets/login.js')}}"></script>
 <script src="{{url('js/home/register-steps.js')}}"></script>
 <script type="text/javascript">

  $("body").on('click','.password-icon',function(){
      var $this = $(this);
      var $div = $this.attr('data-id');
          $this.toggleClass('show-pass');

         $("body").find($div).attr('type') == 'password' ? $("body").find($div).attr("type", "text") :  $("body").find($div).attr("type", "password") ; 
});




  $('.select2').select2();
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
<script type="text/javascript">
    $("body").on('change','#country',function(){
         var val = $( this ).val();
         country('#state_name',val,0);
    });

     $("body").on('change','#state_name',function(){
         var val = $( this ).val();
         country('#city_name',0,val);
    });


     


        function country(div,country_id,state_id=0,val=0) {
              
              
                   $.ajax({
                       url : "{{url(route('ajax.countries'))}}",
                       
                       type: 'GET',  // http method
                       data:{
                          country_id : country_id,
                          val : val,
                          state_id : state_id
                       },
                       dataTYPE:'JSON',
                     
                        beforeSend: function() {
                          //   $("body").find('.custom-loading').show();
                          // $this.find('button').attr('disabled','true');
                        },

                       success: function (result) {
                             $(div).html(result);
                       },
                       complete: function() {
                              //   $("body").find('.custom-loading').hide();
                              // $this.find('button').removeAttr('disabled');
                       },
                       error: function (jqXhr, textStatus, errorMessage) {
                             //alert('error');
                       }

                });
   }
</script>
@endsection
