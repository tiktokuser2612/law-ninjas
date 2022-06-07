<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\Models\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use File;

use App\Models\UserDevice;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyTestMail;

class UserController extends ResponseController
{
  // user register---------------------------
   public function register(Request $request)
   { 
     
     $validator = Validator::make($request->all(), [
         'first_name' => 'required',
         'last_name' => 'required',
         'email' => 'required|email|unique:users,email,',
         'password' => 'required|min:8',
         'confirm_password' => 'required|same:password|min:8',
         'country'=>'required',
         'occupation' => 'required',
         'organization' => 'required',
         'device_id' =>'required',
         'device_token'=>'required',
         'device_type'=>'required|in:Android,IOS,other',
         'signup_type' => 'required|in:N',
     ]);
     if ($validator->fails()) {
        return $this->senderror('Validation Error', $validator->errors()->first());
             
     }

     $input = $request->all(); 
 
     $input['password'] = Hash::make($request->password); 
     $input['email_verified'] = '0';
     $user = User::create($input); 
     $data = User::where('id',$user->id)->first();
     
     $user_devices = UserDevice::where(['device_type' => $request->device_type, 'device_id' => $request->device_id])->first();
     if(empty($user_devices)){
         $input1['user_id'] = $user->id;
         $input1['device_type']  = $request->device_type;
         $input1['device_id'] = $request->device_id;
         $input1['device_token'] = $request->device_token;
         UserDevice::create($input1);
     }else{
         $input1['user_id'] = $user->id;
         $input1['device_token'] = $request->device_token;
         UserDevice::where('device_type',$request->device_type)->where('device_id',$request->device_id)->update($input1);
     }
     $data->token =  $user->createToken('MyApp')-> accessToken;
    if(!empty($data->image)){
        $data->image = $request->root().'/storage/app/public/User/'.$data->image;
    }
    else{
        $data->image =$request->root().'/'.'storage/app/public/Admin/profile/1640931314.png';              
    }
    return $this->sendresponse($data,'User Registered successfully');
  

   }
//Login API----------------------------------------------
    public function login(Request $request)
    {
     $validator = Validator::make($request->all(), [
         
         'email' => 'required|email',
         'password' => 'required|min:8',
         'device_id' =>'required',
         'device_token'=>'required',
         'device_type'=>'required|in:Android,IOS,other',
         
     ]);

     if ($validator->fails()) { 
         return $this->senderror('Validation Error', $validator->errors()->first());            
     }

     if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
         $user = Auth::user(); 
         $user_devices = UserDevice::where(['device_type' => $request->device_type, 'device_id' => $request->device_id])->first();
         if(empty($user_devices)){
             $input1['user_id'] = $user->id;
             $input1['device_type']  = $request->device_type;
             $input1['device_id'] = $request->device_id;
             $input1['device_token'] = $request->device_token;
             UserDevice::create($input1);
         }else{
             $input1['user_id'] = $user->id;
             $input1['device_token'] = $request->device_token;
             UserDevice::where('device_type',$request->device_type)->where('device_id',$request->device_id)->update($input1);
         }
        $user['token'] =  $user->createToken('MyApp')-> accessToken; 
        if(!empty($user->image)){
            $user->image = $request->root().'/storage/app/public/User/'.$user->image;
        }
        else{
            $user->image =$request->root().'/'.'/storage/app/public/User/profile-image%20.png';         }
        return $this->sendresponse($user,'User Login successfully');
        
     } 
     else{ 
         return $this->senderror('Validation Error', 'Email or Password Invalid');
     } 
 }
 //Get Profile deatais--------------------------------------
    public function getprofile(Request $request)
    { 
        $user = Auth::user();  
        if(!empty($user->image)){
            $user->image = $request->root().'/storage/app/public/User/'.$user->image;
        }
        else{
            $user->image =$request->root().'/'.'/storage/app/public/User/profile-image%20.png';              
        }
        return $this->sendresponse($user,'User Profile Display successfully');
    }
    // for social login-----------------------------------------
    public function sociallogin(Request $request){

       $validator = Validator::make($request->all(), [
                'signup_type' => 'required|in:G,A,F',
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'social_id' => 'required', 
                'country'=>'required',
                'occupation' => 'required',
                'organization' => 'required',
                'device_id' =>'required',
                'device_token'=>'required',
                'device_type'=>'required|in:Android,IOS,other'
            ]);
            if ($validator->fails()) { 
                return $this->senderror('Validation Error', $validator->errors()->first());
            }

      if($request->signup_type=='F')
      {
        $user = User::Where('email', $request->email)->first();
       
        if($user)
        {
            if($user->signup_type !== 'F'){
                return $this->senderror('Validation Error','Email Already Exist');
               }
            $user_devices = Userdevice::where(['device_type' => $request->device_type, 'device_id' => $request->device_id])->first();
           
            if(empty($user_devices)){
                $input1['user_id'] = $user->id;
                $input1['device_type']  = $request->device_type;
                $input1['device_id'] = $request->device_id;
                $input1['device_token'] = $request->device_token;
                $input1['device_type']  = $request->device_type;
                Userdevice::create($input1);
            }else{
                $input1['user_id'] = $user->id;
                $input1['device_token'] = $request->device_token;
                Userdevice::where('device_type',$request->device_type)->where('device_id',$request->device_id)->update($input1);
            }
            $user['token'] =  $user->createToken('MyApp')->accessToken;
            if(!empty($user->image)){
                $user->image = $request->root().'/storage/app/public/User/'.$user->image;
            }
            else{
                $user->image =$request->root().'/'.'/storage/app/public/User/profile-image%20.png';              
            }
            return $this->sendresponse($user,'You are login successfully');
        } 
        else
        {
            $input = $request->all(); 
            $input['password'] = Hash::make($request->social_id); 
            $user = User::create($input); 
            $user_devices = Userdevice::where(['device_type' => $request->device_type, 'device_id' => $request->device_id])->first();
            if(empty($user_devices)){
                $input1['user_id'] = $user->id;
                $input1['device_type']  = $request->device_type;
                $input1['device_id'] = $request->device_id;
                $input1['device_token'] = $request->device_token;
                $input1['device_type']  = $request->device_type;
                Userdevice::create($input1);
            }else{
                $input1['user_id'] = $user->id;
                $input1['device_token'] = $request->device_token;
                Userdevice::where('device_type',$request->device_type)->where('device_id',$request->device_id)->update($input1);
            }
            $data = User::Where('email', $request->email)->first();
            $data['token'] = $user->createToken('MyApp')->accessToken;
            if(!empty($data->image)){
                $data->image = $request->root().'/storage/app/public/User/'.$data->image;
            }
            else{
                $data->image =$request->root().'/'.'storage/app/public/Admin/profile/1640931314.png';              
            }
            return $this->sendresponse($data,'You are Register successfully');
        }
      }
      elseif($request->signup_type=='G')
      {
        $user = User::Where('email', $request->email)->first();
       
        if($user)
        {
            if($user->signup_type !== 'G'){
                return $this->senderror('Validation Error','Email Already Exist');
               }
            $user_devices = Userdevice::where(['device_type' => $request->device_type, 'device_id' => $request->device_id])->first();
           
            if(empty($user_devices)){
                $input1['user_id'] = $user->id;
                $input1['device_type']  = $request->device_type;
                $input1['device_id'] = $request->device_id;
                $input1['device_token'] = $request->device_token;
                $input1['device_type']  = $request->device_type;
                Userdevice::create($input1);
            }else{
                $input1['user_id'] = $user->id;
                $input1['device_token'] = $request->device_token;
                Userdevice::where('device_type',$request->device_type)->where('device_id',$request->device_id)->update($input1);
            }
            $user['token'] =  $user->createToken('MyApp')->accessToken;
            if(!empty($user->image)){
                $user->image = $request->root().'/storage/app/public/User/'.$user->image;
            }
            else{
                $user->image =$request->root().'/'.'/storage/app/public/User/profile-image%20.png';             }
            return $this->sendresponse($user,'You are login successfully');
        } 
        else
        {
            $input = $request->all(); 
            $input['password'] = Hash::make($request->social_id); 
            $user = User::create($input); 
            $user_devices = Userdevice::where(['device_type' => $request->device_type, 'device_id' => $request->device_id])->first();
            if(empty($user_devices)){
                $input1['user_id'] = $user->id;
                $input1['device_type']  = $request->device_type;
                $input1['device_id'] = $request->device_id;
                $input1['device_token'] = $request->device_token;
                $input1['device_type']  = $request->device_type;
                Userdevice::create($input1);
            }else{
                $input1['user_id'] = $user->id;
                $input1['device_token'] = $request->device_token;
                Userdevice::where('device_type',$request->device_type)->where('device_id',$request->device_id)->update($input1);
            }
            $data = User::Where('email', $request->email)->first();
            $data['token'] = $user->createToken('MyApp')->accessToken;
            if(!empty($data->image)){
                $data->image = $request->root().'/storage/app/public/User/'.$data->image;
            }
            else{
                $data->image =$request->root().'/'.'storage/app/public/Admin/profile/1640931314.png';              
            }
            return $this->sendresponse($data,'You are Register successfully');
        }
      }
      elseif($request->signup_type=='A')
      {
        $user = User::Where('email', $request->email)->first();
        
        if($user)
        {
            if($user->signup_type !== 'A'){
                return $this->senderror('Validation Error','Email Already Exist');
               }
            $user_devices = Userdevice::where(['device_type' => $request->device_type, 'device_id' => $request->device_id])->first();
           
            if(empty($user_devices)){
                $input1['user_id'] = $user->id;
                $input1['device_type']  = $request->device_type;
                $input1['device_id'] = $request->device_id;
                $input1['device_token'] = $request->device_token;
                $input1['device_type']  = $request->device_type;
                Userdevice::create($input1);
            }else{
                $input1['user_id'] = $user->id;
                $input1['device_token'] = $request->device_token;
                Userdevice::where('device_type',$request->device_type)->where('device_id',$request->device_id)->update($input1);
            }
            $user['token'] =  $user->createToken('MyApp')->accessToken;
            if(!empty($user->image)){
                $user->image = $request->root().'/storage/app/public/User/'.$user->image;
            }
            else{
                $user->image =$request->root().'/'.'/storage/app/public/User/profile-image%20.png';              
            }
            return $this->sendresponse($user,'You are login successfully');
        } 
        else
        {
            $input = $request->all(); 
            $input['password'] = Hash::make($request->social_id); 
            $user = User::create($input); 
            $user_devices = Userdevice::where(['device_type' => $request->device_type, 'device_id' => $request->device_id])->first();
            if(empty($user_devices)){
                $input1['user_id'] = $user->id;
                $input1['device_type']  = $request->device_type;
                $input1['device_id'] = $request->device_id;
                $input1['device_token'] = $request->device_token;
                $input1['device_type']  = $request->device_type;
                Userdevice::create($input1);
            }else{
                $input1['user_id'] = $user->id;
                $input1['device_token'] = $request->device_token;
                Userdevice::where('device_type',$request->device_type)->where('device_id',$request->device_id)->update($input1);
            }
            $data = User::Where('email', $request->email)->first();
            $data['token'] = $user->createToken('MyApp')->accessToken;
           
            return $this->sendresponse($data,'You are Register successfully');
        }
      }
      
    }
     // Sending otp email   
     public function sendotp(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        if ($validator->fails()) { 
			return $this->senderror('Validation Error', $validator->errors()->first());         
        }

        $user = User::where('email', '=', $request->email)->first();
        if($user){ 
            $details = [
                'otp' => rand(1000,9999),
            ];
        
            Mail::to($request->email)->send(new \App\Mail\MyTestMail($details));
            $data['otp'] = $details['otp'];
            $data['email'] = $request->email;

            $store['otp'] = $details['otp'];
          $user=  User::Where('email', $request->email)->update($store);

            if (Mail::failures()) {
                return response()->json(['success'=>false, 'error' => 'There is some problem!'],200);
            } else{
                return $this->sendresponse($user,'OTP sent successfully');
            }
        } else{
            return $this->senderror('Validation Error', 'Email not exist');    
        }
    }
    // Veryfy OTP----------------------------------------------------------
    public function verifyOTP(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'otp' => 'required',
        ]);
        if ($validator->fails()) { 
            return $this->senderror('Validation Error', $validator->errors()->first());                 
        }
        
        $user  = User::where([['email','=',$request->email],['otp','=',$request->otp]])->first();
        if($user){ 
            $input['otp'] = null;
            $input['email']  = $request->email;
            User::Where('email', $request->email)->update($input);
            return $this->sendresponse('[]','Otp verified successfully');
        }else{
            return $this->senderror('Validation Error', 'Plese valide Email or OTP');
        }
    }
   // Forgot Password ----------------------------------------------------------
    public function forgotpassword(Request $request)
    {
     

      $validator = Validator::make($request->all(), [
          'email' => 'required|email',
          'password' => 'required', 
          'c_password' => 'required_with:password|same:password',
      ]);
      if ($validator->fails()) { 
        return $this->senderror('Validation Error', $validator->errors()->first());         
      }
      $input = $request->all(); 

      $data['email'] = $input['email']; 
      $data['password'] = Hash::make($input['password']); 
      User::Where('email', $request->email)->update($data);
      return $this->sendresponse('[]','Password change successfully');
    }
  // update Image-----------------------------------------------------------
  public function updateImage(Request $request)
  {
    
    $validator = Validator::make($request->all(), [
        'image' => 'image',
    ]);
    if ($validator->fails()) { 
        return $this->senderror('Validation Error', $validator->errors()->first());         
    }
    if ($image = $request->file('image')) {
        $id=Auth::user(); 
         $image_path = "storage/app/public/User/".$id->image;
        if(File::exists($image_path)){
            File::delete($image_path);
         }
       $destinationPath = 'storage/app/public/User/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
         $data=$image->move($destinationPath, $profileImage);
          $input['image'] = "$profileImage";
    }
     $id=User::first()->id;
     $user=  User::where('id',$id)->update($input);
     $user = User::Where('id', $id)->first();
     if(!empty($user->image)){
        $user->image = $request->root().'/storage/app/public/User/'.$user->image;
    }
    else{
        $user->image =$request->root().'/'.'/storage/app/public/User/profile-image%20.png';              
    }
    return $this->sendresponse($user ,'Profile successfully updated');

  }
 // for Logout------------------------------------------------
 public function logout(Request $request)
 {
     
     $validator = Validator::make($request->all(), [
         'device_id' => 'required',
     ]);
     if ($validator->fails()) { 
        return $this->senderror('Validation Error', $validator->errors()->first());                   
     }
     
     $id=Auth::id();
     $user= UserDevice::where(['user_id' => $id, 'device_id' => $request->device_id])->delete();
     Auth::user()->token()->revoke();
     return $this->sendresponse('[]','User logout successfully');
 }
 // Update user Profile--------------------------------------------
 public function updateProfile(Request $request)
  {
    
    $validator = Validator::make($request->all(), [
        'image' => 'image',
        'first_name' => 'required',
         'last_name' => 'required',
         'email' => 'required',
         'country'=>'required',
         'occupation' => 'required',
         'organization' => 'required',
    ]);
    if ($validator->fails()) { 
        return $this->senderror('Validation Error', $validator->errors()->first());        
    }
    $input['first_name'] = $request->first_name;
    $input['last_name'] = $request->last_name;
    $input['email'] = $request->email;
    $input['country'] = $request->country;
    $input['occupation'] = $request->occupation;
    $input['organization'] = $request->organization;



    if ($image = $request->file('image')) {
        $id=Auth::user(); 
        $image_path = "storage/app/public/image/".$id->image;
        if(File::exists($image_path)){
            File::delete($image_path);
         }
        $destinationPath = 'storage/app/public/image/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $data=$image->move($destinationPath, $profileImage);
        $input['image'] = "$profileImage";
    }
    $id=User::first()->id;
     User::where('id',$id)->update($input);
     $user = User::Where('id', $id)->first();
    //  $user->image = $request->root().'storage/app/public/User/'.$user->image;
     $user->image = $request->root().'/'.$data;
                            
       
    return $this->sendresponse($user ,'Profile successfully updated');

  }
  // Change Password ----------------------------------------------------------
  public function changepassword(Request $request)
  {
    
    $validator = Validator::make($request->all(), [
        'current_password' => 'required',
        'password' => 'required', 
        'confirm_password' => 'required_with:password|same:password',
    ]);
    if ($validator->fails()) { 
        return $this->senderror('Validation Error', $validator->errors()->first());          
    }

    $id = Auth::id();
    $user = User::findOrFail($id);
    
    if (Hash::check($request->current_password, $user->password)) { 
        $input['password'] = Hash::make($request->password); 
        User::Where('id', $id)->update($input);
        
        
        return $this->sendresponse('[]','User password reset successfully');
    }else{
        return $this->senderror('Validation Error','Current password does not match with old password.'); 
    }
    
  }
    
}