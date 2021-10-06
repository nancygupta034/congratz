@extends('admin.layouts.layout')
@section('content')



    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{_lang('SUBSCRIPTION PACKAGES')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{_lang('Dashboard')}}</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.packages.list')}}">{{_lang('Packages')}}</a></li>
              <li class="breadcrumb-item active">{{_lang('Packages')}}</li>
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
                                 {{_lang('Package Addation')}}
                                 
                              </h3>
                              <!-- tools box -->
                              <div class="card-tools">
                                <a href="{{route('admin.packages.list')}}" class="btn btn-danger btn-sm">
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
                                        <form role="form" id="packageForm" data-action="{{$url}}">
                                          <div class="card-body">
                                            @csrf


                                            <div class="form-group">
                                              <label for="category-label">{{_lang('Type')}}</label>
                                              <input type="text" class="form-control" 
                                              id="category-label" 
                                              value="{{!empty($category) ? $category->label : ''}}" 
                                              name="label" placeholder="{{_lang('Enter Type')}}">
                                            </div>
                                           
                                            <div class="form-group">
                                              <label for="category-label">{{_lang('Amount')}}</label>
                                              <input type="number" min="0" class="form-control" 
                                              id="category-titleSUBSCRIPTION PACKAGES" 
                                              value="{{!empty($category) ? $category->title : ''}}" 
                                              name="title" placeholder="{{_lang('Enter Amount')}}" >
                                            </div>
                                           
                                            <div class="form-group">
                                              <label for="category-meta-Tags">{{_lang('Days')}}</label>
                                              <input type="number" class="form-control" 
                                               value="{{!empty($category) ? $category->days : ''}}" 
                                              id="category-meta-Tags" name="{{_lang('days')}}" placeholder="Enter Days">
                                            </div>
                                             <div class="form-group">
                                              <label for="category-meta-Description">{{_lang('Description')}}</label>
                                              <textarea class="form-control" id="category-meta-Description" name="description" placeholder="{{_lang('Enter Description')}}">{{!empty($category) ? $category->description : ''}}</textarea>
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
<script type="text/javascript" src="{{url('admin_assets/stm.js')}}"></script>
<script type="text/javascript">
  
</script>
@endsection