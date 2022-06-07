<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Resources;
use App\Models\ResourcesImage;
use Validator;
use DB;
class ResourcesController extends ResponseController
{
    //Get Resources deatais--------------------------------------
    public function getResourcesDetails(Request $request)
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

         $data = DB::table('resources')
        ->leftJoin('resources_images', 'resources_images.resources_id', '=', 'resources.id')
        ->groupBy('resources.id')
        ->orderBy('resources.id','desc')
        ->offset($currentPage)->limit($page_limit)
        ->select(['resources.*','resources_images.image'])
        ->get();
     
        foreach($data as  $resources)
        {
            $resources->image= $request->root().'/storage/app/public/Admin/Resources/'.$resources->image;
        }
      
        $paginate['page_limit'] = $page_limit;
        $paginate['page_number'] = $page_number;
        $total_data = Resources::count();
        $paginate['total_business'] = $total_data;
        $total_pages = ceil($total_data/$page_limit);
        $paginate['total_pages'] = $total_pages;
  
        if(empty($data)){
          return $this->senderror('[]','Invalid Resources');
        }
        else{ 
            return $this->pagination($data,$paginate,'Resources Details Display successfully');
        }
    }

}


