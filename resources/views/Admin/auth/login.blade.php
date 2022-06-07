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
    <title>Sign In | law Ninjas</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{url('public/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{url('public/assets/css/main.css')}}" />

    {{--Progress bar show--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  </head>
  <style>
  .main-wrapper{
    margin-left: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    padding-bottom: 0px;

  }
  .font-red-mint
  {
    color:red;
  }
  </style>
   <script type="text/javascript">
      window.setTimeout("document.getElementById('error').style.display='none';", 2000);
      </script>
  <body>
      <main class="main-wrapper">
          <div class="container">
            <div class="row g-0 auth-row">
              <div class="col-lg-6">
                <div class="auth-cover-wrapper bg-primary-100">
                  <div class="auth-cover">
                    <div class="title text-center">
                      <h1 class="text-primary mb-10">Welcome Back</h1>
                      <p class="text-medium">
                        Sign in to your Existing account to continue
                      </p>
                    </div>
                    <div class="cover-image">
                      <img src="{{url('public/assets/images/auth/signin-image.svg')}}" alt="">
                    </div>
                    <div class="shape-image">
                      <img src="{{url('public/assets/images/auth/shape.svg')}}" alt="" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="signin-wrapper">
                  <div class="form-wrapper">
                    <img src="{{url('public/assets/images/logo/logo.svg')}}" alt="" class="img-fluid">
                    <h4 class="mb-15 mt-15">Sign In</h4>

                    <form action="{{url('/admin/login-post')}}" method="POST">
                      @csrf
                      <div class="row">
                        <div class="col-12">
                          <div class="input-style-1">
                            <label>Email</label>
                            <input type="email" placeholder="Email" name="email"/>
                             @if ($errors->has('email'))
                                <span class="help-block font-red-mint">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                              @endif
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="input-style-1">
                            <label>Password</label>
                            <input type="password" placeholder="Password" name="password" />
                             @if ($errors->has('password'))
                                <span class="help-block font-red-mint">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                              @endif
                          </div>
                        </div>
                        <div class="col-xxl-6 col-lg-12 col-md-6">
                          <div class="form-check checkbox-style mb-30">
                            <input class="form-check-input" type="checkbox" value="" id="checkbox-remember"/>
                            <label class="form-check-label" for="checkbox-remember">
                              Remember me next time</label>
                          </div>
                        </div>
                        {{-- <div class="col-xxl-6 col-lg-12 col-md-6">
                          <div class="text-start text-md-end text-lg-start text-xxl-end mb-30">
                            <a href="#0" class="hover-underline">Forgot Password?</a>
                          </div>
                        </div> --}}
                        <div class="col-12">
                          <div  class=" button-group d-flex justify-content-center flex-wrap">
                           <button type="submit" class=" main-btn primary-btn btn-hover w-100 ">Sign In</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </main>
      <script>
            @if(Session::has('success'))
            toastr.options =
            {
              "closeButton" : true,
              "progressBar" : true
            }
                toastr.success("{{ session('success') }}");
            @endif

            @if(Session::has('error'))
            toastr.options =
            {
              "closeButton" : true,
              "progressBar" : true
            }
                toastr.error("{{ session('error') }}");
            @endif
      </script>
  </body>
</html>

