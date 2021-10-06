@extends('artists.layouts.layout')
@section('content')

<!-- profile_content -->
 <div class="profile_content">
              <div class="profile_banner">
               <figure class="profile_banner_image">
                 <img src="{{!empty(Auth::user()->cover_picture) ? url(Auth::user()->cover_picture) : url('/frontend/images/Justin-Bieber-img.jpg')}}">
               </figure>
              </div>
              <!-- container-fluid -->
             <div class="container-fluid">
               <div class="profile_head">                
                <div class="row">
                  <div class="col-lg-6">
                     <figure class="profile_logo">
                         <img id="artist_profile_photo" src="{{!empty(Auth::user()->profile_picture) ? url(Auth::user()->profile_picture) : url('/frontend/images/Justin-Bieber-img.jpg')}}">
                    </figure>
                     <figcaption class="profile-info">
                       <h3 class="profile_name">{{_lang(Auth::user()->name)}}</h3>
                       <p class="profile_id">{{_lang(Auth::user()->username)}}</p>
                        
                     </figcaption>
                  </div>
                  <div class="col-lg-6 text-right">
                    <div class="profile_head_info">
                    <div class=" btn-wrap btn-wraped d-f j-c-f-e">
                     <!--  <a href="javascript:void(0);" class="main-btn-1">Remove</a>
                      <a href="javascript:void(0);" class="main-btn-1 mx-2">Edit</a> -->
                      <ul class="social-links">
                                     @if(!empty(Auth::user()->facebook_url))
                                      <li>
                                        <a href="{{Auth::user()->facebook_url}}" target="_blank" class="social-link"><span class="icon-facebook"></span></a></li>
                                       
                                      @endif
                                       @if(!empty(Auth::user()->twitter_url))
                                      <li>
                                        <a href="{{Auth::user()->twitter_url}}" target="_blank" class="social-link"><span class="icon-twitter"></span></a></li>
                                      
                                      @endif
                                       @if(!empty(Auth::user()->youtube_url))
                                      <li>
                                        <a href="{{Auth::user()->youtube_url}}" target="_blank" class="social-link"><i class="fab fa-youtube"></i></a></li>
                                     
                                      @endif
                                       @if(!empty(Auth::user()->insta_url))
                                      <li>
                                        <a href="{{Auth::user()->insta_url}}" target="_blank" class="social-link"><span class="icon-pinterest"></span></a></li>
                                       
                                      @endif
                                       
                                    </ul>
                   </div>
                    <div class="btn-wrap mt-4">
                      <a href="{{route('artist.profile.edit')}}" class="main-btn2 mr-2">Edit My Profile</a>
                   </div>
                   </div>
                  </div>
                </div>
              </div> 

              <!-- profile information -->
              <div class="profile_information mt-5">
                 <div class="row px-4 eq-ht-box">
                   <div class="col-lg-4">
                     <div class="card-block">
                      <div class="card-head">
                        <h3 class="profile_info_heading mb-2">Bio:</h3>
                      </div>
                       <div class="card-body p-0">
                         <p class="profile_info_content">{{Auth::user()->about}}</p>
                       </div>
                     </div>
                   </div>

                    <div class="col-lg-4">
                     <div class="card-block">
                      <div class="card-head">
                        <h3 class="profile_info_heading mb-2">Country:</h3>
                      </div>
                       <div class="card-body p-0">
                        <figure class="country-flag">
                          @if(!empty(Auth::user()->country))
                            @if(!empty(Auth::user()->country->image))
                            <img src="{{url(Auth::user()->country->image)}}" alt="flag.jpg" class="rounded">
                            @else
                                {{Auth::user()->country->name}}
                            @endif
                          
                          @endif
                        </figure>
                       </div>
                     </div>
                   </div>

                    <div class="col-lg-4">
                     <div class="card-block">
                      <div class="card-head">
                        <h3 class="profile_info_heading mb-2">Wallet:</h3>
                      </div>
                       <div class="card-body p-0">
                        <h2 class="profile_price"><span class="profile_currency mr-2">SAR</span>2000</h2>
                       </div>
                       <div class="card-footer bg-transparent border-0 mt-2">
                         <div class="link-icon">
                           <i class="fas fa-external-link-alt"></i>
                         </div>
                       </div>
                     </div>
                   </div>

                 </div>

                 <div class="row my-2 px-4 eq-ht-box">
                   <div class="col-lg-3">
                     <div class="card-block">
                       <a href="" class="w-100">
                        <div class="profile-detail w-100 text-center">
                         <i class="fas fa-envelope"></i>
                         <label class="detail_name d-block">Email:</label>
                         <span class="detail-info">{{Auth::user()->email}}</span>
                       </div>
                       </a>
                     </div>
                   </div>

                    <div class="col-lg-3">
                     <div class="card-block">
                       <a href="" class="w-100">
                        <div class="profile-detail w-100 text-center">
                        <i class="fas fa-phone"></i>
                         <label class="detail_name d-block">Phone:</label>
                         <span class="detail-info">{{Auth::user()->phone_code}} {{Auth::user()->phone_number}}</span>
                       </div>
                       </a>
                     </div>
                   </div>

                    <div class="col-lg-3">
                     <div class="card-block">
                       <a href="" class="w-100">
                        <div class="profile-detail w-100 text-center">
                         <i class="fas fa-birthday-cake"></i>
                         <label class="detail_name d-block">Birthday:</label>
                         <span class="detail-info">{{date('d M Y',strtotime(Auth::user()->dob))}}</span>
                       </div>
                       </a>
                     </div>
                   </div>

                    <div class="col-lg-3">
                     <div class="card-block">
                       <a href="" class="w-100">
                        <div class="profile-detail w-100 text-center">
                        <i class="fas fa-venus-mars"></i>
                         <label class="detail_name d-block">Gender:</label>
                         <span class="detail-info">{{Auth::user()->gender}}</span>
                       </div>
                       </a>
                     </div>
                   </div>

                    <div class="col-lg-3">
                     <div class="card-block">
                       <a href="" class="w-100">
                        <div class="profile-detail w-100 text-center">
                        <i class="fas fa-user"></i>
                         <label class="detail_name d-block">Age:</label>
                         <span class="detail-info">30</span>
                       </div>
                       </a>
                     </div>
                   </div>
 
                    <div class="col-lg-3">
                     <div class="card-block">
                       <a href="" class="w-100">
                        <div class="profile-detail w-100 text-center">
                        <i class="fas fa-user"></i>
                         <label class="detail_name d-block">Delivery Within:</label>
                         <span class="detail-info">{{Auth::user()->delivery_within}} Days</span>
                       </div>
                       </a>
                     </div>
                   </div>
 
                    <div class="col-lg-3">
                     <div class="card-block">
                       <a href="" class="w-100">
                        <div class="profile-detail w-100 text-center">
                        <i class="fas fa-user"></i>
                         <label class="detail_name d-block">Charge:</label>
                         <span class="detail-info">{{Auth::user()->charge}}</span>
                       </div>
                       </a>
                     </div>
                   </div>

                        
                    <div class="col-lg-3">
                     <div class="card-block">
                       <a href="" class="w-100">
                        <div class="profile-detail w-100 text-center">
                        <i class="fas fa-user"></i>
                         <label class="detail_name d-block">Where We can find you?:</label>
                         <span class="detail-info">{{Auth::user()->where_can_we_find}}</span>
                       </div>
                       </a>
                     </div>
                   </div>

                        
                        
                    <div class="col-lg-3">
                     <div class="card-block">
                       <a href="" class="w-100">
                        <div class="profile-detail w-100 text-center">
                        <i class="fas fa-user"></i>
                         <label class="detail_name d-block">Profile ID:</label>
                         <span class="detail-info">{{Auth::user()->profile_id}}</span>
                       </div>
                       </a>
                     </div>
                   </div>

                        
                    <div class="col-lg-3">
                     <div class="card-block">
                       <a href="" class="w-100">
                        <div class="profile-detail w-100 text-center">
                        <i class="fas fa-user"></i>
                         <label class="detail_name d-block">Followers:</label>
                         <span class="detail-info">{{Auth::user()->followers}}</span>
                       </div>
                       </a>
                     </div>
                   </div>
 

                    <div class="col-lg-3">
                     <div class="card-block">
                       <a href="" class="w-100">
                        <div class="profile-detail w-100 text-center">
                        <i class="fas fa-map-marker-alt"></i>
                         <label class="detail_name d-block">Address:</label>
                         <span class="detail-info">{{Auth::user()->address}}, 
                          {{!empty(Auth::user()->country) ? Auth::user()->country->name : 'NA'}}, 
                          {{!empty(Auth::user()->state) ? Auth::user()->state->name : 'NA'}}, 
                          {{!empty(Auth::user()->city) ? Auth::user()->city->name : 'NA'}} ({{Auth::user()->pincode}})
                        </span>
                       </div>
                       </a>
                     </div>
                  </div>
                 </div>

                     <h3 class="profile_info_heading mb-4 px-4">Categories:</h3>
                  <div class="row my-2 px-4 eq-ht-box">

                                    @foreach(Auth::user()->myCategories() as $tag)
                                       
                                        <div class="col-lg-3">
                                            <div class="card-block">
                                                <a href="" class="w-100">
                                                  <div class="profile-detail w-100 text-center">
                                                     {!!$tag->getIcon()!!}
                                                    <label class="detail_name d-block">{{$tag->label}}:</label>
                                                  </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                   
                 </div>

               </div>
              <!-- profile information -->

                    
            </div>
           <!-- container-fluid -->

</div> 
<!-- profile_content -->
 

@endsection







