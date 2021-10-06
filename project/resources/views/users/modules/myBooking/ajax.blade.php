

@if($booking->count() > 0)
<ul class="booking_listing">
    @php $books = $booking->paginate(10); @endphp                    
       @foreach($books as $book)      
            <li><figure class="booking_img"><img src="{{url($book->celebrity->profile_picture)}}"></figure>
              <figcaption class="booking_info">
                <div class="left_info_box">
                  <h3 class="tr_name d-inline">{{$book->celebrity->name}}</h3>
                    <figure class="tr_profile_flag d-inline">
                       @if(!empty($book->celebrity->country))
                            @if(!empty($book->celebrity->country->image))
                            <img src="{{url($book->celebrity->country->image)}}" alt="flag.jpg" class="rounded">
                            @else
                                {{$book->celebrity->country->name}}
                            @endif
                          
                          @endif
                      
                    </figure><br>
                    <label class="">Category: </label><span class="singer-detail"> @if(!empty($book->celebrity->categories)) 
            @foreach ($book->celebrity->categories as $key => $c) 
                <span class="bedge">{{$key > 0 ? ' | ' : ''}}{{$c->category->label}} </span>
               
            @endforeach
          @endif   </span><br>
                    <label class="">Ocassion: </label><span class="singer-detail">{{$book->ocassion->label}}</span><br>

                    <a href="{{route('user.myBookingStatus.detail',$book->id)}}" class="main-btn white-btn mt-3">Detail</a>
                </div>
                <div class="right_info_box text-right">
                  <p class="booking-to d-inline mr-2">To: {{$book->to}}</p>
                  {!!$book->geUserStatus()!!} 
                  <p class="booking-time mt-3">{{date('d, M, Y h:i A',strtotime($book->created_at))}}</p>
                </div>
              </figcaption>
            </li>
        @endforeach
</ul> 
<div class="custom_paginate"> 
{{$books->links()}}
</div>
@else
  <div class="alert alert-warning">No Booking</div>
@endif    