<nav class="main-header navbar navbar-expand navbar-{{setting('app_theme')}}">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link desktop-toggle" id="toggleClose" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        <a class="nav-link mobile-toggle" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>

    @role('admin')
    <!-- SEARCH FORM -->
    <!-- <div class="d-none d-md-block d-lg-block d-xl-block">
    <form method="GET" action="/user" class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" name="search" placeholder="Search users" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    </div> -->
    @endrole

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      @impersonating
      <li class="nav-item">
        <a class="nav-link text-danger btn btn-none btn-outline-primary" href="{{ route('impersonate.leave') }}">
          <p><i class="fa fa-ban mr-2" aria-hidden="true"></i>{{'Exit Impersonation'}}</p>
        </a>
      </li>
      @endImpersonating
      <!-- User Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <img src="{{Auth::user()->avatar?Auth::user()->avatar:'/'. asset('public/uploads/avatar/avatar.png')}}" width="28px" class="img img-circle  img-responsive" alt="User Image">
          {{auth()->user()->lastname. ' '. auth()->user()->firstname}}
          <i class="fa fa-angle-down right"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>

          <?php 
          // $user_id = Auth::user()->id;
          // $user = $this->user->find($user_id);
          // // Get user's current role
          // $role = $user->roles->first()->name;
          ?>
          <a class="dropdown-item" style="text-align: center; font-size: 20px; background: aliceblue">           
            {{ ucfirst(Auth::user()->roles->first()->name == "users" ? "client" : Auth::user()->roles->first()->name) }}
          </a>

          <div class="dropdown-divider"></div>
          <a href="{{url('/')}}" class="dropdown-item">
            <i class="fa fa-home mr-2"></i> {{ __('app.homepage') }}
          </a>
          <a href="{{url('profile')}}" class="dropdown-item">
            <i class="fa fa-user mr-2"></i> {{ __('app.profile') }}
          </a>

          <!-- <a href="/activity-log" class="dropdown-item">
            <i class="fa fa-list mr-2"></i> {{ __('app.activity_log') }}
          </a> -->

          @role('admin')
          <a href="{{url('settings')}}" class="dropdown-item">
            <i class="fa fa-gear mr-2"></i> {{ __('app.application_settings') }}
          </a>
          @endrole

          <div class="dropdown-divider"></div>
          <a href="{{route('logout')}}" class="dropdown-item dropdown-footer bg-gray"><i class="fa fa-sign-out mr-2"></i> {{ __('app.logout') }}</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-{{setting('app_sidebar')}}-light elevation-4">
    <!-- Brand Logo -->
    <div class="navbar-brand d-flex justify-content-center">
      <a class="nav-link toggleopen display-none"  data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      <a href="{{route('home')}}" class="app-logo brand-link">
        @if(setting('app_dark_logo')||setting('app_light_logo'))
          <img src="{{(setting('app_sidebar')=='light')? asset('public/uploads/appLogo/app-logo-dark.png'):asset('public/uploads/appLogo/app-logo-light.png')}}" alt="App Logo" class=" img brand-image img-responsive opacity-8">

        @else
          <img src="{{(setting('app_sidebar')=='light')? asset('public/uploads/appLogo/logo-dark.png'):asset('public/uploads/appLogo/logo-light.png')}}" alt="App Logo" class="img brand-image img-responsive opacity-8">

        @endif
      </a>

    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <a href="{{route('profile.index')}}"><img src="{{Auth::user()->avatar?Auth::user()->avatar:asset('public/uploads/avatar/avatar.png')}}" width="40px" class="img img-circle  img-responsive" alt="User Image"></a>
        </div>
        <div class="info">
          <a href="{{route('profile.index')}}" class="d-block">{{Auth::user()->lastname}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          @role('admin')
          <!-- <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link {{request()->is('/')? 'sidebar-active':''}}">
              <i class="nav-icon fa fa-home"></i>
              <p>
                {{ __('app.dashboard') }}
              </p>
            </a>
          </li> -->
          @endrole

          <li class="nav-item">
            <a href="{{route('appointment.index')}}"  class="nav-link {{request()->is('appointment*')? 'sidebar-active':''}}">
              <i class="nav-icon fa fa-calendar"></i>
              <p>
                {{ __('app.appointments') }}
              </p>
            </a>
          </li>
          
          <!-- <li class="nav-item">
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link {{request()->is('appointment*')? 'sidebar-active':''}}">
                <i class="nav-icon fa fa-calendar"></i>
                <p>
                  {{ __('app.appointments') }}
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              
              <ul class="nav nav-treeview">
                @role('users')
                <li class="nav-item">
                  <a  href="{{route('appointment.create')}}" class="nav-link {{request()->is('appointment/create*')? 'sidebar-active':''}}">
                    <i class="fa fa-plus nav-icon"></i>
                    <p>{{ __('app.add_appointments') }}</p>
                  </a>
                </li>
                @endrole

                <li class="nav-item">
                  <a  href="{{route('appointment.index')}}" class="nav-link {{request()->is('appointment/view*')? 'sidebar-active':''}}">
                    <i class="fa fa-table nav-icon"></i>
                    <p>{{ __('app.view_appointments') }}</p>
                  </a>
                </li>
              </ul>
            </li>
            
          </li> -->

          @role('admin')
          <li class="nav-item has-treeview">
            <a href="{{route('test.index')}}" class="nav-link {{request()->is('test*')? 'sidebar-active':''}}">
              <i class="nav-icon fa fa-ambulance"></i>
              <p>
              {{ __('app.test_types') }}
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('pdf_template.index')}}" class="nav-link {{request()->is('pdf_template*')? 'sidebar-active':''}}">
              <i class="nav-icon fa fa-file-pdf-o"></i>
              <p>
              {{ __('app.pdf_templates') }}
              </p>
            </a>
          </li>
          @endrole

          @role('admin')
          <li class="nav-item has-treeview">
            <a href="{{route('user.index')}}" class="nav-link {{request()->is('user*')? 'sidebar-active':''}}">
              <i class="nav-icon fa fa-users"></i>
              <p>
              {{ __('app.users') }}
              </p>
            </a>
          </li>
          @endrole

          @role('admin')
          <li class="nav-item has-treeview">
            <a href="{{route('role.index')}}" class="nav-link {{request()->is('role*')? 'sidebar-active':''}}">
              <i class="nav-icon fa fa-user-secret"></i>
              <p>
              {{ __('app.roles') }}
              </p>
            </a>
          </li>
          @endrole

          @unlessrole('admin')
          @if(setting('stripe_status'))
          <li class="nav-item">
            <a href="{{route('/subscription')}}" class="nav-link {{request()->is('subscription*')? 'sidebar-active':''}}">
              <i class="nav-icon fa fa-credit-card"></i>
              <p>
                {{ __('app.subscription') }}
              </p>
            </a>
          </li>
          @endif
          @endunlessrole

          @role('admin')
          <li class="nav-item">
            <a href="{{route('settings.index')}}" class="nav-link {{request()->is('settings')? 'sidebar-active':''}}">
              <i class="nav-icon fa fa-gear"></i>
              <p>
                {{ __('app.application_settings') }}
              </p>
            </a>
          </li>
          @endrole
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
