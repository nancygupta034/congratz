@extends('admin.layouts.layout')
@section('content')



    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{_lang('Dashboard')}}</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{_lang('Home')}}</a></li>
              <li class="breadcrumb-item active">{{_lang('Dashboard')}}</li>
            </ol>
          </div>
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row dash-card-wrap">


          <!-- col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{\App\User::where('role','artist')->count()}}</h3>

                <p>{{_lang('Celebrites')}}</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('admin.celebrity.list')}}" class="small-box-footer">{{_lang('More info')}} <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- col -->

          <!-- col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{\App\Models\Booking::where('status',0)->count()}}</h3>

                <p>{{_lang('New Booking')}}</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('admin.booking.list','pending')}}" class="small-box-footer">{{_lang('More info')}} <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- col -->

          <!-- col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{\App\User::where('role','user')->count()}}</h3>

                <p>{{_lang('Customers')}}</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('admin.customer.list')}}" class="small-box-footer">{{_lang('More info')}} <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- col -->
         
        </div>
        <!-- /.row -->
  
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->




@endsection