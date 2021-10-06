@extends('admin.layouts.layout')
@section('content')



    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{_lang('STATES')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{_lang('Dashboard')}}</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.state.list')}}">{{_lang('State')}}</a></li>
              <li class="breadcrumb-item active">{{_lang('State')}}</li>
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
                                <?= _lang('State Addation') ?>
                                 
                              </h3>
                              <!-- tools box -->
                              <div class="card-tools">
                                <a href="{{route('admin.state.list')}}" class="btn btn-danger btn-sm">
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

                                <label for="name">{{_lang('Country')}}</label>

                                <select class="form-control" name="country_id" required>

                                    @if(@sizeof($countries)) @foreach($countries as $listingCountries)

                                    <option value="{{ $listingCountries->id }}" {{!empty($country) && $country->phonecode == $listingCountries->id ? 'selected' : ''}}>
                                      {{ (Session::has('locale') && Session::get('locale') == 'AR') && !empty($listingCountries->arabic) ? $listingCountries->arabic->name : $listingCountries->name }}                                     </option>

                                    @endforeach

                                    @endif

                                </select>

                            </div>

                            <div class="form-group">

                                <label for="name">{{_lang('State Name')}}</label>

                                <input type="text" value="{{!empty($country) ? $country->name : ''}}" name="name" class="form-control" id="name" placeholder="{{_lang('Enter State Name')}}" required>

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