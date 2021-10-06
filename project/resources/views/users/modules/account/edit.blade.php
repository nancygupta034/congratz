@extends('users.layouts.layout')
@section('content')
          
<!-- profile_content -->
<div class="profile_content">
  <form id="registerForm" data-action="{{route('user.profile.edit')}}">
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
                                onchange="changeImage(this, 'image_src2','profile')" 
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
                                onchange="changeImage(this, 'image_src3','cover')" 
                                aria-invalid="true">
                         </label>
                      
                   </div>                    
                   </div>
                  </div>
                </div>
                <div class="card-block mb-5 mt-5">
                   <div class="row">
                          <div class="col-12">
                            <div class="tab-content " id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row">
                                      <div class="col-lg-12">
                                         <div class="form-group">
                                          <label>Bio</label>
                                          <textarea name="about" class="form-control">{{$user->about}}</textarea>
                                        </div>
                                      </div>
                                      <div class="col-lg-6">
                                       <div class="form-group">
                                         <label class="inline-label mb-2">Full Name</label>
                                         <div class="input_wrap">
                                          <span class="input-left-icon"><i class="fas fa-user"></i></span>
                                           <input type="text" name="name" class="form-control" value="{{$user->name}}">
                                          <div class="input-right-icon">
                                            <a href=""> <i class="fas fa-eye"></i></a>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="errorTxt"></div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                         <label class="inline-label mb-2">Username</label>
                                         <div class="input_wrap">
                                          <span class="input-left-icon"><i class="fas fa-user"></i></span>
                                           <input type="text" name="username" class="form-control" value="{{$user->username}}">
                                          <div class="input-right-icon">
                                            <a href=""> <i class="fas fa-eye"></i></a>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="errorTxt"></div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                         <label class="inline-label mb-2">Email</label>
                                         <div class="input_wrap">
                                          <span class="input-left-icon"><i class="fas fa-envelope"></i></span>
                                           <input type="text" name="email" class="form-control" value="{{$user->email}}">
                                          <div class="input-right-icon">
                                            <a href=""> <i class="fas fa-eye"></i></a>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="errorTxt"></div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                         <label class="inline-label mb-2">{{_lang('Gender')}}</label>
                                          <div class="radio-grp d-f j-c-s-b">                       
                                                 <div class="custom-control custom-radio text-left">
                                                    <input type="radio" class="custom-control-input" name="gender" value="male" id="male" {{Auth::user()->gender == 'male' ? 'checked' : ''}}>
                                                    <label class="custom-control-label" for="male">{{_lang('Male')}}</label>
                                                  </div>
                                                
                                                 <div class="custom-control custom-radio text-left">
                                                    <input type="radio" name="gender" class="custom-control-input" value="female" id="female" {{Auth::user()->gender == 'female' ? 'checked' : ''}}>
                                                    <label class="custom-control-label" for="female">{{_lang('Female')}}</label>
                                                  </div>
                                                
                                                 <div class="custom-control custom-radio text-left">
                                                    <input type="radio" name="gender" class="custom-control-input" value="other" id="other" {{Auth::user()->gender == 'other' ? 'checked' : ''}}>
                                                    <label class="custom-control-label" for="other">{{_lang('Other')}}</label>
                                                  </div>
                                                </div>
                                       </div>
                                       <div class="errorTxt"></div>
                                     </div>
                                     <div class="col-lg-6">
                                       <div class="form-group">
                                         <label class="inline-label mb-2">Date Of Birth</label>
                                         <div class="input_wrap">
                                          <span class="input-left-icon"><i class="fas fa-calendar-alt"></i></span>
                                           <input type="date" name="dob" class="form-control" value="{{$user->dob}}">
                                          <div class="input-right-icon">
                                            <a href=""> <i class="fas fa-eye"></i></a>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="errorTxt"></div>
                                    </div>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                          <label class="inline-label mb-2">Phone Number</label>
                                                <div class="input-wrap">
                                                  <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                         <select class="form-control" name="phone_code">
                                                            @foreach($countries as $cate)
                                                              <option value="+{{$cate->phonecode}}" {{$cate->phonecode == Auth::user()->phone_code ? 'selected' : ''}}>+{{$cate->phonecode}}</option>
                                                            @endforeach
                                                          </select>
                                                      </span>
                                                    </div>
                                                    <input type="text" name="phone_number" class="form-control" placeholder="Phone Number" value="{{Auth::user()->phone_number}}">
                                                    <span class="input-icon"><i class="fas fa-phone"></i></span>
                                                  </div>
                                                </div>                                          
                                              </div>
                                              <div class="errorTxt"></div>

                                      
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                         <label class="inline-label mb-2">Country</label>
                                         <select name="country" class="form-control" id="country">
                                                      <option value="">{{_lang('choose')}}</option>
                                                      @foreach($countries as $cate)
                                                              <option value="{{$cate->id}}" {{$user->country_id == $cate->id ? 'selected' : ''}}>{{$cate->name}}</option>
                                                      @endforeach
                                                   </select>
                                      </div>
                                      <div class="errorTxt"></div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                         
                                         {{select3($errors,'State','state_name','name','',$state,$user->state_id)}}
                                      </div>
                                      <div class="errorTxt"></div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                         
                                         {{select3($errors,'City','city_name','name','',$city,$user->city_id)}}
                                      </div>
                                      <div class="errorTxt"></div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                      
                                         {{textbox($errors,'Address','address',Auth::user()->address)}}
                                      </div>
                                      <div class="errorTxt"></div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                         
                                         {{textbox($errors,'Pincode','pincode',Auth::user()->pincode)}}
                                      </div>
                                      <div class="errorTxt"></div>
                                    </div>
                                    </div>
                                </div>
                               
                            </div>
                          </div>
                   </div>
                   <button class="main-btn2 mr-2">Save</button>
                  </div>
              </div> 
          </div>
        </form>
      </div>
@endsection
@section('js')
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

    function changeImage(input,img_id,type) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#'+img_id)
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
        var formDataToUpload = new FormData();
        formDataToUpload.append("image", input.files[0]);
        formDataToUpload.append("type", type);
        formDataToUpload.append("_token", "{{ csrf_token() }}");
        $.ajax({
            url: "/customer/update-image",
            data: formDataToUpload,// Add as Data the Previously create formData
            type: "POST",
            contentType: false,
            processData: false,
            cache: false,
            dataType: "json", // Change this according to your response from the server.
            error: function (err) {
                console.error(err);
            },
            success: function (data) {
                swal({
                    title: '',
                    text: 'Image updated successfully',
                    showConfirmButton: true,
                    confirmButtonText: 'Ok!',
                    closeOnConfirm: true,
                }, function () {
                    location.reload(true);
                });
            },
            complete: function () {
                console.log("Request finished.");
            }
        });
    } 

</script>
@endsection