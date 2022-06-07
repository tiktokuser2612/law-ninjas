<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resources;
use App\Models\ResourcesImage;
use validate;
use File;
use Crypt;
use DB;

class ResourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data = DB::table('resources')
                ->leftJoin('resources_images', 'resources_images.resources_id', '=', 'resources.id')
                ->groupBy('resources.id')
                ->orderBy('resources.id','desc')
                ->select(['resources.*','resources_images.image'])
                ->paginate(10);

        return view('Admin.Resources.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Resources.add');
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
                'image' => 'required',
                'image.*' => 'image|mimes:jpeg,png,jpg',
                'title' => 'required | min:2|max:20',
                'description' => 'required | min:5|max:250',
            ], 
            [
                'image.required'=>'Please upload  Image',
                'image.mimes'=>'Please upload only jpeg , png ,jpe  Image',
                'title.required'=>'Please Enter  Title',
                'title.min'=>'Please Enter  Title minimum 2 characters',
                'title.max'=>'Please Enter  Title maximum 30 characters',
                'description.required'=>'Please Enter Description',
                'description.min'=>'Please Enter  description minimum 5 characters',
                'description.max'=>'Please Enter  description maximum 250 characters',
            ]
          );
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
            $Resources=Resources::create($input);

         
         if ( $request->hasfile( 'image' ) ) {
            foreach ( $request->image as $image ) {
                $input1=[];    
                $destinationPath = 'storage/app/public/Admin/Resources/';
                $profileImage = time().rand(100,999). "." . $image->getClientOriginalExtension();
            
                $image->move($destinationPath, $profileImage);
                $input1['image'] = $profileImage; 
                $input1['resources_id'] = $Resources->id;
                
                ResourcesImage::create($input1);
            }
        }
        return redirect()->route('/admin/Resources')
                        ->with('success','Resources Details Added successfully.');
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
        $data=Resources::where('id',$prodID)->first();
         $resourcesImage =ResourcesImage::where('resources_id',$prodID )->pluck('image',);
         $Image_id =ResourcesImage::where('resources_id',$prodID )->pluck('id',);
        $data->image_id = $Image_id;
        $data->images = $resourcesImage;
        return view('Admin.Resources.edit',compact('data'));
       
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
                'title' => 'required | min:2|max:20',
                'description' => 'required | min:5|max:250',
            ], 
            [
                'title.required'=>'Please Enter  Title',
                'title.min'=>'Please Enter  Title minimum 2 characters',
                'title.max'=>'Please Enter  Title maximum 30 characters',
                'description.required'=>'Please Enter Description',
                'description.min'=>'Please Enter  description minimum 5 characters',
                'description.max'=>'Please Enter  description maximum 250 characters',
            ]);
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
                if (!empty($request->image) ) {
                    foreach ( $request->image as $key => $images ) {
                       $input1=[];    
                       if(!empty($images) && !empty($request->image_id[$key]))
                        {
                            $data = ResourcesImage::Where('id', $request->image_id[$key])->first();
                            $image_path = "storage/app/public/Admin/Resources/".$data->image;
                            if(File::exists($image_path)){
                            File::delete($image_path);
                            }
                            $destinationPath = 'storage/app/public/Admin/Resources/';
                            $profileImage = time().rand(100,999). "." . $images->getClientOriginalExtension();
                        
                            $images->move($destinationPath, $profileImage);
                            $input1['image'] = $profileImage; 
                            $input1['resources_id'] = $id;
                            ResourcesImage::where('id',$request->image_id[$key])->update($input1);
                        }
                        elseif(!empty($images) && empty($request->image_id[$key]))
                        {
                           $destinationPath = 'storage/app/public/Admin/Resources/';
                             $profileImage = time().rand(100,999). "." . $images->getClientOriginalExtension();
                        
                            $images->move($destinationPath, $profileImage);
                            $input1['image'] = $profileImage; 
                            $input1['resources_id'] = $id;
                           $data =ResourcesImage::create($input1);
                        }
                    }
                }

                if(!empty($request->remove_id)){
                    $remove_ids = explode(",",$request->remove_id);
                    foreach($remove_ids as $delete_id){
                    $ResourcesImage = ResourcesImage::where('id',$delete_id)->pluck('image');
                        if(!empty($ResourcesImage)) 
                        {
                            foreach($ResourcesImage as $delImage)
                            {
                                $path = 'storage/app/public/Admin/Resources/'.$delImage;
                                if(File::exists($path)){
                                File::delete($path);
                                }
                            }
                        }
                            $post = ResourcesImage::find($delete_id);
                            $post->delete();
                        }
                    }
                Resources::where('id',$id)->update($input);
                return redirect('/admin/Resources')->with('success','Resources updated successfully');
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
        $ResourcesImage = ResourcesImage::where('resources_id',$prodID)->get();
        
        foreach($ResourcesImage as $row)
          {
            $path = 'storage/app/public/Admin/Resources/'.$row->image;
            if(File::exists($path)){
              File::delete($path);
            }
          }

          ResourcesImage::where('resources_id',$prodID)->delete();
          Resources::where('id',$prodID)->delete();
        return redirect()->route('/admin/Resources')->with('success','User Deleted Successfully');
    }
    // status update ================================================
    public function updateStatus(Request $request)
    {
        $Resources = Resources::find($request->id)->update(['status' => $request->status]);
        return response()->json(['success'=>'Status changed successfully.']);
    }    
}
