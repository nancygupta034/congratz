@extends('users.layouts.layout')
@section('content')
  <div class="content-block">
       <div class="main-heading mb-5">
           <h2>Personalized Video</h2>
        </div>
            <div class="card-block p-3">
                 <div class="tab-content">
             <form id="filterBooking" data-action="{{route('user.myvideos.ajax')}}">
              <div class="booking-filter-bar d-f a-i-c j-c-s-b">
                  <label class="filter-label ">Filters -</label>
                   <div class="filter-fild-grp">
                             <div class="form-group">
                                 <label class="inline-label">Occasion:</label>
                                 <select class="form-control booking-status" name="event" style="min-width: 120px;">
                                    <option value="All">All</option>
                                    @foreach($events as $e)
                                    <option value="{{$e->id}}">{{$e->label}}</option>
                                    @endforeach
                                 </select>
                              </div>
                  
                      <div class="form-group">
                         <label class="inline-label">Start Date:</label>
                          <input type="date" class="form-control" id="start" name="start_date"
                           value="Start Date" style="min-width: 200px;">
                      </div>
                      <div class="form-group">
                         <label class="inline-label">End Date:</label>
                          <input type="date" class="form-control" name="end_date" id="start"  
                             value="End Date"
                              style="min-width: 200px;">
                      </div>
                   </div>
                </div>
              </form>
            <div class="row videos" id="getBookingItems">
               

            
 
         </div>
 
         </div>
  
          <!-- <nav aria-label="Page navigation example" class="my-5">
              <ul class="pagination j-c-c">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav> -->
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
