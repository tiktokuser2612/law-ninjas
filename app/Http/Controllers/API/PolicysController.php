<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use DB;
use Validator;
use Illuminate\Support\Facades\Auth; 
use App\Models\Privacy;
use App\Models\PrivacyPolicy;
use App\Models\TermsConditions;
use App\Models\AboutUs;

class PolicysController extends ResponseController
{
    // private and policy------------------------------------------------------
    public function privacy()
    {
        $id = Auth::id();
        $privacy = PrivacyPolicy::first();
       
        return $this->sendresponse($privacy,'Privacy Policy retrieved successfully');
    } 
    // About Us------------------------------------------------------
    public function aboutus()
    {
        $id = Auth::id();
        $aboutes = AboutUs::first();
       
        return $this->sendresponse($aboutes,'Privacy Policy retrieved successfully');
    } 
    // Terms and Conditions------------------------------------------------------
    public function termsConditions()
    {
        $id = Auth::id();
        $terms = TermsConditions::first();
       
        return $this->sendresponse($terms,'Privacy Policy retrieved successfully');
    } 
}
