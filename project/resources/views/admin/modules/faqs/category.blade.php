@extends('admin.layouts.layout')
@section('content')



    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{_lang('FAQs')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{_lang('Dashboard')}}</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.FAQs')}}">{{_lang('FAQs')}}</a></li>
              <li class="breadcrumb-item active">{{_lang('FAQs')}}</li>
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
                              <h3 class="card-title">{{_lang('FAQs')}}
                                
                                 
                              </h3>
                              <!-- tools box -->
                              <div class="card-tools">
                                <a href="{{route('admin.FAQs')}}" class="btn btn-danger btn-sm">
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
                                              
                                              <h5>{{_lang('FAQs Categories')}}</h5>

                                                <form role="form" id="categoryForm2" data-action="{{$url}}">
                                                     @csrf
                                                     <input type="hidden" name="redirect_link" value="{{route('admin.FAQs.category')}}">
                                                     <input type="hidden" name="type" value="category"> 
                                                     <div class="row">
                                                         <div class="col-md-9"><input type="text" name="title" required="" class="form-control" value="{{!empty($category) ? $category->title : ''}}"></div>
                                                         <div class="col-md-3"><button class="btn btn-primary btn-block">{{_lang('Add')}}</button></div>
                                                         <div class="messageDiv"></div>

                                                     </div>
                                                </form>
                                                <table class="table">
                                                  <tr>
                                                    <th>#</th>
                                                    <th>{{_lang('Category')}}</th>
                                                    <th>{{_lang('Actions')}}</th>
                                                  </tr>

                                                  @foreach($cates as $k => $c)
                                                    <?php $category = Session::has('locale') && Session::get('locale') == 'AR' && !empty($c->arabic) ? $c->arabic : $c; ?>
                                                        <tr>
                                                          <td>{{$k + 1}}</td>
                                                          <td>{{$category->title}}</td>
                                                          <td>
                                                            
                                                              <a class="btn btn-success btn-sm" href="{{route('admin.FAQs.edit.category',[Session::get('locale'),$c->id])}}"> <i class="fa fa-Edit"></i></a>
                                                          </td>
                                                        </tr>
                                                  @endforeach
                                              </table>
                                              

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