@extends('artists.layouts.layout')
@section('content')







 <div class="content-block">
                <div class="main-heading mb-5">
                   <h2>Dashboard</h2>
                </div>
                <div class="card-block mb-5">
                    
                </div>
                <div class="btn-wrap">
                      <a href="javascript:void(0);" class="main-btn">Back</a>
                   </div>
</div>










@endsection
@section('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
<script src="{{url('js/home/ajax.js')}}"></script>
<script src="{{url('js/home/register.js')}}"></script>
<script type="text/javascript">
  
    $("body").on('change','#country',function(){
         var val = $( this ).val();
         country('#state_name',val,0);
    });

     $("body").on('change','#state_name',function(){
         var val = $( this ).val();
         country('#city_name',0,val);
    });


     


        function country(div,country_id,state_id=0,val=0) {
              
              
                   $.ajax({
                       url : "{{url(route('ajax.countries'))}}",
                       
                       type: 'GET',  // http method
                       data:{
                          country_id : country_id,
                          val : val,
                          state_id : state_id
                       },
                       dataTYPE:'JSON',
                     
                        beforeSend: function() {
                          //   $("body").find('.custom-loading').show();
                          // $this.find('button').attr('disabled','true');
                        },

                       success: function (result) {
                             $(div).html(result);
                       },
                       complete: function() {
                              //   $("body").find('.custom-loading').hide();
                              // $this.find('button').removeAttr('disabled');
                       },
                       error: function (jqXhr, textStatus, errorMessage) {
                             //alert('error');
                       }

                });
   }

</script>
@endsection