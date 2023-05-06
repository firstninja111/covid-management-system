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
          <li><a class="nav-link scrollto active" href="{{route('home')}}">Home</a></li>
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

  
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h2 style="color:red">Private, Inmediate Results</h2>
      <h1 style="color:blue">RAPID COVID<span >-19</span> TESTING AND SCREENING.</h1>
      <h2 style="color:blue">FDA Approved Rapid Antigen/RT-PCR Tests</h2>
      <h2 style="color:blue">Rapid International Travel Certified RT-PCR Testing Results</h2>
      <h2 style="color:blue">International Travelers Accepted</h2>
      <h2 style="color:blue">Employer COVID-19 Testing and Screening</h2>

      <a href="#schedule" class="btn-get-started scrollto">Schedule appointment</a>
    </div>
    <!-- <div class="container">
      <h2 style="color:red">Private, Inmediate Results</h2>
      <h1 style="color:blue">RAPID COVID-19 TESTING AND SCREENING.</h1>
      <h2 style="color:blue">FDA Approved Rapid Antigen/RT-PCR Tests</h2>
      <h2 style="color:blue">Rapid International Travel Certified RT-PCR Testing Results</h2>
      <h2 style="color:blue">International Travelers Accepted</h2>
      <h2 style="color:blue">Employer COVID-19 Testing and Screening</h2>
      <a href="#schedule" class="btn-get-started scrollto">Schedule appointment</a>
    </div> -->
  </section><!-- End Hero -->

  <main id="main">
	<!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 d-flex align-items-stretch">
            <div class="content">
              <h3>Why Rapid-Labs?</h3>
              <p>We are a CLIA Certified lab with the entire testing process streamlined
for comfort and convenience.  We have established ourselves in our
community to provide point-of-care medical testing, which is essential
for rapid detection and more accurate result of conditions the patient
is presenting o keep our community healthy.</p>
              <div class="text-center">

              </div>
            </div>
          </div>
          <div class="col-lg-6 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-6 d-flex align-items-stretch">
                  <div class="icon-box mt-6 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Waiting for your Test Results?</h4>
                    <p>Don't forget to check your email's junk folder</p>
                  </div>
                </div>
                
                
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->
	
	
	

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
  <!--          <a href="{{asset('public/uploads/model_rapid.jpg')}}" class="glightbox play-btn mb-4"></a> -->
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3>Rapid-Labs offers the highest quality Covid Testing Procedures and Equipment</h3>
            <p>We have the highest quality equipment to take your covid test.</p>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title">Personnel</h4>
              <p class="description">All our personnel our highly trained professionals in performing the testing offered in Rapid-Labs to ensure quick results for all your needs.</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-gift"></i></div>
              <h4 class="title">Equipment</h4>
              <p class="description">Rapid-Labs uses the newest equipment available for quick and accurate reporting authorized by the FDA under an Emergency Use Authorization (EUA) for use by authorized laboratories.</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-atom"></i></div>
              <h4 class="title">Location</h4>
              <p class="description">Conveniently located in Alton Road, Miami Beach to centrally serve our community and in the heart of Miami’s tourist destinations. Open daily from: Monday through Friday- 7: am to 11:00pm and Saturday-
Sunday: 7:00am to 7:00pm.</p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
          
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-heartbeat"></i></div>
              <h4><a href="">CLIA Certified Lab</a></h4>
              <p>The Centers for Medicare and Medicaid Services (CMS) administers the CLIA Laboratory certification
program in conjunction with the Food and Drug Administration (FDA), the Centers for Disease Control
and Prevention and the Florida Agency for Health Care Administration. Rapid-Labs was issued CLIA
#10D2247306.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-pills"></i></div>
              <h4><a href="">FDA Approved</a></h4>
              <p>The United States FDA has made this test available under an emergency access mechanism called an
