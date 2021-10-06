@extends('artists.layouts.layout')
@section('content')

<div class="content-block">
                <div class="main-heading mb-5">
                   <h2>Profile Settings</h2>
                </div>
             <div class="card-block mb-5">
               <div class="form-group">
                   <div class="switch-holder">
                    <div class="switch-label">
                        <i class="fas fa-moon"></i><span>Dark Mode</span>
                    </div>
                    <div class="switch-toggle" data-children-count="1">
                         
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


               

                <div class="profile-setting_card mb-4">
                  <form id="changePassword" data-action="{{route('user.changePassword')}}">
                    @csrf
                <div class="card-inn-heading mb-4"><h3>Change Password</h3></div>
                <div class="form-group">
                   <label class="inline-label mb-2">Current Password</label>
                   <div class="input_wrap">
                    <span class="input-left-icon"><i class="fas fa-lock"></i></span>
                    <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Password">
                    <div class="input-right-icon">
                     <span toggle="#old_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                   <label class="inline-label mb-2">New Password</label>
                   <div class="input_wrap">
                    <span class="input-left-icon"><i class="fas fa-lock"></i></span>
                    <input type="password" name="new_password" id="password" class="form-control" placeholder="New Password">
                    <div class="input-right-icon">
                      <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                   <label class="inline-label mb-2">Confirm Password</label>
                   <div class="input_wrap">
                    <span class="input-left-icon"><i class="fas fa-lock"></i></span>
                    <input type="password" name="password_confirmation" id="confirm_password" class="form-control" placeholder="Confirm Password">
                    <div class="input-right-icon">
                      <span toggle="#confirm_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                  </div>
                </div>
                <button type="button" id="changePasswordBtn" class="main-btn2 mt-5"> Change Password</button>
               </form>
              </form>
              </div>
            
              <div class="profile-setting_card">
                <div class="card-inn-heading mb-4"><h3>Delete Account</h3></div>
                 <div class="form-group d-f j-c-s-b a-i-c">
                   <label class="inline-label">Temperory disable your account</label>
                   <a href="javascript:void(0);" class="main-btn ml-2 mini-btn color-dark"> Disable Account</a>
                 </div>
                 <div class="form-group d-f j-c-s-b a-i-c">
                   <label class="inline-label">Permanently delete your account</label>
                   <a href="javascript:void(0);" class="main-btn ml-2 mini-btn color-red"> Delete Account</a>
                 </div>
               </div>
                

                
              </div>
            </div>
 
@endsection
@section('js')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script type="text/javascript">

  $('#changePassword').validate({
 onfocusout: function (valueToBeTested) {
             $(valueToBeTested).valid();
 },
 highlight: function(element) {
             $('element').removeClass("error");
 },
 rules: {
     'new_password': {
        required: true,
        minlength: 6,
        maxlength: 12,
      },
      'old_password': {
        required: true,
        minlength: 6,
        maxlength: 12,
      },
      'password_confirmation': {
        equalTo: "#password",
        required:true,
        minlength: 6,
        maxlength: 12,
      },
      valueToBeTested: {
             required: true,
      }
 }, 
 });
  
  $("body").on('click','#changePasswordBtn',function(e){
      e.preventDefault();
      $this = $('#changePassword');
      if($this.valid()){
           $.ajax({
             url : $this.data('action'),
             type: 'POST',  // http method
             data:$this.serialize(),
             dataTYPE:'JSON',
             beforeSend: function() {
                $("body").find('.custom-loading').show();
             },
             success: function (result) {
                $("body").find('.custom-loading').hide();
                swal({
                    title: '',
                    text: result.message,
                    showConfirmButton: true,
                    confirmButtonText: 'Ok!',
                    closeOnConfirm: true,
                });
                if(result.status == 1){
                  $this[0].reset();
                }
             },
          });
      }

  });


$(".toggle-password").click(function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    console.log("input => ", input);
    if (input.attr("type") == "password") {
    input.attr("type", "text");
    } else {
    input.attr("type", "password");
    }
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




$("body").on('change','#langSwitch',function(e){
  //e.preventDefault(); 
  var $url = $(this).is(":checked") ? $(this).attr('data-AR') : $(this).attr('data-EN');
  Global_Settings($url);
});


</script>
@endsection 