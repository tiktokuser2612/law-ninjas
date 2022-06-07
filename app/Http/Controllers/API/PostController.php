<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ArenaPost;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Validator;
use DB;
use paginator;

class PostController extends ResponseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // add arena post
    public function store(Request $request)
    { 
    $request_data = $request->all();
    $obj = new SecurityController();
    foreach ($request_data as $key => $value) {
        $dec_data = $obj->encryptdecrypt('decryption', $value);		
        $request->merge([
            $key => $dec_data,
        ]);
    }
    $validator = Validator::make($request->all(), [
        'arenagroup_id' => 'required',
        'user_id' => 'required',
        'post_description' => 'required',
        'post_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
    ]);
    if ($validator->fails()) {
        return $this->senderror('Validation Error', $validator->errors()->first());   
    }
    $input = $request->all();
    if ($image = $request->file('post_image')) {
        $destinationPath = 'storage/app/public/Admin/Arena/ArenaPost/';
        $profileImage = time() . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $input['post_image'] = "$profileImage";
    }
    $ArenaPost= ArenaPost::create($input);
    $data= $ArenaPost->toArray();            
    $newArr = array();
    foreach ($data as $key => $string) {
        $enc_data1 = $obj->encryptdecrypt('encryption', $string);
        $newArr[$key] = $enc_data1;
    }
    return $this->sendresponse($newArr,'Arena Post Added successfully');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
