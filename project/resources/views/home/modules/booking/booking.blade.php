@extends('home.layouts.main-layout')
@section('main-content')

<style type="text/css">
  .modal-open .modal.modal-center {
  display: flex !important;
  align-items: center !important;
}
.modal-open .modal.modal-center .modal-dialog {
  flex-grow: 1;
}
main.layout-container{
	margin-bottom: 0px !important;
}
.site-form-layout {
    padding: 50px 0px;
}
</style>

          <section class="site-form-layout" style="background-image: url('<?= url('frontend/images/form-bg-image.png')?>');">
          	<a href="{{route('home.booking',$user->slug)}}" class="back-btn-icon"><i class="fi-br-angle-left"></i></a>
             <form class="row" id="formOcassionBooking" data-action="{{route('user.celebrityBooking',$user->slug)}}">
             @csrf

            <div class="container">
              <div class="form-blocks-wrap">
                <div class="forms-head text-center">
                  <a href="{{route('home')}}" class="logo">
                    <img src="<?= url('frontend/images/logo.png')?>">                    
                  </a>
                </div>
                <ul class="forms-step">
                  <li><a href="{{route('home.booking',$user->slug)}}" class="form-step">1. Account</a></li>
                  <li class="active"><a href="javascript:void(0);" class="form-step">2. Request</a></li>
                  <li><a href="javascript:void(0);" class="form-step">3. Payment</a></li>
                </ul>
                <div class="form-block">
                  <div class="form-block-inn">
                  <figure class="celeb-img profile-pic">
                    <img src="<?= url($user->profile_picture)?>">

                  </figure>
                  <div class="sec-heading text-center" data-aos="fade-left" data-aos-duration="1000">
                   <h2>New Request for {{$user->name}}</h2>
                     <span class="sec-heading-icon" data-aos="zoom-in" data-aos-duration="2000"><i class="icon-review"></i></span>
                  </div>
                  <div class="form-group text-center">
                    <h3 class="mini-heading">Who is this for?</h3>
                    <h5>Estimate Delivery Date: {{$user->delivery_date()}}</h5>
                    <ul class="cate_listing form_block_th mt-4">
                       <li>
                         <label for="males">
                          <input type="radio" name="booking_for" class="booking_for_radio" value="0" id="males" checked="">
                           <span class="cate_icon"><i class="fas fa-user-circle"></i></span> <h5>Myself</h5>
                        </label>
                       </li>
                       <li>
                        <label for="male">
                          <input type="radio" name="booking_for" class="booking_for_radio" value="1" id="male">
                          <span class="cate_icon"><i class="icon-gift-box"></i></span> <h5>Someone else</h5>
                        </label>
                      </li>
                  </ul>
                  </div>
                        <div class="form-group">
                          <label class="form-label">To</label>
                          <input type="text" name="to" class="form-control" placeholder="To">
                        </div>
                  <div id="booking_for">
                        <div class="form-group">
                          <label class="form-label">From</label>
                          <input type="text" name="from" class="form-control" placeholder="From">
                        </div>
                  </div>
                  <h3 class="mini-heading mb-3 text-center mt-4">Select an ocassion</h3>
                  <ul class="cate_listing cate_listing-5 form_block_th" id="getOcassionsdiv"></ul>

                 <div class="add-occ text-center mt-3">
                   <a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal-Ocassions"><span class="cate_icon"><i class="fas fa-plus"></i></span> <h5>Add Occassion</h5></a>
                </div>
                </div>
              </div>
              <div class="form-block">
                <div class="form-block-inn">
                  <div class="sec-heading text-center" data-aos="fade-left" data-aos-duration="1000">
                   <h2>Instructions</h2>
                     <span class="sec-heading-icon" data-aos="zoom-in" data-aos-duration="2000"><i class="icon-review"></i></span>
                  </div>
                  <div class="form-group">
                    <label class="form-label">My instructions fo Taylor swift are</label>
                    <textarea class="form-control" name="instructions" placeholder="Add instructions here..."></textarea>
                  </div>
                  <div class="form-group">
                    <label class="form-label">My Email</label>
                    <input type="text" name="email" class="form-control" placeholder="email" value="{{Auth::user()->email}}">
                  </div>
                  <div class="custom-control custom-checkbox mb-4">
                    <input type="checkbox" class="custom-control-input" name="profile_showable" id="customCheck1" checked>
                    <label class="custom-control-label" for="customCheck1">Hide this video from Tailor swift's profile</label>
                  </div>
                  <button type="submit" class="main-btn">Book</button>
                </div>
              </div>
            </div>
            </div>

          </form>
          </section>







 
