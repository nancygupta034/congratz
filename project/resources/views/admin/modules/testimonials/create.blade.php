@extends('admin.layouts.layout')
@section('content')



    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{_lang('TESTIMONIALS')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{_lang('Dashboard')}}</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.category.list')}}">{{_lang('Testimonial')}}</a></li>
              <li class="breadcrumb-item active">{{_lang('Testimonial')}}</li>
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
                                {{_lang('Testimonial')}}
                                 
                              </h3>
                              <!-- tools box -->
                              <div class="card-tools">
                                <a href="{{route('admin.category.list')}}" class="btn btn-danger btn-sm">
                               <i class="fas fa-eye"></i></a>
                                
                              </div>
                              <!-- /. tools -->
                                }
                                }
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
                                              <label for="category-label">{{_lang('Client Name')}}</label>
                                              <input 
                                              type="text" 
                                              class="form-control" 
                                              id="category-label" 
                                              value="{{$record->name}}" 
                                              name="name" 
                                              placeholder="Enter Client Name">
                                            </div>
                                            <div class="form-group">
                                              <label for="category-meta-title">{{_lang('Rating')}}</label>
                                               <select name="rating" class="form-control">
                                                  <option value="1" {{$record->rating == 1 ? 'selected' : ''}}>1</option>
                                                  <option value="2" {{$record->rating == 2 ? 'selected' : ''}}>2</option>
                                                  <option value="3" {{$record->rating == 3 ? 'selected' : ''}}>3</option>
                                                  <option value="4" {{$record->rating == 4 ? 'selected' : ''}}>4</option>
                                                  <option value="5" {{$record->rating == 5 ? 'selected' : ''}}>5</option>
                                               </select>
                                            </div>

                                            <div class="form-group">
                                              <label for="category-meta-Tags">{{_lang('Picture')}}</label>
                                              <input type="file" class="form-control" name="picture" <?= empty($record->picture) ? 'required' : '' ?>>
                                               @if(!empty($record->picture))
                                                   <img src="{{url($record->picture)}}" style="width: 50px;">
                                               @endif
                                            </div>
                                             <div class="form-group">
                                              <label>{{_lang('Testimonial')}}</label>
                                              <textarea class="form-control" name="testimonial" 
                                              placeholder="Enter Description">{{$record->testimonial}}</textarea>
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