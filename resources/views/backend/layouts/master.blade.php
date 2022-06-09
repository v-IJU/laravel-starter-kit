<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
  <title>AdminLTE 3 | @yield('tittle')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/backend/plugins/fontawesome-free/css/all.min.css')}}">

  <link rel="stylesheet" href="{{asset('assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Ionicons -->
  {{-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}"> --}}
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('assets/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('assets/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('assets/backend/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/backend/dist/css/adminlte.min.css')}}">
  <!-- Switch style -->
  <link rel="stylesheet" href="{{asset('assets/backend/dist/css/switch.css')}}">
  <link rel="stylesheet" href="{{asset('assets/backend/dist/css/custome.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('assets/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('assets/backend/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('assets/backend/plugins/summernote/summernote-bs4.min.css')}}">

   <link rel="stylesheet" href="{{asset('assets/backend/plugins/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

  <!---summernote--->
  <link rel="stylesheet" href="{{asset('assets/backend/plugins/summernote/summernote.css')}}">


  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{asset('assets/backend/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css" rel="stylesheet">
<style>
  .alert-content-wrapper{
      
    transition: margin-left .3s ease-in-out;
    margin-left: 263px;
    padding: 0 0.5rem;
  }
</style>
  @yield('style');
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

@include('backend.layouts.navigation')

@include('backend.layouts.sidemenu')
<div class="alert-content-wrapper">
<x-backend.sessionerror/>
</div>
@yield('content')
@include('backend.layouts.footer')

	</div>
</body>

{{-- <script src="{{ asset(mix('/js/location.js')) }}"></script> --}}
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{asset('assets/backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('assets/backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('assets/backend/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('assets/backend/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('assets/backend/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('assets/backend/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('assets/backend/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('assets/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('assets/backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('assets/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

<script src="{{asset('assets/backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!---summernote--->
<script src="{{asset('assets/backend/plugins/summernote/summernote.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/backend/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/backend/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('assets/backend/dist/js/pages/dashboard.js')}}"></script>
<script src="{{asset('assets/backend/build/js/custom-datatable.js')}}"></script>
<script src="{{asset('assets/backend/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script type="module">
  var id=12;
  Location.Locationinit(id);

</script>

@yield('script');
<!-- custom js -->
  <!-- <script src="{{asset('assets/backend/dist/js/custom.js')}}" ></script> -->
<script>


 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break;
 }
 @endif
</script>

<script>
'use strict';
  $(function(){


    $(document).on('click','#delete',function(e){
      e.preventDefault();
      var link=$(this).attr("href");
      Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href=link
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})
    });
  });
</script>

  <script>
    const divElement=document.getElementById('alert__box')
    setTimeout(function(){ 
      $("#alert__box").slideUp();
     
    }, 4000);
  </script>
<!-- <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script> -->
@yield('script')
</body>
</html>
