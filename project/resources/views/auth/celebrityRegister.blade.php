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
 




 <?php $countries = \App\Models\Country::where('phonecode','>',0)->groupBy('phonecode')->orderBy('phonecode','ASC')->get(); ?>

<div class="form-banner" style="background-image: url('https://congratz.beesmartitsolutions.com/frontend/images/Banner-image.png');"></div>
     
 
     <div class="multi-step-container"  >
          <form 
          id="sign_escort"
          name="sign_escort" 
          action="{{route('register.ajax')}}" 
          data-limit="{{WebsiteSettings('global-settings','max_day_delivery_limit')}}" 
          data-action="{{route('artist.checkFields')}}" 
          class="sign-up-form">
            <div class="row-wrap">
                <div class="row">
                  <div class="multi_step_form">
                    <div id="msform">
                    <ul id="progressbar">
                      <li class="active"><span class="step-icon"><i class="fas fa-user"></i></span><h4>Account Detail</h4></li>  
                      <li id="barStep-2"><span class="step-icon"><i class="fas fa-map-marker-alt"></i></span> <h4>Location</h4></li> 
                      <li id="barStep-3"><span class="step-icon"><i class="fas fa-address-card"></i></span> <h4>About</h4></li> 
                      <li id="barStep-4"><span class="step-icon"><i class="fas fa-search-location"></i></span> <h4>Where can we find you?</h4></li> 
                      <li id="barStep-5"><span class="step-icon"><i class="fas fa-money-bill-alt"></i></span> <h4>Service Detail</h4></li> 
               
                    </ul>
                  </div>
                  </div>

                           @csrf <input type="hidden" id="registerPopupSteps" value="1">
                     <div class="messages"></div>
                           <div class="tab col-12" id="stepComplete-1" style="display: block;">
                                    <h3 class="mb-4 text-center">Account Detail</h3>
                                      <div class="row">
                                          <div class="col-md-12">
                                            <div class="form-group">
                                             <div class="input-wrap">
                                               <?php $categories = \App\Models\Category::where('status',1)->where('lang',Session::get('locale'))->orderBy('label','ASC')->get(); ?>
                                                   <select class="form-control select2" name="category[]" multiple="" required="" placeholder="Choose Categories">
                                                    <option value="" disabled="">{{_lang('choose Categories')}}</option>
                                                    @foreach($categories as $cate)
                                                            <option value="{{$cate->id}}">{{$cate->label}}</option>
                                                    @endforeach
                                                   </select>
                                              <span class="input-icon"><i class="fas fa-clipboard-list"></i></span>
                                             </div>                                          
                                           </div>
                                         </div>
                                         <div class="col-lg-6">
                                             <div class="form-group">
                                                <div class="input-wrap">
                                                    <input type="text" class="form-control" name="name" placeholder="{{_lang('Full name')}}">
                                                    <span class="input-icon"><i class="fas fa-user"></i></span>
                                                </div>                                          
                                              </div>
                                            </div>
                                            <div class="col-lg-6">
                                              <div class="form-group">
                                                <div class="input-wrap">
                                                     <input type="text" class="form-control" name="username" placeholder="{{_lang('Username')}}">
                                                    <span class="input-icon"><i class="fas fa-user"></i></span>
                                                </div>                                          
                                              </div>
                                            </div>
                                            <div class="col-lg-6">
                                              <div class="form-group">
                                                <div class="input-wrap">
                                                    <input type="text" class="form-control" name="email" placeholder="{{_lang('Email')}}">
                                                    <span class="input-icon"><i class="fas fa-envelope"></i></span>
                                                </div>                                          
                                              </div>
                                            </div>
                                            <div class="col-lg-6">
                                              <div class="form-group">
                                                <div class="input-wrap">
                                                    <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                         <select class="form-control select2" name="phone_code">
                                                            @foreach($countries as $cate)
                                                              <option value="+{{$cate->phonecode}}">+{{$cate->phonecode}}</option>
                                                            @endforeach
                                                            </select>
                                                      </span>
                                                    </div>
                                                    <input type="text" name="phone_number" class="form-control phone-input" placeholder="{{_lang('Phone Number')}}">
                                                    <span class="input-icon"><i class="fas fa-phone"></i></span>
                                                  </div>
                                                </div>                                          
                                              </div>
                                            </div>
                                            <div class="col-lg-6">
                                              <div class="form-group">
                                                  <div class="input-wrap">
                                                       <input type="password" placeholder="Password" name="password" id="password" class="form-control">
                                                       <span class="input-icon"><i class="fas fa-lock"></i></span>
                                                       <a href="javascript:void(0)" class="input-icon right showPassword password-icon" data-id="#password"><i class="fas fa-eye"></i></a>
                                                       
                                                  </div>                                          
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                              <div class="form-group">
                                                  <div class="input-wrap">
                                                       <input type="password" placeholder="Re-Enter Password" name="password_confirmation" id="password_confirmation" class="form-control">
                                                       <span class="input-icon"><i class="fas fa-lock"></i></span>
                                                       <a href="javascript:void(0)" class="input-icon right showPassword password-icon" data-id="#password_confirmation"><i class="fas fa-eye"></i></a>
                                                       
                                                  </div>                                          
                                                </div>                             
                              
                                            
                                        </div>
                                     </div>
                                 </div>

              <div class="tab col-12" id="stepComplete-2" style="display: none;">
                <h3 class="mb-4 text-center">Location?</h3>
                  <div class="row">
                      
                                <div class="col-12">
                                        <div class="form-group">
                                          <div class="input-wrap">
                                              <input type="text" class="form-control" name="address" class="form-control" placeholder="{{_lang('address')}}">
                                              <span class="input-icon"><i class="fas fa-map-marker-alt"></i></span>
                                          </div>                                          
                                        </div>
                                </div>
                               

                              <div class="col-6"> 
                              <div class="form-group">
                                          <div class="input-wrap">
                                              <select name="country" class="form-control" id="country">
                                              <option value="">{{_lang('Country')}}</option>
                                              @foreach($countries as $cate)
                                                      <option value="{{$cate->id}}" >{{$cate->name}}</option>
                                              @endforeach
                                           </select>
                                              <span class="input-icon"><i class="fas fa-flag"></i></span>
                                          </div>                                          
                                        </div> 
                                  
                              </div>

                              <div class="col-6">  
                              <div class="form-group">
                                          <div class="input-wrap">
                                              <select name="state_name" class="form-control" id="state_name">
                                              <option value="">{{_lang('State')}}</option>
                                            </select>
                                              <span class="input-icon"><i class="fas fa-door-open"></i></span>
                                          </div>                                          
                                        </div> 
                              
                              </div>
                              <div class="col-6"> 
                               <div class="form-group">
                                          <div class="input-wrap">
                                              <select name="city_name" class="form-control" id="city_name">
                                              <option value="">{{_lang('City')}}</option>
                                            </select>
                                              <span class="input-icon"><i class="fas fa-door-open"></i></span>
                                          </div>                                          
                                        </div>   
                                 
                              </div>
                          
                               <div class="col-6">
                                 <div class="form-group">
                                          <div class="input-wrap">
                                            <input type="text" class="form-control" name="pincode" class="form-control" placeholder="{{_lang('Pincode')}}">
                                              <span class="input-icon"><i class="fas fa-map-pin"></i></span>
                                          </div>                                          
                                        </div>
                                   
                               </div>
                         </div>
           </div>


             <div class="tab col-12" id="stepComplete-3" style="display: none;">
                <h3 class="mb-4 text-center">About</h3>
                  <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                               <div class="custom_file_upload upload_image">
                               <input type="file" name="profile_picture" onchange="ValidateSingleInput(this, 'image_src2')" aria-invalid="true">
                               <label id="profile_picture-error" class="error" for="profile_picture"> </label>
                               <img class="rounded" id="image_src2" src="{{url('/images/upload_cover.png')}}" alt="">
                           </div>
                         </div>
                      </div>
                       <div class="col-6">
                        <div class="form-group">
                               <div class="custom_file_upload upload_image">
                               <input type="file" name="cover_picture" onchange="ValidateSingleInput(this, 'image_src3')" aria-invalid="true">
                               <label id="cover_picture-error" class="error" for="cover_picture"> </label>
                               <img class="rounded" id="image_src3" src="{{url('/images/upload_cover.png')}}" alt="">
                           </div>
                         </div>
                      </div>
                                <div class="col-6">
                                     <div class="form-group text-left">
                                       <label class="form-label">{{_lang('Gender')}}</label> 
                                       <div class="radio-grp d-f">                       
                                       <div class="custom-control custom-radio text-left mr-3">
                                          <input type="radio" class="custom-control-input" name="gender" value="male" id="male" checked="">
                                          <label class="custom-control-label" for="male">{{_lang('Male')}}</label>
                                        </div>
                                      
                                       <div class="custom-control custom-radio text-left mr-3">
                                          <input type="radio" name="gender" class="custom-control-input" value="female" id="female">
                                          <label class="custom-control-label" for="female">{{_lang('Female')}}</label>
                                        </div>
                                      
                                       <div class="custom-control custom-radio text-left">
                                          <input type="radio" name="gender" class="custom-control-input" value="other" id="other">
                                          <label class="custom-control-label" for="other">{{_lang('Other')}}</label>
                                        </div>
                                      </div>
                                      
                                       
                                    </div>
                                </div>
                                <div class="col-6">
                                        <div class="form-group">
                                          <div class="input-wrap mt-2">
                                           <input type="date" class="form-control" name="dob" placeholder="{{_lang('Date Of Birth')}}">
                                              <span class="input-icon"><i class="fas fa-birthday-cake"></i></span>
                                          </div>                                         
                                        </div>
                                </div>
                               <div class="col-12">
                                <div class="form-group">                                
                              
                                      <textarea name="about" class="form-control"  placeholder="{{_lang('About You')}}"></textarea>
                                 
                                </div>
                               </div>
                            
                         </div>
                       </div>

                       <div class="tab col-12" id="stepComplete-4" style="display: none;">
                                 <h3  class="text-center mb-4">Where can We find you?</h3>
                                 <div class="row">
                                   <div class="col-6">
                                        <div class="form-group">
                                          <div class="input-wrap">                                                                  
                                             <input type="text" name="where_can_we_find" class="form-control" placeholder="{{_lang('Where can We find you?')}}">
                                             <span class="input-icon"><i class="fas fa-search-location"></i></span>
                                           </div>
                                        </div>
                                   </div>
                                 <div class="col-6">
                                  <div class="form-group">
                                          <div class="input-wrap">                                                                  
                                             <input type="text" class="form-control" name="profile_id" placeholder="{{_lang('Profile ID?')}}">
                                             <span class="input-icon"><i class="fas fa-id-badge"></i></span>
                                           </div>
                                        </div>                             
                                       
                                </div>
                                <div class="col-12">
                                  <div class="form-group">
                                          <div class="input-wrap">                                                                  
                                             <input type="text" name="followers" class="form-control" placeholder="{{_lang('How many followers?')}}">
                                             <span class="input-icon"><i class="fas fa-user-friends"></i>   </span>
                                           </div>
                                        </div>
                                     
                                </div>
                            </div>
                       </div>

                     
                       <div class="tab col-12" id="stepComplete-5" style="display: none;">
                <h3 class="text-center mb-4">How much do you charge?</h3>
                  <div class="row">
                                <div class="col-6">          

                                      <div class="form-group">
                                        <div class="input-wrap">                                                                  
                                            <input type="text" name="delivery_within" class="form-control" placeholder="{{_lang('Video Delivery Within ?')}}">
                                             <span class="input-icon"><i class="fas fa-truck"></i>   </span>
                                           </div>
                                          
                                     </div>
                                </div>
                                <div class="col-6">
                                  <div class="form-group">
                                        <div class="input-wrap">                                                                  
                                            <input type="text" name="charge" class="form-control" placeholder="{{_lang('Charge for Video ?')}}">
                                             <span class="input-icon"><i class="fas fa-money-bill-alt"></i>  </span>
                                           </div>
                                          
                                     </div>
                                    <!--  <div class="form-group">
                                        <div class="input-wrap">                                                                  
                                             <input type="text" name="charge" placeholder="{{_lang('Charge for Video ?')}}">
                                             <span class="input-icon"><i class="fas fa-money-bill-alt"></i>  </span>
                                           </div>
                                          
                                     </div> -->
                                      
                                </div>
                    
                    <div class="col-12">
                      <div class="custom-control custom-checkbox">
                          <input type="checkbox" name="i_agree" value="1" class="custom-control-input" id="customCheck1">
                          <label class="custom-control-label" for="customCheck1">I agree</label>
                        </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
            <div class="row">
                  <div class="col-12 mt-4 w-100 text-center">
                    <button type="button" class="main-btn white-btn mr-3" id="lastStep" style="display: none;">Previous</button>
                    <button type="submit" class="main-btn white-btn">Next</button>

                    <div class="messages"></div>
                    <div class="form_footer text-center mt-4">
                            <p class="social-text">Are you existing Celebrity? Click here to <a href="{{route('artist.login')}}" class="normal-link">login </a></p>

                 <!-- <div class="btn-wrap text-center mb-4">
                        <a href="{{route('artist.login')}}" class="main-btn white-btn"> {{_lang('Login as Celeb')}}</a>
                      </div> -->
                       
                           
                          </div>


                     
                  </div>
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
