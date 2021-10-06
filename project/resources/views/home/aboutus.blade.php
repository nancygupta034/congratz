@extends('home.layouts.layout')
@section('content')

     <!-- Breadcrum code -->
     <div class="breadcrumb-sec"> 
      <div class="container">
         <ol class="breadcrumb lighten-4">
            <li class="breadcrumb-item"><a class="black-text" href="{{url('/')}}">{{_lang('Homepage')}}</a><i class="fa fa-angle-right mx-2" aria-hidden="true"></i></li>                                    
            <li class="breadcrumb-item active">{{_lang('About Us')}}</li>
        </ol> 
      </div>
    </div>
      <!-- About content -->
      <section class="about-content">
        <div class="container">
          <div class="content-card">
            <?= WebsiteSettings('about-us-page','about_us_page') ?>
          </div>
        </div>
      </section> 
<!-- Download Our App code -->













@endsection