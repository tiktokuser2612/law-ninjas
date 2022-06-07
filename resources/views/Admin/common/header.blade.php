@php
 $admin = Auth::guard('admin')->user();

 @endphp


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="{{url('public/assets/images/favicon.svg')}}"
      type="image/x-icon"
    />
    <title>Law Ninjas</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{url('public/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{url('public/assets/css/lineicons.css')}}" />
    <link rel="stylesheet" href="{{url('public/assets/css/materialdesignicons.min.css')}}" />
    <link rel="stylesheet" href="{{url('public/assets/css/main.css')}}" />
     <!-- ========== All CSS files linkup alert toggle button ========= -->
    <link rel="stylesheet" href="{{url('public/assets/css/toggle-button.css')}}" />
  <!-- ========== All CSS files linkup alert progress bar ========= -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  </head>
  <body>
    <!-- ======== sidebar-nav start =========== -->
    <aside class="sidebar-nav-wrapper">
      <div class="navbar-logo">
        <a href="{{url('/admin/dashboard')}}">
          <img src="{{url('public/assets/images/logo/logo.svg')}}" alt="logo" />
        </a>
      </div>
      <nav class="sidebar-nav">
        <ul>
         @php
            $url = \Route::current()->uri;
          @endphp
          <li class="nav-item {{ ('admin/dashboard' == $url) ? 'active' : ''}}">
            <a href="{{url('/admin/dashboard')}}">
              <span class="icon">
                <i class="mdi mdi-view-dashboard"></i>
              </span>
              <span class="text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item {{ ('admin/users' == $url) ? 'active' : ''}}">
            <a href="{{url('/admin/users')}}">
              <span class="icon">
                <i class="mdi mdi-account-multiple"></i>
              </span>
              <span class="text">Users</span>
            </a>
          </li>

          <li class="nav-item {{ ('admin/Resources' == $url) ? 'active' : ''}} || {{ ('admin/Resources/add' == $url) ? 'active' : ''}} || {{ ('admin/Resources/edit/{id}' == $url) ? 'active' : ''}}">
            <a href="{{url('admin/Resources')}}">
              <span class="icon">
                <i class="mdi mdi-application"></i>
              </span>
              <span class="text">Resources</span>
            </a>
          </li>

          <li class="nav-item {{ ('admin/videos' == $url) ? 'active' : ''}} || {{ ('admin/videos/add' == $url) ? 'active' : ''}} || {{ ('admin/videos/edit/{id}' == $url) ? 'active' : ''}}">
            <a href="{{url('admin/videos')}}">
              <span class="icon">
                <i class="mdi mdi-video"></i>
              </span>
              <span class="text">Videos</span>
            </a>
          </li>

          <li class="nav-item {{ ('admin/arena' == $url) ? 'active' : ''}} || {{ ('admin/arena/add' == $url) ? 'active' : ''}} || {{ ('admin/arena/edit/{id}' == $url) ? 'active' : ''}} || {{ ('admin/arena/show/{id}' == $url) ? 'active' : ''}}">
            <a href="{{url('admin/arena')}}">
              <span class="icon">
                <i class="mdi mdi-account-group"></i>
              </span>
              <span class="text">Arena</span>
            </a>
          </li>

          <li class="nav-item {{ ('admin/profile' == $url) ? 'active' : ''}}">
            <a href="{{url('/admin/profile')}}">
              <span class="icon">
                <i class="mdi mdi-account"></i>
              </span>
              <span class="text">Profile</span>
            </a>
          </li>

        </ul>
      </nav>
    </aside>
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
      <!-- ========== header start ========== -->
      <header class="header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-5 col-md-5 col-6">
              <div class="header-left d-flex align-items-center">
                <div class="menu-toggle-btn mr-20">
                  <button id="menu-toggle" class="main-btn primary-btn btn-hover" >
                    <i class="lni lni-chevron-left me-2"></i> Menu
                  </button>
                </div>
              </div>
            </div>
            <div class="col-lg-7 col-md-7 col-6">
              <div class="header-right">
                <!-- profile start -->
                <div class="profile-box ml-15">
                  <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="profile-info">
                      <div class="info">
                        <div class="image">
                          <img src="{{url('storage/app/public/Admin/profile/'.$admin->image)}}" alt="">
                          {{-- <span class="status"></span> --}}
                        </div>
                        <h6>{{$admin->first_name}} &nbsp;{{$admin->last_name}}</h6>
                      </div>
                    </div>
                    <i class="lni lni-chevron-down"></i>
                  </button>
                  <ul
                    class="dropdown-menu dropdown-menu-end"
                    aria-labelledby="profile"
                  >
                    <li>
                      <a href="{{url('/admin/profile')}}">
                        <i class="lni lni-user"></i>Profile
                      </a>
                    </li>
                    <li>
                      <a href="{{url('logout')}}"> <i class="lni lni-exit"></i> Sign Out </a>
                    </li>
                  </ul>
                </div>
                <!-- profile end -->
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- ========== header end ========== -->

      @include('Admin.flash-message')