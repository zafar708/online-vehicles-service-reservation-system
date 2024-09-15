<?php

namespace App\Http\Controllers\ServiceAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = 'profile';
        $data['admin'] = User::find(Auth::id());
        return view('serviceAdmin.profile.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $admin = User::find(Auth::id());
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
        $admin->name = $request->name;
        
        if($admin->email != $request->email)
        {
            $request->validate([
                'email' => 'unique:users'
            ]);
            $admin->email = $request->email;
        }
        if ($request->password)
        {
            $request->validate([
                'password' => 'required|string|max:191|confirmed'
            ]);
            $admin->password = Hash::make($request->password);
        }
        $admin->save();
        return redirect()->back()->with('success', 'Profile updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
