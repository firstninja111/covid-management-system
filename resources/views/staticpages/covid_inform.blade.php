<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Rapid-Lab LLC</title>
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

  <!-- =======================================================
  * Template Name: Medilab - v4.7.0
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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
          <li><a class="nav-link scrollto active" href="{{route('covid_inform')}}">Covid Informe Consent</a></li>
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

    <h2 style="text-align:center; font-family: sans-serif; margin-bottom: 40px;">COVID-19 TESTING AUTHORIZATION AND CONSENT</h2>

    <p>Please do not use our services until you have first read this COVID-19 Testing Authorization and Consent and subsequently made an informed decision that our services are right for you.</p> 
    <p><span style="font-weight:bold">BACKGROUND ON OUR SERVICES: </span>Rapid-Labs is pleased to facilitate COVID-19 testing. This includes the performance of testing by various means (including nasal swab specimens) by individuals who have opted-in for COVID-19 testing (hereinafter “COVID-19 testing”). Following processing of tested specimens, we will notify you of COVID-19 testing results.</p>
    <p><span style="font-weight:bold">CONSENT TO COVID-19 TESTING: </span>You hereby agree to undergo COVID-19 testing in accordance with the instructions provided to you, including cooperation with all healthcare professionals and personnel to collect an appropriate specimen safely and effectively.</p>

    <p>You agree to comply with all instructions provided to you related to administration of the COVID-19 testing kit. You further acknowledge that the COVID-19 testing kit is available because of the U.S. Food and Drug Administration’s Emergency Use Authorization (“EUA”) process under section 564 of the Federal Food, Drug, and Cosmetic Act. EUAs make available diagnostic and therapeutic medical devices to diagnose and respond to public health emergencies by allowing unapproved medical products or unapproved uses of approved medical products to be used in an emergency to diagnose, treat, or prevent serious or life-threatening diseases or conditions caused by chemical, biological, radiological, and nuclear threat agents when there are no adequate, approved, and available alternatives. As a result, the COVID-19 testing kit is subject to certain limitations. You understand that as with any type of medical or health related test, procedure or treatment, certain risks apply. <span style='font-weight:bold'>COVID-19 testing risks include the risk of injury as the result of administering the test; the risk of improper administration; and inaccurate test results.</span></p>
    
    <p>In addition to the foregoing, you acknowledge the following:</p>

    <p><span style="font-weight: bold;">RISKS OF DISCOMFORT: </span>Testing may involve discomfort, including pain, tearing up, and/or triggering a gag reflux.</p>
    <p><span style="font-weight: bold;">RISK OF INACCURACY: </span>There is a risk the test will result in a false positive or false negative result, and a positive or negative test result does not mean there are no additional possible adverse health conditions or outcomes I may experience.</p>
    <p><span style="font-weight: bold;">RISK OF EXPOSURE: </span>Being present in the same space as others, despite my own efforts and those of the health professionals working with me, may increase the risk of my exposure to COVID-19 and the novel coronavirus (SARS-CoV-2). Even following best practices, it is possible for me and (Rapid-Labs) provider personnel to be unaware that we are contagious even without symptoms, raising the possibility of infection. I am aware that exposure to COVID-19 can result in severe illness, intensive therapies, extended intubation and/or ventilator support, life-altering changes to my health, and even death.</p>
    <p><span style="font-weight:bold;">RISK OF DISCLOSURE: </span>The U.S. Centers for Disease Control and Prevention and the County Department of Public Health requires the Provider and the laboratory processing my specimen to report my test results, whether positive or negative, to my local public health authority. In addition to the test results, Rapid-Labs will report certain personal information, not limited to, my age, sex, ethnicity, and zip code. You understand that although Rapid-Labs implements a wide range of administrative, physical, and technical safeguards to protect health information and comply with HIPAA, it cannot guarantee the privacy and confidentiality of all health information. For more details, please review our Notice of Privacy Practices.</p>
    <p><span style="font-weight:bold;">SEEK OTHER SOURCES OF CARE FOR OTHER HEALTH NEEDS: </span>Please note that Rapid-Labs does not take direct responsibility for your health or care beyond facilitating needed testing. Our services are limited to COVID-19 testing. The medical professionals who order tests are not your medical professional for any other purposes. You need to seek other sources of care for your healthcare needs, including to examine any other health issues you may experience and to treat you for COVID-19 or any other conditions you have.
    <p><span style="font-weight:bold;">TESTING LIMITATIONS: </span>I understand the Test is available because of the FDA’s Emergency Use Authorization (“EUA”) under Section 564 of the Federal Food, Drug, and Cosmetic Act. The EUA’s make available diagnostic tests to diagnose and respond to public health emergencies by allowing unapproved medical products or unapproved uses of approved medical products to be used in an emergency to diagnose, treat, or prevent serious or life-threatening diseases or conditions caused by chemical, biological, radiological, and nuclear threat agents when there are no adequate, approved, and available alternatives. As a result, Testing may be subject to certain limitations as set forth in this Informed Consent.</p>
    <p><span style="font-weight:bold;">NOT FOR EMERGENCIES: </span>Rapid-Labs does not provide healthcare on an emergency basis anywhere at any time and is not a substitute for your physician. Please do not delay seeking care from in a medical emergency or in place of your doctor. In an emergency, dial 911 or go to a hospital emergency department.</p>
    <p><span style="font-weight:bold;">RIGHT TO DECLINE CLIENT: </span>Please understand that Rapid-Labs reserves the right to refuse to provide collection kits, if, in Rapid-Labs’ judgment, you are not a good candidate for our services.</p>
    <p><span style="font-weight:bold;">AGREEMENT TO ANSWER THE ONLINE QUESTIONAIRE TRUTHFULLY AND USE SERVICES HONESTLY: </span> You accept the responsibility to provide full and truthful answers to all questions and, when requested, to provide all other data in the most accurate form possible.</p>
    <p><span style="font-weight:bold;">IF YOU DO NOT UNDERSTAND ANYTHING IN THIS CONSENT, DO NOT PROCEED. </span>If you go forward with the COVID-19 testing, we will assume that you understood and were able to discuss your questions and concerns to your satisfaction.</p>
    <p><span style="font-weight:bold;">COVID-19 INFORMED CONSENT:  </span>By clicking that I have read and agree to this informed consent, I hereby acknowledge that I have been advised of the above risks, benefits, and alternatives identified below with respect to COVID-19 testing and the current pandemic-related changes to treatment and care. I have had the opportunity to discuss the risks identified below, to questions, and receive answers to my satisfaction. By signing below, I hereby authorize and direct the provider to administer COVID-19 testing.</p>
    <p>I hereby hold harmless, release, and forever discharge Rapid-Lab’s and all personnel, managers, administrators, and health professionals involved in my testing from all claims, demands, and causes of action that I, my heirs, representatives, executors, administrators, or any other persons acting on my behalf or on behalf of my estate have or may have by reason of any problems associated with COVID-19 testing.</p>

    
    <p style="font-weight: bold;font-style: italic;text-decoration: underline;">DO NOT DIGITALLY CONSENT TO THIS FORM UNLESS YOU HAVE READ IT AND UNDERSTAND IT. ASK ANY QUESTIONS YOU HAVE BEFORE ACKNOWLEDGING CONSENT.</p>
    <p style="font-weight:bold;">Based on the above, I certify that I have read the foregoing Informed Consent, had opportunities to ask questions, agree and accept all the terms above, and voluntarily consent as noted above.</p>

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