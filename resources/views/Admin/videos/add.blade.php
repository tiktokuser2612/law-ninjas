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
                  <h2>Add video</h2>
                </div>
              </div>
            </div>
          </div>
          <!-- ========== title-wrapper end ========== -->
          <div class="row justify-content-center d-flex">
            <div class="col-xl-8 col-md-12 ">
              <form id="fileUploadForm"  action="{{route('store')}}" method="post" enctype= "multipart/form-data">
                @csrf
                <div class="card-style mb-30">
                  <div class="input-style-1">
                      <label>Upload Video</label>
                      <input class="form-control" type="file" id="formFile" accept="video/*" name="videos" value="{{old('videos')}}">
                      <input type='hidden' name='video_time' id='video_time' size='5' />
                      <audio id='audio'></audio> 
                       @if ($errors->has('videos'))
                            <span class="help-block font-red-mint">
                                <strong>{{ $errors->first('videos') }}</strong>
                            </span>
                        @endif
                  </div>
                   <div class="d-flex align-items-center mb-2">
                      <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="thumbnail" value="{{old('thumbnail')}}"/>
                           
                            <label for="imageUpload"></label>
                        </div>
                        <div class="avatar-preview" src="">
                            <div id="imagePreview">
                            </div>
                        </div>
                       
                         @if ($errors->has('thumbnail'))
                          <span class="help-block font-red-mint">
                              <strong>{{ $errors->first('thumbnail') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>
                  <div class="input-style-1">
                        <label>Title</label>
                        <input type="text" placeholder="title" name="title" id="title" value="{{old('title')}}">
                        @if ($errors->has('title'))
                            <span id="title" class="help-block font-red-mint">
                                <strong>{{ $errors->first('title') }}</strong>
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
                      <label>Select Price Type</label>
                      <select id="myselection"  name="price_type"> 
                          <option  value="free" selected>Free</option>
                          <option value="paid">Paid</option>
                      </select>
                    </div>
                    <div class="input-style-1 myDiv" id="showpaid" >
                        <label>Price</label>
                        <input type="text" placeholder="$ Price" id="paid" name="price" value="{{old('price')}}">
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
                  <button id="button" type="submit" class="main-btn primary-btn btn-hover">Save </button>
                </div>
              
            </div>
          </div>
      </section>
      
 <!-- ========== section end ========== -->
 <script src="{{url('public/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('public/assets/js/main.js')}}"></script>
 {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --}}
    
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

    </script>
   
{{-- show and hide price field  --}}

<script>
  $(document).ready(function(){
      $('#paid').val("");
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
 <script>
  $('#button').click(function(){
    $('#overlay').removeClass('d-none');
  });
</script>
<script>
  var f_duration =0; //store duration 
  document.getElementById('audio').addEventListener('canplaythrough', function(e){ 
  f_duration = Math.round(e.currentTarget.duration); 
  document.getElementById('video_time').value = f_duration; 
  console.log(f_duration);
  URL.revokeObjectURL(obUrl); 
  }); 
  
  var obUrl; 
  document.getElementById('formFile').addEventListener('change', function(e){ 
  var file = e.currentTarget.files[0]; 
  if(file.name.match(/\.(webm|mp3|mp4|mpeg|ogg)$/i)){ 
  obUrl = URL.createObjectURL(file); 
  document.getElementById('audio').setAttribute('src', obUrl); 
  } 
  });
</script>

@include('Admin.common.footer')
