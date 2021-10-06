@extends('admin.layouts.layout')
@section('content')



    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> {{_lang('Homepage Settings')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"> {{_lang('Dashboard')}}</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.category.list')}}"> {{_lang('Category')}}</a></li>
              <li class="breadcrumb-item active"> {{_lang('Homepage')}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        @include('admin.includes.errors')
     

                <div class="row">
                        <div class="col-md-12">
                          <div class="card card-outline card-info">
                            <div class="card-header">
                              <h3 class="card-title">
                                 {{_lang('Homepage')}}
                              </h3>

                              <!-- tools box -->
                              <div class="card-tools">
                                <a href="{{route('admin.website.settings')}}" class="btn btn-danger btn-sm">
                               <i class="fas fa-eye"></i></a>
                                
                              </div>
                              <!-- /. tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pad">
                              <div class="mb-3">
                               <div class="card card-primary">
                                         
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <form role="form" id="cmsForm" action="{{route('admin.website.settings.store.lang',$lang)}}" method="post" enctype="multipart/form-data">
                                          <div class="card-body">
                                            @csrf
                                            <input type="hidden" name="type" value="homepage">
                                            
                                              <h4>{{_lang('ABOUT US CONTENT')}}</h4>
                                            <div class="form-group">
                                              <label for="category-label">{{_lang('Title')}}</label>
                                              <input type="text" class="form-control" 
                                              id="category-label" 
                                              value="{{$data['home_about_us']}}" 
                                              name="home_about_us" placeholder="Enter Category">
                                            </div>
                                            <div class="form-group">
                                              <label for="category-meta-title">{{_lang('Description')}}</label>
                                              <textarea class="form-control"  name="home_about_description" placeholder="Enter Meta Title"><?=$data['home_about_description']?></textarea>

                                            </div>
                                             
                                             <div class="form-group">
                                              <label for="category-label">{{_lang('Image')}}</label>
                                              <input type="file" 
                                                     class="form-control"  
                                                     name="about_image[]" multiple="">

                                             <div class="row">
                                                 <?php $about_image = json_decode($data['about_image']); ?>
                                                 @if(!empty($about_image) && is_array($about_image))
                                                       @foreach($about_image as $image)
                                                         <div class="col-md-2"><img src="{{url($image)}}" style="height:100px;"></div>
                                                       @endforeach
                                                 @endif
                                             </div>

                                            </div>





                                             <h4>{{_lang('How It Works')}}</h4>
                                             
                                           <div class="row">

                                            <div class="col-md-6">
                                             <!-- strt section -->
                                               <div class="form-group">
                                                   <label for="category-meta-title">{{_lang('Sign-Up Description')}}</label>
                                                    <textarea class="form-control"  name="signup_content" placeholder="Enter Meta Title"><?=$data['signup_content']?></textarea>
                                                </div>
                                                <!-- <div class="form-group">
                                                           <label for="category-label">Icon for Sign-Up Section</label>
                                                           <input type="file" 
                                                                  class="form-control"  
                                                                  name="signup_image">
                                               </div> -->
                                             <!-- strt section -->

                                            </div>

                                            <div class="col-md-6">
                                             <!-- strt section -->
                                               <div class="form-group">
                                                   <label for="category-meta-title">{{_lang('Choose Celebrity')}} </label>
                                                    <textarea class="form-control"  name="choose_celebrity_content" placeholder="Enter Meta Title"><?=$data['choose_celebrity_content']?></textarea>
                                                </div>
                                               <!--  <div class="form-group">
                                                           <label for="category-label">Icon for Choose Celebrity</label>
                                                           <input type="file" 
                                                                  class="form-control"  
                                                                  name="choose_celebrity_image">
                                               </div> -->
                                             <!-- strt section choose_celebrity_image choose_celebrity_content-->
                                            </div>

                                            <div class="col-md-6">

                                             <!-- strt section -->
                                               <div class="form-group">
                                                   <label for="category-meta-title">{{_lang('Request to Celeb')}}</label>
                                                    <textarea class="form-control"  name="request_to_celebrity_content" placeholder="Enter Meta Title"><?=$data['request_to_celebrity_content']?></textarea>
                                                </div>
                                              <!--   <div class="form-group">
                                                           <label for="category-label">Icon for Sign-Up Section</label>
                                                           <input type="file" 
                                                                  class="form-control"  
                                                                  name="request_to_celebrity_image">
                                               </div> -->
                                      
    <!-- strt section -->

                                            </div>

                                            <div class="col-md-6">
                                             <!-- strt section -->
                                               <div class="form-group">
                                                   <label for="category-meta-title">{{_lang('Fulfill Request')}}</label>
                                                    <textarea class="form-control"  name="fulfill_request_content" placeholder="Enter Meta Title"><?=$data['fulfill_request_content']?></textarea>
                                                </div>
                                                <!-- <div class="form-group">
                                                           <label for="category-label">Icon for Fulfill Request Section</label>
                                                           <input type="file" 
                                                                  class="form-control"  
                                                                  name="fulfill_request_image">
                                               </div> -->
                                             <!-- strt section -->

                                            </div>

                                            <div class="col-md-6">


                                             <!-- strt section -->
                                               <div class="form-group">
                                                   <label for="category-meta-title">{{_lang('Receive Video Link')}}</label>
                                                    <textarea class="form-control"  name="receive_videolink_content" placeholder="Enter Meta Title"><?=$data['receive_videolink_content']?></textarea>
                                                </div>
                                              <!--   <div class="form-group">
                                                           <label for="category-label">Icon for Receive Video Link Section</label>
                                                           <input type="file" 
                                                                  class="form-control"  
                                                                  name="receive_videolink_image">
                                               </div> -->
                                             <!-- strt section -->


                                          </div>
                                        </div>


                                             <h4>{{_lang('APP DOWNLOAD CONTENT</h4>
                                             
                                           <div class="row">
                                              <div class="col-md-12">
                                             <!-- strt section -->
                                               <div class="form-group">
                                                   <label for="category-meta-title">{{_lang('Download Title')}}</label>
                                                    <input class="form-control"  name="download_title" placeholder="Enter Download Title" value="<?=$data['download_title']?>">
                                                </div>
                                                 <div class="form-group">
                                                   <label for="category-meta-title">{{_lang('Description')}}</label>
                                                    <textarea class="form-control" name="download_description" placeholder="Enter Downlaod Description"><?=$data['download_description']?></textarea>
                                                </div>
                                                <div class="col-md-6">
                                                 <div class="form-group">
                                                           <label for="category-label">{{_lang('Download Image')}}</label>
                                                           <input type="file" 
                                                                  class="form-control"  
                                                                  name="download_main_image">
                                                                   @if(!empty($data['download_main_image']))
                                                                     <img src="{{url($data['download_main_image'])}}" style="height: 70px;">
                                                                  @endif
                                                 </div>
                                                </div>
                                                
                                             <!-- strt section -->

                                            </div>

                                            <div class="col-md-6">
                                                 <div class="form-group">
                                                           <label for="category-label">{{_lang('Get In Google Play Image')}}</label>
                                                           <input type="file" 
                                                                  class="form-control"  
                                                                  name="download_google_play">
                                                                  @if(!empty($data['download_google_play']))
                                                                     <img src="{{url($data['download_google_play'])}}" style="height: 70px;">
                                                                  @endif
                                                 </div>
                                            </div>


                                            <div class="col-md-6">
                                                 <div class="form-group">
                                                           <label for="category-label">{{_lang('Get In Apple App Store Image')}}</label>
                                                           <input type="file" 
                                                                  class="form-control"  
                                                                  name="download_apple_store">
                                                                  @if(!empty($data['download_apple_store']))
                                                                     <img src="{{url($data['download_apple_store'])}}" style="height: 70px;">
                                                                  @endif
                                                 </div>
                                            </div>

                                            <div class="col-md-6">
                                                 <div class="form-group">
                                                           <label for="category-label">{{_lang('Get In Google Play Link')}}</label>
                                                           <input type="url" 
                                                                  class="form-control"  
                                                                  name="download_google_play_link" 
                                                                  value="<?= $data['download_google_play_link'] ?>">

                                                 </div>
                                            </div>


                                            <div class="col-md-6">
                                                 <div class="form-group">
                                                           <label for="category-label">{{_lang('Get In Apple App Store Link')}}</label>
                                                           <input type="url" 
                                                                  class="form-control"  
                                                                  name="download_apple_store_link" 
                                                                  value="<?= $data['download_apple_store_link'] ?>">
                                                 </div>
                                            </div>




                                          </div>
 

                                            
                                          
                                          </div>
                                          <!-- /.card-body -->

                                          <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">{{_lang('Submit')}}</button>
                                            <div class="messageDiv"></div>
                                          </div>
                                        </form>
                                      </div>

                 

                 
                              </div>
                            </div>
                          </div>
                      </div>
                </div>
 

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->




@endsection
@section('javaScript')
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<!-- <script type="text/javascript" src="{{url('admin_assets/stm.js')}}"></script> -->
<script type="text/javascript">
  CKEDITOR.replace( 'description');
  CKEDITOR.replace( 'home_about_description');
</script>
@endsection