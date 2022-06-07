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
   label#password-error {
    color: red;
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
                  <h2>Add arena</h2>
                </div>
              </div>
            </div>
          </div>
          <!-- ========== title-wrapper end ========== -->
          <div class="row justify-content-center d-flex">
            <div class="col-xl-8 col-md-12 ">
              <form id="fileUploadForm" action="{{ url('/admin/arena/add') }}" method="post" enctype="multipart/form-data">
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
                      <label>Name</label>
                      <input type="text" placeholder="Arena Name" name="name" value="{{old('name')}}">
                      @if ($errors->has('name'))
                          <span class="help-block font-red-mint">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                  </div>
                  <div class="input-style-1">
                      <label>Description</label>
                      <textarea  id="description" cols="30" rows="2"placeholder="Description"  name="description" >{{old('description')}}</textarea>
                  @if ($errors->has('description'))
                      <span class="help-block font-red-mint">
                          <strong>{{ $errors->first('description') }}</strong>
                      </span>
                  @endif
                  </div>
                  <div class="input-style-1">
                     <label>Select Password Type</label>
                     <select id="myselection" name="password_type"> 
                        <option  value="none">None</option>
                        <option value="password">Password</option>
                     </select>
                  </div>
                  <div class="input-style-1 myDiv" id="showpassword" >
                      <label>Password</label>
                     <input type="password" placeholder="**************" name="password" id="password" value="">
                      @if ($errors->has('password'))
                          <span class="help-block font-red-mint">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                  </div>
                  <button type="submit" class="main-btn primary-btn btn-hover"> Save </button>
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

{{-- show and hide password field --}}

<script>
  $(document).ready(function(){
      $('#password').val("");
      $('#myselection').on('change', function(){
        var demovalue = $(this).val(); 
          if(demovalue == "password"){
            $('#showpassword').show();
          }else{
            $('#showpassword').hide();
            $('#password').val("");
          }
      });
  });
</script>

<!-- ====================validation jquery====================== -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" ></script>

<script>
    $(document).ready(function() {
        $("#fileUploadForm").validate({
            rules: {
               'password':{
                  required:true,
                  minlength:8,
                }
            },
             messages: {
                    'password': {
                      required:"Please enter Password",
                      minlength:"Please Enter Minimum 8 characters Password",
                    }
               }
        });
    });
</script>
