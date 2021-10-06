@extends('home.layouts.layout')
@section('content')

     <!-- Breadcrum code -->
     <div class="breadcrumb-sec"> 
      <div class="container">
         <ol class="breadcrumb lighten-4">
            <li class="breadcrumb-item"><a class="black-text" href="{{url('/')}}">{{_lang('Homepage')}}</a><i class="fa fa-angle-right mx-2" aria-hidden="true"></i></li>                                    
            <li class="breadcrumb-item active">{{_lang('Search Page')}}</li>
        </ol> 
      </div>
    </div>
    <section class="global-cate-search">
  <div class="container">
    <div class="sec-heading text-center">
      <h2>{{_lang('Search Results')}}</h2>
      <span class="sec-heading-icon"><i class="icon-review"></i></span>
    </div>
    <ul class="search-listing">
     @php $sr = 0; @endphp
      @foreach($result as $k => $usr)
      <li data-id="{{$sr++}}">
        <div class="search-result-card">
          <figure class="celeb-img celebrityImage">
            <div class="img-container">
            <img src="<?= url($usr->profile_picture)?>">
          </div>
            <span class="live {{($usr->current_login_datetime >= date('Y-m-d H:i')) ? 'Online' : 'Offline'}}"></span>
          </figure> 
          <figcaption class="search-info-col">
            <div class="search_info_head d-f j-c-s-b a-i-c mb-3">
             <h4 class="sub-heading">{{_lang($usr->name)}}</h4>
             <div class="btn_grp">                
                    
                     @if(!empty($usr->categories)) 
                        @foreach ($usr->categories as $key => $c) 
                       <a href="javascript:void(0);" class="theme_btn min_theme_btn">{{$c->category->label}}</a>
                           
                        @endforeach
                      @endif
                           
                 </div>
                </div>
             <p><?= $usr->about ?></p>
             <div class="btn-wrap mt-3">
              <a href="{{route('celebrity.detail',$usr->id)}}" class="main-btn white-btn">{{_lang('View')}}</a>
            </div>
          </figcaption>  
        </div>
      </li>
      @endforeach
     
    </ul>
    @if($sr == 0)
        <div class="alert alert-warning">{{_lang('No result')}}</div>
    @endif
    {{$result->links()}}
  </div>
</section>
<!-- Download Our App code -->













@endsection