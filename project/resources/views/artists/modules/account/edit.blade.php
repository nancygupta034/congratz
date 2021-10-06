@extends('artists.layouts.layout')
@section('content')
          
<!-- profile_content -->
 <div class="profile_content">
    <form id="registerForm" data-action="{{route('artist.profile.edit')}}">
                   @csrf
              <div class="profile_banner">
               <figure class="profile_banner_image">

                 <img id="image_src3" src="{{!empty(Auth::user()->cover_picture) ? url(Auth::user()->cover_picture) : url('/frontend/images/Justin-Bieber-img.jpg')}}">
               </figure>

              </div>
              <!-- container-fluid -->
             <div class="container-fluid">
               <div class="profile_head">                
                <div class="row">
                  <div class="col-lg-6">
                     <figure class="profile_logo">
                         <img id="image_src2" src="{{!empty(Auth::user()->profile_picture) ? url(Auth::user()->profile_picture) : url('/frontend/images/Justin-Bieber-img.jpg')}}">
                         <label class="upload_image_label">
                          <i class="fa fa-image"></i>
                          <input type="file" 
                                name="profile_picture" 
                                onchange="ValidateSingleInput(this, 'image_src2')" 
                                aria-invalid="true">
                         </label>
                     </figure>
                      
                     <figcaption class="profile-info">
                       <h3 class="profile_name">{{_lang(Auth::user()->name)}}</h3>
                       <p class="profile_id">{{_lang(Auth::user()->username)}}</p>
                        
                     </figcaption>
                  </div>
                  <div class="col-lg-6 text-right">
                    <div class="profile_head_info">
                    <div class="btn-wrap btn-wraped">
                     
                         <label class="upload_image_label">
                              <i class="fa fa-image"></i>
                              <input type="file" 
                                name="cover_picture" 
                                onchange="ValidateSingleInput(this, 'image_src3')" 
                                aria-invalid="true">
                         </label>
                      
                   </div>                    
                   </div>
                  </div>



                </div>





                

 <div class="card-block mb-5 mt-5">
               

                

                   <div class="row">
                          <div class="col-12">
                            <div class="btn-wrap tab_btn-grp d-f j-c-c mb-5">
                      
                       
                       <ul class="nav nav-tabs row" id="myTab" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Acount Information</a>
                              </li>
                              
                              <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Celebrity Profile</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="social-tab" data-toggle="tab" href="#social" role="tab" aria-controls="home" aria-selected="true">Social Pages Link</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Categories</a>
                              </li>
                            </ul>
                    </div>
                            
                            <div class="tab-content " id="myTabContent">
                               <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab">
                                     <div class="row">
                                      <div class="col-lg-6">
                                       <div class="form-group">
                                         <label class="inline-label mb-2">Facebook Page Url</label>
                                         <div class="input_wrap">
                                          <span class="input-left-icon"><i class="fas fa-lock"></i></span>
                                          <input type="url" name="facebook_url" class="form-control" value="{{$user->facebook_url}}">
                                          <div class="input-right-icon">
                                            <a href=""> <i class="fas fa-eye"></i></a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                         <label class="inline-label mb-2">Instagram Page Url</label>
                                         <div class="input_wrap">
                                          <span class="input-left-icon"><i class="fas fa-lock"></i></span>
                                          <input type="url" name="insta_url" class="form-control" value="{{$user->insta_url}}">
                                          <div class="input-right-icon">
                                            <a href=""> <i class="fas fa-eye"></i></a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                         <label class="inline-label mb-2">Twitter Page Url</label>
                                         <div class="input_wrap">
                                          <span class="input-left-icon"><i class="fas fa-lock"></i></span>
                                          <input type="url" name="twitter_url" class="form-control" value="{{$user->twitter_url}}">
                                          <div class="input-right-icon">
                                            <a href=""> <i class="fas fa-eye"></i></a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                         <label class="inline-label mb-2">Youtube Page Url</label>
                                         <div class="input_wrap">
                                          <span class="input-left-icon"><i class="fas fa-lock"></i></span>
                                           <input type="url" name="youtube_url" class="form-control" value="{{$user->youtube_url}}">
                                          <div class="input-right-icon">
                                            <a href=""> <i class="fas fa-eye"></i></a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                     </div>                                      
                                </div>
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                    <div class="row">
                                      <div class="col-lg-6">
                                       <div class="form-group">
                                         <label class="inline-label mb-2">Full Name</label>
                                         <div class="input_wrap">
                                          <span class="input-left-icon"><i class="fas fa-lock"></i></span>
                                           <input type="text" name="name" class="form-control" value="{{$user->name}}">
                                          <div class="input-right-icon">
                                            <a href=""> <i class="fas fa-eye"></i></a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                         <label class="inline-label mb-2">Username</label>
                                         <div class="input_wrap">
                                          <span class="input-left-icon"><i class="fas fa-lock"></i></span>
                                           <input type="text" name="username" class="form-control" value="{{$user->username}}">
                                          <div class="input-right-icon">
                                            <a href=""> <i class="fas fa-eye"></i></a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                         <label class="inline-label mb-2">Email</label>
                                         <div class="input_wrap">
                                          <span class="input-left-icon"><i class="fas fa-lock"></i></span>
                                           <input type="text" name="email" class="form-control" value="{{$user->email}}">
                                          <div class="input-right-icon">
                                            <a href=""> <i class="fas fa-eye"></i></a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                         <label class="inline-label mb-2">Phone Number</label>
                                         <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                     <!--  <span class="input-group-text"> <i class="fas fa-phone"></i></span> -->
                                                      <span class="input-group-text">
                                                         <select class="form-control" name="phone_code">
                                                            @foreach($countries as $cate)
                                                              <option value="+{{$cate->phonecode}}" {{$cate->phonecode == Auth::user()->phone_code ? 'selected' : ''}}>+{{$cate->phonecode}}</option>
                                                            @endforeach
                                                            </select>
                                                      </span>
                                                    </div>
                                                    <input type="text" name="phone_number" class="form-control" value="{{Auth::user()->phone_number}}" placeholder="{{_lang('Phone Number')}}">
                                                  </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                         <label class="inline-label mb-2">{{_lang('Gender')}}</label>
                                          <div class="radio-grp d-f">                       
                                                 <div class="custom-control custom-radio text-left mr-3">
                                                    <input type="radio" class="custom-control-input" name="gender" value="male" id="male" {{Auth::user()->gender == 'male' ? 'checked' : ''}}>
                                                    <label class="custom-control-label" for="male">{{_lang('Male')}}</label>
                                                  </div>
                                                
                                                 <div class="custom-control custom-radio text-left mr-3">
                                                    <input type="radio" name="gender" class="custom-control-input" value="female" id="female" {{Auth::user()->gender == 'female' ? 'checked' : ''}}>
                                                    <label class="custom-control-label" for="female">{{_lang('Female')}}</label>
                                                  </div>
                                                
                                                 <div class="custom-control custom-radio text-left mr-3">
                                                    <input type="radio" name="gender" class="custom-control-input" value="other" id="other" {{Auth::user()->gender == 'other' ? 'checked' : ''}}>
                                                    <label class="custom-control-label" for="other">{{_lang('Other')}}</label>
                                                  </div>
                                                </div>
                                       </div>
                                     </div>
                                     <div class="col-lg-6">
                                       <div class="form-group">
                                         <label class="inline-label mb-2">Date Of Birth</label>
                                         <div class="input_wrap">
                                          <span class="input-left-icon"><i class="fas fa-lock"></i></span>
                                           <input type="date" name="dob" class="form-control" value="{{$user->dob}}">
                                          <div class="input-right-icon">
                                            <a href=""> <i class="fas fa-eye"></i></a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                         <label class="inline-label mb-2">Date Of Birth</label>
                                         <select name="country" class="form-control" id="country">
                                                      <option value="">{{_lang('choose')}}</option>
                                                      @foreach($countries as $cate)
                                                              <option value="{{$cate->id}}" {{$user->country_id == $cate->id ? 'selected' : ''}}>{{$cate->name}}</option>
                                                      @endforeach
                                                   </select>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                         
                                         {{select3($errors,'State','state_name','name','',$state,$user->state_id)}}
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                        
                                         {{select3($errors,'City','city_name','name','',$city,$user->city_id)}}
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                    
                                         {{textbox($errors,'Address','address',Auth::user()->address)}}
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                         {{textbox($errors,'Pincode','pincode',Auth::user()->pincode)}}
                                      </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                 <div class="row">
                                   <div class="col-lg-12">
                                     <div class="form-group">
                                         <label class="inline-label mb-2">About</label>
                                         <textarea name="about" class="form-control">{!!$user->about!!}</textarea>
                                      </div>
                                   </div>
                                   <div class="col-lg-6">
                                     <div class="form-group">
                                         <label class="inline-label mb-2">Delivery Within</label>
                                         <input type="text" class="form-control" name="delivery_within" placeholder="{{_lang('Video Delivery Within ?')}}" 
                                          max="{{WebsiteSettings('global-settings','max_day_delivery_limit')}}" min="0" value="{{Auth::user()->delivery_within}}">
                                      </div>
                                   </div>
                                   <div class="col-lg-6">
                                     <div class="form-group">
                                         <label class="inline-label mb-2">Charge</label>
                                          <input type="text" class="form-control" name="charge" placeholder="{{_lang('Charge for Video ?')}}" value="{{Auth::user()->charge}}">
                                      </div>
                                   </div>
                                   <div class="col-lg-6">
                                     <div class="form-group">
                                         <label class="inline-label mb-2">Where We can find you?</label>
                                          <input type="text" class="form-control" name="where_can_we_find" placeholder="{{_lang('Charge for Video ?')}}" value="{{Auth::user()->where_can_we_find}}">
                                      </div>
                                   </div>
                                   <div class="col-lg-6">
                                     <div class="form-group">
                                         <label class="inline-label mb-2">Profile ID</label>
                                          <input type="text" class="form-control" name="profile_id" placeholder="{{_lang('Charge for Video ?')}}" value="{{Auth::user()->profile_id}}">
                                      </div>
                                   </div>
                                   <div class="col-lg-6">
                                     <div class="form-group">
                                         <label class="inline-label mb-2">Followers</label>
                                          <input type="text" class="form-control" name="followers" placeholder="{{_lang('Charge for Video ?')}}" value="{{Auth::user()->followers}}">
                                      </div>
                                   </div>
                                 </div>

                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="row">
                                      <?php $cate_ids = $category_ids = !empty(Auth::user()->category_id) ? json_decode(Auth::user()->category_id) : []; ?>
                                       <?php $categories = \App\Models\Category::where('status',1)->where('lang',Session::get('locale'))->orderBy('label','ASC')->get(); ?>
                                       @foreach($categories as $tag)
                                         <div class="col-lg-4">
                                          
                                             <div class="custom-control custom-checkbox text-left mb-3">
                                              <input type="checkbox" name="category[]"
                                              {{in_array($tag->id,$cate_ids) ? 'checked' : ''}}
                                               class="custom-control-input" value="{{$tag->id}}" id="category-{{$tag->id}}">
                                              <label class="custom-control-label" for="category-{{$tag->id}}">{{$tag->label}}</label>
                                            </div>
                                         </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                          </div>
                   </div>

                   <button class="main-btn2 mr-2 mt-5">Save</button>
 
