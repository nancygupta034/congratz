@extends("admin.layouts.layout")
@section("content")

    <div class="main_content dashboard_content">
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard_heading">
                        <div class="dashboard_title">
                            <div class="dashboard_title user_single_anchor">
                                <a class="active" href="{{route('admin.settings')}}"><i class="fa fa-angle-left" aria-hidden="true"></i>Add City</a>
                            </div>
                        </div>
                        <div class="dashboard_title_btn user_dashboard_title_btn">
                            <a href="{{ route('admin.cityListing') }}" type="button" class="btn add_new_btn">View</a>
                        </div>
                    </div>
                </div>
            </div>
         










            
            <form class="row"  method="POST" action="{{ route('admin.cityEdit', $city->id) }}" 

                    enctype="multipart/form-data" id="editCityForm" 

                    name="editCityForm" 

                    class="needs-validation">
                <div class="col-lg-8">
                    <div class="admin_fonm_outer">


                  

                    @csrf

                        <div class="box-body">
                            

                              <div class="form-group">

                                <label for="name">Country Name</label>

                                <select class="form-control" name="country" id="country" required>
                                  <?php 
                                       $Country = \App\Models\Country::orderBy('name','ASC')->get();

                                       $state = \App\Models\State::where('id',$city->state_id);

                                   ?>
                                     @if(@sizeof($Country))
                                     @foreach($Country as $c)

                                    <option value="{{ $c->id }}" {{$state->count() > 0 && $state->first()->country_id == $c->id ? 'selected' : ''}}>{{ $c->name }}</option>
                                     @endforeach
                                     @endif

                                </select>

                            </div>



                            <div class="form-group">

                                <label for="name">State Name</label>

                                <select class="form-control" name="state_id" id="state_name" required>

                                    @if($state->count() > 0)
                                    <?php 
                                         $countryy = \App\Models\Country::where('id',$state->first()->country_id);
                                     ?>
                                     @if($countryy->count() > 0)
                                     @foreach($countryy->first()->states as $listingStates)

                                    <option value="{{ $listingStates->id }}" @if($listingStates->id == $city->state_id) selected=selected @endif>{{ $listingStates->name }}</option>

                                    @endforeach

                                    @endif
                                    @endif

                                </select>

                            </div>

                            <div class="form-group">

                                <label for="name">City Name</label>

                                <input type="text" value="{{ $city->name }}" name="name" class="form-control" id="name" placeholder="Enter City Name" required>

                            </div>

                        </div>



                        <div class="box-footer">
                               <button id="countrySubmitButton" type="submit" class="btn btn_pink">Add City</button>
                        </div>

                   
                    </div>
                </div>
            </form>
        
            </div>



<!-- Right side column. Contains the navbar and content of the page -->

     
<input type="hidden" name="" id="countryUrl" value="{{url(route('ajax.countries'))}}">
@endsection

@section('custom_scripts')
 
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
                               url :"{{url(route('ajax.countries'))}}",
                               
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



 