@extends('layouts.template')

@section('title','Settings')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('app.app_settings')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('app.home')}}</a></li>
              <li class="breadcrumb-item active">{{__('app.app_settings')}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 mx-auto mb-3">
                  <ul class="nav nav-tabs" id="app-setting" role="tablist">

                    <li class="nav-item shadow mb-3 mr-2">
                      <a class="nav-link active" id="app-name-tab" data-toggle="tab" href="#app-name" role="tab" aria-controls="app-name" aria-selected="true"><i class="fa fa-user mr-2"></i>{{__('app.app_name')}}</a>
                    </li>

                    <li class="nav-item shadow mb-3 mr-2">
                      <a class="nav-link" id="app-logo-tab" data-toggle="tab" href="#app-logo" role="tab" aria-controls="app-logo" aria-selected="false"><i class="fa fa-image mr-2"></i>{{__('app.app_logo')}}</a>
                    </li>

                    <li class="nav-item shadow mb-3 mr-2">
                      <a class="nav-link" id="app-theme-tab" data-toggle="tab" href="#app-theme" role="tab" aria-controls="app-theme" aria-selected="false"><i class="fa fa-paint-brush mr-2"></i>{{__('app.app_theme')}}</a>
                    </li>

                    <li class="nav-item shadow mb-3 mr-2">
                      <a class="nav-link" id="payment-settings-tab" data-toggle="tab" href="#payment-settings" role="tab" aria-controls="payment-settings" aria-selected="false"><i class="fa fa-money mr-2"></i>{{__('app.app_payment_settings')}}</a>
                    </li>

                    <!-- <li class="nav-item shadow mb-3 mr-2">
                      <a class="nav-link" id="auth-settings-tab" data-toggle="tab" href="#auth-settings" role="tab" aria-controls="auth-settings" aria-selected="false"><i class="fa fa-key mr-2"></i>{{__('app.app_auth_settings')}}</a>
                    </li>

                    <li class="nav-item shadow mb-3 mr-2">
                      <a class="nav-link" id="app-backup-tab" data-toggle="tab" href="#app-backup" role="tab" aria-controls="app-backup" aria-selected="false"><i class="fa fa-database mr-2 text-light"></i>{{__('app.app_backup')}}</a>
                    </li> -->

                    <li class="nav-item shadow mb-3 mr-2">
                      <a class="nav-link" id="default-location-tab" data-toggle="tab" href="#default-location" role="tab" aria-controls="default-location" aria-selected="false"><i class="fa fa-map mr-2"></i>{{__('app.default_location')}}</a>
                    </li>

                    <li class="nav-item shadow mb-3 mr-2">
                      <a class="nav-link" id="time-slot-tab" data-toggle="tab" href="#time-slot" role="tab" aria-controls="time-slot" aria-selected="false"><i class="fa fa-clock-o mr-2"></i>{{__('app.time_slot')}}</a>
                    </li>
                  </ul>
              </div>
              <div class="col-md-7 mx-auto">
                <div class="card">
                  <div class="card-body">
                    <div class="tab-content my-3" id="app-settingContent">
                    <div class="tab-pane fade show active" id="app-name" role="tabpanel" aria-labelledby="app-name-tab">
                      <form action="{{route('settings/app-name/update')}}" method="POST">
                            @csrf
                            <div class="col-md-12">
                              <div class="form-group">
                                <input type="text"  name="app_name"  class="form-control" value="{{setting('app_name')}}" placeholder="{{__('app.app_application_name')}}">
                              </div>
                              <input type="submit"  class="form-control mt-2 btn btn-success" value="Save Name">
                            </div>
                    </form>
                    </div>
                    <div class="tab-pane fade" id="app-logo" role="tabpanel" aria-labelledby="app-logo-tab">
                          <form action="{{route('settings/app-logo/update')}}" enctype="multipart/form-data" method="POST">
                              @csrf
                              <div class="col-md-12">
                                <div class="form-group bg-light text-center">
                                  <img id="app-dark-logo" class="img img-responsive my-5 w-50 justify-content-center text-center" src="{{setting('app_dark_logo')? asset('uploads/appLogo/app-logo-dark.png') :asset('uploads/appLogo/logo-dark.png')}}" alt="App_logo">
                                </div>
                                <div class="form-group">
                                  <label class="form-group mb-1">{{__('app.app_select_dark_logo')}}</label>
                                  <input type="file"  name="app_dark_logo"  class="form-control" value="Select Dark Logo">
                                </div>
                                <div class="form-group bg-secondary text-center">
                                  <img id="app-light-logo" class="img img-responsive my-5 w-50 justify-content-center text-center" src="{{setting('app_light_logo')? asset('uploads/appLogo/app-logo-light.png') :asset('uploads/appLogo/logo-light.png')}}" alt="App_logo">
                                </div>
                                <div class="form-group">
                                  <label class="form-group mb-1">{{__('app.app_select_ligth_logo')}}</label>
                                  <input type="file"  name="app_light_logo"  class="form-control" value="Select Light Logo">
                                </div>
                                <input type="submit"  class="form-control mt-2 btn btn-success" value="{{__('app.app_update_logo')}}">
                              </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="app-theme" role="tabpanel" aria-labelledby="app-theme-tab">
                          <form action="{{route('settings/app-theme/update')}}" method="POST">
                                @csrf
                                <div class="col-md-12">
                                  <div class="form-group">
                                        <label class="form-group">{{__('app.app_sidebar_theme')}}</label>
                                      <select class="form-control" name="app_sidebar">
                                        <option value="dark" {{(setting('app_sidebar')=="dark")? 'selected' : ''}}>{{__('app.dark')}}</option>
                                        <option value="light" {{(setting('app_sidebar')=="light")? 'selected' : ''}}>{{__('app.light')}}</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label class="form-group">{{__('app.app_navbar_text')}}</label>
                                      <select class="form-control" name="app_theme">
                                        <option value="dark" {{(setting('app_theme')=="dark")? 'selected' : ''}}>{{__('app.dark')}}</option>
                                        <option value="light" {{(setting('app_theme')=="light")? 'selected' : ''}}>{{__('app.light')}}</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                        <label class="form-group">{{__('app.app_navbar_bg')}}</label>
                                        <input type="color" class="form-control" name="app_navbar" value="{{setting('app_navbar')}}" id="color-picker">
                                  </div>
                                  <input type="submit"  class="form-control mt-2 btn btn-success" value="Save Theme">
                                </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="payment-settings" role="tabpanel" aria-labelledby="payment-settings-tab">
                        <form action="{{route('settings/stripe-payment/update')}}" method="POST">
                              @csrf
                              <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="form-group">{{__('app.app_paypal')}}</label>
                                    <input type="text"  name="app_paypal"  class="form-control" value="{{setting('app_paypal')}}" placeholder="{{__('app.app_paypal')}}">
              									  </div>
                              </div>
                              <input type="submit"  class="form-control mt-2 btn btn-success" value="Update Payment Address">
                        </form>
                    </div>

                    <div class="tab-pane fade" id="default-location" role="tabpanel" aria-labelledby="default-location-tab">
                        <form action="{{route('settings/default-location/update')}}" method="POST">
                              @csrf
                              <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="form-group">{{__('app.default_location')}}</label>
                                    <input type="text"  name="default_location"  class="form-control" value="{{setting('default_location')}}" placeholder="{{__('app.default_location')}}">
              									  </div>
                              </div>
                              <input type="submit"  class="form-control mt-2 btn btn-success" value="Update Default Location">
                        </form>
                    </div>

                    <div class="tab-pane fade" id="time-slot" role="tabpanel" aria-labelledby="time-slot-tab">
                        <form action="{{route('settings/time-slot/update')}}" method="POST">
                              @csrf
                              <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="form-group">{{__('app.start_time')}}</label>
                                    <input type="time"  name="start_time"  class="form-control" value="{{setting('start_time')}}" placeholder="{{__('app.start_time')}}">
              									  </div>
                                  
                                  <div class="form-group">
                                    <label class="form-group">{{__('app.end_time')}}</label>
                                    <input type="time"  name="end_time"  class="form-control" value="{{setting('end_time')}}" placeholder="{{__('app.end_time')}}">
                                  </div>
                              </div>
                              <input type="submit"  class="form-control mt-2 btn btn-success" value="Update Time Range">
                        </form>
                    </div>
                    
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>
    <!-- Main content -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
