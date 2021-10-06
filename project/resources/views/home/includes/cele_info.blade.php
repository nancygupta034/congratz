<div class="tr_user_info">
       <figure class="tr_profile celebrityImage">
           <div class="img-container">
              <img src="<?= url($user->profile_picture)?>">
                <span class="status_str {{($user->current_login_datetime >= date('Y-m-d H:i')) ? 'Online' : 'Offline'}}">{{($user->current_login_datetime >= date('Y-m-d H:i')) ? 'Online' : 'Offline'}}</span>
              </div>
                         
       </figure>
       <figcaption class="tr_pro_info">
        <div class="btn_grp mb-4"> 
          <span class="theme_btn mr-3">{{($user->current_login_datetime >= date('Y-m-d H:i')) ? 'Online' : 'Offline'}}</span>
          @if(strtotime($user->subscription_end_date) >= strtotime(date('Y-m-d')))
          <span class="theme_btn mr-3">Featured</span> 
          @endif
          @if(date('Y-m-d',strtotime($user->created_at)) == date('Y-m-d'))
           <span class="theme_btn">New</span>
          @endif
        </div>
         <a href="{{route('celebrity.detail',$user->id)}}"><h3 class="tr_name"><?= $user->name ?></h3></a>
         <h4 class="tr_price mb-3">${{$user->charge}}</h4>  
         <div class="btn_grp mt-3"> 
           @if(!empty($user->categories)) 
            @foreach ($user->categories as $key => $c) 
           <a href="javascript:void(0);" class="theme_btn mr-3 black_btn">{{$c->category->label}}</a>
               
            @endforeach
          @endif   
            
                              
        </div> 
         <div class="tr-cate-rating d-f a-i-c">
           
              @if(!empty($user->reviews) && $user->reviews->count() > 0)
              <?php $rating = $user->celebrityRate(); ?>
              <div class="tr_rating">
               <span class="rating-count">{{custom_format($rating['rate'],1)}}</span>
               <span class="rating-star">{!!$rating['stars']!!}</span>
               <a href="javascript:void(0);" class="see-reviews">See all reviews</a>
              </div>
              @endif 
                              
         </div>
          
       </figcaption>
 </div>