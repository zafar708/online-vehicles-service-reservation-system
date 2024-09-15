<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Booking;
use Auth;
class DashboardController extends Controller
{
    public function index()
    {
        $data['menu'] = 'dashboard';
        $data['vehicles'] = Vehicle::where('user_id', Auth::id())->count();
        $data['bookings'] = Booking::where('user_id', Auth::id())->count();
        return view('frontend.user.dashboard', $data);
    }
}