Emergency Use Authorization (EUA). The EUA is supported by the Secretary of Health and Human
Service’s (HHS’s) declaration that circumstances exist to justify the emergency use of in vitro diagnostics
(IVDs) for the detection and/or diagnosis of the virus that causes COVID-19.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-hospital-user"></i></div>
              <h4><a href="">Fastest Results</a></h4>
              <p>Depending on the desired test and scheduling selected. Test results may be available within 60 minutes.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-dna"></i></div>
              <h4><a href="">Official Covid-19 Travel Certificate</a></h4>
              <p>Test results are immediately sent via email for downloading and printing with scannable QRC Code for
validity. Test results provide all required pertinent information for travel.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-wheelchair"></i></div>
              <h4><a href="">Testing</a></h4>
              <p>Antibody- Detects if the COVID-19 IgG antibody is produced which may determine prior infection.</br></br>
Rapid Antigen- Detects if the SARS-CoV-2 nucleocapsid antigens are present in the specimen tested
above the limit of detection in the upper and lower respiratory specimen during infection.</br></br>
Rt-PCR Screening- Detects if the RNA (Ribonucleic acid) contained within the SARS-CoV-2 virus are
present in the specimen above the limit of detection during infection.</br></br>
IV Therapy-</p> <p><span style="font-weight:bold"> COMING SOON.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-notes-medical"></i></div>
              <h4><a href="">Need to Know</a></h4>
              <p>Any patient can be tested, a health professional referral is not required for testing. COVID-19 testing
