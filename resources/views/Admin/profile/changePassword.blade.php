@extends('Admin.profile.index')
 
@section('content')
    {{-- <div class="tab-pane fade" id="tabContent-2-2">
    <p> --}}
        <form action="{{url('admin/reset/')}}" method="post">
        @csrf
        <div class="profile-info">
            <div class="input-style-1">
            <label>Old Password</label>
            <input type="password" placeholder="*******" name="old_password" value="{{old('old_password')}}">
            @if ($errors->has('old_password'))
                <span class="help-block font-red-mint">
                    <strong>{{ $errors->first('old_password') }}</strong>
                </span>
            @endif
            </div>
            <div class="input-style-1">
            <label>New Password</label>
            <input type="password" placeholder="********" name="new_password" value="{{old('new_password')}}">
            @if ($errors->has('new_password'))
                <span class="help-block font-red-mint">
                    <strong>{{ $errors->first('new_password') }}</strong>
                </span>
            @endif
            </div>
            <div class="input-style-1">
            <label>Confirm Password</label>
            <input type="password" placeholder="********" name="confirm_password" value="{{old('confirm_password')}}">
            @if ($errors->has('confirm_password'))
                <span class="help-block font-red-mint">
                    <strong>{{ $errors->first('confirm_password') }}</strong>
                </span>
            @endif
            </div>
            
            <div class="col-12">
            <button type= "submit" class="main-btn primary-btn btn-hover">
            Change Password
            </button>
            </div>
        </div>
        </form>
    </p>
    </div>
@endsection