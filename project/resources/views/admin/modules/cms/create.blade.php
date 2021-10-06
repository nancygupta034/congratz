@extends('admin.layouts.layout')
@section('content')



    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{_lang('CMS')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{_lang('Dashboard')}}</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.category.list')}}">{{_lang('CMS')}}</a></li>
              <li class="breadcrumb-item active">{{_lang('CMS')}}</li>
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
                              <h3 class="card-title">
                                {{_lang('CMS Page')}}
                              </h3>

                              <!-- tools box -->
                              <div class="card-tools">
                                <a href="{{route('admin.cms')}}" class="btn btn-danger btn-sm">
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
                                        <form role="form" id="cmsForm" data-action="{{$url}}">
                                          <div class="card-body">
                                            @csrf


                                            <div class="form-group">
                                              <label for="category-label">{{_lang('Title')}}</label>
                                              <input type="text" class="form-control" 
                                              id="category-label" 
                                              value="{{!empty($category) ? $category->title : ''}}" 
                                              name="title" placeholder="Enter Category">
                                            </div>
                                            <div class="form-group">
                                              <label for="category-meta-title">{{_lang('Description')}}</label>
                                              <textarea class="form-control"  name="description" placeholder="Enter Meta Title"><?=!empty($category) ? $category->description : ''?></textarea>

                                            </div>
                                            <div class="form-group">
                                              <label for="category-meta-title">{{_lang('Meta Title')}}</label>
                                              <input type="text" class="form-control" id="category-meta-title"
                                               value="{{!empty($category) ? $category->meta_title : ''}}" 
                                               name="meta_title" placeholder="{{_lang('Enter Meta Title')}}">
                                            </div>

                                            <div class="form-group">
                                              <label for="category-meta-Tags">{{_lang('Meta Tags')}}</label>
                                              <input type="text" class="form-control" 
                                               value="{{!empty($category) ? $category->meta_tags : ''}}" 
                                              id="category-meta-Tags" name="meta_tags" placeholder="{{_lang('Enter Meta Tags')}}">
                                            </div>
                                             <div class="form-group">
                                              <label for="category-meta-Description">{{_lang('Meta Description')}}</label>
                                              <textarea class="form-control" id="category-meta-Description" name="meta_description" placeholder="{{_lang('Enter Meta Description')}}">{{!empty($category) ? $category->meta_description : ''}}</textarea>
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
  CKEDITOR.replace( 'description');
</script>
@endsection