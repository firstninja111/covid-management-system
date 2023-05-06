<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sitemap - Rapid-Lab LLC</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('public/favicon/favicon.png') }}" rel="icon">
  <link href="{{ asset('public/favicon/favicon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('public/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('public/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('public/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('public/assets/css/custom.css') }}">

  <link rel="stylesheet" href="{{ asset('public/assets/css/app.css') }}">

  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="{{ asset('public/assets/css/screenLoader.css') }}">
  <link href="{{ asset('public/assets/css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('public/plugins/fontawesome/css/font-awesome.min.css')}}">


  <script src="{{ asset('public/assets/js/jquery.min.js') }}"></script>
  <script src="{{asset('public/plugins/sweetalert/js/sweetalert.min.js')}}"></script>

  <!-- Appointment Wizard Style -->
  <link rel="stylesheet" href="{{ asset('public/assets/css/gsdk-bootstrap-wizard.css') }}">
  <link rel="stylesheet" href="{{ asset('public/assets/css/demo.css') }}">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-219633279-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-219633279-1');
</script>

<script type='application/ld+json'>
{
  "@context": "http://www.schema.org",
  "@type":"CovidTestingFacility",
  "name": "Rapid-Labs",
  "url": "https://rapid-labs.com/",
  "image": "https://rapid-labs.com/public/uploads/appLogo/app-logo-dark.png",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "917 Alton Road",
    "addressLocality": "Miami Beach",
    "addressRegion": "FL",
    "postalCode": "33139"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": "25.7795589",
    "longitude": "-80.1407894"
  },
    "telephone": "786-321-7545",
    "email": "info@rapid-labs.com"
}
</script>
</head>

<body>
  @include('sweet::alert')
  <!-- Preloader -->
  <div class="payment-loader">
    <div class="loader-pendulums"></div>
  </div>
  <!-- /Preloader -->
  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:info@rapid-labs.com">info@rapid-labs.com</a>
        <i class="bi bi-phone"></i> +1 786-321-7545
      </div>      
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{{route('home')}}">
        <img src="{{asset('public/uploads/appLogo/app-logo-dark.png')}}" alt="App Logo" class=" img brand-image img-responsive opacity-8">

      </a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
        <li><a class="nav-link scrollto " href="{{route('home')}}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{route('home')}}#about">Testing Services</a></li>
          <li><a class="nav-link scrollto" href="{{route('refund_policy')}}">Refund Policy</a></li>
          <li><a class="nav-link scrollto" href="{{route('covid_inform')}}">Covid Informe Consent</a></li>
          <li><a class="nav-link scrollto" href="{{route('home')}}#contact">Contact</a></li>
          @guest
          <li><a class="nav-link scrollto text-danger" href="{{ route('login') }}">Log In</a></li>
          @endguest
          @auth
          <li class="dropdown">
            <a class="nav-link scrollto text-primary" href="#" style="font-size: 16px;"> 
              <span><i class="fa fa-user" style="margin-right: 5px; font-size: 18px;"></i>
              {{ Auth::user()->fullname ? Auth::user()->fullname : Auth::user()->username }}</span>
              <i class="bi bi-chevron-down"></i> 
            </a>
            <ul>
              @if(Auth::user()->roles->first()->name == "admin")
                <li><a href="{{ route('dashboard') }}" class="dropdown-item dropdown-footer"><span><i class="fa fa-dashboard" style="font-size: 14px; margin-right: 5px;"></i> {{ __('app.dashboard') }}</span></a></li>
              @else
                <li><a href="{{ route('appointment.index') }}" class="dropdown-item dropdown-footer"><span><i class="fa fa-dashboard" style="font-size: 14px; margin-right: 5px;"></i> {{ __('app.dashboard') }}</span></a></li>
              @endif

              <li><a href="{{ url('logout') }}" class="dropdown-item dropdown-footer text-danger text"><span><i class="fa fa-sign-out" style="font-size: 14px; margin-right: 5px;"></i> {{ __('app.logout') }}</span></a></li>
            </ul>
          </li>
          @endauth          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="#schedule" class="appointment-btn scrollto"><span class="d-none d-md-inline"> Schedule</span> Appointment</a>

    </div>
  </header><!-- End Header -->


  <main id="main" style="padding-top: 150px; padding-left: 15%; padding-right: 15%; padding-bottom: 100px;">

    <h2 style="text-align:center; font-family: sans-serif; margin-bottom: 40px;">Sitemap</h2>

        <ul>
            <li><a href="https://rapid-labs.com">Home</a></li>
            <li><a href="https://rapid-labs.com/refund-policy">Refund Policy</a></li>
            <li><a href="https://rapid-labs.com/covid-inform">Covid Informe Consent</a></li>
            <li><a href="https://rapid-labs.com/login">Log In</a></li>
            <li><a href="https://rapid-labs.com/terms-conditions">Terms & Conditions</a></li>
        </ul>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Rapid-Labs</h3>
            <p>
              917 Alton Road <br>
              Miami Beach, FL 33139<br>
              United States <br><br>
              <strong>Phone:</strong> +1 786-321-7545<br>
              <strong>Email:</strong> info@rapid-labs.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://rapid-labs.com/site-map">Sitemap</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Covid-19 Antigen Test</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Covid-19 PCR</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Covid-19 Antibody</a></li>
              
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Covid-19 Recommendations</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Rapid-Labs</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="https://CodeinUSA.com/">CodeInUSA</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('public/assets/vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('public/assets/js/main.js') }}"></script>

  <!-- Appointment JS -->

  <script src="{{asset('public/assets/js/jquery.bootstrap.wizard.js')}}"></script>
  <script src="{{asset('public/assets/js/gsdk-bootstrap-wizard.js')}}"></script>
  <script src="{{asset('public/assets/js/jquery.validate.min.js')}}"></script>
  
</body>

</html>

<!-- Appointment JS script -->

<script>
 
</script>