<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sogo Hotel by Colorlib.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/react-double-range-slider@3.0.1/dist/cjs/index.min.js"></script>
   <!-- Metro UI -->
   {{-- MAPSSS --}}
   <link href="https://api.mapbox.com/mapbox-gl-js/v3.0.1/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v3.0.1/mapbox-gl.js"></script>
       <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.timepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/fancybox.min.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast/dist/css/iziToast.min.css">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="filter/css/bootstrap.min.css">
        <!-- Site CSS -->
        <link rel="stylesheet" href="filter/css/style.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="filter/css/responsive.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="filter/css/custom.css">
  <!-- Include Flatpickr CSS -->
  <link rel="stylesheet" href="path/to/flatpickr.min.css">

  <!-- Include Flatpickr JS -->
  <script src="path/to/flatpickr.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  
    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap1.min.css')}}" />
  
    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/style1.css')}}" />
    <link rel="stylesheet" href="{{asset('fonts/ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/fontawesome/css/font-awesome.min.css')}}">

    {{-- Villa Single style Sheets --}}
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('villa-single/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('villa-single/css/animate.css')}}">
    
    <link rel="stylesheet" href="{{asset('villa-single/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('villa-single/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('villa-single/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('villa-single/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('villa-single/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('villa-single/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('villa-single/css/jquery.timepicker.css')}}">

    
    <link rel="stylesheet" href="{{asset('villa-single/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('villa-single/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('villa-single/css/style.css')}}">
    <!-- Theme Style -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
  </head>
  <body>
    
    <header class="site-header js-site-header">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-6 col-lg-4 site-logo" data-aos="fade"><a href="{{route('home')}}">V i l l a z @if(Auth::check()) ({{Auth::user()->fname}}) @endif</a></div>
          
          <div class="col-6 col-lg-8">
              @if(Auth::check())
              <a  href="{{url('/logoutUser')}}" class="btn btn-primary">Logout</a>
              @else
              <a  href="{{url('/login')}}" class="btn btn-primary">Login</a>
              <a  href="{{url('/register')}}" class="btn btn-primary">Register</a>
              @endif
              <div class="site-menu-toggle js-site-menu-toggle"  data-aos="fade">
                  <span></span>
                  <span></span>
                  <span></span>
            </div>
            <!-- END menu-toggle -->

            <div class="site-navbar js-site-navbar">
              <nav role="navigation">
                <div class="container">
                  <div class="row full-height align-items-center">
                    <div class="col-md-6 mx-auto">
                      <ul class="list-unstyled menu">
                        <li class="active"><a href="index.html">Home</a></li>
                        <li><a href="{{url('/login')}}">Login</a></li>
                        <li><a href="{{url('/register')}}">Register</a></li>
                        <li><a href="rooms.html">Villas</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="events.html">Events</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="reservation.html">Reservation</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- END head -->

    @yield('content')



    <footer class="section footer-section">
        <div class="container">
          <div class="row mb-4">
            <div class="col-md-3 mb-5">
              <ul class="list-unstyled link">
                <li><a href="#">About Us</a></li>
                <li><a href="#">Terms &amp; Conditions</a></li>
                <li><a href="#">Privacy Policy</a></li>
               <li><a href="#">Rooms</a></li>
              </ul>
            </div>
            <div class="col-md-3 mb-5">
              <ul class="list-unstyled link">
                <li><a href="#">The Rooms &amp; Suites</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Restaurant</a></li>
              </ul>
            </div>
            <div class="col-md-3 mb-5 pr-md-5 contact-info">
              <!-- <li>198 West 21th Street, <br> Suite 721 New York NY 10016</li> -->
              <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>Address:</span> <span> 198 West 21th Street, <br> Suite 721 New York NY 10016</span></p>
              <p><span class="d-block"><span class="ion-ios-telephone h5 mr-3 text-primary"></span>Phone:</span> <span> (+1) 435 3533</span></p>
              <p><span class="d-block"><span class="ion-ios-email h5 mr-3 text-primary"></span>Email:</span> <span> info@domain.com</span></p>
            </div>
            <div class="col-md-3 mb-5">
              <p>Sign up for our newsletter</p>
              <form action="#" class="footer-newsletter">
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="Email...">
                  <button type="submit" class="btn"><span class="fa fa-paper-plane"></span></button>
                </div>
              </form>
            </div>
          </div>
          <div class="row pt-5">
            <p class="col-md-6 text-left">
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
              
            <p class="col-md-6 text-right social">
              <a href="#"><span class="fa fa-tripadvisor"></span></a>
              <a href="#"><span class="fa fa-facebook"></span></a>
              <a href="#"><span class="fa fa-twitter"></span></a>
              <a href="#"><span class="fa fa-linkedin"></span></a>
              <a href="#"><span class="fa fa-vimeo"></span></a>
            </p>
          </div>
        </div>
      </footer>
      <script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>

      <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
      <script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
      <script src="{{asset('js/popper.min.js')}}"></script>
      <script src="{{asset('js/bootstrap.min.js')}}"></script>
      <script src="{{asset('js/owl.carousel.min.js')}}"></script>
      <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
      <script src="{{asset('js/jquery.fancybox.min.js')}}"></script>
      
 

      <script src="{{asset('js/aos.js')}}"></script>
      
      <script src="{{asset('js/bootstrap-datepicker.js')}}"></script> 
      <script src="{{asset('js/jquery.timepicker.min.js')}}"></script> 
  
      
  
      <script src="{{asset('js/main.js')}}"></script>
      {{-- MAPBOX JS FILE --}}
      <script src="{{asset('js/mapbox.js')}}"></script>
{{-- VILLA SINGLE SCRIPTS --}}
<script src="{{asset('villa-single/js/jquery.min.js')}}"></script>
<script src="{{asset('villa-single/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('villa-single/js/popper.min.js')}}"></script>
<script src="{{asset('villa-single/js/bootstrap.min.js')}}"></script>
<script src="{{asset('villa-single/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('villa-single/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('villa-single/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('villa-single/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('villa-single/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('villa-single/js/aos.js')}}"></script>
<script src="{{asset('villa-single/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('villa-single/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('villa-single/js/scrollax.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{asset('villa-single/js/google-map.js')}}"></script>
<script src="{{asset('villa-single/js/main.js')}}"></script>
<!-- Include jQuery and jQuery UI from CDN -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
<script src="https://cdn.metroui.org.ua/current/metro.js"></script>

{{-- VILLA SINGLE --}}
      @if (session('error'))
    <script>
        iziToast.error({
                message: "{{session('error')}}",
                position:'topRight'
            })
    </script>
        @endif
        @if (session('success'))
            <script>
                iziToast.success({
                    message: "{{session('success')}}",
                    position:'topRight'
                })
            </script>
        @endif
    </body>
  </html>