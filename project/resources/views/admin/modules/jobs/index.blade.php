@extends('admin.layouts.layout')
@section('content')



    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{_lang('Job')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{_lang('Dashboard')}}</a></li>
              <li class="breadcrumb-item active">{{_lang('Job List')}}</li>
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
                {{_lang('Jobs Listing')}}
                 
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <a href="{{route('admin.jobs.create')}}" class="btn btn-success btn-sm">
                  <i class="fas fa-plus"></i>
                  
                </a>

                 <button class="btn btn-danger btn-sm btn-all-del" disabled>
                  <i class="fas fa-trash"></i>
                 </button>
                
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
                 <div class="col-md-12">
                    <form id="tableFilter" data-action="{{route('admin.jobs')}}">
                      @csrf
                      <table class="table">
                        <thead>
                          <tr>
                                      <th><div class="myCheckbox">
                                           <input type="checkbox" id="allCheck" name="fruit-1" value="Apple">
                                            <label for="allCheck"></label>
                                        </div>
                                      </th>
                                      <th>{{_lang('Job Title')}}</th>
                                      <th>{{_lang('Job Type')}}</th>
                                      <th>{{_lang('Location')}}</th>
                                      
                                      <th>{{_lang('Actions')}}</th>
                          </tr>
                        </thead>
                        <tbody id="getCategory">
                         
                        </tbody>
                      </table>
                     
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
<script type="text/javascript" src="{{url('admin/stm.js')}}"></script>
<script type="text/javascript">



$("body").on('click','.btn-all-del',function(){
   var $this = $("body").find('#tableFilter');
   formFilter($this);
});


$("body").on('click','.pagination a.page-link',function(e){
  e.preventDefault();
   var $this = $(this);
   getCategory($this.attr('href'));
});

getCategory();
  
function getCategory($url="{{route('admin.jobs.ajax')}}") {
  var $loader = $("body").find('.loader');
   $.ajax({
                url : $url,
                type: 'GET',  
                dataTYPE:'JSON',
               
                headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
                },
                beforeSend: function() {
                       $loader.show();    
                },
                success: function (result) {
                    $("body").find('#getCategory').html(result.data);
                },
                complete: function() {
                       $loader.hide();    
                },
                error: function (jqXhr, textStatus, errorMessage) {
                     console.log('------------------------');
                     console.log(jqXhr);
                     console.log('------------------------');
                     console.log(textStatus);
                     console.log('------------------------');
                     console.log(errorMessage);
                }

    });
}







 


  
function formFilter($this) {
   var $loader = $("body").find('.loader');
   $.ajax({
                url : $this.data('action'),
                type: 'POST',  
                dataTYPE:'JSON',
                data:$this.serialize(),
                headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
                },
                beforeSend: function() {
                       $loader.show();    
                           
                },
                success: function (result) {
                     
                     getCategory(); 
                       $loader.hide();    
                },
                complete: function() {
                       $loader.hide();    
                         
                },
                error: function (jqXhr, textStatus, errorMessage) {
                     console.log('------------------------');
                     console.log(jqXhr);
                     console.log('------------------------');
                     console.log(textStatus);
                     console.log('------------------------');
                     console.log(errorMessage);
                }

    });
}










 $("body").on('change','#allCheck',function(){
    var $this = $( this )  ;
    var $checkboxes = $("body").find('.checkFilter');
    if($this.is(':checked')){
       $checkboxes.prop('checked',true);
    }else{
       $checkboxes.prop('checked',false);
    }
allCheck();
    
 });




 $("body").on('change','.checkFilter',function(){
    var $this = $( this );
    var $singleDel = $($this.data('id'));
    // if($this.is(':checked')){
    //    $singleDel.removeAttr('disabled');
    // }else{
    //    $singleDel.attr('disabled','true');
    // }
    allCheck();
    
 });





 $("body").on('click','.btn-all-del',function(){
    var $this = $( this );
     var $loader = $("body").find('.loader');
     $.ajax({
                url : $this.data('action'),
                type: 'GET',  
                dataTYPE:'JSON',
                
                headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
                },
                beforeSend: function() {
                       $loader.show();    
                           
                },
                success: function (result) {
                     
                     getCategory(); 
                       $loader.hide();    
                },
                complete: function() {
                       $loader.hide();    
                         
                },
                error: function (jqXhr, textStatus, errorMessage) {
                     console.log('------------------------');
                     console.log(jqXhr);
                     console.log('------------------------');
                     console.log(textStatus);
                     console.log('------------------------');
                     console.log(errorMessage);
                }

    });
    
 });







function allCheck() {
  var $checkboxes = $("body").find('.checkFilter:checked');
  if(parseInt($checkboxes.length) > 0){
    $("body").find('.btn-all-del').removeAttr('disabled');
  }else{
    $("body").find('.btn-all-del').attr('disabled','true');
  }
}


</script>
@endsection