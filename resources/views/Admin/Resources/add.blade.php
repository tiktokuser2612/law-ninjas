 @include('Admin.common.header')
 <!-- ========== section start ========== -->
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
    .lst
    {
      width:100%;
    }
    .input-group .btn {
        position: relative;
        z-index: 2;
        padding: 15px 20px;
        border-radius: 0px 4px 4px 0px;
    }
    .input-group {
        display: flex;
        flex-wrap: inherit;
        align-items: center;
    }
    .input-style-1 .myfrm {
        padding: 13px;
    }
       label#paid-error {
    color: red;
}
</style>
      <section class="section">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-8">
                <div class="title mb-30">
                  <h2>Add Resources</h2>
                </div>
              </div>
            </div>
          </div>
          <!-- ========== title-wrapper end ========== -->
          <div class="row justify-content-center d-flex">
            <div class="col-xl-8 col-md-12 ">
              <form id="fileUploadForm" name="uploadFile" action="{{ url('/admin/Resources/add') }}" method="post" enctype="multipart/form-data" >
                 @csrf
                <div class="card-style mb-30">
                  <div class="d-flex align-items-center mb-2">
                      <div class="lst">
                        <div class=" input-style-1 input-group hdtuto control-group increment" >
                          <input type="file" name="image[]" class="myfrm">
                          <div class="input-group-btn my-2"> 
                            <button class="btn btn-success" type="button"><i class="mdi mdi-plus"></i></button>
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
                      <label>Title</label>
                      <input type="text" placeholder="title" name="title" id="title" value="{{old('title')}}">
                       @if ($errors->has('title'))
                        <span class="help-block font-red-mint">
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
                  <button class="main-btn primary-btn btn-hover"> Save </button>
                </div>
              </form>
            </div>
          </div>
      </section>
      
<!-- ========== section end ========== -->

@include('Admin.common.footer')

 {{-- multiple images upload --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){ 
        var lsthmtl = '<div class=" input-style-1 control-group lst input-group" style="margin-top:10px"><input type="file" name="image[]" class="myfrm "><div class="input-group-btn"><button class="btn btn-danger my-2" type="button"><i class="mdi mdi-minus"></i></button></div></div>';
        $(".increment").after('<div class="hdtuto">'+lsthmtl+'</div>');
      });
      $("body").on("click",".btn-danger",function(){ 
        $(this).parents(".hdtuto").remove();
      });
    });
</script>

 {{-- show and hide password field  --}}
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
