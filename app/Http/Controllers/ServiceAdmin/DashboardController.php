<?php

namespace App\Http\Controllers\ServiceAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\ServiceStation;
use App\Models\Booking;
use Auth;
class DashboardController extends Controller
{
    public function index()
    {
        $data['menu'] = 'dashboard';
        $data['staff'] = Staff::where('user_id', Auth::id())->count();
        $data['stations'] = ServiceStation::where('user_id', Auth::id())->count();
        $data['bookings'] = Booking::where('service_admin_id', Auth::id())->count();
        return view('serviceAdmin.dashboard.index', $data);
    }
}
