@extends('admin.layouts.layout')
@section('content')



    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{_lang('EVENT')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{_lang('Dashboard')}}</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.event.list')}}">{{_lang('Event')}}</a></li>
              <li class="breadcrumb-item active">{{_lang('Event')}}</li>
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
                              <h3 class="card-title">{{_lang('Event Addation')}}
                                
                                 
                              </h3>
                              <!-- tools box -->
                              <div class="card-tools">
                                <a href="{{route('admin.event.list')}}" class="btn btn-danger btn-sm">
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
                                        <form role="form" id="categoryForm" data-action="{{$url}}">
                                          <div class="card-body">
                                            @csrf


                                            <div class="form-group">
                                              <label for="category-label">{{_lang('Event')}}</label>
                                              <input type="text" class="form-control" 
                                              id="category-label" 
                                              value="{{!empty($category) ? $category->label : ''}}" 
                                              name="label" placeholder="{{_lang('Enter Event')}}">
                                            </div>
                                              <div class="form-group">
                                              <label for="category-label">{{_lang('Font Awesome (icon-tik-tok)')}}</label>
                                              <input type="text" class="form-control" 
                                              id="category-label" 
                                              value="{{!empty($category) ? $category->icon_class : ''}}" 
                                              name="icon_class" placeholder="{{_lang('Enter Icon Class')}}">
                                            </div>
                                             <div class="form-group">
                                              <label for="category-label">{{_lang('Icon (Image) if you have?')}}</label>
                                              <input type="file" 
                                                     class="form-control" 
                                                     accept="image/*" 
                                                     name="image">
                                                @if(!empty($category->image))
                                                   <img src="{{url($category->image)}}" class="img-thumbnail" style="width:120px">
                                                @endif
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