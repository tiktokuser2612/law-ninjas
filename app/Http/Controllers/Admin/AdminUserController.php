<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use File;
use Crypt;
class AdminUserController extends Controller
{
   
    /**
     * Display the specified adminuser.
     *
     * @param  int  $id
     * @return \Illuminate\Http\AdminUser
     */
    public function index()
    {
        $data = User::latest()->paginate(10);
        return view('Admin.users.index',compact('data'));
    }
     /**
     * Show the form for creating a new adminuser.
     *
     * @return \Illuminate\Http\AdminUser
     */
    public function create()
    {
        return view('Admin.users.add');
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'image' => 'mimes:jpeg,png,jpg',
                'first_name' => 'required | min:2|max:30',
                'last_name' => 'required | min:2|max:30',
                'email' => 'required|email',
                'password' => 'required|min:8',
      
            ], 
            [
                'image.mimes'=>'Please upload only jpeg , png ,jpe  Image',
                'first_name.required'=>'Please Enter  First Name',
                'first_name.min'=>'Please Enter  First Name minimum 2 characters',
                'first_name.max'=>'Please Enter  First Name maximum 30 characters',
                'last_name.required'=>'Please Enter  Last Name',
                'last_name.min'=>'Please Enter  Last Name minimum 2 characters',
                'last_name.max'=>'Please Enter  Last Name maximum 30 characters',
                'email.required'=>'Please Enter Email ',
                'email.email'=>'Please Enter valid Email ',
                'password.required'=>'Please Enter Password ',
                'password.min'=>'Please Enter minimum 8 characters ',
            ]
          );

        $input = $request->all();
        
        if ($image = $request->file('image')) {
            $destinationPath = 'storage/app/public/User/';
            $profileImage = time() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        User::create($input);
        return redirect('admin/users')->with('success','User Details Added successfully');
                       
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prodID = Crypt::decrypt($id);
        $data=User::find($prodID);
        return view('Admin.users.edit',compact('data'));
    }
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
       
        $request->validate(
            [
                'image' => 'mimes:jpeg,png,jpg',
                'first_name' => 'required | min:2|max:30',
                'last_name' => 'required | min:2|max:30',
                'email' => 'required|email',
               
            ], 
            [
                'image.mimes'=>'Please upload only jpeg , png ,jpe  Image',
                'first_name.required'=>'Please Enter  First Name',
                'first_name.min'=>'Please Enter  First Name minimum 2 characters',
                'first_name.max'=>'Please Enter  First Name maximum 30 characters',
                'last_name.required'=>'Please Enter  Last Name',
                'last_name.min'=>'Please Enter  Last Name minimum 2 characters',
                'last_name.max'=>'Please Enter  Last Name maximum 30 characters',
                'email.required'=>'Please Enter Email ',
                'email.email'=>'Please Enter valid Email ',
            ]
          );
        
       
        $input['first_name'] = $request->first_name;
        $input['last_name'] = $request->last_name;
        $input['email'] = $request->email;
        if ($image = $request->file('image'))
        {
           $data = User::Where('id', $id)->first();
            $image_path = "storage/app/public/User/".$data->image;
            if(File::exists($image_path)){
               File::delete($image_path);
            }
            $destinationPath = 'storage/app/public/User/';
            $profileImage = time(). "." . $image->getClientOriginalExtension();
            $data=$image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        User::where('id',$id)->update($input);
         return redirect('/admin/users')->with('success','User Details updated successfully');
    }
    /**
     * Remove the specified adminuser from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\AdminUser
     */
    public function destroy($id) 
    {
        $prodID = Crypt::decrypt($id);
        $data = User::findOrFail($prodID);
        $image_path = "storage/app/public/image/".$data->image;
        if(File::exists($image_path)){
            File::delete($image_path);
        }
        $data->delete();
        return redirect('admin/users')->with('success','User Deleted Successfully');
    }
    // status update---------------------------------------------
    public function updateStatus(Request $request)
    {
        $User = User::find($request->id)->update(['status' => $request->status]);
        return response()->json(['success'=>'Status changed successfully.']);
    }   
}
