<?php

namespace App\Http\Controllers\ServiceAdmin;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Staff;
use App\Models\ServiceStation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = 'services';
        $data['services'] = Service::where('user_id', Auth::id())->latest()->paginate(20);
        return view('serviceAdmin.services.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['menu'] = 'services';
        $data['stations'] = ServiceStation::where(['user_id' => Auth::id(), 'status' => 'active'])->latest()->get();
        return view('serviceAdmin.services.create', $data);
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
            'title'=>'required',
            'price'=>'required',
            'staff_id'=>'required',
            'service_station_id'=>'required',  
        ]);
        $request['slug']=Str::slug($request->title,'-').'-'.Str::random(5);
        $request['user_id'] = Auth::id();
        Service::create($request->all());
        return to_route('services.index')->with('success','Service Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $menu = 'services';
        $stations = ServiceStation::where(['user_id' => Auth::id(), 'status' => 'active'])->latest()->get();
        return view('serviceAdmin.services.edit',compact('menu','service', 'stations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
       $request->validate([
            'title'=>'required',
            'price'=>'required',
            'staff_id'=>'required',
            'service_station_id'=>'required', 
        ]);
       $service->update($request->all());
       return to_route('services.index')->with('success','Service Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->back()->with('success','Service Deleted Successfully');
    }
    public function getStaff(Request $request)
    {
        $getStaff = Staff::where('service_station_id',$request->station_id)->get();
        $staffData = array();
        foreach($getStaff as $st)
        {
            array_push($staffData,
                '<option value="'.$st->id.'">'.$st->name.'</option>'
            );
        }
        return $staffData;
    }
}
