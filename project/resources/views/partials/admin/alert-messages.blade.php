<div id="alert-messages">
<!--Success Message-->
@if (\Session::has('success'))
<div class="alert alert-success">
	  <strong>Success!</strong> {!! \Session::get('success') !!}
</div>
@endif


<!--Error Message-->
@if (\Session::has('error'))
<div class="alert alert-danger">
	  <strong>Error!</strong> {!! \Session::get('error') !!}
</div>
@endif


<!--Warning Message-->
@if (\Session::has('warning'))
<div class="alert alert-warning">
	  <strong>Warning!</strong> {!! \Session::get('warning') !!}
</div>
@endif

</div>

<script type="text/javascript">
	
window.setTimeout(function() {
    $("#alert-messages").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);	

</script>