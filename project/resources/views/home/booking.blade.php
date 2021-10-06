@extends('home.layouts.main-layout')
@section('main-content')



          <section class="site-form-layout" style="background-image: url('<?= url('frontend/images/form-bg-image.png')?>');">
            

            <div class="container">
              <div class="form-blocks-wrap">
                <div class="forms-head">
                  <a href="{{route('home')}}" class="logo">
                    <img src="<?= url('frontend/images/logo.png')?>">                    
                  </a>
                </div>
                <ul class="forms-step">
                  <li><a href="javascript" class="form-step">1. Account</a></li>
                  <li class="active"><a href="javascript" class="form-step">2. Request</a></li>
                  <li><a href="javascript" class="form-step">3. Payment</a></li>
                </ul>
                <div class="form-block">
                  <div class="form-block-inn">
                  <figure class="celeb-img profile-pic">
                    <img src="<?= url('frontend/images/Justin-Bieber-img.jpg')?>">

                  </figure>
                  <div class="sec-heading text-center" data-aos="fade-left" data-aos-duration="1000">
                   <h2>New Request for Taylor Swift</h2>
                     <span class="sec-heading-icon" data-aos="zoom-in" data-aos-duration="2000"><i class="icon-review"></i></span>
                  </div>
                  <div class="form-group text-center">
                    <h3 class="mini-heading">Who is this for?</h3>
                    <ul class="cate_listing form_block_th">
                 <li><a href="javascript:void(0);"><span class="cate_icon"><i class="icon-gift-box"></i></span> <h5>Someone else</h5></a></li>
                 <li><a href="javascript:void(0);"><span class="cate_icon"><i class="fas fa-user-circle"></i></span> <h5>Myself</h5></a></li>
               </ul>
                  </div>
                  <div class="form-group">
                    <label class="form-label">To</label>
                    <input type="text" name="" class="form-control" placeholder="To">
                  </div>
                  <h3 class="mini-heading mb-3 text-center mt-4">Select an ocassion</h3>
                  <ul class="cate_listing cate_listing-5">
                 <li><a href="javascript:void(0);"><span class="cate_icon"><i class="icon-karaoke"></i></span> <h5>Singer</h5></a></li>
                 <li><a href="javascript:void(0);"><span class="cate_icon"><i class="icon-Out-line"></i></span> <h5>Comedian</h5></a></li>
                 <li><a href="javascript:void(0);"><span class="cate_icon"><i class="icon-olimpics-games"></i></span> <h5>Athletes</h5></a></li>
                 <li><a href="javascript:void(0);"><span class="cate_icon"><i class="icon-electric-guitar"></i></span> <h5>Singer</h5></a></li>
                 <li><a href="javascript:void(0);"><span class="cate_icon"><i class="icon-electric-guitar"></i></span> <h5>Tiktok</h5></a></li>
                 <li><a href="javascript:void(0);"><span class="cate_icon"><i class="icon-basketball"></i></span> <h5>Basketball</h5></a></li>
                 <li><a href="javascript:void(0);"><span class="cate_icon"><i class="icon-disneyland-paris-castle"></i></span> <h5>Disney</h5></a></li>
                 <li><a href="javascript:void(0);"><span class="cate_icon"><i class="icon-tiger"></i></span> <h5>Tiger King</h5></a></li>
                 <li><a href="javascript:void(0);"><span class="cate_icon"><i class="icon-briefcase"></i></span> <h5>The Office</h5></a></li>
                 <li><a href="javascript:void(0);"><span class="cate_icon"><i class="icon-XMLID_113"></i></span> <h5>Reality Tv</h5></a></li>              
               </ul>
                 <div class="add-occ text-center mt-3">
                   <a href="javascript:void(0);"><span class="cate_icon"><i class="fas fa-plus"></i></span> <h5>Add Occassion</h5></a>
                </div>
                </div>
              </div>
              <div class="form-block">
                <div class="form-block-inn">
                  <div class="sec-heading text-center" data-aos="fade-left" data-aos-duration="1000">
                   <h2>Instructions</h2>
                     <span class="sec-heading-icon" data-aos="zoom-in" data-aos-duration="2000"><i class="icon-review"></i></span>
                  </div>
                  <div class="form-group">
                    <label class="form-label">My instructions fo Taylor swift are</label>
                    <textarea class="form-control" placeholder="Add instructions here..."></textarea>
                  </div>
                  <div class="form-group">
                    <label class="form-label">My Email</label>
                    <input type="text" name="" class="form-control" placeholder="email">
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck1" checked>
                    <label class="custom-control-label" for="customCheck1">Hide this video from Tailor swift's profile</label>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </section>












@endsection