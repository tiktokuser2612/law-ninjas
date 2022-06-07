@include('Admin.common.header')
<style type="text/css">

  .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
  }
  .switch input {
    opacity: 0;
    width: 0;
    height: 0;
  }
  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #c4c4c5;
    -webkit-transition: .4s;
    transition: .4s;
  }
  .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }
  input:checked + .slider {
    background-color: #2196F3;
  }
  input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
  }
  input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }
  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }
  .slider.round:before {
    border-radius: 50%;
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
                                <h2>Videos</h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="breadcrumb-wrapper mb-30">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <a href="{{url('/admin/videos/add')}}" class="main-btn primary-btn btn-hover">Add Video</a>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ========== title-wrapper end ========== -->
                <div class="row">
                    @foreach ($data as $video)
                    <div class="col-xl-4 col-md-6 col-sm-12">
                        <div class="card-style-2 mb-30 videos">
                            <div class="card-image">
                                <video muted loop controls preload="auto"poster="{{url('storage/app/public/Admin/Videos/thumbnail/'.$video->thumbnail)}}" class="card-video">
                                    <source src="{{url('/storage/app/public/Admin/Videos/'.$video->videos)}}" type="video/mp4">
                                </video>
                            </div>
                            <div class="card-content">
                                <h4>{{$video->title}}</h4>
                                <p>{{$video->description}}</p>
                                <h4>Price &nbsp;&nbsp;&nbsp;&nbsp;
                                  <span>
                                       @if(empty($video->price))
                                          <span style="color:green">Free</span>
                                        @else
                                          <span style="color:red">${{$video->price}}</span>
                                        @endif
                                  </span>
                                </h4>
                            </div>
                            <div class="action">
                             @php $prodID= Crypt::encrypt($video->id); @endphp
                                <a href="{{url('/admin/videos/delete/'.$prodID)}}"class="status-btn danger-btn delete-confirm mb-2">
                                    <i class="lni lni-trash-can"></i>
                                </a>
                                <br>
                                <a href="{{url('/admin/videos/edit/'.$prodID)}}"class="status-btn primary-btn">
                                    <i class="lni lni-pencil"></i>
                                </a>
                                <br/>
                                <br/>
                                <label class="switch">
                                    <input class="active form-check-input ms-auto" type="checkbox" data-id="{{$video->id}}" 
                                        <?php if($video->status == '1')
                                        {
                                        echo 'checked';
                                        }
                                        ?>
                                        />
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                       
                    @endforeach
                </div>
                 <div class="d-flex justify-content-center">
                    {{ $data->links('Admin.pagination.custom') }}
                </div> 
                <!-- end container -->
        </section>
 <!-- ========== section end ========== -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
  {{-- delete --------------------------------- --}}
 <script type="text/javascript">
        $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Are you sure ?',
            text: 'This record  will be permanantly deleted!',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
</script>
 {{-- status update--------------------------------- --}}
<script type="text/javascript">
    $('.form-check-input').on('click', function (event) {
    // event.preventDefault();
      var status = $(this).prop('checked') == true ? 1 : 0;  
        var id = $(this).data('id'); 
     
      swal({
          title: 'Are you sure change Status',
          text: "You won't be able to revert this!",
          icon: 'warning',
          buttons: ["Cancel", "Yes!"],
      }).
      then(function(value) {
          if (value) {
              $.ajax({ 
                type: "POST", 
                dataType: "json", 
                url: "{{url('admin/updateVideosStatus')}}", 
                data: {'status': status, 'id': id,  _token: "{{ csrf_token() }}",}, 
                success: function(data){ 
                  console.log(data.success) 
                  toastr.options.closeButton = true;
                  toastr.options.progressBar = true;
                  toastr.options.closeDuration = 100;
                  toastr.success(data.success);
                } 
            });
          } 
          else{
              window.location.reload();
          }
      });
  });
  
</script>

@include('Admin.common.footer')