

@if($booking->count() > 0)
 
    @php $books = $booking->paginate(10); @endphp                    
       @foreach($books as $book)  


       <div class="col-lg-3">
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
                  <p class="text-center"><a href="{{route('artist.myvideos.detail',$book->id)}}">#{{$book->ocassion->label}}</a></p>
                </div>
              </figcaption>
            <div class="modal fade" id="myModal-{{$book->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                 <div class="modal-body p-0">
                      <div class="embed-responsive embed-responsive-16by9">
                         <video  controls="" width="640" height="480">
                                <source type="video/mp4" src="{{url($book->video_link)}}">
                         </video>
                      </div>
                </div>
              </div>
            </div>
            </div> 
          </div>
          </div>

 
        @endforeach
</ul> 
<div class="custom_paginate"> 
{{$books->links()}}
</div>
@else
  <div class="alert alert-warning">No Video</div>
@endif    