@extends('admin.layouts.layout')
@section('content')



    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{_lang('SETTINGS')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{_lang('Dashboard')}}</a></li>
              <li class="breadcrumb-item active">{{_lang('Settings')}}</li>
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
                {{_lang('Settings')}}
                 
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <a href="{{route('admin.website.settings.add','homepage')}}" class="btn btn-success btn-sm">
                  <i class="fas fa-plus"></i>
                  
                </a>

                 
                
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
                 <div class="col-md-12">
                   
                      @csrf
                      <table class="table">
                        <thead>
                          <tr>
                              <th>{{_lang('Settings Of.')}}</th>
                              <th>{{_lang('EDIT')}}</th>
                          </tr>
                        </thead>
                       <tbody id="getCategory">

                        @foreach($data as $d)
                        <?php $category = Session::has('locale') && Session::get('locale') == 'AR' && !empty($d->arabic) ? $d->arabic : $d; ?>
                              <tr>
                                <td>{{$category->type}}</td>
                                <td> 
  <a class="btn btn-danger btn-sm" href="{{route('admin.website.settings.lang.add',[Session::get('locale'),$d->id])}}"><i class="fas fa-edit"></i></a>
                                      
                                </td>
                              </tr>
                        @endforeach
                         </tbody>
                       </table>
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
<script type="text/javascript" src="{{url('admin/stm.js')}}"></script>
<script type="text/javascript">

 


</script>
@endsection