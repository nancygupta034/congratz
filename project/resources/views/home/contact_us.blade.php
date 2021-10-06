@extends('home.layouts.main-layout')
@include('home.includes.header')
@section('main-content')

<section class="map-banner">
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3428.432755623907!2d76.78875401465505!3d30.762431391252843!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fed7ccefee29b%3A0x3c2ea651b53b3b0!2sHouse%20No%2088%2CSECTOR%202%20B%2C%20Bougainvillea%20Garden%2C%202B%2C%20Sector%202%2C%20Chandigarh%2C%20160011!5e0!3m2!1sen!2sin!4v1618748205122!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
     </section>
     <!-- BANNER CODE END -->
     <section class="contact-us-sec" style="background-image: url('<?= url('frontend/images/Contact-bkg.png')?>');">     	
      <div class="container">
        <div class="sec-heading white-text text-center" data-aos="fade-left" data-aos-duration="1000">
                 <h2>{!!WebsiteSettings('contact-us-page','contact_us_title')!!}</h2>
                <p>{!!WebsiteSettings('contact-us-page','contact_us_tagline')!!}</p>
               </div>

               <div class="contact-contect mt-5">
                 <div class="row">
                   <div class="col-lg-10">
                     <div class="row">
                       <div class="col-lg-6">
                         <ul class="contact-info-list">
                           <li>
                             <a href="javascript:void(0);" class="contact-info-an">
                               <span class="cnt-icon"><i class="icon-phone-call"></i></span>
                               <div class="contact_info">
                                 <h4>{{_lang('Phone')}}</h4>
                                 <p>{{WebsiteSettings('global-settings','phone_number')}}</p>
                               </div>
                             </a> 
                           </li>
                           <li>
                             <a href="javascript:void(0);" class="contact-info-an">
                               <span class="cnt-icon"><i class="icon-email"></i></span>
                               <div class="contact_info">
                                 <h4>{{_lang('Email')}}</h4>
                                 <p>{{WebsiteSettings('global-settings','phone_number')}}</p>
                               </div>
                             </a> 
                           </li>
                            <li>
                             <a href="javascript:void(0);" class="contact-info-an">
                               <span class="cnt-icon"><i class="icon-pin"></i></span>
                               <div class="contact_info">
                                 <h4>{{_lang('Address')}}</h4>
                                 <p>{{WebsiteSettings('global-settings','address')}}</p>
                               </div>
                             </a> 
                           </li>
                         </ul>
                       </div>
                        <div class="col-lg-6">
                           <div class="form_container">
                            <form class="contact-form">
                              <div class="form_head text-center mb-4"><h3>{{_lang('Send Message')}}</h3></div>
                               <div class="form_body">
                                 <div class="form-group">
                                   <label class="form-label">{{_lang('Full Name')}}</label>
                                   <div class="input-wrap">
                                     <input type="text" name="" class="form-control" placeholder="Full Name">
                                     <span class="input-icon"><i class="fas fa-user"></i></span>
                                   </div>
                                 </div>
                                 <div class="form-group">
                                   <label class="form-label">{{_lang('Email')}}</label>
                                   <div class="input-wrap">
                                     <input type="text" name="" class="form-control" placeholder="Email">
                                     <span class="input-icon"><i class="fas fa-envelope"></i></span>
                                   </div>
                                 </div>
                                 <div class="form-group">
                                   <label class="form-label">{{_lang('Phone Number')}}</label>
                                   <div class="input-wrap">
                                    <input id="phone" type="tel" class="form-control">
                                    <div class="number-error">
                                      <span id="valid-msg" class="hide">{{_lang('Valid')}}</span>
                                       <span id="error-msg" class="hide">{{_lang('Invalid number')}}</span>
                                    </div>
                                   </div>
                                 </div>
                                 <div class="form-group">
                                   <label class="form-label">{{_lang('Message')}}</label>
                                   <div class="input-wrap">
                                     <textarea class="form-control" placeholder="{{_lang('Your message here')}}..."></textarea>                                     
                                   </div>
                                 </div>
                                 <div class="btn-wrap text-center">
                                   <button type="submit" class="main-btn white-btn">{{_lang('Submit')}}</button>
                                 </div>
                               </div>
                            </form>
                           </div>
                        </div>
                     </div>
                   </div>
                 </div>
               </div>
      </div>
       
     </section>



@include('home.includes.downloadApp')
@endsection
@include('home.includes.footer')
@section('my-js')
<script type="text/javascript">
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