is conducted on site to ensure results on a timely manner, so patients discover their current health status quickly.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- Schedule Appointment Section -->

    <section id="schedule" class="content section-bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('layouts.includes.alerts')
                    <!--      Wizard container        -->
                    <div class="wizard-container">
                      <div class="card wizard-card" data-color="orange" id="wizardProfile">   <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->
                          <form class="form-horizontal" method="POST" action="{{route('appointment.store')}}">
                            @csrf
                              
                            <div class="wizard-header">
                                <h3>
                                  <b>Schedule</b> Your Appointment <br>
                                  <small>You can schedule appointment by following steps</small>
                                </h3>
                            </div>

                            <div class="wizard-navigation">
                                <ul>
                                    <li style="display:flex; justify-content:center; align-items:center;"><a href="#choose_test_type" data-toggle="tab" >Choose Test Type</a></li>
                                    <li style="display:flex; justify-content:center; align-items:center;"><a href="#choose_appointment" data-toggle="tab">Appointment</a></li>
                                    <li style="display:flex; justify-content:center; align-items:center;"><a href="#choose_information" data-toggle="tab">Information</a></li>
                                    <li style="display:flex; justify-content:center; align-items:center;"><a href="#choose_payment" data-toggle="tab">Payment</a></li>
                                </ul>
                            </div>
                            <div class="wizard-footer height-wizard" style="margin-top:20px">
                                <div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Next' />
                                    <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish' value='Pay Now' />

                                </div>

                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="tab-content">
                              <div class="tab-pane" id="choose_test_type">
                                  <h5>South Beach</h5>
                                  <input class="hidden-input" name="type_id" id="type_id"/>
                                  @foreach($tests as $test)
                                  <div class="test-type" test-id="{{$test->id}}" test-type="{{$test->test_type}}" price="{{$test->price}}">
                                    <input class="form-check-input radio-type" style="cursor:pointer;" type="radio" name="test_type" id="flexCheck_{{$test->id}}">
                                    <label class="form-check-label" style="cursor:pointer; width: 100%; color:#504e4e; font-weight:bold;" for="flexCheck_{{ $test->id }}">{{$test->test_view}}&nbsp;&nbsp; <span  style="color:black">${{number_format($test->price, 2)}}</span></label>
                                    <?php
                                      $descriptions = explode("\n", $test->description);
                                      foreach($descriptions as $description) {?>
                                      <label class="form-check-label" style="cursor:pointer; width: 100%; padding-left: 20px;" for="flexCheck_{{ $test->id }}">  {{ $description }}</label>
                                    <?php
                                      }?>
                                    <label class="form-check-label" style="cursor:pointer; width: 100%; padding-left: 20px; padding-top:5px; padding-bottom:5px; color:gray;" for="flexCheck_{{ $test->id }}">{{$test->sample_type}}</label>
                                    <?php
                                      $features = explode("\n", $test->features);
                                      foreach($features as $feature) {?>
                                      <label class="form-check-label" style="cursor:pointer; width: 100%; color:black; padding-left:10px;" for="flexCheck_{{ $test->id }}"> ~ {{ $feature }}</label>
                                    <?php
                                      }?>
                                  </div>
                                  @endforeach
                              </div>
                              <div class="tab-pane" id="choose_appointment">
                                  <h4 class="info-text"> Select your available time </h4>
                                  <input class="hidden-input" name="s_time" id="s_time"/>
                                  <div class="row timeslot-header" style="justify-content: center;">
                                    @foreach($date_slots as $date_slot)
                                    <div class="width-1-7 Day">
                                      <p class="day-header"> &nbsp; {{ $date_slot['offset_day'] }} &nbsp;</p>
                                      <p class="week">{{ $date_slot['week_day'] }}</p>
                                      <p class="day-header">{{ $date_slot['month_str']. ' '. $date_slot['day'] }}</p>
                                    </div>
                                    @endforeach
                                  </div>
                                  <div class="row timeslot-body" style="justify-content: center; margin-top: 20px;">
                                    <?php $offset = 0; foreach($time_slots as $time_slot)  { ?>
                                    <div class="width-1-7 time-slot-group" style="height: 500px; overflow:auto;">
                                      @foreach($time_slot as $slot)
                                        <div class="timeslot" date="{{ date('Y-m-d', strtotime(' +'. $offset. 'day')) }}">
                                          {{$slot}}
                                        </div>  
                                      @endforeach
                                    </div>  
                                    <?php $offset ++; }?>
                                  </div>
                              </div>
                              <div class="tab-pane" id="choose_information">
                                  <div class="row">
                                      <div class="col-sm-12">
                                          <h4 class="info-text"> Your information </h4>
                                      </div>
                                      <div class="col-sm-6" style="padding-right: 20px;">
                                          <div class="form-group">
                                              <label>Name <span style="color:red">*</span></label>
                                              <div class="row">
                                                @auth
                                                <div class="col-sm-5">
                                                  <input id="firstname" type="text" class="form-control" placeholder="First Name" name="firstname" value="{{Auth::user()->firstname}}">
                                                </div>
                                                <div class="col-sm-7">
                                                  <input id="lastname" type="text" class="form-control" placeholder="Last Name" name="lastname" value="{{Auth::user()->lastname}}">
                                                </div>
                                                @endauth
                                                @guest
                                                <div class="col-sm-5">
                                                  <input id="firstname" type="text" class="form-control" placeholder="First Name" name="firstname" value="">
                                                </div>
                                                <div class="col-sm-7">
                                                  <input id="lastname" type="text" class="form-control" placeholder="Last Name" name="lastname" value="">
                                                </div>
                                                @endguest
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label>Phone</label>
                                              <div class="row">
                                                <div class="col-sm-12">
                                                  @auth
                                                  <input id="phone" type="text" class="form-control" placeholder="Phone number" name="phone" value="{{Auth::user()->phone}}">
                                                  @endauth
                                                  @guest
                                                  <input id="phone" type="text" class="form-control" placeholder="Phone number" name="phone" value="">
                                                  @endguest
                                                  <label class="form-guide-level">You will receive a text message reminder before your appointment.</label>
                                                </div>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label>Email <span style="color:red">*</span></label>
                                              <div class="row">
                                                <div class="col-sm-12">
                                                  @auth
                                                  <input id="email" type="email" class="form-control" placeholder="Email Address" name="email" value="{{Auth::user()->email}}">
                                                  @endauth
                                                  @guest
                                                  <input id="email" type="email" class="form-control" placeholder="Email Address" name="email" value="">
                                                  @endguest
                                                </div>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label>Confirm Email <span style="color:red">*</span></label>
                                              <div class="row">
                                                <div class="col-sm-12">
                                                  @auth
                                                  <input id="confirm_email" type="email" class="form-control" placeholder="Confirm Email Address" name="confirm_email" value="{{Auth::user()->email}}">
                                                  @endauth
                                                  @guest
                                                  <input id="confirm_email" type="email" class="form-control" placeholder="Confirm Email Address" name="confirm_email" value="">
                                                  @endguest
                                                </div>
                                              </div>
                                          </div>
                                          <label class="form-guide-level" style="font-size: 20px;">Patient Intake Form</label>
                                          <label class="form-guide-level">Please make sure that this information is entered correctly. This information needs to match your government passport or ID</label>
                                          <div class="form-group">
                                              <label>Gender <span style="color:red">*</span></label>
                                              @auth
                                              <select name="gender" class="form-control">
                                                  <option value="male" {{Auth::user()->gender == 'Male' ? 'selected' : ''}}> Male </option>
                                                  <option value="female" {{Auth::user()->gender == 'Female' ? 'selected' : ''}}> Female </option>
                                              </select>
                                              @endauth
                                              @guest
                                              <select name="gender" class="form-control">
                                                  <option value="male"> Male </option>
                                                  <option value="female"> Female </option>
                                              </select>
                                              @endguest
                                          </div>
                                          <div class="form-group">
                                              <label>Date of Birth (MM/DD/YYYY) - WARNING:USE CORRECT FORMAT<span style="color:red">*</span></label>
                                              <div class="row">
                                                <div class="col-sm-12">
                                                  @auth
                                                  <input id="birth_date" name="birth_date" type="date" class="form-control" value="{{Auth::user()->birth_date}}">
                                                  @endauth
                                                  @guest
                                                  <input id="birth_date" name="birth_date" type="date" class="form-control" value="">
                                                  @endguest
                                                </div>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label>Passport Country</label>
                                              <div class="row">
                                                <div class="col-sm-12">
                                                  @auth
                                                  <input id="pass_country" type="text" name="pass_country" class="form-control"  value="{{Auth::user()->pass_country}}">
                                                  @endauth
                                                  @guest
                                                  <input id="pass_country" type="text" name="pass_country" class="form-control"  value="">
                                                  @endguest
                                                </div>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label>Passport Number</label>
                                              <div class="row">
                                                <div class="col-sm-12">
                                                  @auth
                                                  <input id="pass_number" name="pass_number" type="text" class="form-control"  value="{{Auth::user()->pass_number}}">
                                                  @endauth
                                                  @guest
                                                  <input id="pass_number" name="pass_number" type="text" class="form-control"  value="">
                                                  @endguest
                                                </div>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label>What is your address? (only U.S.addresses accepted)</label>
                                              <div class="row">
                                                <div class="col-sm-12">
                                                  @auth
                                                  <input id="address" type="text" name="address" class="form-control"  value="{{Auth::user()->address}}">
                                                  @endauth
                                                  @guest
                                                  <input id="address" type="text" name="address" class="form-control"  value="">
                                                  @endguest
                                                </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>What is your zip code? </label>
                                              <div class="row">
                                                <div class="col-sm-12">
                                                  @auth
                                                  <input id="zipcode" type="text" name="zipcode" class="form-control"  value="{{Auth::user()->zipcode}}">
                                                  @endauth
                                                  @guest
                                                  <input id="zipcode" type="text" name="zipcode" class="form-control"  value="">
                                                  @endguest
                                                </div>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label>What is your ethnicity? <span style="color:red">*</span></label>
                                              @auth
                                              <select name="ethnicity" class="form-control">
                                                  <option value="white" {{Auth::user()->ethnicity == 'white' ? 'selected' : ''}}> White / Caucasian </option>
                                                  <option value="hispanic" {{Auth::user()->ethnicity == 'hispanic' ? 'selected' : ''}}> Hispanic or Latino </option>
                                                  <option value="indian" {{Auth::user()->ethnicity == 'indian' ? 'selected' : ''}}> American Indian or Alaska Native </option>
                                                  <option value="asian" {{Auth::user()->ethnicity == 'asian' ? 'selected' : ''}}> Asian </option>
                                                  <option value="black" {{Auth::user()->ethnicity == 'black' ? 'selected' : ''}}> Black or African American </option>
                                                  <option value="islander" {{Auth::user()->ethnicity == 'islander' ? 'selected' : ''}}> Native Hawaiian or Other Pacific Islander </option>
                                                  <option value="other" {{Auth::user()->ethnicity == 'other' ? 'selected' : ''}}> Other </option>
                                              </select>
                                              @endauth
                                              @guest
                                              <select name="ethnicity" class="form-control">
                                                  <option value="white"> White / Caucasian </option>
                                                  <option value="hispanic"> Hispanic or Latino </option>
                                                  <option value="indian"> American Indian or Alaska Native </option>
                                                  <option value="asian"> Asian </option>
                                                  <option value="black"> Black or African American </option>
                                                  <option value="islander"> Native Hawaiian or Other Pacific Islander </option>
                                                  <option value="other"> Other </option>
                                              </select>
                                              @endguest
                                          </div>
                                          <div class="form-group symptoms_group">
                                              <label>Symptoms <span style="color:red">*</span></label>
                                              <input class="hidden-input" id="symptoms" name="symptoms">
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="none_label">
                                                <label class="form-check-label" for="none_label">
                                                  None
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="contact_label">
                                                <label class="form-check-label" for="contact_label">
                                                  Contact with and (suspected) exposure
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="fever_label">
                                                <label class="form-check-label" for="fever_label">
                                                  Fever or chills
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="cough_label">
                                                <label class="form-check-label" for="cough_label">
                                                  Cough
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="breath_label">
                                                <label class="form-check-label" for="breath_label">
                                                  Shortness of breath / difficulty breathing
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="fatigue_label">
                                                <label class="form-check-label" for="fatigue_label">
                                                  Fatigue
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="muscle_label">
                                                <label class="form-check-label" for="muscle_label">
                                                  Muscle / body aches
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="loss_label">
                                                <label class="form-check-label" for="loss_label">
                                                  Loss of taste or smell
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="sore_label">
                                                <label class="form-check-label" for="sore_label">
                                                  Sore throats
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="runny_label">
                                                <label class="form-check-label" for="runny_label">
                                                  Congestion or runny nose
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="vomiting_label">
                                                <label class="form-check-label" for="vomiting_label">
                                                  Nausea or vomiting
                                                </label>
                                              </div>
                                          </div>
                                          <label class="form-guide-level" style="font-size: 20px; font-weight:bold !important;">AKNOWLEDGMENT AND AGREEMENT</label>
                                          <label class="form-guide-level">
                                            <span><a href="{{route('refund_policy')}}" target="_blank"> Refund Policy, </a></span>
                                            <span><a href="{{route('covid_inform')}}" target="_blank"> COVID-19 Testing Authorization and Consent </a></span> and 
                                            <span><a href="{{route('terms_conditions')}}" target="_blank"> Terms and Conditions </a></span>
                                          </label>
                                          <div class="form-group">
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="label_read_it">
                                                <label class="form-check-label" for="label_read_it">
                                                  I have read and agree to the above <span style="color:red">*</span>
                                                </label>
                                                <p style="margin:0px"></p>
                                                <input class="hidden-input" name="covid_inform1" id="covid_inform1">
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="label_contact_agree">
                                                <label class="form-check-label" for="label_contact_agree">
                                                  I agree to be contacted by <span style="color:#0043ff; font-weight: bold;"> rapid-labs.com </span> for transactional emails details regarding my appointment, test results and supporting content <span style="color:red">*</span>
                                                </label>
                                                <p style="margin:0px"></p>
                                                <input class="hidden-input" name="covid_inform2" id="covid_inform2">
                                              </div>
                                          </div>
                                      </div>
                                      
                                  </div>
                              </div>
                              <div class="tab-pane" id="choose_payment">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <h4 class="info-text"> Secure Payment </h4>
                                    <h4 class="info-text payment_label" style="font-weight: bold; font-family: times"> You will be billed $89.00 for Rapid Antigen Test ~ 30 Minutes Results </h4>
                                  </div>
                                  <div class="col-sm-2">
                                  </div>
                                  <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <div class="row">
                                          @auth
                                          <div class="col-sm-5">
                                            <input id="pay_firstname" type="text" class="form-control" placeholder="First Name" name="firstname" value="{{Auth::user()->firstname}}">
                                          </div>
                                          <div class="col-sm-7">
                                            <input id="pay_lastname" type="text" class="form-control" placeholder="Last Name" name="lastname" value="{{Auth::user()->lastname}}">
                                          </div>
                                          @endauth
                                          @guest
                                          <div class="col-sm-5">
                                            <input id="pay_firstname" type="text" class="form-control" placeholder="First Name" name="firstname" value="">
                                          </div>
                                          <div class="col-sm-7">
                                            <input id="pay_lastname" type="text" class="form-control" placeholder="Last Name" name="lastname" value="">
                                          </div>
                                          @endguest
                                        </div>
                                    </div>
                                    <!-- <div class="form-group" style="display: none;">
                                        <label>Credit Card Number</label>
                                        <div class="row">
                                          <div class="col-sm-12">
                                            <i class="fa fa-credit-card card-inner"></i>
                                            <input id="card_number" type="text" class="form-control" name="card_number" placeholder="Card number" style="padding-left: 40px">
                                          </div>
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label>Zip / Postal Code</label>
                                        <div class="row">
                                          <div class="col-sm-5">
                                            @auth
                                            <input id="pay_zipcode" type="text" class="form-control" placeholder="Zip Code" value="{{Auth::user()->zipcode}}">
                                            @endauth
                                            @guest
                                            <input id="pay_zipcode" type="text" class="form-control" placeholder="Zip Code">
                                            @endguest
                                          </div>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-2">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="wizard-footer height-wizard">
                                <div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Next' />
                                    <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish' value='Pay Now' />

                                </div>

                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                          </form>
                      </div>
                    </div> <!-- wizard container -->
                </div>
            </div>
        </div>
    </section>

   

   

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Privacy Statement</h2>
          
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">What Information do we Collect? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                We collect information from you when you fill out a form. When ordering or registering on our site, as
appropriate, you may be asked to enter your: name, email address or phone number. You may, however, visit our site anonymously.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">What do we use your information for? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                Any of the information we collect from you may be used to personalize your experience and help us better
respond to your individual needs.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">How do we protect your information? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                We implement a variety of security measures to maintain the safety of your personal information when
you enter, submit, or access your personal information.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Do we disclose any information to outside parties? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                We do not sell, trade, or otherwise transfer to outside parties your personally identifiable information. This
does not include trusted third parties who assist us in operating our website, conducting our business, or servicing you, so long as those parties agree to keep this information confidential. We may also release your information when we believe release is appropriate to comply with the law, enforce our site policies, or protect ours or others’ rights, property, or safety. However, non-personally identifiable visitor information may be provided to other parties for marketing, advertising, or other uses.
                </p>
              </div>
            </li>

            

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

   

    

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>If you have any questions about COVID-19 testing please feel free to Contact Us.</p>
        </div>
      </div>

      <div>
       <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3592.7310041750447!2d-80.1424956843266!3d25.77944711415606!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d9b48afc230e37%3A0xba735161601fd779!2s917%20Alton%20Rd%2C%20Miami%20Beach%2C%20FL%2033139!5e0!3m2!1sen!2sus!4v1642371041251!5m2!1sen!2sus"
	   width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>

      <div class="container">
        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>917 Alton Road, Miami Beach, FL 33139</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@rapid-labs.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 786-321-7545</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="{{route('contact_mailsend')}}" method="post" role="form" class="php-email-form">
              @csrf
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="contact_name" class="form-control" id="contact_name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="contact_email" id="contact_email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

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
              <li><i class="bx bx-chevron-right"></i> <a href="#about">Testing Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('terms_conditions')}}">Terms & Conditions</a></li>
              
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
           <!-- <p>Covid-19 Recommendations</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>-->
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
          Designed by <a href="https://CodeinUSA.com/" target="_blank">CodeInUSA</a>
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
  <!-- <script src="{{ asset('public/assets/vendor/php-email-form/validate.js') }}"></script> -->

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
  $('document').ready(function(){
    display_width = $(document).width();
    console.log(display_width);

    if(display_width <= 540)
    {
      $(".timeslot-header").find(".width-1-7").each(function(index) {
        if(index >= 3)
        $(this).remove();
      });
      
      $(".timeslot-body").find(".width-1-7").each(function(index) {
        if(index >= 3)
        $(this).remove();
      });
    }
  })

  $('.radio-type').click(function(){
    var parent = $(this).parent();

    var test_title = parent.attr('test-type');
    var price = parent.attr('price');

    $('.payment_label').html("You will be billed <span style='color:##1111e5'>$"+ price + " </span> for " + test_title + ".");

		parent.siblings().removeClass('choose-check');
		$(this).parent().addClass('choose-check');

    test_id = parent.attr('test-id');
    $("#type_id").val(test_id);
  });

  $('.timeslot').click(function(){
    $('.timeslot').removeClass('select-timeslot');
    $(this).addClass('select-timeslot');
    
    var time = $(this).html();
    var date = $(this).attr('date');
    var time_str = time.trim();

    var time_hour = parseInt(time_str.substr(0, time_str.length - 5));
    var time_min =  time_str.substr(time_str.length - 5, 2);
    var time_type = time_str.substr(time_str.length - 2, 2);
  

    if(time_type == "PM" && time_hour != 12)
      time_hour += 12;

    $("#s_time").val(date + " " + time_hour + ":" + time_min);
  })

  $('.symptoms_group').click(function(){
    var values = [];
    $('.symptoms_group').each(function() {
        $(this).find(".form-check-input").each(function() {
            console.log($(this)[0].checked);
            values.push($(this)[0].checked ? 1 : 0);
        });
    });

    var checked_cnt = 0;
    for(var i = 0; i < values.length - 1; i++) {
      value = values[i];
      if(value == 1){
        checked_cnt ++;
        break;
      }
    }
    if(checked_cnt == 0)
      $('#symptoms').val('');
    else
      $('#symptoms').val(JSON.stringify(values));
  })

  $("#firstname").change(function(){
    $("#pay_firstname").val($(this).val());
  })

  $("#lastname").change(function(){
    $("#pay_lastname").val($(this).val());
  })

  $("#zipcode").change(function(){
    $("#pay_zipcode").val($(this).val());
  })

  $("#label_read_it").click(function(){
    var checked = $(this)[0].checked;
    $("#covid_inform1").val(checked ? 'true' : '');
  })
  
  $("#label_contact_agree").click(function(){
    var checked = $(this)[0].checked;
    $("#covid_inform2").val(checked ? 'true' : '');
  })

  $("#label_refund_policy").click(function(){
    var checked = $(this)[0].checked;
    $("#refund_policy").val(checked ? 'true' : '');
  })
</script>
