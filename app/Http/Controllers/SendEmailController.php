<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMailNotification;
use App\Mail\ContactInterestNotification;
use App\Mail\ContactCallBackNotification;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendEmailController extends Controller
{
    function index()
    {
        return view('frontend.contact');
    }
    function send(Request $request)
    { 
		
        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
		    'g-recaptcha-response' => 'required',
  ],
 [
      'g-recaptcha-response.required' => 'Captcha is Required',         
]);
        //$sender =   $request->email;
        $data = array(
            'name'      =>  $request->name,
            'email'     =>   $request->email,
            'company'      =>  $request->company,
            'country'      =>  $request->country,
            'phone'   =>   $request->phone,
            'message'   =>   $request->message,
			
        );

        Mail::to('sales@yesmachinery.ae')->send(new ContactMailNotification($data));
        return redirect()->back()->with('message', 'Thank you for contacting our site.We will get back to you!!!');
    }
    function sendExpressInterest(Request $request)
    {
        request()->validate([
            'name'     => 'required',
            'email'    => 'required|email',
            'phone'    => 'required',
            'product'  => 'required',
		    'g-recaptcha-response' => 'required',
  ],
 [
      'g-recaptcha-response.required' => 'Captcha is Required',         
]);
        $data = array(
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'product'   =>  $request->product,
            'category'  =>  $request->category,
            'phone'     =>  $request->phone
        );

        Mail::to('sales@yesmachinery.ae')->send(new ContactInterestNotification($data));
        return redirect()->back()->with('interest', 'Thank you for contacting our site. We will get back to you!!!');
    }
    function sendCallBack(Request $request)
    {
        request()->validate([
            'name'     => 'required',
            'email'    => 'required|email',
            'phone'    => 'required',
            'product'  => 'required',
		    'g-recaptcha-response' => 'required',
  ],
 [
      'g-recaptcha-response.required' => 'Captcha is Required',         
]);

        $data = array(
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'product'   =>  $request->product,
            'category'  =>  $request->category,
            'phone'     =>  $request->phone
        );

        Mail::to('sales@yesmachinery.ae')->send(new ContactCallBackNotification($data));
        return redirect()->back()->with('callback', 'Thank you for contacting our site. We will get back to you!!!');
    }
}
