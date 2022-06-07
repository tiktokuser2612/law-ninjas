  @include('Admin.common.header')
  <style>
  #button{
  display:block;
  margin:20px auto;
  padding:10px 30px;
  background-color:#eee;
  border:solid #ccc 1px;
  cursor: pointer;
}
#overlay{	
  position: fixed;
  top: 0;
  z-index: 100;
  width: 100%;
  height:100%;
  left: 0;
  background: rgba(0,0,0,0.6);
}
.cv-spinner {
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;  
}
.spinner {
  width: 40px;
  height: 40px;
  border: 4px #ddd solid;
  border-top: 4px #2e93e6 solid;
  border-radius: 50%;
  animation: sp-anime 0.8s infinite linear;
}
@keyframes sp-anime {
  100% { 
    transform: rotate(360deg); 
  }
}
.is-hide{
  display:none;
}
  .font-red-mint{
  color:red;
}
.error {
    color: red !important;
}
.font-red-mint {
    color: #d50100;
}
/*-------------------------------price css ------------------------*/
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
                  <h2>Edit video</h2>
                </div>
              </div>
            </div>
          </div>
          <!-- ========== title-wrapper end ========== -->
          <div class="row justify-content-center d-flex">
            <div class="col-xl-8 col-md-12 ">
              @php $prodID= Crypt::encrypt($data->id); @endphp
              <form id="fileUploadForm" action="{{url('/admin/videos/update/'.$prodID)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-style mb-30">
                  <div class="input-style-1">
                      <label>Upload Video</label>
                        <div class="card-image">
                            <video style="width:100%;max-height:100%" muted loop controls preload="auto"><source src="{{url('/storage/app/public/Admin/Videos/'.$data->videos)}}" type="video/mp4">
                            </video>
                        </div>
                      <input class="form-control" type="file" id="formFile" accept="video/*" name="videos">
                       @if ($errors->has('videos'))
                          <span class="help-block font-red-mint">
                              <strong>{{ $errors->first('videos') }}</strong>
                          </span>
                        @endif
                  </div>
                  <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="thumbnail" />
                            <label for="imageUpload"></label>
                        </div>
                        <div class="avatar-preview">
                            <div id="imagePreview" style="background-image:url({{url('/storage/app/public/Admin/Videos/thumbnail/'.$data->thumbnail)}})">
                            </div>
                        </div>
                         @if ($errors->has('thumbnail'))
                              <span class="help-block font-red-mint">
                                  <strong>{{ $errors->first('thumbnail') }}</strong>
                              </span>
                          @endif
                      </div> 
                 <div class="input-style-1">
                      <label>Title</label>
                      <input type="text" placeholder="title" value="{{$data->title}}" name="title">
                        @if ($errors->has('title'))
                          <span class="help-block font-red-mint">
                              <strong>{{ $errors->first('title') }}</strong>
                          </span>
                        @endif
                  </div>
                  <div class="input-style-1">
                      <label>Description</label>
                      
                      <textarea  id="" cols="30" rows="2" name="description" placeholder="Description">{{$data->description}}</textarea>
                        @if ($errors->has('description'))
                          <span class="help-block font-red-mint">
                              <strong>{{ $errors->first('description') }}</strong>
                          </span>
                        @endif
                  </div>
                  <div class="input-style-1">
                     <label>Select Price Type</label>
                     <select id="myselection"  name="price_type">
                        @if ($data->price_type == "free")
                          <option  value="free" {{ $data->price_type == $data->price_type ? 'selected' : '' }}>{{ $data->price_type }}</option>
                          <option value="paid">Paid</option>
                        @else
                          <option  value="paid" {{ $data->price_type == $data->price_type ? 'selected' : '' }}>{{ $data->price_type }}</option>
                          <option value="free">Free</option>
                        @endif
                      </select>
                  </div>
                   <div class="input-style-1 myDiv" id="showpaid" >
                      <label>Price</label>
                      <input type="text" placeholder="$ Price" id="paid" name="price" value="{{$data->price}}">
                      
                      @if ($errors->has('price'))
                          <span class="help-block font-red-mint">
                              <strong>{{ $errors->first('price') }}</strong>
                          </span>
                      @endif
                  </div>
                <div id="overlay" class="d-none">
                  <div class="cv-spinner">
                    <span class="spinner"></span>
                  </div>
                </div>
                  <button id="button"  type="submit" class="main-btn primary-btn btn-hover"> Update </button>
                </div>
              </form>
            </div>
            
          </div>
      </section>
<!-- ========== section end ========== -->

  <script src="{{url('public/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('public/assets/js/main.js')}}"></script>
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
    

  <!-- ====================reloader====================== -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" ></script>

     <script>
    $(document).ready(function() {
        $("#").validate({
            rules: {
                videos:"required",
                thumbnail:"required",
                title:"required",
                description:"required",
            },
             messages: {
                     videos: {
                      required: "Please Upload  Video",
                      extension: "Please Upload 'ogg ,ogv, webm,oga' Video"
                    },
                     thumbnail: {
                      required: "Please Upload  Image",
                      extension: "Please Upload 'jpeg ,png, jpg' Image"
                    },
                    title: "Please enter Title",
                   
                    description: "Please enter Description",
             }  
        });
    });



  });
</script>


{{-- show and hide price field  --}}

<script>
  $(document).ready(function(){
      $('#myselection').load('change', function(){
        var demovalue = $(this).val(); 
          if(demovalue == "paid"){
            $('#showpaid').show();
          }else{
            $('#showpaid').hide();
          }
      });
  });
</script>
<script>
  $(document).ready(function(){
      $('#myselection').on('change', function(){
        var demovalue = $(this).val(); 
          if(demovalue == "paid"){
            $('#showpaid').show();
          }else{
            $('#showpaid').hide();
            $('#paid').val("");
          }
      });
  });
</script>
<!-- ====================validation jquery====================== -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
        $("#fileUploadForm").validate({
            rules: {
               'price':{
                  required:true,
                   number: true,
                }
            },
             messages: {
                    'price': {
                      required:"Please enter Price",
                      number:"Please Enter Numeric Value",
                    }
               }
        });
    });
</script>
<script>
$(function () {
    $('#fileUploadForm').click(function () {
        if($(this).valid()) {
           
        }
    });
});
</script>
{{-- // loader  --}}
 <script>
  $('#button').click(function(){
    $('#overlay').removeClass('d-none');
  });
</script>
@include('Admin.common.footer')