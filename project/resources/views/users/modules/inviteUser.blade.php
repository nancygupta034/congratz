@extends('users.layouts.layout')
@section('content')


 <div class="content-block">
                <div class="main-heading mb-5">
                   <h2>Invite User</h2>
                </div>
             <div class="card-block mb-5">
               <form>               
                <div class="card-inn-heading mb-4"><h3>Refer Friend</h3></div>
                <div class="form-group">
                   <span class="input_info mb-2">Copy this referal code and share with friends and family to invite them on Congratz.</span>                
                    <input type="text" class="form-control" value="{{url('/')}}" placeholder="congratz.com/join/code" id="p1" disabled="">                    
                  </div>                      
                

                <a href="javascript:void(0);" onclick="copyToClipboard('#p1')" data-target="#p1" class="main-btn copyText"> Copy</a>
               </form>
              </div>
            </div>


@endsection
@section('js')

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

</script>
@endsection