
<!-- Download Our App code -->
<section class="download-app-sec" style="background-image: url('<?= url('frontend/images/App-section.png') ?>');">
    <div class="container">
       <div class="row">
         <div class="col-lg-5">
           <div class="app-store-content" data-aos="fade-right" data-duration="500">
              <div class="sec-heading">
                 <h2>{!!WebsiteSettings('homepage','download_title')!!} </h2>
               </div>
               <p>{!!WebsiteSettings('homepage','download_description')!!} </p>
               <div class="app-store-buttons mt-5">
                 <a href="{{WebsiteSettings('homepage','download_google_play_link')}}" class="app-store-link mr-3"><img src="<?= url(WebsiteSettings('homepage','download_google_play')) ?>"></a> 
                 <a href="{{WebsiteSettings('homepage','download_apple_store_link')}}" class="app-store-link"><img src="<?= url(WebsiteSettings('homepage','download_apple_store')) ?>"></a>
               </div>               
           </div>
         </div>
         <div class="col-lg-7">
           <figure class="app-info-img" data-aos="slide-up" data-aos-duration="1000">
             <img src="<?= url(WebsiteSettings('homepage','download_main_image')) ?>">
           </figure>
         </div>
       </div>
    </div>
  </section>