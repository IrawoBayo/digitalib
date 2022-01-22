<!DOCTYPE html>
<html lang="en">
  <head>
    <title>DigiLib &mdash; Online Library With Offence Documentation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/front/icomoon/style.css">

    <link rel="stylesheet" href="{{ asset('css/front/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/front/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/front/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/front/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/front/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/front/jquery.fancybox.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/front/bootstrap-datepicker.css') }}">

    <link rel="stylesheet" href="fonts/front/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="{{ asset('css/front/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('css/front/style.css') }}">
    <link rel="icon" href="{{ asset('images/front/favicon.png') }}" />
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      
      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <!-- <div class="site-logo mr-auto w-25"><a href="index.html">DigiLib - Online Library</a></div> -->

          <div class="mx-auto text-center">
          </div>
          <div class="ml-auto w-25">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                @guest
                <li class="cta"><a href="{{ route('login') }}" class="nav-link"><span>Sign In</span></a></li>
                @else
                <li class="cta"><a href="{{ route('home') }}" class="nav-link"><span>Dashboard</span></a></li>
                @endguest
              </ul>
            </nav>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>
      
    </header>

    <div class="intro-section" id="home-section">
      
      <div class="slide-1" style="background-image: url('{{ asset('images/front/hero_1.png') }}');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-md-12 mb-4">
                  <h1 data-aos="fade-up" data-aos-delay="100"> <center>You are suspended until</center></h1>
                    @if($user->suspended_till > now())
                        <center><h2 data-aos="fade-up" data-aos-delay="150">{{ date_format(new DateTime($user->suspended_till),'l jS F Y') }}</h2></center>
                        <center><h2 id="demo" class="text-danger"></h2></center>
                    @endif
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
      
  </div> <!-- .site-wrap -->

  <script src="{{ asset('js/front/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('js/front/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('js/front/jquery-ui.js') }}"></script>
  <script src="{{ asset('js/front/popper.min.js') }}"></script>
  <script src="{{ asset('js/front/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/front/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/front/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('js/front/jquery.countdown.min.js') }}"></script>
  <script src="{{ asset('js/front/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('js/front/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('js/front/aos.js') }}"></script>
  <script src="{{ asset('js/front/jquery.fancybox.min.js') }}"></script>
  <script src="{{ asset('js/front/jquery.sticky.js') }}"></script>

  
  <script src="{{ asset('js/front/main.js') }}"></script>
<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo($user->suspended_till) ?>").getTime();
console.log(countDownDate);
// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "You can now signin";
  }
}, 1000);
</script>
    
  </body>
</html>