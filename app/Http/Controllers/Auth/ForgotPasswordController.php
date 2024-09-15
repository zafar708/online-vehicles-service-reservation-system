<?php 

namespace App\Http\Controllers\Auth; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon; 
use App\Models\User;
use App\Models\PasswordReset;
use Mail;
class ForgotPasswordController extends Controller
{
	//Admin Update Password
	public function adminForgotPassword(Request $request)
	{
		if($request->isMethod('post'))
		{
			$request->validate([
	        	'email' => 'required|email|exists:users',
	    	]);

		    $token = Str::random(64);
		    PasswordReset::create([
		    	'email'=> $request->email,
		    	'token'=> $token,
		    	'created_at'=> Carbon::now()
		    ]);
		    $data = [
		    	'token' => $token,
		    	'type' => 'admin'
		    ];

		      Mail::send('mails.forgot-password',$data,function($message) use ($request){
	    		$message->to($request->email);
	    		$message->subject('Update Password Notification');
	    	});
	        return back()->with('success','Mail Sent Successfully. Check Your Inbox');
	        
		}
		else
		{
			return view('auth.admin-forgot-password');
		}
	}

	public function adminResetPassword($token)
	{ 
     	return view('auth.admin-update-password', compact('token'));
  	}

  	public function adminUpdatePassword(Request $request)
  	{
		$request->validate([
		     'email' => 'required|email|exists:users',
		     'password' => 'required|string|min:6|confirmed',
		     'password_confirmation' => 'required'
		]);

		$updatePassword = PasswordReset::where(['email' => $request->email, 'token' => $request->token])->first();

		if(!$updatePassword) {
		    return back()->with('error', 'Invalid token!');
		}
		else {
		  	User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

		    PasswordReset::where('email',$request->email)->delete();

		    return back()->with('success', 'Your password has been updated!');
		}
    }

	//Service Admin and Users Update password
	public function forgotPassword(Request $request)
	{
		if($request->isMethod('post'))
		{
			$request->validate([
	        	'email' => 'required|email|exists:users',
	    	]);

		    $token = Str::random(64);
		    PasswordReset::create([
		    	'email'=> $request->email,
		    	'token'=> $token,
		    	'created_at'=> Carbon::now()
		    ]);
		    $data = [
		    	'token' => $token,
		    	'type' => 'user'
		    ];
		      Mail::send('mails.forgot-password',$data,function($message) use ($request){
	    		$message->to($request->email);
	    		$message->subject('Update Password Notification');
	    	});
	        return back()->with('success','Mail Sent Successfully. Check Your Inbox');
	        
		}
		else
		{
			return view('auth.forgot-password');
		}
	}

	public function resetPassword($token)
	{ 
     	return view('auth.update-password', compact('token'));
  	}

  	public function updatePassword(Request $request)
  	{
		$request->validate([
		     'email' => 'required|email|exists:users',
		     'password' => 'required|string|min:6|confirmed',
		     'password_confirmation' => 'required'
		]);

		$updatePassword = PasswordReset::where(['email' => $request->email, 'token' => $request->token])->first();

		if(!$updatePassword) {
		    return back()->with('error', 'Invalid token!');
		}
		else {
		  	User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

		    PasswordReset::where('email',$request->email)->delete();

		    return back()->with('success', 'Your password has been updated!');
		}
    }
}