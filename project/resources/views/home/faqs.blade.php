@extends('home.layouts.layout')
@section('content')

     <!-- Breadcrum code -->
     <div class="breadcrumb-sec"> 
      <div class="container">
         <ol class="breadcrumb lighten-4">
            <li class="breadcrumb-item"><a class="black-text" href="{{route('home')}}">{{_lang('Homepage')}}</a><i class="fa fa-angle-right mx-2" aria-hidden="true"></i></li> 
            <li class="breadcrumb-item active">{{_lang('FAQs')}}</li>
        </ol> 
      </div>
    </div>
     
      <!-- About content -->
      <section class="faq-page-sec">
        <div class="container">
            <nav class="Joined-tabs-wrap mt-5">
            <ul class="nav nav-tabs tab-btn-slider" id="faqSlider" role="tablist">  
               @foreach($category as $cate)   
               <?php $title = Session::get('locale') == "AR" && $cate->arabic != null ? $cate->arabic->title : $cate->title; ?>       
                 <li>
                  <a class="main-btn nav-item nav-link {{$category_id == $cate->id ? 'active' : ''}} white-btn" 
                     href="{{route('Category.FAQs',$cate->id)}}">{{$title}}</a>
                 </li>
                 @if($category_id == $cate->id)
                    <?php $cate_title = $title; ?>
                 @endif
                @endforeach
            </ul>
         </nav>
               <div class="mt-5 mb-4 text-center">
                 <h3 class="mini-heading">{{$cate_title}}</h3>
           </div>
   <div class="faqs-wrap mb-5">
 <div id="accordion" class="myaccordion">
  @foreach($FAQs as $k => $f)
  <div class="card" data-aos="fade-left">
    <div class="card-header" id="headingOne-{{$f->id}}">
      <h2 class="mb-0">
        <button 
        class="d-flex align-items-center justify-content-between btn btn-link" 
        data-toggle="collapse" 
        data-target="#collapseOne-{{$f->id}}" 
        aria-expanded="true" 
        aria-controls="collapseOne-{{$f->id}}">{{$f->title}}
          <span class="fa-stack fa-sm">
            <i class="fas fa-circle fa-stack-2x"></i>
            <i class="fas fa-{{$k == 0 ? 'minus' : 'plus'}} fa-stack-1x fa-inverse"></i>
          </span>
        </button>
      </h2>
    </div>
    <div id="collapseOne-{{$f->id}}" class="collapse {{$k == 0 ? 'show' : ''}}" aria-labelledby="headingOne-{{$f->id}}" data-parent="#accordion">
      <div class="card-body">
        <div class="faq-des">
          <p>{{$f->answer}}</p>
        </div>
      </div>
    </div>
  </div>
   @endforeach
</div>
    </div> <!-- tab-wrap -->

        </div>
      </section> 


