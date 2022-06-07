<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostComment;
use App\Models\ArenaPost;
use App\Models\Arena;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Validator;
use DB;
use paginator;
use Auth;

class CommentController extends  ResponseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arena = PostComment::orderBy('created_at', 'desc')->offset(0)->limit(25)->get();
        $page_limit=25;
        $arena['Page_limit'] = $page_limit;
         
        $Arena_group=PostComment::count();
        $arena['Arena_group'] =$Arena_group;

        $total_page=$Arena_group/$page_limit;
        $total_page=floor($total_page);
        $arena['page_no']= $total_page;
        if( $page_limit>26)
        {
            $arena['Total_page']= $total_page;
        }
        else
        {
            $total_page=$total_page+1;
            $arena['Total_page']= $total_page;
        }
        $data=$arena;             
        $newArr = array();
        $obj = new SecurityController();
        foreach ($data as $key => $string) {
            $enc_data1 = $obj->encryptdecrypt('encryption', $string);
            $newArr[$key] = $enc_data1;
            
        }
        return $this->sendresponse($newArr,'Post Comment Display successfully');
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
    //Post cpmment api----------------------------------------------------------
    public function store(Request $request)
    { 
    //   $request_data = $request->all();
    //   $obj = new SecurityController();
    //   foreach ($request_data as $key => $value) {
    //       $dec_data = $obj->encryptdecrypt('decryption', $value);		
    //       $request->merge([
    //           $key => $dec_data,
    //       ]);
    //   }
      $validator = Validator::make($request->all(), [
         
        'user_id' => 'required',
        'arenagroup_id' => 'required', 
        'post_id' => 'required',
        'comment' => 'required', 
      ]);
      if ($validator->fails()) {
          return $this->senderror('Validation Error', $validator->errors()->first());
              
      }
      $input = $request->all();
      if(Auth::id() == $request->user_id){
        
        $input['user_id'] = $request->user_id;
      }
      else{
        return $this->senderror('Validation Error', 'User Id not Match');
      }
    //  return $arena=Arena::get('id');
      if(Arena::where('id',$request->arenagroup_id)->get('id'))
      {
        $input['arenagroup_id'] = $request->arenagroup_id;
      }
      else{
        return $this->senderror('Validation Error', 'Arena group Id not Match');
      }
     
      if(ArenaPost::where('id',$request->post_id)->get('id'))
      {
        $input['post_id'] = $request->post_id;
      }else{
        return $this->senderror('Validation Error', 'Arena Post Id not Match');
      }
      
      $input['comment'] = $request->comment;
        $PostComment= PostComment::create($input);
      
     
    //   $data= $PostComment->toArray();            
    //   $newArr = array();
    //   foreach ($data as $key => $string) {
    //       $enc_data1 = $obj->encryptdecrypt('encryption', $string);
    //       $newArr[$key] = $enc_data1;
    //   }
      return $this->sendresponse($PostComment,'Comment Added successfully');
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
        $PostComment = PostComment::find($id);
        if (is_null($PostComment)) {
            return $this->sendresponse([],'Post Comment not Found !');;
        }
        $data= $PostComment->toArray();       
        $newArr = array();
        $obj = new SecurityController();
        foreach ($data as $key => $string) {
            $enc_data1 = $obj->encryptdecrypt('encryption', $string);
            $newArr[$key] = $enc_data1;
            
        }
        return $this->sendresponse($newArr,'Post Comment Display successfully');
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
        $PostComment = PostComment::find($id);
        if (is_null($PostComment)) {
            return $this->sendresponse([],'Post Comment not Found !');;
        }
        $PostComment->delete();
       
        return $this->sendresponse([],'Post Comment Deleted successfully');
    }    
}
