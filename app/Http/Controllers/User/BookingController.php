<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Auth;
class BookingController extends Controller
{
    public function serviceBooked(Request $request)
    {
        $request->validate([
            'service_admin_id'=>'required',
            'vehicle_id'=>'required',
            'service_id'=>'required',
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'book_date'=>'required',
            'book_time'=>'required'
        ]);
        Booking::create([
            'user_id'        => Auth::id(),
            'service_admin_id' => $request->service_admin_id,
            'vehicle_id'     => $request->vehicle_id,
            'service_id'     => $request->service_id,
            'name'           => $request->name,
            'email'          => $request->email,
            'phone'          => $request->phone,
            'address'        => $request->address,
            'book_date'        => $request->book_date,
            'book_time'        => $request->book_time
        ]);
        return redirect()->back()->with('success', 'Booking request sent successfully');
    }
    public function allBookings()
    {
        $data['menu'] = 'book';
        $data['bookings'] = Booking::where('user_id', Auth::id())->latest()->get();
        return view('frontend.user.bookings.index', $data);
    }
    public function bookingDetail($id)
    {
        $data['menu'] = 'book';
        $data['booking'] = Booking::findorFail($id);
        return view('frontend.user.bookings.detail', $data);
    }
    public function bookingStatus($id, Request $request)
    {
        $booking = Booking::findorFail($id);
        $booking->status = $request->status;
        $booking->save();
        return redirect()->back()->with('success', 'Booking status updated successful');
    }
}