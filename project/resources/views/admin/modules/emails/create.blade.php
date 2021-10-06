@extends('admin.layouts.layout')
@section('content')



    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{_lang('EMAIL TEMPLAT')}}E</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{_lang('Dashboard')}}</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.emailTemplate.list')}}">{{_lang('Emails')}}</a></li>
              <li class="breadcrumb-item active">{{_lang('Email Template')}}</li>
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
     

                <div class="row">
                        <div class="col-md-12">
                          <div class="card card-outline card-info">
                            <div class="card-header">
                              <h3 class="card-title">{{_lang('Email Template Addation')}}
                                
                                 
                              </h3>
                              <!-- tools box -->
                              <div class="card-tools">
                                <a href="{{route('admin.emailTemplate.list')}}" class="btn btn-danger btn-sm">
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
                                        <form role="form" id="categoryForm" data-action="{{$url}}" enctype="multipart/form-data">
                                          <div class="card-body">
                                            @csrf


                                            <div class="form-group">
                                              <label for="category-label">{{_lang('Title')}}</label>
                                              <input type="text" class="form-control" 
                                              id="category-label" 
                                              value="{{!empty($category) ? $category->title : ''}}" 
                                              name="title" placeholder="{{_lang('Enter Email Title')}}" required="">
                                            </div>
                                             
                                            <div class="form-group">
                                              <label for="category-label">{{_lang('Subject')}}</label>
                                              <input type="text" class="form-control" 
                                              id="category-label" 
                                              value="{{!empty($category) ? $category->subject : ''}}" 
                                              name="subject" placeholder="{{_lang('Enter Email subject')}}" required="">
                                            </div>
                                             
                                             <div class="form-group">
                                              <label for="category-meta-Description">{{_lang('Content')}}</label>
                                              <textarea class="form-control" id="category-meta-Description" name="content" placeholder="{{_lang('Enter EMail Content')}}" required="">{{!empty($category) ? $category->content : ''}}</textarea>
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
<script type="text/javascript" src="{{url('admin_assets/stm.js')}}"></script>
<script type="text/javascript">
  CKEDITOR.replace( 'content');
</script>
@endsection