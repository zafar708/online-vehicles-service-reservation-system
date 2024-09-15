<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;
class ProfileController extends Controller
{
    public function userProfile()
    {
        $data['menu'] = 'profile';
        return view('frontend.user.profile', $data);
    }
    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::id());
        
            $request->validate([
                'name' => 'required'
            ]);
            $user->name = $request->name;
        if($user->email == $request->email)
        {
            $user->email = $request->email;
        }
        else
        {
            $request->validate([
                'email' => 'required|email|unique:users'
            ]);
            $user->email = $request->email;
        }
        if ($request->password)
        {
            $request->validate([
                'password' => 'required|string|max:191|confirmed'
            ]);
            $user->password = Hash::make($request->password);
        }
        else
        {
            $user->password = $user->password;
        }
        $user->save();
        return back()->with('success', 'Profile updated Successfully');
    }
}
