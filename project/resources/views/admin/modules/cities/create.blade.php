@extends('admin.layouts.layout')
@section('content')



    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{_lang('CITIES')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{_lang('Dashboard')}}</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.city.list')}}">{{_lang('City')}}</a></li>
              <li class="breadcrumb-item active">{{_lang('City')}}</li>
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
                              <h3 class="card-title">{{_lang('City Addation')}}
                                
                                 
                              </h3>
                              <!-- tools box -->
                              <div class="card-tools">
                                <a href="{{route('admin.city.list')}}" class="btn btn-danger btn-sm">
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

                                <label for="name">{{_lang('Country Name')}}</label>

                                <select class="form-control" name="country_id" id="country" required>
                                  <option value="">{{_lang('select')}}</option>
                                     @foreach($countries as $c)

                                    <option value="{{ $c->id }}" <?= !empty($country) && !empty($country->state) && $country->state->country_id == $c->id ? 'selected' : '' ?>>
                                      {{ (Session::has('locale') && Session::get('locale') == 'AR') && !empty($c->arabic) ? $c->arabic->name : $c->name }} 
                                    </option>
                                     @endforeach
                                     

                                </select>

                            </div>


                             <div class="form-group">

                                <label for="name">{{_lang('State Name')}}</label>

                                <select class="form-control" name="state_id" id="state_name" required>

                                     <option value="">{{_lang('State')}}</option>

                                   @if(!empty($country->state))
                                    <?php 
                                         $countryy = \App\Models\Country::where('id',$country->state->country_id)->where('has_parent',0);
                                     ?>
                                     @if($countryy->count() > 0)
                                     @foreach($countryy->first()->states as $listingStates)

                                        <option value="{{ $listingStates->id }}" @if($listingStates->id == $country->state_id) selected=selected @endif>
                                           {{ (Session::has('locale') && Session::get('locale') == 'AR') && !empty($listingStates->arabic) ? $listingStates->arabic->name : $listingStates->name }} 
                                          
                                        </option>

                                    @endforeach

                                    @endif
                                    @endif

                                </select>

                            </div>

                            <div class="form-group">

                                <label for="name">{{_lang('City Name')}}</label>

                                <input type="text" value="{{!empty($country) ? $country->name : ''}}" name="name" class="form-control" id="name" placeholder="{{_lang('Enter City Name')}}" required>

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