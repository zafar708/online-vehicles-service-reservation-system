<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;

class LoginController extends Controller
{  
    //user and service admin register
    public function register()
    {
        if(Auth::check() && Auth::user()->type == 'user')
        {
            return to_route('user-dashboard');
        }
        elseif(Auth::check() && Auth::user()->type == 'serviceAdmin')
        {
            return to_route('service-dashboard');
        }
        elseif(Auth::check() && Auth::user()->type == 'admin')
        {
            return to_route('admin-dashboard');
        }
        else
        {
            $menu = 'register';
            return view('auth.register', compact('menu'));
        }
    }
    public function postRegister(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'name'=>'required|string',
            'email'=>'required|email|unique:users',
            'type'=>'required',
            'password'=>'min:6|required|confirmed',
            'password_confirmation'=>'required',
        ]);
        // dd($request->all());
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'type'=>$request->type,
            'password'=>Hash::make($request->password),
        ]);
        if($user)
        {
            return back()->with('success','You Register successfully');
        }
        else
        {
            return back()->with('error','Something went wrong');
        }
    }
    //end user and service admin register

    //user and service admin login
    public function login()
    {
        if(Auth::check() && Auth::user()->type == 'user')
        {
            return to_route('user-dashboard');
        }
        elseif(Auth::check() && Auth::user()->type == 'serviceAdmin')
        {
            return to_route('service-dashboard');
        }
        elseif(Auth::check() && Auth::user()->type == 'admin')
        {
            return to_route('admin-dashboard');
        }
        else
        {
            $menu = 'login';
            return view('auth.login', compact('menu'));
        }
    }
    public function postLogin (Request $request)
    {
        $this->validate($request,[
        'type'=>'required',
        'email'=>'email|required',
        'password'=>'required|min:6',
        ]);
        $user = User::where('email', $request->email)->first();
        if($user)
        {
            if($user->status == 'inactive')
            {
                return back()->with('error','Your status is inactive. You can login when admin change your status to active.');
            }
        }
        else{
            return back()->with('error','Invalid email.');
        }
        if($request->type == 'user')
        {

            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'status'=>'active']))
            {
                return to_route('user-dashboard');
            }
            else
            {
                return back()->with('error','Invalid password.');
            }
        }
        elseif($request->type == 'serviceAdmin')
        {
            if (Auth::attempt(['email'=>$request->email,'password'=>$request->password,'status'=>'active']))
            {
                return to_route('service-dashboard');
            }
            else
            {
                return back()->with('error','Invalid password.');
            }
            
        }
        else
        {
            return back()->with('error','Please check your credentials.');
        }
    }
    //End user and service admin login

    //admin login
    public function adminGetLogin()
    {
        return view('auth.admin-login');
    }
    public function adminPostLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:191',
            'password' => 'required|string|max:191',
        ]);
        $user = User::where(['email' => $request->email, 'type' => 'admin'])->first();
        if (!$user)
        {
            return back()->with('error', 'You Entered Invalid Email!!');
        }
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'type'=>'admin']))
        {
            return to_route('admin-dashboard');
        }
        else
        {
            return back()->with('error', 'You Entered Invalid Password!!');
        }
    }
    //end admin login
    public function logout()
    {
        if (Auth::check())
        {
            if(Auth::user()->type === 'admin'){
                Auth::logout();
                return to_route('admin-get-login');
            }
            else
            {
                Auth::logout();
                return to_route('login');
            }
        }
        else
        {
           return redirect()->back();
        }
    }
    public function profile()
    {
        if(Auth::user()->type === 'admin'){
            return to_route('admin-dashboard');
        }
        elseif(Auth::user()->type === 'serviceAdmin'){
            return to_route('service-dashboard');
        }
        else
        {
            return to_route('user-dashboard');
        }
    }
}
