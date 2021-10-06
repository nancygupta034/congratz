@extends('artists.layouts.layout')
@section('content')


 <div class="content-block">
                <div class="main-heading mb-5">
                   <h2>Featured</h2>
                </div>
             <div class="card-block mb-5">
               <form id="packageForm">              
                @csrf
                <div class="form-group">
                   <label class="inline-label mb-2">Category</label>
                   <div class="input_wrap">
                    <span class="input-left-icon"><i class="fas fa-th-large"></i></span>
                     <select class="form-control" name="category_id">
                       @foreach(Auth::user()->myCategories() as $tag)
                            <option value="{{$tag->id}}">{{$tag->label}}</option>
                       @endforeach
                      </select>
                  </div>
                </div>   
                
                <div class="card-inn-heading mt-4 mb-3"><h3>Subscription Plan</h3></div>
                <div class="featured-plan-block">
                   <div class="row">

                    @php 
                    $lang = Session::has('lang') ? Session::get('lang') : 'EN'; 
                    $subscriptions = \App\Models\SubscriptionPackage::where('lang',$lang)->get(); @endphp

                    @foreach($subscriptions as $k => $s)
                      <div class="col-lg-4">
                         <div class="feature-price-card">
                            <div class="plan-card-head">
                               <h3>{{$s->label}}</h3>
                            </div>
                            <div class="plan-card-body">
                              <h4 class="mem-price">Sar {{$s->title}}</h4>
                              <h3>{{$s->description}}</h3>
                              <div class="btn-wrap mt-5 text-center">
                                <input type="radio" name="package_id" value="{{$s->parent == 0 ? $s->id : $s->parent}}" id="package-{{$s->id}}" <?= $k == 0 ? 'checked' : ''?>>
                                 <label class="main-btn mini-btn" for="package-{{$s->id}}"> Select</label>
                              </div>
                            </div>
                         </div>
                      </div>
                    @endforeach
                   </div>
                </div>
                
                <!-- card detail form -->
               
                  </div>
                  
                 <button class="card-form__button">
                        Submit
                      </button>
                </div>
                <!-- End -->
               </form>
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
                                window.location.href = result.url;
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