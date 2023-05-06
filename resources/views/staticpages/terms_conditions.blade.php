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

    <h2 style="text-align:center; font-family: sans-serif; margin-bottom: 40px;">TERMS & CONDITIONS</h2>
   <p> Welcome to www.Rapid-Labs.com. Please read these terms and conditions carefully before using this
Site. By accessing or using the Site, you agree to be bound by these Terms and Conditions.</p>

<p>These Terms and Conditions constitute a legally binding agreement made between you, whether
personally or on behalf of an entity, and Rapid-Labs, concerning your access to and use of
the www.Rapid-Labs.com website as well as any other media form, media channel, mobile website or
mobile application related, linked, or otherwise connected thereto.<break/>
You agree that by accessing the Site, you have read, understood, and agree to be bound by all these
Terms and Conditions. If you do not agree with all these Terms and Conditions, then you are expressly
prohibited from using the Site and you must discontinue use immediately.</p>
<p><span style="font-weight:bold">SCOPE OF TERMS</span></p>
<p>These terms of use apply to your use of our www.Rapid-Labs.com website. The website is owned and
operated by Rapid-Labs.</P>
<p><span style="font-weight:bold">PRIVACY</span></p>

<p>Your participation on the Rapid-Labs website is subject to Rapid-Labs’ Privacy Policy. Please review our
Privacy Policy, which also governs the website and informs users of our data collection practices.</p>
<p><span style="font-weight:bold">DISCLAIMER OF CONTENT</span></p>

<p>This site provides information about Rapid-Labs and its services, including related information on health
conditions, supporting services, point-of-care treatments and diagnostics, and data analysis.
If you are a patient or healthcare consumer, you should not use the information found on this website to
replace a relationship with your physician or other healthcare professional. Additionally, you should not
rely on that information as professional medical advice. Always seek the advice of your physician or other
qualified healthcare provider concerning questions you have regarding a medical condition, and before
starting, stopping, or modifying any treatment or medication. In the case of a health emergency, seek
immediate assistance from emergency professionals. Never delay obtaining medical advice or disregard
medical advice because of something you have or have not read on this site.</p>
<p>The information (including, without limitation, advice, and recommendations) and services on this are
intended solely as a general educational aid and are not medical advice for any health concern nor
should it substitute medical or other professional advice and services from a qualified health care provider
familiar with your medical history. The use of this Rapid-Labs website does not create a doctor/healthcare
professional-patient relationship. Nothing contained in this website is intended to be used for medical
diagnosis or treatment.</p>
<p>While Raid-Labs attempts to keep all the information on the website updated, medical information can
change quickly. The Rapid-Labs website should be considered to be error-free or a comprehensive
source.</p>
<p>Rapid-Labs assumes no responsibility for any consequences relating directly or indirectly to any action or
inaction you take based upon the information and material on this Site. Your use of the Site is subject to
the additional disclaimers and caveats that may appear throughout these terms and conditions and the
Rapid-Labs website. You assume the entire risk of loss in using this website and the materials contained
within.</p>
<p>Features and specifications of products or services described or depicted on the Site are subject to
change at any time without notice.</p>

<p><span style="font-weight:bold">RIGHT TO CHANGE TERMS AND CONDITIONS</span></p>

<p>Rapid-Labs may, at any time and from time to time, change these terms and conditions. Any changes to
these terms and conditions will be effective immediately upon posting of the changed terms and
conditions on the Site. You agree to review these terms and conditions periodically, and use of the Site
following any such change constitutes your agreement to follow and be bound by the terms and
conditions as changed.</p>

<p><span style="font-weight:bold">PATIENT PORTAL</span></p>

<p>Please DO NOT use Patient Portal to communicate with Rapid-Labs for urgent or emergency medical
issues. If you are experiencing an urgent medical need, please contact your physician or healthcare
professional. </p>
<p>Rapid-Labs offers secure viewing as a service to patients who wish to view parts of their records. The
Patient Portal can be a valuable tool but has certain risks. To manage these risks, we need to impose
some conditions of participation. This form is intended to show that you have been informed of these risks
and the conditions of participation, and that you accept the risks and agree to the conditions of
participation. </p>
<p><span style="font-weight:bold">How the Secure Patient Portal Works</span></p>

<p>A secure web portal is a type of webpage that uses encryption to keep unauthorized persons from
reading communications, information, or attachments. Secure information can only be read by someone
who knows the right password or passphrase to log in to the portal site. Because the connection channel
between your computer and the website uses secure sockets layer technology you can read or view
information on your computer, but it is still encrypted in transmission between the website and your
computer. </p>
<p><span style="font-weight:bold">Protecting Your Private Health Information and Risks</span></p>

<p>This method of communication and viewing prevents unauthorized parties from being able to access or
read messages while they are in transmission. No transmission system is perfect, and we will do our best
to maintain electronic security. However, keeping messages secure depends on two additional factors: 
1) The secure message must reach the correct email address.
2) Only the correct individual (or someone authorized by that individual) must be able to have access to
the message. </p>
<p>Only you can make sure these two factors are present. It is imperative that Rapid-Labs has your correct
email address and that you inform us of any changes to your email address. You also need to keep track
of who has access to your email account so that only you, or someone you authorize, can see the
messages you receive from us. You are responsible for protecting yourself from unauthorized individuals
learning your password. If you think someone has learned your password, you should promptly go to the
website and change it. </p>
<p><span style="font-weight:bold">Types of Online Communication/Messaging</span></p>


<p>Online communications should never be used for emergency communications or urgent requests.</p>
<p><span style="font-weight:bold">Patient Acknowledgement and Agreement</span></p>

<p>I acknowledge that I have read and fully understand the Patient Portal User Agreement and Consent. I
have read and understand the responsibilities and benefits of the Patient Portal and understand the risks
associated with online communications between me and my physician’s office. I consent to the conditions
outlined and I agree to keep my password confidential and notify the office if my email address changes
at any time. I have had a chance to ask any questions that I had and to receive answers. I have been
proactive about asking questions related to this Agreement. All my questions have been answered and I
understand and concur with the information.</p>

    
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