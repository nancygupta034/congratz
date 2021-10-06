 
@php $list = 0; @endphp
 @foreach($booking as  $book)
         <tr data-count="{{$list++}}">
           
           <td width="50%">
             
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
                  
                    <label class="">Ocassion: </label><span class="singer-detail">{{$book->ocassion->label}}</span><br>
                    <label class="">Admin Status: </label><span class="singer-detail"><strong>{{$book->admin_status == 1 ? 'Approved' : 'Pending'}}</strong></span><br>
                    
                    <h4> <?= $book->getStatus() ?></h4>

                    
                   @if($book->admin_status == 0)
                       <div>
                           <button type="button" data-action="{{route('admin.booking.active',[$book->id,1])}}" class="btn btn-primary menu_active">Approve</button>
                           <button type="button" data-action="{{route('admin.booking.active',[$book->id,2])}}" class="btn btn-primary menu_active">Reject</button>
                       </div>
                  @else
                         <span class="badge badge-danger">{{($book->admin_status == 1) ? _lang('Approved') : _lang('Rejected') }}</span>

                  @endif

                  <a href="{{route('admin.booking.detail',$book->id)}}">Detail</a>
                </div>
              </div>
           </td>
             
          

           
         </tr>
  @endforeach


  @if($list == 0)
      <tr>
        <td colspan="2">{{_lang('No Data')}}</td>
        </tr>
  @endif
       <tr>
        <td colspan="2">{{$booking->links()}}</td>
      </tr>

