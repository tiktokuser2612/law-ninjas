<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Arena;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Validator;
use DB;
use paginator;

class ArenaController extends ResponseController
{
    //Get Resources deatais--------------------------------------
    public function getArenaDetails(Request $request)
    { 
        $validator = Validator::make($request->all(), [
            'page_number' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->senderror('Validation Error', $validator->errors()->first());
        }

        $page_limit = 10;
        $page_number = $request->page_number;
        $currentPage =($page_number - 1) * $page_limit;
     $arena = Arena::orderBy('created_at', 'desc')->offset($currentPage)->limit($page_limit)->get('name','image');
      foreach($arena as $arenaGroup)
      {
        $arenaGroup->image = $request->root().'/storage/app/public/Admin/Arena/'.$arenaGroup->image;
      }
      
      $paginate['page_limit'] = $page_limit;
      $paginate['page_number'] = $page_number;
      $total_data = Arena::count();
      $paginate['total_business'] = $total_data;
      $total_pages = ceil($total_data/$page_limit);
      $paginate['total_pages'] = $total_pages;

      if(empty($arena)){
        return $this->senderror('[]','Invalid Arena');
      }
      else{ 
       return $this->pagination($arena,$paginate,'Arena Details Display successfully');
      }
    }
  
    // Post Like API----------------------------------
    public function like(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:0,1',
           
        ]);
        if ($validator->fails()) {
            return $this->senderror('Validation Error', $validator->errors());
                
        }
        
       return $status = ArenaPost::find($request->id);



       $social = ArenaPost::where([['user_id', '=', ($request->user_id)],['post_id', '=', ($request->id)]])->first();

       $unsocial = ArenaPost::where([['user_id', '=', ($request->user_id)],['post_id', '=', ($request->id)],['like', '=', 0]])->first();
       
       if ($social) {
           if ($unsocial) {
               $social->update(['like' => 1]);
               return json_encode(array('status' => true,'msg'=>'like')); 
           }
           else {
               $social->update(['like' => 0]);
               return json_encode(array('status' => true,'msg'=>'dislike')); 
           }
       }




         if( $status->status == 1)
         {
            $status = ArenaPost::update($status);
            return $this->sendresponse($status,'Arena Post Like successfully');
         }
         else
         {
            $status = ArenaPost::update($status);
            return $this->sendresponse($status,'Arena Post Like successfully');
         }
        // $response = auth()->user()->toggleLike($post);
    }

}

