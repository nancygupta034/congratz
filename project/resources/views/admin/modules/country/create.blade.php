@extends('admin.layouts.layout')
@section('content')



    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{_lang('COUNTORIES')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{_lang('Dashboard')}}</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.country.list')}}">{{_lang('Country')}}</a></li>
              <li class="breadcrumb-item active">{{_lang('Country')}}</li>
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
                              <h3 class="card-title">{{_lang('Country Addation')}}
                                
                                 
                              </h3>
                              <!-- tools box -->
                              <div class="card-tools">
                                <a href="{{route('admin.country.list')}}" class="btn btn-danger btn-sm">
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
                                        <form role="form" id="formTestimonial" data-action="{{$url}}">
                                          <div class="card-body">
                                            @csrf


                                             <div class="form-group">
                                                <label for="name">{{_lang('Country Name')}}</label>

                                                <input type="text" name="name" value="{{!empty($country) ? $country->name : ''}}"  class="form-control" id="name" placeholder="{{_lang('Enter Country Name')}}" required>

                                                </div>

                                                <div class="form-group">
                                                 <label for="name">{{_lang('Short Name')}}</label>
                                                   <input type="text" name="sortname" value="{{!empty($country) ? $country->sortname : ''}}"  class="form-control" id="sortname" placeholder="{{_lang('Enter Country Short Name')}}" required>

                                                </div>

                                                <div class="form-group" style="display: none;">
                                                 <label for="name">{{_lang('Country Code')}}</label>
                                                   <input type="text" name="country_code" value="{{!empty($country) ? $country->country_code : ''}}"  class="form-control" id="country_code" placeholder="{{_lang('Enter Country code')}}">

                                                </div>

                                                <div class="form-group">

                                                <label for="name">{{_lang('Phone Code')}}</label>

                                                <input type="text" name="phonecode" value="{{!empty($country) ? $country->phonecode : ''}}"  class="form-control" id="phonecode" placeholder="{{_lang('Enter Phone Code')}}" required>

                                                </div>
                                                <div class="form-group">

                                                <label for="name">{{_lang('Country Flag Image')}}</label>

                                                <input type="file" name="image" class="form-control" <?= (!empty($country) && !empty($country->image)) ? '' : 'required' ?>>

                                                @if(!empty($country) && !empty($country->image))
                                                   <img src="{{url($country->image)}}">
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