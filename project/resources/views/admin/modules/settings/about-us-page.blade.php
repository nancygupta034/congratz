@extends('admin.layouts.layout')
@section('content')



    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> {{_lang('Global Settings')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"> {{_lang('Dashboard')}}</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.category.list')}}"> {{_lang('Category')}}</a></li>
              <li class="breadcrumb-item active"> {{_lang('Global')}}</li>
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
                                 {{_lang('Global')}}
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
                                            <input type="hidden" name="type" value="about-us-page">
                                            



                                            <div class="col-md-12">
                                                 <div class="form-group">
                                                           <label for="category-label">{{_lang('Content')}}</label>
                                                           <textarea class="form-control" name="about_us_page"><?= $data['about_us_page'] ?></textarea>
                                                 </div>
                                            </div>




                                          </div>
 

                                            
                                          
                                          </div>
                                          <!-- /.card-body -->

                                          <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
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
  CKEDITOR.replace( 'about_us_page');
</script>
@endsection