<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{_lang('Admin | Dashboard')}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('adminLte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{url('adminLte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{url('adminLte/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('adminLte/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{url('adminLte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('adminLte/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{url('adminLte/plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">






<style type="text/css">
  .myCheckbox input[type=checkbox] + label {
  display: block;
  margin: 0.2em;
  cursor: pointer;
  padding: 0.2em;
  line-height: 25px;
}

.myCheckbox input[type=checkbox] {
  display: none;
}

.myCheckbox input[type=checkbox] + label:before {
  content: "\2714";
  border: 0.1em solid #000;
  border-radius: 0.2em;
  display: inline-block;
  width: 25px;
  height: 25px;
  padding-left: 0.2em;
  padding-bottom: 0.3em;
  margin-right: 0.2em;
  vertical-align: bottom;
  color: transparent;
  transition: .2s;
}

.myCheckbox input[type=checkbox] + label:active:before {
  transform: scale(0);
}

.myCheckbox input[type=checkbox]:checked + label:before {
  background-color: MediumSeaGreen;
  border-color: MediumSeaGreen;
  color: #fff;
}

.myCheckbox input[type=checkbox]:disabled + label:before {
  transform: scale(1);
  border-color: #aaa;
}

.myCheckbox input[type=checkbox]:checked:disabled + label:before {
  transform: scale(1);
  background-color: #bfb;
  border-color: #bfb;
}

body{
    position: relative;
}

.loader {
    position: fixed;
    background: #ffffff78;
    z-index: 9999;
    left: 0;
    right: 0;
    bottom: 0;
    top: 0;
    text-align: center;
    display: none;
}

.loader img {
    width: 65px;
    margin-top: 20%;
}
table.table td {
    line-height: 35px;
}

table.table th {
    line-height: 42px;
    text-transform: uppercase;
    border-bottom: 3px solid #caeff5;
    border-top: 3px solid #17a2b8;
    background: #f2f4f6;
    max-height: 30px !important;
    padding: 6px .75em;
}

label.error {
    color: red;
    font-weight: normal !important;
    font-size: 14px;
}
</style>











</head>
 
<body 
   class="hold-transition sidebar-mini layout-fixed lang-{{ Session::get('locale') }} {{(Session::has('locale') && Session::get('locale') == 'AR') ? 'rtl' : ''}}"
   data-theme="<?= Session::get("data-theme") ?>"
   <?=(Session::has('locale') && Session::get('locale') == 'AR') ? 'dir="rtl"' : ''?>
  >
  <div class="loader"><img src="{{url('loader.gif')}}"></div>
<div class="wrapper">

  <!-- Navbar -->
  
  @include('admin.includes.header')
  @include('admin.includes.sidebar')

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
   

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{url('adminLte')}}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('adminLte')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{url('adminLte')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{url('adminLte')}}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{url('adminLte')}}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{url('adminLte')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{url('adminLte')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('adminLte')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{url('adminLte')}}/plugins/moment/moment.min.js"></script>
<script src="{{url('adminLte')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('adminLte')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{url('adminLte')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{url('adminLte')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{url('adminLte')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('adminLte')}}/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('adminLte')}}/dist/js/demo.js"></script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> 
<script type="text/javascript">
   
$("body").on('click','.change-lang',function(e){
  e.preventDefault();
  var $url = $(this).attr('data-action');
  Global_Settings($url);
});



$("body").on('change','#langSwitch',function(e){
  //e.preventDefault(); 
  var $url = $(this).is(":checked") ? $(this).attr('data-AR') : $(this).attr('data-EN');
  Global_Settings($url);
});



$("body").on('change','#data-theme',function(e){
  //e.preventDefault(); 
  var $url = $(this).is(":checked") ? $(this).attr('data-dark') : $(this).attr('data-light');
  Global_Settings($url);
});




function Global_Settings($url) {
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
                           if(result.status == 1){
                              window.location.reload();
                           }
                      },
                      complete: function() {
                      },
                      error: function (jqXhr, textStatus, errorMessage) {
                          
                      }
              });
}


</script>  
@yield('javaScript')

</body>
</html>
