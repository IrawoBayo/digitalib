<!DOCTYPE html>
<html lang="en">
  <head>
    <title>DigiLib &mdash; Online Library With Offence Documentation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/front/icomoon/style.css">

    <link rel="stylesheet" href="css/front/bootstrap.min.css">
    <link rel="stylesheet" href="css/front/jquery-ui.css">
    <link rel="stylesheet" href="css/front/owl.carousel.min.css">
    <link rel="stylesheet" href="css/front/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/front/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/front/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/front/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/front/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/front/aos.css">

    <link rel="stylesheet" href="css/front/style.css">
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
      
      <div class="slide-1" style="background-image: url('images/front/hero_1.png');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-md-12 mb-4">
                  <h1 data-aos="fade-up" data-aos-delay="100"> <center>Welcome to DigiLib</center></h1>
                  <h6 style='color:white' class="mb-4"  data-aos="fade-up" data-aos-delay="200">  <center>DigiLib is an online Digital Library with an inbuilt offence documentation system. DigiLib helps users learn, providing quality books and materials, while ensuring that random user offences are checked in real time.</center></h6>
                  @guest
                    <center><p data-aos="fade-up" data-aos-delay="300"><a href="{{ route('register') }}" class="btn btn-primary py-3 px-5 btn-pill">Create an Account</a></p></center>
                  @endguest
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
      
  </div> <!-- .site-wrap -->

  <script src="js/front/jquery-3.3.1.min.js"></script>
  <script src="js/front/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/front/jquery-ui.js"></script>
  <script src="js/front/popper.min.js"></script>
  <script src="js/front/bootstrap.min.js"></script>
  <script src="js/front/owl.carousel.min.js"></script>
  <script src="js/front/jquery.stellar.min.js"></script>
  <script src="js/front/jquery.countdown.min.js"></script>
  <script src="js/front/bootstrap-datepicker.min.js"></script>
  <script src="js/front/jquery.easing.1.3.js"></script>
  <script src="js/front/aos.js"></script>
  <script src="js/front/jquery.fancybox.min.js"></script>
  <script src="js/front/jquery.sticky.js"></script>

  
  <script src="js/front/main.js"></script>
    
  </body>
</html>