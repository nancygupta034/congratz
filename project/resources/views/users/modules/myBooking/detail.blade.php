@extends('users.layouts.layout')
@section('content')
 

      <div class="content-block">
                <div class="main-heading mb-5">
                   <h2>My Bookings</h2>
                </div>
                <div class="card-block mb-5">
                   <div class="card_head d-f j-c-s-b a-i-c">
                        <div class="tr_user_info">
			                 <figure class="profile_logo">
			                   <img src="{{!empty($book->user->profile_picture) ? url($book->user->profile_picture) : url('frontend/images/Justin-Bieber-img.jpg')}}">
			                 </figure>
			                 <figcaption class="tr_pro_info">
			                   <h3 class="tr_name d-inline">{{$book->user->name}}</h3>
			                     <figure class="tr_profile_flag d-inline">
			                      @if(!empty($book->celebrity->country))
                            @if(!empty($book->celebrity->country->image))
                            <img src="{{url($book->celebrity->country->image)}}" alt="flag.jpg" class="rounded">
                            @else
                                {{$book->celebrity->country->name}}
                            @endif
                          
                          @endif
			                     </figure>
                            @if(!empty($book->celebrity->reviews))
                     <?php $rating = $book->celebrity->celebrityRate(); ?>
                     <div class="tr_rating">
                       <span class="rating-count">{{custom_format($rating['rate'],1)}}</span>
                       <span class="rating-star">{!!$rating['stars']!!}</span>
                     </div>
                     @endif
			                   <div class="tr-cate-rating d-f a-i-c">
			                     <div class="cate_name mr-3"> <span>{{$book->celebrity->gender}}</span> | <span> {{$book->celebrity->getAge()}} Years</span></div>
			                 
			                   </div>
                           </figcaption>
                        </div>
                        <div class="btn-wrap">
                            <a href="{{route('celebrity.detail',$book->celebrity->id)}}" target="_blank" class="main-btn">View Profile</a>
                        </div>
                   </div>
                   <div class="card_body">
                    <div class="full_block_icon text-center mt-4 mb-4">
                    <span class="sec-heading-icon mt-0"><i class="icon-review"></i></span>
                    </div>
                      <div class="card-inn-heading d-f j-c-s-b mb-4">
                        <h3>Booking Details</h3>
                        <div class="btn-wrap">
                         {!!$book->geUserStatus()!!}
                        </div>
                      </div>
                      <?php
	                        $delivery_within = $book->celebrity->delivery_within;
	                        $delivery_date = date('Y-m-d', strtotime('+ '.$delivery_within.' days',strtotime($book->created_at)));
							$date1 = new DateTime($delivery_date);  //current date or any date
							$date2 = new DateTime($book->created_at);   //Future date
							$diff = $date2->diff($date1)->format("%a");  //find difference
							$days = intval($diff);   //rounding days
							 
							//it return 365 days omitting current day
                      ?>
                      <ul class="booking_detail_list">
                        <li><label class="inline-label">Type of Booking</label> <div class="Bk_detail"><p>{{$book->booking_for == 1 ? 'Someone else' : 'Myself'}}</p></div></li>
                        <li><label class="inline-label">Ocassion</label> <div class="Bk_detail"><p>{{$book->ocassion->label}}</p></div></li>
                        <li><label class="inline-label">From</label> <div class="Bk_detail"><p>{{$book->from}}</p></div></li>
                        <li><label class="inline-label">To</label> <div class="Bk_detail"><p>{{$book->to}}</p></div></li>
                        <li><label class="inline-label">Delivery Date</label> <div class="Bk_detail"><p>{{$delivery_date}}</p></div></li>
                         <li><label class="inline-label">Booking Date</label> <div class="Bk_detail"><p>{{$book->created_at}}</p></div></li>
                        <li><label class="inline-label">Days Left</label> <div class="Bk_detail"><p>{{$days}} {{$days > 1 ? 'Days' : 'Day'}}</p></div></li>
                        <li><label class="inline-label">Instructions</label> <div class="Bk_detail"><p>{{$book->instructions}}</p></div></li>
                      </ul>
                      <label class="inline-label mt-4">{{$book->profile_showable == 1 ? '*Video Link will remain hidden from your profile.' : ''}}</label>
                      <label class="inline-label mt-4">Video Link will be received at <a href="javascript:void(0);" class="normal-link">{{$book->email}}</a></label>
                      <div class="btn-wrap mt-5">

                          @if($book->status != 3 && $book->status != 4)
                            <!--  <a href="javascript:void(0);" data-action="{{route('user.myBookingStatus.Status',[$book->id,4])}}" class="main-btn changeBookingStatus">Refund Raise</a> -->
                             
                             <a href="javascript:void(0);" class="main-btn2 ml-3"  data-toggle="modal" data-target="#exampleModal">Refund Raise</a>
                          @endif

                        @if(!empty($book->video_link))
                           <a href="javascript:void(0);" class="main-btn2 ml-3"  data-toggle="modal" data-target="#myModal">View Video</a>
                           @if($book->status == 2)
                             <a href="javascript:void(0);" data-action="{{route('user.myBookingStatus.Status',[$book->id,3])}}" class="main-btn changeBookingStatus">I got the video</a>
                          @endif
                                     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                           <div class="modal-body p-0">
                                            <div class="embed-responsive embed-responsive-16by9">
                                               <video autoplay="" loop="" controls="" width="640" height="480">
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



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       <form id="bookingUploadVideoForm" data-action="{{route('user.raiseRefund',$book->id)}}">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Video</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
             @csrf
             <div class="row">
                 <div class="col-12">
                   <div class="form-group">
                      <label>Please enter reason for raising refund!</label>
                      <textarea name="refund_message" class="form-control" required="" maxlength="200"></textarea>
                   </div>
                 </div>
             </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="uploadVideo" class="btn btn-primary">Raise Refund</button>
      </div>
         </form>
    </div>
  </div>
</div>
@endsection
@section('js')
<script type="text/javascript">

//  




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
                                 window.location.reload();
                              }
                       },
                        

                });


});




$("body").on('submit','#bookingUploadVideoForm',function(e){
      e.preventDefault();
      registerEscort($(this));
});

function registerEscort($this) {
          
           var form = $this[0]; // You need to use standard javascript object here
           var formData = new FormData(form);
           var percent = $('body').find('.percent');
           var bar = $('.bar');
    $.ajax({
           url : $this.data('action'),
           data : formData,
           type: 'POST',  // http method
           dataTYPE:'JSON',
           contentType: false,
           cache: false,
           processData: false,

           beforeSend: function() {

                    $this.find('.loading').show();

                    $("body").find('.custom-loading').show();

                    $this.find('button.btn-ctm').attr('disabled','true');



          },

           xhr: function () {

            var xhr = new window.XMLHttpRequest();

            xhr.upload.addEventListener("progress", function (evt) {

                if (evt.lengthComputable) {

                    var percentComplete = evt.loaded / evt.total;

                    percentComplete = parseInt(percentComplete * 100);

                   // $('.progress').find('span.sr-only').text(percentComplete + '%');

                   // $('.progress .progress-bar').css('width', percentComplete + '%');

                }

            }, false);

            return xhr;

          },

           success:function(data)

           {

                            alert(data.message);
                   if(parseInt(data.status) == 1){

                            $this[0].reset();
                            setTimeout(function () {

                              window.location.reload();

                              return true;

                             },3000);



                      }else{
                        $this.find('.loading').hide();
                        $("body").find('.custom-loading').hide();
                     }
                  }



          });

 



           return false;

}



</script>
@endsection