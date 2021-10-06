@extends('admin.layouts.layout')
@section('content')



    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{_lang('Job Offer')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{_lang('Dashboard')}}</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.FAQs')}}">{{_lang('Job Offer')}}</a></li>
              <li class="breadcrumb-item active">{{_lang('Job Offer')}}</li>
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
                                {{_lang('Job Offer')}}
                                 
                              </h3>
                              <!-- tools box -->
                              <div class="card-tools">
                                <a href="{{route('admin.FAQs')}}" class="btn btn-danger btn-sm">
                               <i class="fas fa-eye"></i></a>
                                
                              </div>
                              
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pad">
                              <div class="mb-3">
                               <div class="card card-primary">
                                       <div class="row">   
                                        <div class="col-md-12">
                                              <!-- /.card-header -->
                                              <!-- form start -->
                                              <form role="form" id="jobForm" data-action="{{$url}}">
                                                <input type="hidden" name="redirect_link" value="{{route('admin.FAQs')}}">
                                                <input type="hidden" name="type" value="faqs">
                                                <div class="card-body">
                                                  @csrf
                                                  <div class="row">  
                                                    <div class="col-md-6">  
                                                        <div class="form-group">
                                                          <label for="category-meta-Tags">{{_lang('Job Title')}}</label>
                                                          <input type="text" class="form-control" value="{{!empty($category) ? $category->title : ''}}" 
                                                          id="category-meta-Tags" name="title" placeholder="{{_lang('Enter Job Title')}}" required="">
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-6">  
                                                        <div class="form-group">
                                                          <label for="category-meta-Tags">{{_lang('Location')}}</label>
                                                          <input type="text" class="form-control" value="{{!empty($category) ? $category->location : ''}}" 
                                                            name="location" placeholder="{{_lang('Enter Location')}}" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">  
                                                        <div class="form-group">
                                                          <label for="category-meta-Tags">{{_lang('Job Type')}}</label>
                                                          <select class="form-control" name="job_type" required="">
                                                               <option value="">{{_lang('Type')}}</option>
                                                               <option value="Remote" {{!empty($category) && $category->job_type == 'Remote' ? 'selected' : ''}}>{{_lang('Remote')}}</option>
                                                               <option value="On Site" {{!empty($category) && $category->job_type == 'On Site' ? 'selected' : ''}}>{{_lang('On Site')}}</option>
                                                               <option value="Remote / On Site" {{!empty($category) && $category->job_type == 'Remote / On Site' ? 'selected' : ''}}>{{_lang('Both')}}</option>
                                                          </select>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-6">  
                                                        <div class="form-group">
                                                          <label for="category-meta-Tags">{{_lang('Full Time | Part Time')}}</label>
                                                          <select class="form-control" name="job_timing" required="">
                                                               <option value="">{{_lang('Type')}}</option>
                                                               <option value="{{_lang('Full Time')}}" {{!empty($category) && $category->job_timing == _lang('Full Time') ? 'selected' : ''}}>{{_lang('Full Time')}}</option>
                                                               <option value="{{_lang('Part Time')}}" {{!empty($category) && $category->job_timing == _lang('Part Time') ? 'selected' : ''}}>{{_lang('Part Time')}}</option>
                                                               <option value="{{_lang('Full Time | Part Time')}}"  {{!empty($category) && $category->job_timing == _lang('Full Time | Part Time') ? 'selected' : ''}}>{{_lang('Both')}}</option>
                                                          </select>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-12">  
                                                        <div class="form-group">
                                                          <label for="category-meta-Tags">{{_lang('Job Description')}}</label>
                                                          <textarea class="form-control" name="description" required="">{{!empty($category) ? $category->description : ''}}</textarea>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-12">  
                                                        <div class="form-group">
                                                          <label for="category-meta-Tags">{{_lang('Job Role')}}</label>
                                                          <textarea class="form-control" name="job_role" required="">{{!empty($category) ? $category->role : ''}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                     <div class="col-md-12" id="getOther">  
                                                        
                                                      @if(!empty($category) && !empty($category->other))
                                                        <?php $others = json_decode($category->other); ?>
                                                        @foreach($others as $o)
																<div class="row"> 
																<div class="col-md-11">
																<div class="form-group">
																<label for="category-meta-Tags">{{_lang('Other Title')}}</label>
																<input type="text" name="other_title[]" class="form-control" value="{{$o->title}}" required>
																</div>
																<div class="form-group">
																<label for="category-meta-Tags">{{_lang('Other Description')}}</label>
																<textarea class="form-control" name="other_description[]" class="form-control" required>{{$o->description}}</textarea>
																</div>
																</div>
																<div class="col-md-1"><a href="javascript:void(0)" class="btn btn-remove btn-danger">{{_lang('Remove')}}</a></div></div>

                                                        @endforeach
                                                      @endif

                                                         
                                                     </div>
                                                      <div class="col-md-12 text-right"><a href="javascript:void(0)" class="btn btn-primary addOther">{{_lang('Add More Information')}}</a></div>
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
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

<script type="text/javascript" src="{{url('admin_assets/stm.js')}}"></script>
<script type="text/javascript">

 CKEDITOR.replace( 'description');
 
 
$("body").on('click','.addOther',function(e){
  e.preventDefault();
  var $getOther = $("body").find('#getOther');
  $getOther.append(addOther());
});

  
$("body").on('click','.btn-remove',function(e){
  e.preventDefault();
  var $this = $(this);
   $this.closest('.row').remove();
});


function addOther() {
$text = '<div class="row">';
$text +='<div class="col-md-11">';
$text +='<div class="form-group">';
$text +='<label for="category-meta-Tags">{{_lang("Other Title")}}</label>';
$text +='<input type="text" name="other_title[]" class="form-control" required>';
$text +='</div>';
$text +='<div class="form-group">';
$text +='<label for="category-meta-Tags">{{_lang("Other Description")}}</label>';
$text +='<textarea class="form-control" name="other_description[]" class="form-control" required></textarea>';
$text +='</div>';
$text +='</div>';
$text +='<div class="col-md-1"><a href="javascript:void(0)" class="btn btn-remove btn-danger">{{_lang("Remove")}}</a></div></div>';
return $text;
}







</script>
@endsection