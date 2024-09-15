<?php

namespace App\Http\Controllers\ServiceAdmin;
use App\Http\Controllers\Controller;
use App\Models\ServiceStation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
class ServiceStationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = 'ServiceStation';
        $data['stations'] = ServiceStation::where('user_id', Auth::id())->latest()->paginate(20);
        return view('serviceAdmin.stations.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = 'ServiceStation';
        return view('serviceAdmin.stations.create', compact('menu'));
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
            'phone'=>'required',
            'location'=>'required'
        ]);
        $request['slug']=Str::slug($request->name,'-').'-'.Str::random(5);
        $request['user_id'] = Auth::id();
        $staff = ServiceStation::create($request->all());
        return to_route('serviceStations.index')->with('success','Service Station Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceStation  $serviceStation
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceStation $serviceStation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceStation  $serviceStation
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceStation $serviceStation)
    {
        $menu = 'ServiceStation';
        return view('serviceAdmin.stations.edit',compact('menu','serviceStation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceStation  $serviceStation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceStation $serviceStation)
    {
       $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'location'=>'required'
        ]);
        $serviceStation->update($request->all());
        return to_route('serviceStations.index')->with('success','Service Station Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceStation  $serviceStation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceStation $serviceStation)
    {
        $serviceStation->delete();
        return redirect()->back()->with('success','Service Station Deleted Successfully');
    }
}
