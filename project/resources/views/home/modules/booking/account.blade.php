@extends('home.layouts.main-layout')
@section('main-content')
<style>
  .layout-container{
    margin-bottom: 0px;
  }
  .site-form-layout {
    padding: 50px 0px;
}
</style>

          <section class="site-form-layout" style="background-image: url('<?= url('frontend/images/form-bg-image.png')?>');">
            <a href="{{route('celebrity.detail',$user->id)}}" class="back-btn-icon"><i class="fi-br-angle-left"></i></a>

            <div class="container">
              <div class="form-blocks-wrap">
                <div class="forms-head">
                  <a href="{{route('home')}}" class="logo">
                    <img src="<?= url('frontend/images/logo.png')?>">                    
                  </a>
                </div>
                <ul class="forms-step">
                  <li class="active"><a href="javascript:void(0);" class="form-step">1. Account</a></li>
                  <li><a href="javascript:void(0);" class="form-step">2. Request</a></li>
                  <li><a href="javascript:void(0);" class="form-step">3. Payment</a></li>
                </ul>
                <div class="form-block" style="min-height: 700px;">

                        <div class="sec-heading text-center" data-aos="fade-left" data-aos-duration="1000">
                          @if(Auth::check() && Auth::user()->role == "user")
                             <h2>Hello {{Auth::user()->name}}</h2>
                              <div class="add-occ text-center mt-3">
                             <a href="{{route('user.book',$user->slug)}}" class="main-btn">Continue</a>
                           </div>
                          @else
                             <h2>Please login customer account</h2>
                              <div class="add-occ text-center mt-3">
                               
                             <a href="{{url('login')}}?redirect_link={{route('user.book',$user->slug)}}" class="main-btn">Login Or Register</a>
                           </div>
                          @endif
                       </div>
                  
                </div>
              </div>
            </div>
            
          </section>












@endsection