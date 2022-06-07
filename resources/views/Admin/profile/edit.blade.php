@extends('Admin.profile.index')
 
@section('content')
    {{-- <div class="tab-pane fade active show" id="tabContent-2-1"> --}}
    <form action="{{url('admin/update/')}}" method="POST" enctype="multipart/form-data"> 
     @csrf
        <div class="profile-info">
        
        <div class="d-flex align-items-center mb-30">
            <div class="avatar-upload">
            <div class="avatar-edit">
                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="image"/>
                <label for="imageUpload"></label>
            </div>
            <div class="avatar-preview" >
                <div id="imagePreview" style="background-image: url({{url('storage/app/public/Admin/profile/'.$profile->image)}});">

                </div>
                @if ($errors->has('image'))
                    <span class="help-block font-red-mint">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
            </div>
            </div>
        </div>
        <div class="input-style-1">
            <label>First name</label>
            <input type="text" name="first_name"  placeholder="John" value="{{$profile->first_name}}">
            @if ($errors->has('first_name'))
            <span class="help-block font-red-mint">
                <strong>{{ $errors->first('first_name') }}</strong>
            </span>
            @endif
        </div>
        <div class="input-style-1">
            <label>Last name</label>
            <input type="text" name="last_name"  placeholder="Deo" value="{{$profile->last_name}}">
            @if ($errors->has('last_name'))
            <span class="help-block font-red-mint">
                <strong>{{ $errors->first('last_name') }}</strong>
            </span>
            @endif
        </div>
        <div class="input-style-1">
            <label>Email</label>
            <input type="email" name="email"  placeholder="admin@example.com" value="{{$profile->email}}">
            @if ($errors->has('email'))
            <span class="help-block font-red-mint">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
        
        <div class="col-12">
            <button type= "submit"  class="main-btn primary-btn btn-hover">
            Update
            </button>
        </div>
        </div>
    </form>
    {{-- </div> --}}
@endsection