


@extends('admin.layouts.layout')
@section('content')



    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">COUNTORIES</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.countryListing') }}">Country</a></li>
              <li class="breadcrumb-item active">Country</li>
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
                                Country Addation
                                 
                              </h3>
                              <!-- tools box -->
                              <div class="card-tools">
                                <a href="{{route('admin.category.list')}}" class="btn btn-danger btn-sm">
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
                                        <form role="form" id="categoryForm" data-action="{{ route('admin.countryAdd') }}">
                                          <div class="card-body">
                                            @csrf


                                                <div class="form-group">
                                                <label for="name">Country Name</label>

                                                <input type="text" value="" name="name" class="form-control" id="name" placeholder="Enter Country Name" required>

                                                </div>

                                                <div class="form-group">

                                                <label for="name">Short Name</label>

                                                <input type="text" value="" name="sortname" class="form-control" id="sortname" placeholder="Enter Country Short Name" required>

                                                </div>

                                                <div class="form-group">

                                                <label for="name">Phone Code</label>

                                                <input type="text" value="" name="phonecode" class="form-control" id="phonecode" placeholder="Enter Phone Code" required>

                                                </div>
                                                <div class="form-group">

                                                <label for="name">Country Flag Image</label>

                                                <input type="file" value="" name="image" class="form-control" required>

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
<script type="text/javascript" src="{{url('admin_assets/stm.js')}}"></script>
<script type="text/javascript">
  
</script>
@endsection
 