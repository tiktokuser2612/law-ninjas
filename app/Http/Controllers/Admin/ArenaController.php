<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Arena;
use App\Models\ArenaPost;
use validate;
use File;
use DB;
use Crypt;
use Hash;
class ArenaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $data = Arena::latest()->paginate(10);
     return view('Admin.arena.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.arena.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // print_r($_POST);
        // die();
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg',
            'name' => 'required | min:2|max:20',
            'description' => 'required | min:5|max:250',
            'password_type'=>'required',
        ], 
        [
            'image.required'=>'Please upload  Image',
            'image.mimes'=>'Please upload only jpeg , png ,jpe  Image',
            'name.required'=>'Please Enter  Name',
            'name.min'=>'Please Enter  Name minimum 2 characters',
            'name.max'=>'Please Enter  Name maximum 20 characters',
            'description.required'=>'Please Enter Description',
            'description.min'=>'Please Enter  description minimum 5 characters',
            'description.max'=>'Please Enter  description maximum 250 characters',
            'password_type.required'=>'Please Select password type',
        ]
        );

        //$input = $request->all();
        $input['name'] = $request->name;
        $input['description'] = $request->description;
        if($request->password_type === "password"){
            $request->validate([
                'password' => 'required|min:8',
            ], 
            [
                'password.required'=>'Please Enter Password',
                'password.min'=>'Please Enter Minimum 8 characters Password',
            ]);
            $input['password'] = Hash::make($request->password); 
        }

        $input['password_type'] = $request->password_type;
        
        if ($image = $request->file('image')) {
            $destinationPath = 'storage/app/public/Admin/Arena/';
            $profileImage = time() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        }
        //print_r($input); die();
        Arena::create($input);
        return redirect('/admin/arena')->with('success','Arena Details Added successfully.');
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
        $data=Arena::find($prodID);
        return view('Admin.arena.edit',compact('data'));
    }

    // Show list of arena group----------------------------------------
    public function show($id)
    {
         $prodID = Crypt::decrypt($id);
         $data=Arena::find($prodID);
        $row =ArenaPost::where('arenagroup_id',$data->id )->first();
        return view('Admin.arena.show');
        // return view('Admin.arena.show',compact('row'));
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
                'name' => 'required | min:2|max:20',
                'description' => 'required | min:5|max:250',
            ], 
            [
                'image.mimes'=>'Please Upload  Image this formate (jpeg,png,jpg)',
                'name.required'=>'Please Enter  Your Name',
                'name.min'=>'Please Enter  Name minimum 2 characters',
                'name.max'=>'Please Enter  Name maximum 20 characters',
                'description.required'=>'Please Enter Description',
                'description.min'=>'Please Enter  description minimum 5 characters',
                'description.max'=>'Please Enter  description maximum 250 characters',
                
            ]
          );
        
       
        $input['name'] = $request->name;
        $input['description'] = $request->description;
        if($request->password_type === "password"){
            $request->validate([
                'password' => 'required|min:8',
            ], 
            [
                'password.required'=>'Please Enter Password',
                'password.min'=>'Please Enter Minimum 8 characters Password',
            ]);
            $input['password'] = Hash::make($request->password); 
        }
       
          $input['password'] = $request->password;
         $input['password_type'] = $request->password_type;
        

        if ($image = $request->file('image'))
        {
           $data = Arena::Where('id', $id)->first();
            $image_path = "storage/app/public/Admin/Arena/".$data->image;
            if(File::exists($image_path)){
               File::delete($image_path);
            }
            $destinationPath = 'storage/app/public/Admin/Arena/';
            $profileImage = time(). "." . $image->getClientOriginalExtension();
            $data=$image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        Arena::where('id',$id)->update($input);
         return redirect('/admin/arena')->with('success','Arena Details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prodID = Crypt::decrypt($id);
        $data = Arena::findOrFail($prodID);
        $image_path = "storage/app/public/Admin/Arena/".$data->image;
        if(File::exists($image_path)){
            File::delete($image_path);
        }
        $data->delete();
        return redirect('/admin/arena')->with('success',' Deleted Successfully');
    }
        // status update---------------------------------------------
    public function updateStatus(Request $request)
    {
        $Arena = Arena::find($request->id)->update(['status' => $request->status]);
        return response()->json(['success'=>'Status changed successfully.']);
    } 
}