<section class="global-cate-search" style="display: none;">
	<div class="container">
		<div class="sec-heading">
			<h2>Here is the result for your search</h2>
		</div>
		<ul class="search-listing">
			<li>
			  <div class="search-result-card">
          <figure class="celeb-img celebrityImage">
            <div class="img-container">
            <img src="https://congratz.beesmartitsolutions.com/images/settings/1618745384f9Ow0AXogVcAguA0Hbaeuser.jpg">
          </div>
            <span class="live Offline"></span>
          </figure> 
          <figcaption class="search-info-col">
            <div class="search_info_head d-f j-c-s-b a-i-c mb-3">
             <h4 class="sub-heading">John Doe</h4>
             <div class="btn_grp">                
                    <a href="javascript:void(0);" class="theme_btn min_theme_btn">Sports</a>                          
                           
                 </div>
                </div>
             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ut lorem lorem. Morbi eleifend vulputate lacus eu ultricies. Donec ullamcorper, nunc at imperdiet hendrerit, dui urna posuere lectus, in fringilla dui odio commodo turpis. Morbi rhoncus massa a diam posuere porta. Phasellus eleifend purus sed dictum finibus.</p>
             <div class="btn-wrap mt-3">
              <a href="https://congratz.beesmartitsolutions.com/FAQs/8/category" class="main-btn white-btn">View</a>
            </div>
          </figcaption>  
        </div>
			</li>
      <li>
        <div class="search-result-card">
          <figure class="celeb-img celebrityImage">
            <div class="img-container">
            <img src="https://congratz.beesmartitsolutions.com/images/settings/1618745384f9Ow0AXogVcAguA0Hbaeuser.jpg">
          </div>
            <span class="live Offline"></span>
          </figure> 
          <figcaption class="search-info-col">
            <div class="search_info_head d-f j-c-s-b a-i-c mb-3">
             <h4 class="sub-heading">John Doe</h4>
             <div class="btn_grp">                
                    <a href="javascript:void(0);" class="theme_btn min_theme_btn">Sports</a>                          
                           
                 </div>
                </div>
             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ut lorem lorem. Morbi eleifend vulputate lacus eu ultricies. Donec ullamcorper, nunc at imperdiet hendrerit, dui urna posuere lectus, in fringilla dui odio commodo turpis. Morbi rhoncus massa a diam posuere porta. Phasellus eleifend purus sed dictum finibus.</p>
             <div class="btn-wrap mt-3">
              <a href="https://congratz.beesmartitsolutions.com/FAQs/8/category" class="main-btn white-btn">View</a>
            </div>
          </figcaption>  
        </div>
      </li>
      <li>
        <div class="search-result-card">
          <figure class="celeb-img celebrityImage">
            <div class="img-container">
            <img src="https://congratz.beesmartitsolutions.com/images/settings/1618745384f9Ow0AXogVcAguA0Hbaeuser.jpg">
          </div>
            <span class="live Offline"></span>
          </figure> 
          <figcaption class="search-info-col">
            <div class="search_info_head d-f j-c-s-b a-i-c mb-3">
             <h4 class="sub-heading">John Doe</h4>
             <div class="btn_grp">                
                    <a href="javascript:void(0);" class="theme_btn min_theme_btn">Sports</a>                          
                           
                 </div>
                </div>
             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ut lorem lorem. Morbi eleifend vulputate lacus eu ultricies. Donec ullamcorper, nunc at imperdiet hendrerit, dui urna posuere lectus, in fringilla dui odio commodo turpis. Morbi rhoncus massa a diam posuere porta. Phasellus eleifend purus sed dictum finibus.</p>
             <div class="btn-wrap mt-3">
              <a href="https://congratz.beesmartitsolutions.com/FAQs/8/category" class="main-btn white-btn">View</a>
            </div>
          </figcaption>  
        </div>
      </li>
      <li>
        <div class="search-result-card">
          <figure class="celeb-img celebrityImage">
            <div class="img-container">
            <img src="https://congratz.beesmartitsolutions.com/images/settings/1618745384f9Ow0AXogVcAguA0Hbaeuser.jpg">
          </div>
            <span class="live Offline"></span>
          </figure> 
          <figcaption class="search-info-col">
            <div class="search_info_head d-f j-c-s-b a-i-c mb-3">
             <h4 class="sub-heading">John Doe</h4>
             <div class="btn_grp">                
                    <a href="javascript:void(0);" class="theme_btn min_theme_btn">Sports</a>                          
                           
                 </div>
                </div>
             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ut lorem lorem. Morbi eleifend vulputate lacus eu ultricies. Donec ullamcorper, nunc at imperdiet hendrerit, dui urna posuere lectus, in fringilla dui odio commodo turpis. Morbi rhoncus massa a diam posuere porta. Phasellus eleifend purus sed dictum finibus.</p>
             <div class="btn-wrap mt-3">
              <a href="https://congratz.beesmartitsolutions.com/FAQs/8/category" class="main-btn white-btn">View</a>
            </div>
          </figcaption>  
        </div>
      </li>
		</ul>
	</div>
</section>




@endsection