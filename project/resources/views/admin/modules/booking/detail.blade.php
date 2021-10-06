@extends('admin.layouts.layout')
@section('content')



    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{_lang('Booking')}} </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{_lang('Dashboard')}}</a></li>
              <li class="breadcrumb-item active">{{_lang('Booking Detail')}}</li>
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
                {{_lang('Booking Detail')}}
                 
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                


                
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
                   <div class="col-md-6">
                        <div class="row">
                <div class="col-md-3">
                   @if(!empty($book->celebrity))
                    <figure class="booking_img"><img src="{{url($book->celebrity->profile_picture)}}" class="img-thumbnail" style="width: 120px"></figure>
                  @endif

                </div>
                <div class="col-md-9">
                   <h3 class="tr_name d-inline">{{$book->celebrity->name}}</h3>
                    <figure class="tr_profile_flag d-inline">
                         @if(!empty($book->celebrity->country))
                            @if(!empty($book->celebrity->country->image))
                            <img src="{{url($book->celebrity->country->image)}}" alt="flag.jpg" class="rounded img-thumbnail" style="width: 50px">
                            @else
                                {{$book->celebrity->country->name}}
                            @endif
                          @endif
                     </figure>
                    <div>

                    <label class="">{{_lang('Category')}}: </label><span class="singer-detail"> 
                      @if(!empty($book->celebrity->categories)) 
                        @foreach ($book->celebrity->categories as $key => $c) 
                            <span class="bedge">{{$key > 0 ? ' | ' : ''}}{{$c->category->label}} </span>
                         @endforeach
                      @endif
                    </span>
                  </div>
                  
                    <label class="">{{_lang('Ocassion')}}: </label><span class="singer-detail">{{$book->ocassion->label}}</span><br>
                    <label class="">{{_lang('Admin Status')}}: </label><span class="singer-detail"><strong>{{$book->admin_status == 1 ? _lang('Approved') : _lang('Pending')}}</strong></span><br>
                    
                    <h4> <?= $book->getStatus() ?></h4>

                    
                   @if($book->admin_status == 0)
                       <div>
                           <button type="button" data-action="{{route('admin.booking.active',[$book->id,1])}}" class="btn btn-primary menu_active">{{_lang('Approve')}}</button>
                           <button type="button" data-action="{{route('admin.booking.active',[$book->id,2])}}" class="btn btn-primary menu_active">{{_lang('Reject')}}</button>
                       </div>
                  @else
                         <span class="badge badge-danger">{{($book->admin_status == 1) ? _lang('Approved') : _lang('Rejected') }}</span>

                  @endif
                </div>
              </div>
                   </div>




<div class="col-md-6">


                 <?php
                          $delivery_within = $book->celebrity->delivery_within;
                          $delivery_date = date('Y-m-d', strtotime('+ '.$delivery_within.' days',strtotime($book->created_at)));
                          $date1 = new DateTime($delivery_date);  //current date or any date
                          $date2 = new DateTime($book->created_at);   //Future date
                          $diff = $date2->diff($date1)->format("%a");  //find difference
                          $days = intval($diff);   //rounding days
               
              //it return 365 days omitting current day
                      ?>
                      <table class="booking_detail_list table">
                        <tr>
                          <th><label class="inline-label">{{_lang('Type of Booking')}}</label></th>
                          <td><div class="Bk_detail"><p>{{$book->booking_for == 1 ? _lang('Someone else') : _lang('Myself')}}</p></div></td>
                       </tr>
                        <tr>
                          <th><label class="inline-label">{{_lang('Ocassion')}}</label> </th>
                          <td><div class="Bk_detail"><p>{{$book->ocassion->label}}</p></div></td>
                        </tr>
                        <tr>
                              <th><label class="inline-label">{{_lang('From')}}</label> </th>
                              <td><div class="Bk_detail"><p>{{$book->from}}</p></div></td>
                            </tr>
                        <tr>
                              <th><label class="inline-label">{{_lang('To')}}</label> </th>
                              <td><div class="Bk_detail"><p>{{$book->to}}</p></div></td>
                            </tr>
                        <tr>
                              <th><label class="inline-label"> {{_lang('Delivery Date')}}</label> </th>
                              <td><div class="Bk_detail"><p>{{$delivery_date}}</p></div></td>
                            </tr>
                         <tr>
                              <th><label class="inline-label">{{_lang('Booking Date')}}</label></th>
                              <td><div class="Bk_detail"><p>{{$book->created_at}}</p></div></td>
                            </tr>
                        <tr>
                              <th><label class="inline-label">{{_lang('Days Left')}}</label> </th>
                              <td><div class="Bk_detail"><p>{{$days}}</p></div></td>
                            </tr>
                        <tr>
                              <th><label class="inline-label">{{_lang('Instructions')}}</label> </th>
                              <td><div class="Bk_detail"><p>{{$book->instructions}}</p></div></td>
                            </tr>
                      </table>
                      <label class="inline-label mt-4">{{$book->profile_showable == 1 ? _lang('*Video Link will remain hidden from your profile.') : ''}}</label>
                      <div class="btn-wrap mt-5">
                        @if($book->status == 1)
                        
                        @elseif(!empty($book->video_link))
                           <a href="javascript:void(0);" class="main-btn2 ml-3"  data-toggle="modal" data-target="#myModal">{{_lang('View Video')}}</a>
                          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                           <div class="modal-body p-0">
                                            <div class="embed-responsive embed-responsive-16by9">
                                             
                                             <video width="640" height="480">
                                            <source type="video/mp4" src="{{url($book->video_link)}}">
                                            </video>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      </div> 
                        @endif

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


 



$("body").on('click','.menu_active',function(){
   var $this = $(this);
   $url = $this.data('action');
    getCategory($url);
});

 
  
  
function getCategory($url="") {
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
                    
                   window.location.reload();
                      
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


 

  

</script>
@endsection