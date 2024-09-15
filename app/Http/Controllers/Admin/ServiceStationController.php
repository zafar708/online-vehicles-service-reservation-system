<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\ServiceStation;
use Illuminate\Http\Request;

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
        $data['stations'] = ServiceStation::latest()->paginate(20);
        return view('admin.stations.index', $data);
    }

    public function updateStatus(Request $request, $id)
    {
        $station = ServiceStation::find($id);
        $station->status = $request->status;
        $station->save();
        return to_route('service-stations.index')->with('success', 'Status updated successfully');
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
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceStation  $serviceStation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceStation $serviceStation)
    {
        
    }
}
