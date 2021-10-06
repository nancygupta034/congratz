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
                                              <!-- form start -->
                                              <form role="form" id="categoryForm" data-action="{{$url}}">
                                                <input type="hidden" name="redirect_link" value="{{route('admin.FAQs')}}">
                                                <input type="hidden" name="type" value="faqs">
                                                <div class="card-body">
                                                  @csrf
                                                  <div class="form-group">
                                                    <label for="category-meta-Tags">{{_lang('FAQs Category')}}</label>
                                                        <select class="form-control" name="parent" required="">
                                                          <option value="">{{_lang('Select')}}</option>
                                                           @foreach($cates as $k => $c)

                                                                     <option value="{{$c->id}}" {{!empty($category) && $category->parent == $c->id ? 'selected' : ''}}>
                                                                      {{Session::get('locale') == "AR" && $c->arabic != null ? $c->arabic->title : $c->title}}
                                                                    </option>
                                                           @endforeach
                                                        </select>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="category-meta-Tags">{{_lang('Question')}}</label>
                                                    <input type="text" class="form-control" 
                                                     value="{{!empty($category) ? $category->title : ''}}" 
                                                    id="category-meta-Tags" name="title" placeholder="{{_lang('Enter Question')}}" required="">
                                                  </div>
                                                   <div class="form-group">
                                                    <label for="category-meta-Description">{{_lang('Answer')}}</label>
                                                    <textarea class="form-control" id="category-meta-Description" name="answer" placeholder="{{_lang('Enter Answer')}}" required="">{{!empty($category) ? $category->answer : ''}}</textarea>
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