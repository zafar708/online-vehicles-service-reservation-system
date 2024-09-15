<?php

namespace App\Http\Controllers\ServiceAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Auth;
use Mail;
class BookingController extends Controller
{
    public function bookings()
    {
        $data['menu'] = 'book';
        $data['bookings'] = Booking::where('service_admin_id', Auth::id())->latest()->paginate(20);
        return view('serviceAdmin.bookings.index', $data);
    }
    public function show($id)
    {
        $data['menu'] = 'book';
        $data['booking'] = Booking::findorFail($id);
        return view('serviceAdmin.bookings.detail', $data);
    }
    public function bookingStatus($id, Request $request)
    {
        $booking = Booking::findorFail($id);
        $booking->status = $request->status;
        $booking->save();
        try {
            $data = [
                'booking'   => $booking
            ];
            $email_id = $booking->email;
            Mail::send('mails.booking-update-status',$data,function($message) use ($email_id){
                $message->to($email_id);
                $message->subject('Booking Update Status');
            });
            return redirect()->back()->with('success', 'Booking status updated successful');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        
    }
}