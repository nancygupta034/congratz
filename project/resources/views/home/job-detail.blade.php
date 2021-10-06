@extends('home.layouts.layout')
@section('content')
 
<!--  <section class="map-banner">
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54674.09296072605!2d77.12391571854234!3d31.078288157625085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390578e3e35d6e67%3A0x1f7e7ff6ff9f54b7!2sShimla%2C%20Himachal%20Pradesh!5e0!3m2!1sen!2sin!4v1610726834672!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
     </section> -->
     <!-- Breadcrum code -->
     <div class="breadcrumb-sec"> 
      <div class="container">
         <ol class="breadcrumb lighten-4">
            <li class="breadcrumb-item"><a class="black-text" href="{{url('/')}}">{{_lang('Homepage')}}</a><i class="fa fa-angle-right mx-2" aria-hidden="true"></i></li> 
             <li class="breadcrumb-item"><a class="black-text" href="{{url('/jobs')}}">{{_lang('Our Openings')}}</a><i class="fa fa-angle-right mx-2" aria-hidden="true"></i></li>                                    
            <li class="breadcrumb-item active">{{$jobs->title}}</li>
        </ol> 
      </div>
    </div>
      <!-- About content -->
      <section class="about-content">
        <div class="container">
          <div class="sec-heading text-center" data-aos="fade-left" data-aos-duration="1000">
                 <h2>{{$jobs->title}}</h2>
                 <span class="sec-heading-icon" data-aos="zoom-in" data-aos-duration="2000"><i class="icon-review"></i></span>
                 <div class="heading-eme-block">
                   <ul class="features_listing">
                     

                     <li><h4><span class="ftr-icon"><i class="icon-pin"></i></span> {{$jobs->location}}</h4></li>
                     <li><h4><span class="ftr-icon"><i class="icon-wifi"></i></span> {{_lang($jobs->job_type)}}</h4></li>
                     <li><h4><span class="ftr-icon"><i class="icon-hotel"></i></span> {{_lang($jobs->job_timing)}}</h4></li>
                   </ul>
                 </div>
               </div>
               <div class="">
          <div class="content-card">
            <div class="content-card-block mb-4">
              <h3 class="mini-heading">{{_lang('Description')}}:</h3>
              <p>{{$jobs->description}}</p>
          </div>
          <div class="content-card-block mb-4">
            <h3 class="mini-heading">{{_lang('About the Role')}}:</h3>
            <p>{{$jobs->role}}</p>
          </div>
           
          

          @if(!empty($jobs) && !empty($jobs->other))
          <?php $others = json_decode($jobs->other); ?>
          @foreach($others as $o)
          <div class="content-card-block mb-4">
            <h3 class="mini-heading">{{$o->title}}:</h3>
            <p>{{$o->description}}</p>
          </div>
          @endforeach
          @endif



          <div class="btn-wrap">
            @if(Session::get('locale') == "AR" && $jobs->english != null)
            <a href="{{route('home.job.apply',$jobs->english->id)}}" class="main-btn white-btn mt-3" tabindex="0">{{_lang('Apply to Position')}}</a>
            @else
            <a href="{{route('home.job.apply',$jobs->id)}}" class="main-btn white-btn mt-3" tabindex="0">{{_lang('Apply to Position')}}</a>

            @endif
          </div>
          </div>
        </div>
      </section> 

 
  @endsection
@section('my-js')
<script type="text/javascript">
  
</script>
@endsection