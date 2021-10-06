@extends('artists.layouts.layout')
@section('content')


<div class="content-block">
                <div class="main-heading mb-5">
                   <h2>Availability</h2>
                </div>
             <div class="card-block mb-5">
               <form>
                 <div class="form-group">
                   <div class="switch-holder">
                    <div class="switch-label">
                       <span>Set profile available</span>
                    </div>
                    <div class="switch-toggle" data-children-count="1">
                        <!-- <input type="checkbox" id="Availability" name="toggleTheme" {{Auth::user()->availability == 1 ? 'checked' : ''}}> -->
                        <label for="data-theme"></label>
                    </div>
                    <input type="checkbox" id="Availability" name="toggleTheme" {{Auth::user()->availability == 1 ? 'checked' : ''}}>
                </div>
                </div>              
               </form>
              </div>
            </div>

@endsection
@section('js')
<script type="text/javascript">
	
  $("body").on('change','#Availability',function(){
    var $val = 0;
       if($(this).is(':checked')){
       	$val = 1;
       }

            $.ajax({
                       url : "{{url(route('artist.Availability.ajax'))}}",
                       
                       type: 'GET',  // http method
                       data:{
                           availability : $val,
                         },
                       dataTYPE:'JSON',
                       beforeSend: function() {
                          $("body").find('.custom-loading').show();
                          // $this.find('button').attr('disabled','true');

                        },

                       success: function (result) {
                              $("body").find('.custom-loading').hide();
                              if(result.status == 1){
                              	alert(result.message);
                              	window.location.reload();
                              }
                       },
                        

                });

  });

</script>
@endsection
