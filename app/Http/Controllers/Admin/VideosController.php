<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Videos;
use validate;
use File;
use Crypt;


class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $data = Videos::latest()->paginate(12);
        return view('Admin/videos/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.videos.add');
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
                'videos' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm',
                'thumbnail' => 'required|mimes:jpeg,png,jpg',
                'title' => 'required',
                'description' => 'required',
               
            ], 
            [
                'videos.required'=>'Please upload  Video',
                'videos.mimes'=>'Please Upload mp4 video',
                'thumbnail.required'=>'Please upload  Image',
                'thumbnail.mimes'=>'Please upload only jpeg , png ,jpe  Image',
                'title.required'=>'Please Enter  Title',
                'description.required'=>'Please Enter Description',
                
            ]
          );
          $input['title'] = $request->title;
          $input['description'] = $request->description;
        //   $time_data=$request->video_time;
        //   $time_data=$time_data/60;
        // return  $input['video_time'] = $request->video_time;
          if($request->price_type === "price"){
            $request->validate(
                [
                    'price' => 'required|regex:/^([0-9]+)$/',
                ], 
                [
                    'price.required'=>'Please Enter Price ',
                    'price.regex'=>'Please Enter only number ',
                ]);
                $input['price'] = $request->price; 
                }
                $input['price'] = $request->price;
                $input['price_type'] = $request->price_type;
        
        
        if ($Video = $request->file('videos')) {
            $destinationPath = 'storage/app/public/Admin/Videos/';
            $profileVideo = time() . "." . $Video->getClientOriginalExtension();
            $Video->move($destinationPath, $profileVideo);
            $input['videos'] = "$profileVideo";

            if ($image = $request->file('thumbnail')) {
                $destinationPath = 'storage/app/public/Admin/Videos/thumbnail/';
                $profileImage = time() . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['thumbnail'] = "$profileImage";
            }
        }
       
    
        Videos::create($input);
     
        return redirect()->route('video.index')
                        ->with('success','Video Details Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $data=Videos::find($prodID);
        return view('Admin.videos.edit',compact('data'));
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
                'videos' => 'mimes:mp4,ogx,oga,ogv,ogg,webm',
                'thumbnail' => 'mimes:jpeg,png,jpg',
                'title' => 'required',
                'description' => 'required',
               
            ], 
            [
              
                'videos.mimes'=>'Please Upload mp4 video',
                'thumbnail.mimes'=>'Please Upload  Image this formate (jpeg,png,jpg)',
                'title.required'=>'Please Enter  Title',
                'description.required'=>'Please Enter Description',
                
            ]
          );
        $request->all();
        $input['title'] = $request->title;
        $input['description'] = $request->description;
        if($request->price_type === "price"){
            $request->validate(
                [
                    'price' => 'required|regex:/^([0-9]+)$/',
                ], 
                [
                    'price.required'=>'Please Enter Price ',
                    'price.regex'=>'Please Enter only number ',
                ]);
                $input['price'] = $request->price; 
                }
                $input['price'] = $request->price;
                $input['price_type'] = $request->price_type;
       

        if ($videos = $request->file('videos')) {
           $data = Videos::Where('id', $id)->first();
            $videos_path = "storage/app/public/Admin/Videos/".$data->videos;
            if(File::exists($videos_path)){
               File::delete($videos_path);
            }
            $destinationPath = 'storage/app/public/Admin/Videos/';
            $profileVideos = time(). "." . $videos->getClientOriginalExtension();
            $data=$videos->move($destinationPath, $profileVideos);
            $input['videos'] = "$profileVideos";
        }
        // thumbnail 

        if ($image = $request->file('thumbnail'))
            {
                $data = Videos::Where('id', $id)->first();
                $image_path = "storage/app/public/Admin/Videos/thumbnail/".$data->thumbnail;
                if(File::exists($image_path)){
                   File::delete($image_path);
                }
                $destinationPath = 'storage/app/public/Admin/Videos/thumbnail/';
                $profileImage = time(). "." . $image->getClientOriginalExtension();
                $data=$image->move($destinationPath, $profileImage);
                $input['thumbnail'] = "$profileImage";
            }
        Videos::where('id',$id)->update($input);
         return redirect('/admin/videos')->with('success','Video details updated successfully');
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
        $data = Videos::findOrFail($prodID);
        $videos_path = "storage/app/public/Admin/Videos/".$data->videos;
        if(File::exists($videos_path)){
            File::delete($videos_path);
        }
        $image_path = "storage/app/public/Admin/Videos/thumbnail/".$data->thumbnail;
        if(File::exists($image_path)){
            File::delete($image_path);
        }
        $data->delete();
        return redirect('/admin/videos')->with('success','Video Deleted Successfully');
    }
    // status update ================================================
    public function updateStatus(Request $request)
    {
      
        $Videos = Videos::find($request->id)->update(['status' => $request->status]);
        return response()->json(['success'=>'Status changed successfully.']);
    }  
}
