<?php

namespace App\Http\Controllers\ServiceAdmin;
use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\ServiceStation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = 'Staff';
        $data['staffs'] = Staff::where('user_id', Auth::id())->latest()->paginate(20);
        return view('serviceAdmin.staff.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['menu'] = 'Staff';
        $data['stations'] = ServiceStation::where(['user_id' => Auth::id(), 'status' => 'active'])->latest()->get();
        return view('serviceAdmin.staff.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'service_station_id'=>'required',
            'phone'=>'required',
            'address'=>'required'
        ]);
        $request['slug']=Str::slug($request->name,'-').'-'.Str::random(5);
        $request['user_id'] = Auth::id();
        $staff = Staff::create($request->all());
        return to_route('staff.index')->with('success','Staff Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        $menu = 'Staff';
        $stations = ServiceStation::where(['user_id' => Auth::id(), 'status' => 'active'])->latest()->get();
        return view('serviceAdmin.staff.edit',compact('menu','staff', 'stations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
       $request->validate([
            'name'=>'required',
            'service_station_id'=>'required',
            'phone'=>'required',
            'address'=>'required'
        ]);
       $staff->update($request->all());
       return to_route('staff.index')->with('success','Staff Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        $staff->delete();
        return redirect()->back()->with('success','Staff Deleted Successfully');
    }
}