<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal-Ocassions" tabindex="-1" role="dialog" aria-labelledby="exampleModal-OcassionsLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal-OcassionsLabel">Ocassion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="row" id="formOcassion" data-action="{{route('user.addOcassion')}}">
                   @csrf
                   <div class="form-group">
                    <label class="form-label">Enter Ocassion</label>
                    <input type="text" name="label" class="form-control" placeholder="Enter Ocassion" required="">
                  </div>
                  <div class="form-group">
                    <button class="main-button">Save</button>
                  </div>
          </form>
      </div>
      
    </div>
  </div>
</div> -->


 


@endsection
<div class="modal fade modal-center" id="exampleModal-Ocassions" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal-OcassionsLabel">Ocassion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="" id="formOcassion" data-action="{{route('user.addOcassion')}}">
                   @csrf
                   <div class="form-group">
                    <label class="form-label">Enter Ocassion</label>
                    <input type="text" name="label" class="form-control" placeholder="Enter Ocassion" required="">
                  </div>
                  <div class="form-group">
                    <button class="main-btn">Save</button>
                  </div>
          </form>
      </div>
      
    </div>
  </div>
</div>
@section('my-js')
<script type="text/javascript">

$("body").on('change','input[name=booking_for]',function(e){
booking_for_func();
});
booking_for_func();

function booking_for_func() {
  $val = parseInt($('.booking_for_radio:checked').val());

  if($val == 0){
    $('#booking_for').hide();
  }else{
    $('#booking_for').show();

  }

}


$("#formOcassion").validate();

$("#formOcassionBooking").validate({
  onfocusout: function (valueToBeTested) {
  $(valueToBeTested).valid();
},

highlight: function(element) {
  $('element').removeClass("error");
},

rules: {
  
  "name": {
      required: true,
      maxlength: 70, 
  },
  "booking_for": {
      required: true,
      
  },
  "to": {
      required: true,
      maxlength: 100, 
  },
  "from": {
      required: function(){
           if(parseInt($('.booking_for_radio:checked').val()) == 1){
               return true;
           }else{
                return false;
           }
      },
      maxlength: 100, 
  },
  "instructions": {
      required: true,
      maxlength: 200,
       
  },
  "email": {
      required: true,
      email: true, 
  },
  valueToBeTested: {
      required: true,
  },
},
  
});


$("body").on('submit','#formOcassion',function(e){
  e.preventDefault();
     $this = $(this);
            $.ajax({
                      url : $this.data('action'),
                      type: 'POST',  
                      data: $this.serialize(),
                      dataTYPE:'JSON',
                      headers: {
                       'X-CSRF-TOKEN': $('input[name=_token]').val()
                      },
                      beforeSend: function() {
                           $this.find('button').attr('disabled');     
                      },
                      success: function (result) {
                          alert(result.message);
                           if(result.status == 1){
                              get_ocassion();
                              $("#exampleModal-Ocassions").modal('hide');
                           }
                            $this.find('button').removeAttr('disabled');     
                      },
                      complete: function() {
                      },
                      error: function (jqXhr, textStatus, errorMessage) {
                          
                      }
              });
});


//===========================================================================================

$("body").on('submit','#formOcassionBooking',function(e){
     e.preventDefault();
     $this = $(this);
     $loader = $("body").find('.custom-loading');
            $.ajax({
                      url : $this.data('action'),
                      type: 'POST',  
                      data: $this.serialize(),
                      dataTYPE:'JSON',
                      headers: {
                       'X-CSRF-TOKEN': $('input[name=_token]').val()
                      },
                      beforeSend: function() {
                                $this.find('button').attr('disabled');    
                                $loader.show();
                      },
                      success: function (result) {
                         $loader.hide();
                          alert(result.message);
                           if(result.status == 1){
                              window.location.href = result.url;
                           }else if(result.status == 2){
                              window.location.reload();
                           }else{
                                $this.find('button').removeAttr('disabled');     
                           }
                      },
                      complete: function() {
                      },
                      error: function (jqXhr, textStatus, errorMessage) {
                          
                      }
              });
});


//===========================================================================================
get_ocassion();

function get_ocassion($url= "<?= route('user.getOcassions') ?>") {
                $.ajax({
                      url : $url,
                      type: 'GET',  
                      dataTYPE:'JSON',
                      headers: {
                       'X-CSRF-TOKEN': $('input[name=_token]').val()
                      },
                      beforeSend: function() {
                               
                      },
                      success: function (result) {
                           $("#getOcassionsdiv").html(result.list);
                      },
                      complete: function() {
                      },
                      error: function (jqXhr, textStatus, errorMessage) {
                          
                      }
              });
}
   
</script>
@endsection