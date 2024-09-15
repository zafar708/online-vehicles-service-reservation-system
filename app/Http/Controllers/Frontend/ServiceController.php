<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceStation;
use App\Models\Service;
use App\Models\Booking;
use App\Models\Rating;
use Auth;

class ServiceController extends Controller
{
    public function allServices()
    {   $data['menu'] = 'services';
        //$data['services'] = Service::latest()->get();
        $data['services'] = Service::where('price', '>=', 7000)->get();
        return view('frontend.services.index', $data);
    }
    public function serviceDetail($slug)
    {
        $data['menu'] = 'services';
        $data['service'] = Service::with('staff', 'serviceStation')->where('slug', $slug)->first();
        return view('frontend.services.detail', $data);
    }
    public function serviceBooking($slug)
    {
        if (Auth::check() and Auth::user()->type === 'user')
        {
            $data['menu'] = 'services';
            $data['service'] = Service::with('serviceStation')->where('slug', $slug)->first();
            return view('frontend.services.booking', $data);
        }
        elseif(Auth::check() and Auth::user()->type != 'user')
        {
            return redirect()->back()->with(['error' => 'You do not have permission. Please login as a user to proceed.']);
        }
        else
        {
            return to_route('login'); 
        }           
    }
    public function serviceRatings($id, Request $request)
    {
        $rating = new Rating;
        $rating->service_id = $id;
        $rating->rate = $request->rate;
        $rating->save();
        return redirect()->back()->with(['rating_message' => 'Rating submitted successfully.']);
    }
    
}
