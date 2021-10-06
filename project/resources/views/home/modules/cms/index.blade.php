@extends('home.layouts.layout')
@section('content')
 

  <!-- Breadcrum code -->
     <div class="breadcrumb-sec"> 
      <div class="container">
         <ol class="breadcrumb lighten-4">
            <li class="breadcrumb-item"><a class="black-text" href="{{url('/')}}">{{_lang('Homepage')}}</a><i class="fa fa-angle-right mx-2" aria-hidden="true"></i></li>                                    
            <li class="breadcrumb-item active"><?= $data->title ?></li>
        </ol> 
      </div>
    </div>
  
      <!-- About content -->
      <section class="about-content">
        <div class="container">
          <div class="content-card">
              <?= $data->description ?>
          </div>
        </div>
      </section> 

@endsection