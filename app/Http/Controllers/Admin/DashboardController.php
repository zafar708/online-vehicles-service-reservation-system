<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ServiceStation;
class DashboardController extends Controller
{
    public function index()
    {
        $data['menu'] = 'dashboard';
        $data['user'] = User::where('type', '!=' , 'admin')->count();
        $data['stations'] = ServiceStation::count();
        return view('admin.dashboard.index', $data);
    }
}
