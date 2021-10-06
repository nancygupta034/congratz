@extends('users.layouts.layout')
@section('content')



   <div class="content-block">
       <div class="main-heading mb-5">
           <h2>Personalized Video</h2>
        </div>
        <div class="card-block p-0">
        <div class="row">
          <div class="col-lg-5">
            <div class="video-section">
              <figure class="video-image">
                 <img src="{{url($book->celebrity->profile_picture)}}">
              </figure>
              <figcaption>
                <div class="play-icon">
                 <button type="button" class="btn video-btn bg-transparent" data-toggle="modal" data-src="https://www.youtube.com/embed/A-twOC3W558" data-target="#myModal-{{$book->id}}">
                <i class="fas fa-play"></i>
              </button>
               </div>
                <div class="video-caption">
                  <p class="text-center">#{{$book->ocassion->label}}</p>
                </div>
              </figcaption>
           <div class="modal fade" id="myModal-{{$book->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                 <div class="modal-body p-0">
                      <div class="embed-responsive embed-responsive-16by9">
                         <video controls="" width="640" height="480">
                                <source type="video/mp4" src="{{url($book->video_link)}}">
                         </video>
                      </div>
                </div>
              </div>
            </div>
            </div> 
            <div class="btn-wrap mt-5 d-f j-c-s-b mb-4">
              <a href="javascript:void(0);" class="main-btn2 mx-3">Copy Link</a>
              <a href="javascript:void(0);" class="main-btn2">Download</a>
            </div>
          </div>
        </div>

          <div class="col-lg-7">
            <div class="Personalized-details p-4">
              <div class="card_head d-f j-c-s-b a-i-c">

               

               <div class="tr_user_info">
                 <figure class="tr_profile">
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
                   <div class="tr-cate-rating d-f a-i-c">
                     <div class="cate_name mr-3">@if(!empty($book->celebrity->categories)) 
            @foreach ($book->celebrity->categories as $key => $c) 
                <span class="bedge">{{$key > 0 ? ' | ' : ''}}{{$c->category->label}} </span>
               
            @endforeach
          @endif</div>
                     @if(!empty($book->celebrity->reviews))
                     <?php $rating = $book->celebrity->celebrityRate(); ?>
                     <div class="tr_rating">
                       <span class="rating-count">{{custom_format($rating['rate'],1)}}</span>
                       <span class="rating-star">{!!$rating['stars']!!}</span>
                     </div>
                     @endif
                   </div>
                  <div class="btn-wrap mt-4">
                  <a href="{{route('celebrity.detail',$book->celebrity->id)}}" class="main-btn2 mr-4">View Profile</a>
                  <a href="{{route('user.myvideos')}}" class="main-btn2">Back</a>
                  </div>
                 </figcaption>
               </div>
              
            </div> 
            <div class="card_body">
            <div class="full_block_icon text-center mt-4 mb-4">
            <span class="sec-heading-icon mt-0"><i class="icon-review"></i></span>
            </div>
            <div class="celebrity_message">
            <h3>Celebrity Message:</h3>
            <p>{{$book->celebrity_message}}</p>
            <h3>Share:</h3>
             <div class="btn-wrap mt-4 d-f j-c-s-b">
                <div class="addthis_inline_share_toolbox social-links mt-4"></div>
             </div>
          </div>
           <div class="full_block_icon text-center mt-4 mb-4">
            <span class="sec-heading-icon mt-0"><i class="icon-review"></i></span>
            </div>

            <div class="personalized_reviews">
              <h3>Reviews</h3>
               <div class="card-inn-heading d-f j-c-s-b mb-2">
                  <a href="javascript:void(0);" class="main-btn">See all {{$book->celebrity->reviews->count()}} review</a>
                  <div class="btn-wrap">
                  	@if(empty($book->review) || $book->review->count() == 0)
                    
					<a href="javascript:void(0);" class="main-btn2 "  data-toggle="modal" data-target="#exampleModal">Add Review</a>


					<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					       <form id="bookingUploadVideoForm" data-action="{{route('user.myvideos.review',$book->id)}}">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Add Review</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        
					             @csrf
					             <div class="row">
					                 <div class="col-12">
					                   <div class="form-group">
					                      <label>Title</label>
					                      <input type="text" name="title" class="form-control" required="">
					                   </div>

					                    <div class="form-group">
					                      <label>Rating</label>
					                     <select name="rating" class="form-control" required="">
					                     	<option value="">select</option>
					                     	<option value="5">5 Stars</option>
					                     	<option value="4">4 Stars</option>
					                     	<option value="3">3 Stars</option>
					                     	<option value="2">2 Stars</option>
					                     	<option value="1">1 Star</option>
					                     </select>
					                   </div>
					                    <div class="form-group">
                                            <label>Review</label>
                                            <textarea name="review" class="form-control" required=""></textarea>
					                    </div>
					                 </div>
					             </div>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					        <button id="uploadVideo" class="btn btn-primary">Submit</button>
					      </div>
					         </form>
					    </div>
					  </div>
					</div>




                    @endif
                  </div>
               </div>

               @if(!empty($book->review))
               @foreach($book->review as $review)
              <div class="tr_rating">
                      <span class="rating-star">{!!rattingStar($review->rating)!!}</span>
                      <span class="rating-count">{{$review->rating}} {{$review->rating > 1 ? 'Stars' : 'Star'}}</span>
                      <h4 class="review_by mt-2">Reviewed by {{$review->user->name}} in {{date('M d, Y',strtotime($review->created_at))}}</h4>
                      <p class="review-message d-inline">{{$review->reviews}}</p>
                      @if(!empty($review->replies) && $review->replies->count() > 0)
                           <h4 class="review_by mt-2">Replies</h4>
                           @foreach($review->replies as $r)
                              <div class="tr_rating"> 
                                <hr>
                               <p class="review-message d-inline">{{$r->reviews}}</p>
                             </div>
                            @endforeach
                      @endif
             </div>
             @endforeach
             @endif
            </div>

             
           </div>
          </div>
        </div>
        </div>
      </div>

            </div>





@endsection
@section('stylesheets') 
<meta property="og:url"  content="{{\Request::fullUrl()}}" />
<meta property="og:type" content="website"/>

<meta property="og:title" content="{{$book->celebrity->name}}"/>
<meta property="og:description" content="{{$book->celebrity_message}}"/>

<meta property="og:video" content="{{url($book->video_link)}}"/>

   
@endsection
@section('js')
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-60db3b955fee0d04"></script>

<script type="text/javascript">

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