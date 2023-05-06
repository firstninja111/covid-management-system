<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title','-Lara-Swift') - @setting('app_name')</title>
    <!-- the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/screenLoader.css') }}">
    <link rel="stylesheet" href="{{asset('public/plugins/fontawesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/plugins/icheck/skin/all.css')}}">
    <link rel="stylesheet" href="{{asset('public/plugins/datepicker/css/bootstrap-datepicker.standalone.css')}}">
    <link rel="stylesheet" href="{{ asset('public/plugins/bootstrap4-toggle/css/bootstrap4-toggle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/plugins/datatable/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/plugins/croppie/css/croppie.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('public/plugins/summernote/dist/summernote-bs4.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/crud-style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/hierarchy-select.min.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    
    <!-- Appointment Wizard Style -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/gsdk-bootstrap-wizard.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/demo.css') }}">
    <!-- ------------------------- -->

    <script src="{{asset('public/plugins/chart-js/chart.min.js')}}"></script>
    <script src="{{asset('public/plugins/sweetalert/js/sweetalert.min.js')}}"></script>

    

    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('public/favicon/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('public/favicon/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/favicon/favicon.png')}}">
    <link rel="manifest" href="{{asset('public/favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('public/favicon/favicon.png')}}" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <!-- FAVICON -->

    @yield('style')
    <style>
      :root{
        --theme: {{setting("app_navbar")}}
      }
      .navbar {
        background-color: var(--theme);
      }
    </style>
</head>
<body class="hold-transition sidebar-mini ">
  @include('sweet::alert')
  <!-- Preloader -->
  <div class="payment-loader">
    <div class="loader-pendulums"></div>
  </div>
  <!-- /Preloader -->
<div class="wrapper">

  @include('layouts.sidebar')

  @yield('content')

  <footer class="main-footer text-center">
    <strong>Copyright &copy; {{date('Y')}} <a href="{{env('APP_URL')}}">{{setting('app_name')}}</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->
<script src="{{ asset('public/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('public/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/assets/js/theme.min.js') }}"></script>
<script src="{{asset('public/plugins/datatable/js/datatables.min.js')}}"></script>
<script src="{{asset('public/plugins/summernote/dist/summernote-bs4.min.js')}}"></script>
<script src="{{asset('public/plugins/croppie/js/croppie.min.js')}}"></script>
<script src="{{ asset('public/plugins/bootstrap4-toggle/js/bootstrap4-toggle.min.js') }}"></script>
<script src="{{asset('public/plugins/datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('public/assets/js/custom.js')}}"></script>

<script src="{{asset('public/assets/js/jquery.bootstrap.wizard.js')}}"></script>
<script src="{{asset('public/assets/js/gsdk-bootstrap-wizard.js')}}"></script>
<script src="{{asset('public/assets/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('public/assets/js/hierarchy-select.min.js')}}"></script>


@yield('script')
@yield('chart')
</body>
</html>
