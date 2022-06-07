@include('Admin.common.header')
<style type="text/css">
.bg-white {
    background-color: #2C3D4A !important;
}
span.relative.inline-flex.items-center.px-4.py-2.text-sm.font-medium.text-gray-500.bg-white.border.border-gray-300.cursor-default.leading-5.rounded-md {
    color: #fff;
}
a.relative.inline-flex.items-center.px-4.py-2.text-sm.font-medium.text-gray-700.bg-white.border.border-gray-300.leading-5.rounded-md.hover\:text-gray-500.focus\:outline-none.focus\:ring.ring-gray-300.focus\:border-blue-300.active\:bg-gray-100.active\:text-gray-700.transition.ease-in-out.duration-150 {
    color: #FF5050;
}
.pagination-custome {
    margin-top: 30px;
}
svg.w-5.h-5{
  width: 40px;
  color: #fff;
}
span.relative.inline-flex.items-center.px-4.py-2.-ml-px.text-sm.font-medium.text-gray-500.bg-white.border.border-gray-300.cursor-default.leading-5 {
    color: #fff;
}
.flex.justify-between.flex-1.sm\:hidden {
    DISPLAY: NONE;
}
p.text-sm.text-gray-700.leading-5 {
    color: #ffffffc9;
}
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
                  <h2>Users</h2>
                </div>
              </div>
              <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <a href="{{url('/admin/users/add')}}" class="main-btn primary-btn btn-hover">Add Users</a>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>
          <!-- ========== title-wrapper end ========== -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card-style mb-30">
                <div class="table-wrapper table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th><h6>ID</h6></th>
                        <th><h6>Image</h6></th>
                        <th><h6>First Name</h6></th>
                        <th><h6>Last Name</h6></th>
                        <th><h6>Email</h6></th>
                        <th><h6>Action</h6></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $row)
                        <tr>
                        <td>{{$row->id}}</td>
                        <td class="min-width">
                            <div class="employee-image">
                              @if ($row->image=='')
                                <img src="{{url('/storage/app/public/User/profile-image%20.png')}}" alt=""/>
                              @else
                                <img src="{{ asset('storage/app/public/User/'.$row->image) }}" alt="" />
                              @endif
                            </div>
                        </td>
                        <td class="min-width">
                            <p>{{$row->first_name}}</p>
                        </td>
                         <td class="min-width">
                            <p>{{$row->last_name}}</p>
                        </td>
                        <td class="min-width">
                            <p>{{$row->email}}</p>
                        </td>
                        <td class="min-width">
                          <a>
                            @php $prodID= Crypt::encrypt($row->id); @endphp
                            <a href="{{url('admin/users/delete/'.$prodID)}}" class="status-btn close-btn delete-confirm mx-3"><i class="lni lni-trash-can"></i></a>
                            <a href="{{url('admin/users/edit/'.$prodID)}}" class="status-btn success-btn"><i class="lni lni-pencil"></i></a>
                        </td>
                       <td>
                          <label class="switch">
                          <input class="active form-check-input ms-auto" type="checkbox" data-id="{{$row->id}}" 
                            @php if($row->status == '1'){
                              echo 'checked';
                            }
                            @endphp>
                          <span class="slider round"></span>
                          </label>
                          </td>
                      </tr>
                    @endforeach  
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
           <div class="d-flex justify-content-center">
                 {{ $data->links('Admin.pagination.custom') }}
            </div> 
        <!-- end container -->
      </section>
      <!-- ========== section end ========== -->
@include('Admin.common.footer')

 
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
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

// status update---------------------------------
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
                url: "{{url('admin/updateUsersStatus')}}", 
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
 


