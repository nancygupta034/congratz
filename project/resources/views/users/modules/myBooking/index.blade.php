@extends('users.layouts.layout')
@section('content')

 <div class="content-block">
                <div class="main-heading mb-5">
                   <h2>My Bookingss</h2>
                </div>
                <div class="card-block mb-5"> 
                   <div class="dashboard-tabs">
                     <div class="tab-content">
                   <form id="filterBooking" data-action="{{route('user.myBookingStatus.ajax')}}">
                        <div class="tab_btn-grp d-f j-c-c">
                           <ul class="nav nav-tabs" role="tablist">
                             <li class="nav-item">
                               <span class="tab-radio-btn">
                                <input type="radio" name="booking" value="0" class="booking-status" id="new-booking" checked="">
                                <label class="nav-link booking-status-active" for="new-booking">New Booking</label>                               
                             </span>
                            </li>
                             <li class="nav-item">
                                <span class="tab-radio-btn">
                                <input type="radio" name="booking" value="1" class="booking-status" id="old-booking">
                                <label class="nav-link booking-status-active " for="old-booking">Old Booking</label>
                                </span>                               
                            </li>
                          </ul>
                        </div>
                     
                    
                      
                        <div class="booking-filter-bar d-f a-i-c j-c-s-b">
                           <label class="filter-label ">Filters -</label>
                           <div class="filter-fild-grp">
                              <div class="form-group">
                                 <label class="inline-label">Status:</label>
                                 <select class="form-control booking-status" name="status" style="min-width: 120px;">
                                    <option value="All">All</option>
                                    <option value="0">New</option>
                                    <option value="1">Processing</option>
                                    <option value="2">Ready</option>
                                    <option value="3">Completd</option>
                                    <option value="4">Refunded</option>
                                    <option value="5">Canceled</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label class="inline-label">Occasion:</label>
                                 <select class="form-control booking-status" name="event" style="min-width: 120px;">
                                    <option value="All">All</option>
                                    @foreach($events as $e)
                                    <option value="{{$e->id}}">{{$e->label}}</option>
                                    @endforeach
                                 </select>
                              </div>
                             
                           </div>
                        </div>
                      </form>
                        <div class="tab-pane active show"  id="getBookingItems">                          
                            
                        </div>

                                                
                     </div>
                   </div>           
                </div>                
             </div>
@endsection
@section('js')
<script type="text/javascript">
   

$("body").on('change','.booking-status',function(e){
  e.preventDefault();
  
  getBookingItems();
});


getBookingItems();

function getBookingItems() {
                   $this = $("#filterBooking");
                    $.ajax({
                       url : $this.data('action'),
                       type: 'GET',  // http method
                       data:$this.serialize(),
                       dataTYPE:'JSON',
                       beforeSend: function() {
                          $("body").find('.custom-loading').show();
                          // $this.find('button').attr('disabled','true');

                        },

                       success: function (result) {
                              $("body").find('.custom-loading').hide();
                               $("body").find('#getBookingItems').html(result.list);
                       },
                        

                });
}



$("body").on('click','.changeBookingStatus',function(e){
  e.preventDefault();
   $this = $(this);
                    $.ajax({
                       url : $this.data('action'),
                       type: 'GET',  // http method
                       
                       dataTYPE:'JSON',
                       beforeSend: function() {
                          $("body").find('.custom-loading').show();
                          // $this.find('button').attr('disabled','true');

                        },

                       success: function (result) {
                              $("body").find('.custom-loading').hide();
                              alert(result.message);
                              if(result.status == 1){
                                
                               getBookingItems();
                              }
                       },
                        

                });


});

</script>
@endsection
