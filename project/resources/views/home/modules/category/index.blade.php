@extends('home.layouts.layout')
@section('content')
 

  <!-- Breadcrum code -->
     <div class="breadcrumb-sec"> 
      <div class="container">
         <ol class="breadcrumb lighten-4">
            <li class="breadcrumb-item"><a class="black-text" href="{{url('/')}}">Homepage</a><i class="fa fa-angle-right mx-2" aria-hidden="true"></i></li>                                    
            <li class="breadcrumb-item active">Categories</li>
        </ol> 
      </div>
    </div>
      <!-- About content -->
      <section class="cate-sec">
        <div class="container">
          <div class="sec-heading text-center" data-aos="fade-left" data-aos-duration="1000">
                 <h2>Choose Category</h2>
                 <span class="sec-heading-icon" data-aos="zoom-in" data-aos-duration="2000"><i class="icon-review"></i></span>
               </div> 
               <ul class="cate_listing">
                 @foreach($category as $c)
                  <?php $cate = (Session::has('locale') && Session::get('locale') == 'AR') && $c->arabic != null ? $c->arabic : $c; ?>
                 <li><a href="{{route('celebrity.listing',$c->slug)}}"><span class="cate_icon">{!!$c->getIcon()!!}</span> <h5>{{$cate->label}}</h5></a></li>
                 @endforeach

                 
               </ul>
        </div>
      </section> 
<!-- Download Our App code -->




@endsection