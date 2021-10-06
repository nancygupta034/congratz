


  <!-- footer code -->
<footer class="site-footer" style="background-image: url('<?= url('frontend/images/footer-bg.png')?>');">
  <div class="container">
    <div class="ftr-content">
       <div class="row">
         <div class="col-xl-5 col-lg-4">
           <a href="javascript:void(0);" class="ftr-logo"><img src="{{url(WebsiteSettings('global-settings','logo_footer'))}}"></a>
           <ul class="contact-info-ftr">
             <li><a href="tel:{{WebsiteSettings('global-settings','phone_number')}}" class="cnt-link"><span class="cnt-link-icon"><i class="fas fa-phone"></i></span>{{WebsiteSettings('global-settings','phone_number')}}</a></li>
             <li><a href="mail:{{WebsiteSettings('global-settings','email')}}" class="cnt-link"><span class="cnt-link-icon"><i class="fas fa-envelope"></i></span>{{WebsiteSettings('global-settings','email')}}</a></li>

              <li><a href="#" class="cnt-link"><span class="cnt-link-icon"><i class="fas fa-map-marker-alt"></i></span>{{WebsiteSettings('global-settings','address')}}</a></li>
           </ul>
         </div>
         <div class="col-xl-7 col-lg-8">
          <div class="row">
           <div class="col-xl-4 col-lg-4">   
           <ul class="ftr-link-list mb-3">
              <li><a href="{{route('about.us')}}" class="ftr-link">{{_lang('About Us')}}</a></li>
              <li><a href="{{route('FAQs')}}" class="ftr-link">{{_lang('FAQs')}}</a></li>
              <li><a href="{{route('home.jobs')}}" class="ftr-link">{{_lang('Jobs')}}</a></li>
              <li><a href="{{route('home.contactUs')}}" class="ftr-link">{{_lang('Contact')}}</a></li>
              <?php $CmsPages = \App\Models\CmsPage::where('status',1)->where('parent',0)->get(); ?>
               @foreach($CmsPages as $cms)
               @if(Session::get('locale') == 'AR' && $cms->arabic != null)
                <li><a href="{{url($cms->slug)}}" class="ftr-link">{{$cms->arabic->title}}</a></li>

               @else
                <li><a href="{{url($cms->slug)}}" class="ftr-link">{{$cms->title}}</a></li>
                @endif
               @endforeach
           </ul>
           <a href="{{route('artist.signup')}}" class="log-sign-btn blue-btn">{{_lang('Become Celebrity')}}</a>
           </div>
           <div class="col-xl-8 col-lg-8">
             <div class="contact-input-wrap">
               <h3>{{_lang('Stay Connected')}}</h3>
                <div class="from-group ftr-newsletter">
                  <input type="text" name="" class="form-control" placeholder="{{_lang('Enter Your Email')}}">
                   <button type="button" class="submit-btn">{{_lang('Subscribe')}}</button>
                </div>
                <ul class="social-links mt-4">
                  <li>
                    <a href="{{WebsiteSettings('global-settings','facebook')}}" class="social-link"><span class="icon-facebook"></span></a></li>
                  <li>
                    <a href="{{WebsiteSettings('global-settings','twitter')}}" class="social-link"><span class="icon-twitter"></span></a></li>
                  <li>
                    <a href="{{WebsiteSettings('global-settings','instagram')}}" class="social-link"><span class="icon-linked-in-logo-of-two-letters"></span></a>
                  </li>
                  <li>
                    <a href="{{WebsiteSettings('global-settings','google_plus')}}" class="social-link"><span class="fab fa-snapchat-ghost"></span></a>
                  </li>
<!--                   <li>
                    <a href="{{WebsiteSettings('global-settings','pinterest')}}" class="social-link"><span class="icon-pinterest"></span></a>
                  </li> -->
                </ul>
                  
                </div>
                <div class="ftr-payment-info mt-5">
                  <p>{{_lang('Accept payments for')}}:</p> 
                  <figure class="payment-logo ml-3">
                    <img src="<?= url('frontend/images/mada-logo.png')?>" alt="Mada logo">
                  </figure>
                </div>
             </div>
           </div>
           </div>
         </div>
       </div>
       <div class="copyright-etxt text-center">
        <!-- <p>{{_lang('Design and Develop by')}} <a href="http://beesmartitsolutions.com">{{_lang('Bee Smart It Solutions')}}</a></p> -->
         <p>© {{date('Y')}}, {{_lang('CongratZ. All Rights Reserved')}}</p> 
         <!-- <p>{{_lang('Managed by')}} <a href="http://beesmartitsolutions.com">{{_lang('Bee Smart It Solutions')}}</a></p>  -->
      </div>
      <!-- <div class="copyright-etxt text-center">
      	
      </div> -->
    </div>
  </footer>
  <script type="text/javascript">
    var changeClass = function(name){
       $('#search').removeAttr('class').addClass(name);
    }
  </script>