 
<?php 
$cate = (Session::has('locale') && Session::get('locale') == 'AR') && $category->arabic != null ? $category->arabic : $category; 
$active = 'active';
?>

<div class="tab-pane fade show active" id="TikTok_tab-{{$category->id}}" role="tabpanel" aria-labelledby="TikTok_tab-{{$category->id}}">
<div class="Joined-head">
  <h3 class="tab_heading" data-aos="fade-right"><span class="icon"><i class="icon-tik-tok"></i></span> {{$cate->label}}</h3>
  <a href="{{route('celebrity.listing',$category->slug)}}" class="main-btn white-btn" data-aos="fade-left">{{langText('View All')}}</a>
</div>
<div class="featured-celebs-slider slick tab-slider" id="featured-celebs-slider">
    @foreach($category->artists() as $usr)
     <div class="slick-item">
        <div class="celeb-feature-card text-center">
             <figure class="celeb-img celebrityImage">
                            <div class="img-container">
                            <img src="<?= url($usr->profile_picture)?>">
                          </div>
                            <span class="live {{($usr->current_login_datetime >= date('Y-m-d H:i')) ? 'Online' : 'Offline'}}"></span>
                          </figure>
            <div class="celeb-info"><a href="javascript:void(0);"><h3>{{_lang($usr->name)}}</h3></a>
              <h5 data-status="{{$usr->status}}">
                {{langText('Category')}} - {{$cate->label}}
               <!--  @foreach($usr->myCategories() as $tag)
                <span class="badge">{{$tag->label}}</span>
                @endforeach -->
              </h5>
              <span class="cele-price">${{$usr->charge}}</span>
              <a href="{{route('celebrity.detail',$usr->id)}}" class="main-btn white-btn mt-3">{{langText('Book Now')}}</a>
            </div>
        </div>
     </div>
     @endforeach
</div>
</div>
 