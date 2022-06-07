@include('Admin.common.header')
<style>
.font-red-mint{
  color:red;
}

</style>
    <!-- ========== section start ========== -->
      <section class="section">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title mb-30">
                  <h2>Profile</h2>
                </div>
              </div>
            </div>
          </div>
          <!-- ========== title-wrapper end ========== -->
          <div class="row">
            <div class="col-xl-5 col-md-12">
                <div class="card-style settings-card-1 mb-30">
                    <div class="profile">
                        <img src="{{url('storage/app/public/Admin/profile/'.$profile->image)}}" alt="">
                    </div>
                    <div class="profile-details text-center mt-3">
                        <h2 class="pb-2">{{$profile->first_name}} &nbsp;{{$profile->last_name}}</h2>
                        <h6 class="text-muted">{{$profile->email}}</h6>
                        <a href="{{url('/logout')}}" class="main-btn danger-btn btn-hover mt-4">Logout</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-md-12">
              <div class="tab-style-2 card-style mb-30">
                <nav class="nav" id="nav-tab">
                 @php
                  $url = \Route::current()->uri;
                @endphp
                 <a href="{{url('admin/profile')}}">    
                    <button  class="{{ ('admin/profile' == $url) ? 'active' : ''}}" id="tab-2-1" data-bs-toggle="tab" data-bs-target="#tabContent-2-1">
                      Edit Profile
                    </button>
                  </a>
                   <a href="{{url('admin/changePassword')}}"> 
                  <button class="{{ ('admin/changePassword' == $url) ? 'active' : ''}}" id="tab-2-2" data-bs-toggle="tab" data-bs-target="#tabContent-2-2" >
                    Reset Password
                  </button>
                  </a>
                </nav>
              
              <div class="container">
                  @yield('content')
              </div>

              </div>
            </div>
          </div>
        </div>
        <!-- end container -->
      </section>
    <!-- ========== section end ========== -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
          function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
      }
      $("#imageUpload").change(function() {
          readURL(this);
      });
    </script>
@include('Admin.common.footer')