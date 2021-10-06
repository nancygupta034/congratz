@extends('artists.layouts.layout')
@section('content')


 <div class="content-block">
                <div class="main-heading mb-5">
                   <h2>Featured</h2>
                </div>
             <div class="card-block mb-5">
                      
                @csrf
                 
                <div class="row">
                  <div class="col-9"><div class="card-inn-heading mt-4 mb-3"><h3>Subscription Plans</h3></div></div>
                   <div class="col-3"> 
                      <a href="{{route('artist.subscription')}}"><button class="card-form__button">Add Subscription</button></a>
                    </div>
                </div>
                
                
                <div class="featured-plan-block col-12">
                   <div class="row">

                    @foreach(Auth::user()->myCategories() as $tag)
                            
                    <div class="card-inn-heading mt-4 mb-3"><h3>{{$tag->label}}</h3></div>
                     <div class="col-12">

                      <?php $subscriptions = \App\Models\MySubscription::where('user_id',Auth::user()->id)
                                                ->where('category_id',$tag->id)
                                                ->whereDate('end_date','>=',date('Y-m-d'))
                                                ->orderBy('end_date','ASC')
                                              ; ?>

                        @if($subscriptions->count() == 0)
                           <div class="alert alert-danger">No subscription for <strong>{{$tag->label}}</strong> Category</div>
                        @else
                         <table class="table">
                                  <tr>
                                    <th>Sr.no</th>
                                    <th>Package</th>
                                    <th>Category</th>
                                    
                                  </tr>
                                  
                                  @foreach($subscriptions->get() as $k => $s)
                                     <tr>
                                       <td><strong>{{$k == 0 ? 'ACTIVE' : 'UPCOMING'}}</strong></td>
                                       <td>
                                        {{$s->package->label}}
                                        <p>{{$s->package->description}}</p>
                                        <p><strong>SAR </strong>{{$s->package->title}}</p>
                                        <strong>{{$s->start_date}} <strong>TO</strong> {{$s->end_date}}</strong>
                                       </td>
                                       <td>{{$s->category->label}}</td>
                                       
                                     </tr>
                                  @endforeach
                         </table>
                     </div>

                        @endif
                        @endforeach
                   </div>
                </div>
                
                <!-- card detail form -->
               
                  </div>
                  
                
                </div>
                <!-- End -->
               
              </div>
            </div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script>
      <script src="https://unpkg.com/vue-the-mask@0.11.1/dist/vue-the-mask.js"></script>

<script type="text/javascript">
           var Scrollbar = window.Scrollbar;

  Scrollbar.init(document.querySelector('.sidebar_block'));



  /*
See on github: https://github.com/muhammederdem/credit-card-form
*/

new Vue({
  el: "#app",
  data() {
    return {
      currentCardBackground: Math.floor(Math.random()* 25 + 1), // just for fun :D
      cardName: "",
      cardNumber: "",
      cardMonth: "",
      cardYear: "",
      cardCvv: "",
      minCardYear: new Date().getFullYear(),
      amexCardMask: "#### ###### #####",
      otherCardMask: "#### #### #### ####",
      cardNumberTemp: "",
      isCardFlipped: false,
      focusElementStyle: null,
      isInputFocused: false
    };
  },
  mounted() {
    this.cardNumberTemp = this.otherCardMask;
    document.getElementById("cardNumber").focus();
  },
  computed: {
    getCardType () {
      let number = this.cardNumber;
      let re = new RegExp("^4");
      if (number.match(re) != null) return "visa";

      re = new RegExp("^(34|37)");
      if (number.match(re) != null) return "amex";

      re = new RegExp("^5[1-5]");
      if (number.match(re) != null) return "mastercard";

      re = new RegExp("^6011");
      if (number.match(re) != null) return "discover";
      
      re = new RegExp('^9792')
      if (number.match(re) != null) return 'troy'

      return "visa"; // default type
    },
    generateCardNumberMask () {
      return this.getCardType === "amex" ? this.amexCardMask : this.otherCardMask;
    },
    minCardMonth () {
      if (this.cardYear === this.minCardYear) return new Date().getMonth() + 1;
      return 1;
    }
  },
  watch: {
    cardYear () {
      if (this.cardMonth < this.minCardMonth) {
        this.cardMonth = "";
      }
    }
  },
  methods: {
    flipCard (status) {
      this.isCardFlipped = status;
    },
    focusInput (e) {
      this.isInputFocused = true;
      let targetRef = e.target.dataset.ref;
      let target = this.$refs[targetRef];
      this.focusElementStyle = {
        width: `${target.offsetWidth}px`,
        height: `${target.offsetHeight}px`,
        transform: `translateX(${target.offsetLeft}px) translateY(${target.offsetTop}px)`
      }
    },
    blurInput() {
      let vm = this;
      setTimeout(() => {
        if (!vm.isInputFocused) {
          vm.focusElementStyle = null;
        }
      }, 300);
      vm.isInputFocused = false;
    }
  }
});

      </script>






<script type="text/javascript">

$("body").on('click','.copyText',function(){
$this = $(this);
$this.text('Copied');
copyToClipboard($this.data('target'));
});

function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).val()).select();
  document.execCommand("copy");
  $temp.remove();
  
}


$("body").on('submit','#packageForm',function(e){
  e.preventDefault();
  $this = $(this);
  $.ajax({
                       url : "{{url(route('artist.subscription'))}}",
                       
                       type: 'POST',  // http method
                       data:$this.serialize(),
                       dataTYPE:'JSON',
                     
                        beforeSend: function() {
                            $("body").find('.custom-loading').show();
                          $this.find('button').attr('disabled','true');
                        },

                       success: function (result) {
                             alert(result.message);
                             if(result.status == 1){
                                window.location.reload();
                             }
                              $this.find('button').removeAttr('disabled');
                       },
                       complete: function() {
                                $("body").find('.custom-loading').hide();
                              $this.find('button').removeAttr('disabled');
                       },
                       error: function (jqXhr, textStatus, errorMessage) {
                             //alert('error');
                       }

                });
});

</script>
@endsection