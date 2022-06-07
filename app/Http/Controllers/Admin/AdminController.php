<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Models\Admin;

class AdminController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    public function __construct()
    {
            $this->middleware('guest')->except('logout');
            $this->middleware('guest:admin')->except('logout');
         
    }

    public function admin()
    {
        return view('Admin.auth.login', ['url' => 'admin']);
    }
   // login-------------------------------------------------------------
    public function adminLogin(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:8',  
            ], 
            [
                'email.required'=>'Please Enter Email-Id',
                'email.email'=> 'Please Enter email must be Email formet.',
                'password.required'=>'Please Enter password',
                'password.min'=>'The password must be at least 8 characters.',
            ]
          );

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->route('index')->with('success','Login Successfully');
        } else{
            return redirect()->back()->withInput()->with('error','Email or password invalid!');
            
        }
    }
    //logout-----------------------------------------------------------
    public function logout()
    {
        auth()->guard('admin')->logout();
        \Session::flush();       
        return redirect(url('/admin/login'))->with('success','Logout Successfully');
    }
   
}
