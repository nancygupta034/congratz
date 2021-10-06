 <div class="cate-list-info">

         @if($celebritries->count() > 0)
             <div class="cele_info_head" id="getCelebrityInfo">

               
             </div>
             <div class="cele_info_body">
               <div class="featured-celebs-slider slick" id="featured-celebs-slider">
                  @foreach($celebritries->get() as $k => $usr)
                   <div class="slick-item  get-celebrity-detail {{$k == 0 ? 'active slick-center' : ''}}" 
                   data-action="{{route('home.celebrityDetail.celebrity',$usr->id)}}">
                     
                       
                        <div class="celeb-feature-card  text-center">
                          <figure class="celeb-img celebrityImage">
                            <div class="img-container">
                            <img src="<?= url($usr->profile_picture)?>">
                          </div>
                            <span class="live {{($usr->current_login_datetime >= date('Y-m-d H:i')) ? 'Online' : 'Offline'}}"></span>
                          </figure>
                            <div class="celeb-info"><a href="javascript:void(0);"><h3>{{_lang($usr->name)}}</h3></a>
                              
                              <span class="cele-price">${{$usr->charge}}</span>
                             
                            </div>
                        </div>
                       
                   </div>
                   @endforeach
                </div>


             </div>
             <div class="row">
                 <div class="col-3 text-center"><a href="javascript:void(0);" data-action="{{route('home.allCelebrity.celebrity',[$category->slug,'all'])}}" 
                  class="main-btn get-celebrity-type <?= $type == "all" ? 'active' : '' ?>">All <span class="badge badge-dark">{{$category->categoryAllCelebrity()->count()}}</span></a></div>
                 <div class="col-3 text-center"><a href="javascript:void(0);" data-action="{{route('home.allCelebrity.celebrity',[$category->slug,'online'])}}" 
                  class="main-btn get-celebrity-type <?= $type == "online" ? 'active' : '' ?> ">Online <span class="badge badge-dark">{{$category->categoryOnlineCelebrity()->count()}}</span></a></div>
                 <div class="col-3 text-center"><a href="javascript:void(0);" data-action="{{route('home.allCelebrity.celebrity',[$category->slug,'featured'])}}" 
                  class="main-btn get-celebrity-type <?= $type == "featured" ? 'active' : '' ?> ">Featured <span class="badge badge-dark">{{$category->categoryFeaturedCelebrity()->count()}}</span></a></div>
                 <div class="col-3 text-center"><a href="javascript:void(0);" data-action="{{route('home.allCelebrity.celebrity',[$category->slug,'new'])}}" 
                  class="main-btn get-celebrity-type <?= $type == "new" ? 'active' : '' ?> ">New <span class="badge badge-dark">{{$category->categoryNewCelebrity()->count()}}</span></a></div>
             </div>
          @else

            <div class="alert alert-wanring"> No Celebrity found!</div>

                
          @endif
 </div>