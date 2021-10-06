@extends('users.layouts.layout')
@section('content')
             <div class="content-block">
                <div class="main-heading mb-5">
                   <h2>Wishlist</h2>
                </div>
                <div class="card-block mb-5">
                  <!-- Celebrities listing -->
                      <section class="celebrities-list-sec">
                        <div class="container-fluid">
                          <div class="cele-listing-block">
                           <div class="row">
                            @foreach($wishlists as $book)
                                 <div class="col-4">
                                   <img src="{{url($book->celebrity->profile_picture)}}" class="img-responsive">
                                   <h4><a href="{{route('celebrity.detail',$book->celebrity->id)}}">{{$book->celebrity->name}}</a></h4>
                                 </div>

                            @endforeach

                          </div>
                              {{$wishlists->links()}}
                         </div>
                      </div>
                    </section>
              </div>
          </div>
@endsection