@extends('home.layouts.layout')
 
@section('content')
<!-- <section class="map-banner">
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54674.09296072605!2d77.12391571854234!3d31.078288157625085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390578e3e35d6e67%3A0x1f7e7ff6ff9f54b7!2sShimla%2C%20Himachal%20Pradesh!5e0!3m2!1sen!2sin!4v1610726834672!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
     </section> -->
     <!-- Breadcrum code -->
     <div class="breadcrumb-sec"> 
      <div class="container">
         <ol class="breadcrumb lighten-4">
            <li class="breadcrumb-item"><a class="black-text" href="{{url('/')}}">{{_lang('Homepage')}}</a><i class="fa fa-angle-right mx-2" aria-hidden="true"></i></li>                                    
            <li class="breadcrumb-item active">{{_lang('Job Opening')}}</li>
        </ol> 
      </div>
    </div>
      <!-- About content -->
      <section class="job-opening-sec">
        <div class="container">
          <div class="row">
            @foreach($jobs as $job)
              <?php
                  $j = \Session::get('locale') == "AR" && $job->arabic != null ? $job->arabic : $job;
              ?>
              <div class="col-lg-4">
                <div class="job-opening-card text-center">
                   <h3 class="inn-heading">{{$j->title}}</h3>
                   <ul class="features_listing">
                     <li><h4><span class="ftr-icon"><i class="icon-pin"></i></span> {{$j->location}}</h4></li>
                     <li><h4><span class="ftr-icon"><i class="icon-wifi"></i></span> {{_lang($j->job_type)}}</h4></li>
                     <li><h4><span class="ftr-icon"><i class="icon-hotel"></i></span> {{_lang($j->job_timing)}}</h4></li>
                     <!-- <li><h4><span class="ftr-icon"><i class="icon-hotel"></i></span> Legal</h4></li> -->
                   </ul>
                   <div class="btn-wrap">
                     
                     <a href="{{route('home.job.detail',$job->id)}}" class="main-btn white-btn mt-4" tabindex="0">{{_lang('Apply')}}</a>
                     
                   </div>
                </div>
              </div> 
            @endforeach 
          </div>
        </div>
      </section> 

        @endsection
 
@section('my-js')
<script type="text/javascript">
  
</script>
@endsection