<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Videos; 
use App\Models\Resources;
use App\Models\ResourcesImage;
use DB;
class HomeController extends ResponseController
{
    // Get  Home details API-------------------------------------
    public function getHomeDetails(Request $request)
    { 
         $data = DB::table('resources')
                ->leftJoin('resources_images', 'resources_images.resources_id', '=', 'resources.id')
                ->groupBy('resources.id')
                ->orderBy('resources.id','desc')
                ->limit(10)
                ->select(['resources.id','resources.title','resources.description','resources_images.image'])
                ->get();
     
        foreach($data as  $resources)
        {
            $resources->image= $request->root().'/storage/app/public/Admin/Resources/'.$resources->image;
        }
        $video = Videos::orderBy('created_at', 'desc')->limit(10)->select(['videos.id','videos.title','videos.description','videos.thumbnail','videos.videos'])->get();
        foreach($video as $videos)
        {
            $videos->videos = $request->root().'/storage/app/public/Admin/Videos/'.$videos->videos;
            $videos->thumbnail = $request->root().'/storage/app/public/Admin/Videos/thumbnail/'.$videos->thumbnail;
        }
        $resources= $data->toArray();
        $videos= $video->toArray();
   
        if(empty($data) && empty($video)){
          return $this->senderror('[]','Invalid Resources');
        }
        else{ 
            return $this->sendresponse(['Latest resources'=>$resources,'Latest video'=>$videos],'Display Home Details successfully updated');
        }
    }
}
