@extends('admin.layouts.layout')
@section('content')



    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{_lang('Language Settings')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{_lang('Dashboard')}}</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.website.languages')}}">{{_lang('Language Settings')}}</a></li>
              <li class="breadcrumb-item active">{{_lang('Language Settings')}}</li>
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
                                {{_lang('Language Settings')}}
                                 
                              </h3>
                              <!-- tools box -->
                              <div class="card-tools">
                                <a href="{{route('admin.website.languages')}}" class="btn btn-danger btn-sm">
                               <i class="fas fa-eye"></i></a>
                                
                              </div>
                              <!-- /. tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pad">
                              <div class="mb-3">
                               <div class="card card-primary">
                                       <div class="row">   
                                        <div class="col-md-12">
                                              <!-- /.card-header -->
                                              <!-- form start -->
                                              <form role="form" id="categoryForm2" data-action="{{route('admin.website.languages.create')}}">
                                                 
                                                <div class="card-body">
                                                  @csrf
                                                  
                                                  <div class="form-group">
                                                    <label for="category-meta-Tags">{{_lang('English Text')}}</label> 
                                                     <textarea class="form-control" id="category-meta-Description" name="key" placeholder="{{_lang('Enter English')}}" 
                                                     required="">{{$cate->count() > 0 ? $cate->first()->key : ''}}</textarea>
                                                  </div>
                                                   <div class="form-group">
                                                    <label for="category-meta-Description">{{_lang('Arabic')}}</label>
                                                    <textarea class="form-control" id="category-meta-Description" name="key_value" placeholder="{{_lang('Enter Arabic')}}" 
                                                    required="">{{$cate->count() > 0 ? $cate->first()->key_value : ''}}</textarea>
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