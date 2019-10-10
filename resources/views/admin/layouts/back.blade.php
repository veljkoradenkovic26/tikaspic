
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
      <link href="{{ asset('/') }}css/style.css" rel="stylesheet">
    <title>@yield('title')</title>



  </head>

  <body id="adminbody">





    @include('admin.components.sidebar')





            @yield('center')
            


       @include('admin.components.footer')






    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('/') }}/vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('/') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="{{ asset('/') }}/vendor/chart.js/Chart.min.js"></script>
    <script src="{{ asset('/') }}/vendor/datatables/jquery.dataTables.js"></script>
    <script src="{{ asset('/') }}/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('/') }}/js/sb-admin.min.js"></script>



  </body>

</html>

