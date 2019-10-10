<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Red Star | @yield('title')</title>

    <!-- Favicon -->


     @section('appendCss')
    <link href="{{ asset('/') }}css/style.css" rel="stylesheet">

    <link href="{{ asset('/') }}css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <style>

        .invalid-feedback{

            display: block;

        }

    </style>
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}js/fancybox/source/jquery.fancybox.css" media="screen" />
    
   @show
    
</head>

<body>
        
    @include('components.header')
    
    @include('components.nav')

    @include('components.sidebar')
    
    @yield('center')


    @include('components.footer')
    
     @section('appendJS')
      
      <!-- Jquery-2.2.4 js -->
    <script src="{{ asset('/') }}/js/jquery/jquery-2.2.4.min.js"></script>
     
    <!-- Popper js -->
    <script src="{{ asset('/') }}/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap-4 js -->
    <script src="{{ asset('/') }}/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins JS -->
    <script src="{{ asset('/') }}/js/others/plugins.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTa7GfkYyhr1hcWlk2A3bSD_uKnykz1jk&callback=initMap"></script> 
    
     <script src="{{ asset('/') }}/js/google-map/map-active.js"></script>
    <!-- Active JS -->
    <script src="{{ asset('/') }}/js/active.js"></script>

      <script type="text/javascript"
              src="{{ asset('/') }}/js/home.js">

      </script>
                
    @show
    
    
  
</body>

</html>