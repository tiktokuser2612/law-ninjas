 @include('Admin.common.header')
 <!-- ========== section start ========== -->
 <style>
.font-red-mint{
  color:red;
}
 </style>
      <section class="section">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-8">
                <div class="title mb-30">
                  <h2>Add Users</h2>
                </div>
              </div>
            </div>
          </div>
          <!-- ========== title-wrapper end ========== -->
          <div class="row justify-content-center d-flex">
            <div class="col-xl-8 col-md-12 ">
              <form action="{{ url('/admin/users/add') }}" method="post" enctype="multipart/form-data">
                 @csrf
                <div class="card-style mb-30">
                  <div class="d-flex align-items-center mb-2">
                      <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="image" />
                            <label for="imageUpload"></label>
                        </div>
                        <div class="avatar-preview">
                            <div id="imagePreview">
                            </div>
                        </div>
                         @if ($errors->has('image'))
                              <span class="help-block font-red-mint">
                                  <strong>{{ $errors->first('image') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="input-style-1">
                      <label>First Name</label>
                      <input type="text" placeholder="First Name" name="first_name" id="first_name" value="{{old('first_name')}}">
                       @if ($errors->has('first_name'))
                            <span class="help-block font-red-mint">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                  </div>
                   <div class="input-style-1">
                      <label>Last Name</label>
                      <input type="text" placeholder="Second Name" name="last_name" id="last_name" value="{{old('last_name')}}">
                       @if ($errors->has('last_name'))
                            <span class="help-block font-red-mint">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                  </div>
                  <div class="input-style-1">
                      <label>Email</label>
                      <input type="email" placeholder="Email -Id" name="email" value="{{old('email')}}">
                      @if ($errors->has('email'))
                            <span class="help-block font-red-mint">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                  </div>
                   <div class="input-style-1">
                      <label>Password</label>
                      <input type="password" placeholder="Password" name="password" value="{{old('password')}}">
                      @if ($errors->has('password'))
                            <span class="help-block font-red-mint">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                  </div>
                  <button class="main-btn primary-btn btn-hover"> Save </button>
                </div>
              </form>
            </div>
          </div>
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