

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
                      
                    </figure>
                    <br>
                    <label class="">Category: </label><span class="singer-detail"> 
                      @if(!empty($book->celebrity->categories)) 
                        @foreach ($book->celebrity->categories as $key => $c) 
                            <span class="bedge">{{$key > 0 ? ' | ' : ''}}{{$c->category->label}} </span>
                           
                        @endforeach
                      @endif
                    </span>
                    <br>
                    <label class="">Ocassion: </label><span class="singer-detail">{{$book->ocassion->label}}</span><br>

                  <?= $book->getStatus() ?>
                </div>
                <div class="right_info_box text-right">
                  <p class="booking-to d-inline mr-2">To: {{$book->to}}</p>
                    {!!$book->getStatusButton()!!}
                     <p class="booking-time mt-3">{{date('d, M, Y h:i A',strtotime($book->created_at))}}</p>
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
                         <li><label class="inline-label">Booking Date</label> <div class="Bk_detail"><p>{{date('d, M, Y h:i A',strtotime($book->created_at))}}</p></div></li>
                        <li><label class="inline-label">Days Left</label> <div class="Bk_detail"><p>{{$days}}</p></div></li>
                        <li><label class="inline-label">Instructions</label> <div class="Bk_detail"><p>{{$book->instructions}}</p></div></li>
                      </ul>
                      <label class="inline-label mt-4">{{$book->profile_showable == 1 ? '*Video Link will remain hidden from your profile.' : ''}}</label>
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