

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
                  <a href="{{url($book->video_link)}}" class="btn video-btn bg-transparent" data-rel="lightcase">
                <i class="fas fa-play"></i>
                </a>
               </div>
                <div class="video-caption">
                  <p class="text-center"><a href="{{route('user.myvideos.detail',$book->id)}}">#{{$book->ocassion->label}}</a></p>
                </div>
              </figcaption>
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