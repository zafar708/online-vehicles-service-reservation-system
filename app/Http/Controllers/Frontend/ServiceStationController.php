<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceStation;
use App\Models\Service;

class ServiceStationController extends Controller
{
    public function allStations()
    {   $data['menu'] = 'stations';
        $data['stations'] = ServiceStation::where('status', 'active')->latest()->get();
        return view('frontend.service-stations.index', $data);
    }
    public function stationDetail($slug)
    {
        $data['menu'] = 'stations';
        $data['station'] = ServiceStation::with('staff', 'services')->where('slug', $slug)->first();
        return view('frontend.service-stations.detail', $data);
    }
    
}
