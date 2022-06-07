@include('Admin.common.header')
<style>
  .font-red-mint{
    color:red;
    }
  .myDiv{
	display:none;
    padding:10px;
   }  
  .input-style-1 input, .input-style-1 textarea, .input-style-1 select{
    width: 100%;
    background: rgba(239, 239, 239, 0.5);
    border: 1px solid #e5e5e5;
    border-radius: 4px;
    padding: 16px;
    color: #5d657b;
    resize: none;
    transition: all 0.3s;
  }
  .input-style-1 input:focus, .input-style-1 textarea:focus, .input-style-1 select:focus {
    border-color: #4a6cf7;
    background: #fff;
  }
  .input-style-1 select:focus-visible{
    border-color: #4a6cf7;
    background: #fff;
  }
</style>
<!-- ========== section start ========== -->
      <section class="section">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-8">
                <div class="title mb-30">
                  <h2>Edit Users</h2>
                </div>
              </div>
            </div>
          </div>
          <!-- ========== title-wrapper end ========== -->
          <div class="row justify-content-center d-flex">
            <div class="col-xl-8 col-md-12 ">
              @php $prodID= Crypt::encrypt($data->id); @endphp
              <form action="{{url('admin/users/update/'.$prodID)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-style mb-30">
                  <div class="d-flex align-items-center mb-2">
                      <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="image" />
                            <label for="imageUpload"></label>
                        </div>
                        <div class="avatar-preview">
                            <div id="imagePreview" style="background-image:url({{url('storage/app/public/User/'.$data->image)}})">
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
                      <input type="text" placeholder="Arena Name" name="first_name" value="{{$data->first_name}}">
                      @if ($errors->has('first_name'))
                          <span class="help-block font-red-mint">
                              <strong>{{ $errors->first('first_name') }}</strong>
                          </span>
                      @endif
                  </div>
                  <div class="input-style-1">
                      <label>Last Name</label>
                      <input type="text" placeholder="Arena Name" name="last_name" value="{{$data->last_name}}">
                      @if ($errors->has('last_name'))
                          <span class="help-block font-red-mint">
                              <strong>{{ $errors->first('last_name') }}</strong>
                          </span>
                      @endif
                  </div>
                   <div class="input-style-1">
                      <label>Email</label>
                      <input type="email" placeholder="email" name="email" value="{{$data->email}}">
                      @if ($errors->has('email'))
                          <span class="help-block font-red-mint">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                  </div>
                  <button type="submit" class="main-btn primary-btn btn-hover"> Update </button>
                </div>
              </form>
            </div>
          </div>
      </section>
      <!-- ========== section end ========== -->

       <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
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
