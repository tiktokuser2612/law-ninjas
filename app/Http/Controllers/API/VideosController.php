<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Videos; 
use Validator;
class VideosController extends  ResponseController
{
    // Terms and Conditions------------------------------------------------------
    public function getVideoDetails(Request $request)
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
         $video = Videos::orderBy('created_at', 'desc')->offset($currentPage)->limit($page_limit)->get();
      foreach($video as $videos)
      {
          $videos->videos = $request->root().'/storage/app/public/Admin/Videos/'.$videos->videos;
          $videos->thumbnail = $request->root().'/storage/app/public/Admin/Videos/thumbnail/'.$videos->thumbnail;
      }
      
      $paginate['page_limit'] = $page_limit;
      $paginate['page_number'] = $page_number;
      $total_data = Videos::count();
      $paginate['total_business'] = $total_data;
      $total_pages = ceil($total_data/$page_limit);
      $paginate['total_pages'] = $total_pages;

      if(empty($video)){
        return $this->senderror('[]','Invalid Videos');
      }
      else{ 
       return $this->pagination($video,$paginate,'Videos Details Display successfully');
      }
    }
  // Videos Search API------------------------------------------- 
    public function SearchVideo(Request $request)
    {   
       
        $validator = Validator::make($request->all(), [
            'title' => 'required',  
        ]);
        if ($validator->fails()) { 
            return $this->senderror('Validation Error', $validator->errors()->first());            
        }
        $search_videos = Videos::select("title")
        ->where("title","LIKE","%{$request->title}%")
        ->get();

        if(count($search_videos)){
            return $this->sendresponse($search_videos,'Videos data found successfully');
        }
        else
        {
            return $this->sendresponse($search_videos,'Video data not found'); 
        }   
    }
   
}


