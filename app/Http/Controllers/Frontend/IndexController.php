<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceStation;
use App\Models\Service;
use Mail;
class IndexController extends Controller
{
    public function index()
    {   $data['menu'] = 'home';
        $data['stations'] = ServiceStation::where('status', 'active')->latest()->take(3)->get();
        $data['services'] = Service::latest()->take(3)->get();
        return view('frontend.index', $data);
    }
    public function search(Request $request)
    {
         $query = ServiceStation::query();

            
              $query = $query->where([['status', 'active'],['name', 'LIKE', '%' .$request->search.'%']])->orWhere([['status', 'active'], ['location', 'LIKE', '%' . $request->search . '%' ]]);
              $stations = $query->paginate(9)->appends($request->query());
        return view('frontend.search', compact('stations'));
    }
    public function aboutUs()
    {
        $data['menu'] = 'about';
        return view('frontend.about-us', $data);
    }
    public function contactUs()
    {
        $data['menu'] = 'contact';
        return view('frontend.contact-us', $data);
    }
    public function contactMail(Request $request)
    {
        try {
            $data = [
                'name'          => $request->name,
                'email'         => $request->email,
                'phone'         => $request->phone,
                'address'       => $request->address,
                'body'          => $request->body
            ];
            $email_id = 'zafarbaig543@gmail.com';
            Mail::send('mails.contact-us',$data,function($message) use ($email_id){
                $message->to($email_id);
                $message->subject('Contact Us');
            });
            return response()->json(['message' => 'Email sent successfully.'],200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
