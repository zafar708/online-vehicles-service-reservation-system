<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = 'vehicles';
        $data['vehicles'] = Vehicle::where('user_id', Auth::id())->latest()->get();
        return view('frontend.user.vehicles.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['menu'] = 'vehicles';
        return view('frontend.user.vehicles.create', $data);
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
            'model'=>'required',
            'year'=>'required',
            'color'=>'required',  
            'registration_number'=>'required'  
        ]);
        $request['user_id'] = Auth::id();
        Vehicle::create($request->all());
        return to_route('vehicles.index')->with('success','Vehicle Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        $menu = 'vehicles';
        return view('frontend.user.vehicles.edit',compact('menu','vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
       $request->validate([
            'name'=>'required',
            'model'=>'required',
            'year'=>'required',
            'color'=>'required',  
            'registration_number'=>'required' 
        ]);
       $vehicle->update($request->all());
       return to_route('vehicles.index')->with('success','Vehicle Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->back()->with('success','Vehicle Deleted Successfully');
    }
}