</div>















              </div> 

              
          </div>


        </form>
      </div>





































@endsection
@section('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
<script src="{{url('js/home/ajax.js')}}"></script>
 <script src="{{url('js/home/register-steps.js')}}"></script>
<script src="{{url('js/home/register.js')}}"></script>
<script type="text/javascript">
  
    $("body").on('change','#country',function(){
         var val = $( this ).val();
         country('#state_name',val,0);
    });

     $("body").on('change','#state_name',function(){
         var val = $( this ).val();
         country('#city_name',0,val);
    });


     


        function country(div,country_id,state_id=0,val=0) {
              
              
                   $.ajax({
                       url : "{{url(route('ajax.countries'))}}",
                       
                       type: 'GET',  // http method
                       data:{
                          country_id : country_id,
                          val : val,
                          state_id : state_id
                       },
                       dataTYPE:'JSON',
                     
                        beforeSend: function() {
                          //   $("body").find('.custom-loading').show();
                          // $this.find('button').attr('disabled','true');
                        },

                       success: function (result) {
                             $(div).html(result);
                       },
                       complete: function() {
                              //   $("body").find('.custom-loading').hide();
                              // $this.find('button').removeAttr('disabled');
                       },
                       error: function (jqXhr, textStatus, errorMessage) {
                             //alert('error');
                       }

                });
   }

</script>
@endsection