<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Garbage Collection</title>
    <!-- Favicon -->
    <!-- Bootstrap core CSS -->
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <!--Custom CSS-->
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet" type="text/css">
    <!--Plugin CSS-->
    <link href="{{asset('frontend/css/plugin.css')}}" rel="stylesheet" type="text/css">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <link rel="stylesheet" href="{{asset('frontend/fonts/line-icons.css')}}" type="text/css">
</head>


<body>

  
     <!-- Preloader -->
     <div id="preloader">
        <div id="status"></div>

        
    </div>
    <!-- Preloader Ends -->
  
    @include('frontend.layouts.header')
    @yield('content')
    
    @include('frontend.layouts.footer')

    <div id="back-to-top">
        <a href="#"></a>
    </div>

   
 <!-- *Scripts* -->
    <script src="{{asset('frontend/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/particles.js')}}"></script>
    <script src="{{asset('frontend/js/particlerun.js')}}"></script>
    <script src="{{asset('frontend/js/plugin.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
    <script src="{{asset('frontend/js/custom-swiper.js')}}"></script>
    <script src="{{asset('frontend/js/custom-nav.js')}}"></script>

</html>