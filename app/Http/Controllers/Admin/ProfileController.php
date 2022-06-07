<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use File;
use Validator;
use App\Models\Admin;
class ProfileController extends Controller
{

     // index profile ------------------------
     public function index()
     {
        $profile = Auth::guard('admin')->user();
        return view('Admin.profile.index',compact('profile'));
     }
   // edit profile ------------------------
    public function edit()
    {    
       $profile = Auth::guard('admin')->user();
       return view('Admin.profile.edit',compact('profile'));
    }
    // profiole update -------------------------------------
    public function update(Request $request)
    {
        $request->validate(
            [
                'image' => 'mimes:jpeg,png,jpg',
                'first_name' => 'required | min:2|max:20',
                'last_name' => 'required | min:2|max:20',
                'email' => 'required|email',
                
            ], 
            [
                'image.mimes'=>'Please upload  Image',
                'first_name.required'=>'Please Enter  First Name',
                'first_name.min'=>'Please Enter  First Name minimum 2 characters',
                'first_name.max'=>'Please Enter  First Name maximum 20 characters',
                'last_name.required'=>'Please Enter Last Name',
                'last_name.min'=>'Please Enter  Last Name minimum 2 characters',
                'last_name.max'=>'Please Enter  Last Name maximum 20 characters',
                'email.required'=>'Please Enter Email-Id',
                'email.email'=>'Please Enter Valid Email',
            ]
          );

        $input['first_name'] = $request->first_name;
        $input['last_name'] = $request->last_name;
        $input['email'] = $request->email;

        if ($image = $request->file('image')) {
             $id = Auth::guard('admin')->user();
             $image_path = "storage/app/public/Admin/profile/".$id->image;
            if(File::exists($image_path)){
               File::delete($image_path);
            }
            $destinationPath = 'storage/app/public/Admin/profile/';
            $profileImage = time(). "." . $image->getClientOriginalExtension();
            $data=$image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        
          $id=auth()->id();
         Admin::where('id',$id)->update($input);
         return back()->with('success','Profile updated successfully');
    }



    // changePassword===================================
    public function changePassword()
    {
        $profile = Auth::guard('admin')->user();
        return view('Admin.profile.changePassword',compact('profile'));
    }
    //reset Admin Password-----------------------------------------------
    public function reset(Request $request) {

        $request->validate(
            [
                'old_password' => 'required',
                'new_password' => 'required|min:8', 
                'confirm_password' => 'required|same:new_password',
            ], 
            [
                'old_password.required'=>'Please Enter Old Password',
                'new_password.required'=>'Please Enter New Password',
                'new_password.min'=>'Please Enter Minimum 8 character',
                'confirm_password.required'=>'Please Enter Confirm Password',
            ]
          );

        $id = Auth::id();
        $user = Admin::findOrFail($id);
        
        if (Hash::check($request->old_password, $user->password))
        { 
            if($request->old_password == $request->new_password)
            {
                return back()->with('error','Current password does not Same New password.');
            }
            elseif($request->confirm_password !== $request->new_password)
            {
                return back()->with('error','New Password does not match with Confirm password.');
            }
            $input['password'] = Hash::make($request->new_password); 
            Admin::Where('id', $id)->update($input);
            
            
            return redirect('admin/changePassword')->with('success','User password reset successfully');
        }else{
            return back()->with('error','Current password does not match with old password.');
            
        }
    }


}
