<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use App\Subscriber;
use App\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = array();

        $response['title'] =  'Software Development Company - Contact Us | CodeRiders';
        $response['description'] =  'Let\'s talk about your business needs on custom software development, web development and design, software outsourcing, IT consulting, BI solution, CRM, etc.';
        $response['target_blog']['image']['full_url'] = asset('/storage/images/fbshare/contactus.jpg');

        return view('contactUs')->with('response', $response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $request->validateWithBag('post', [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique'],
            'company' => ['required', 'max:255'],
            'message' => ['required', 'max:255'],
            'phone' => ['regex:/[0-9+\-()]{8,}/'],
            'g-recaptcha-response' => 'required|captcha',
            'jobTitle' => ['max:255'],
            'attachment' => ['required', 'file', 'max:2000000', 'mimes:jpeg,jpg,png,gif,pdf,doc,docx,ppt,pptx,txt,xls,xlsx,xlxs']
        ]);

        $path = $request->client_image->store('uploads');

        $support = Support::make([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'company' => $request->input('company'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
            'jobTitle' => $request->input('jobTitle'),
            'file' => $path,
        ] ) ;
        $support->save();

        $data = ['message' => 'This is a test!'];
        Mail::to($request->input('email'))->send(new TestEmail($data));
        /* Mail::to('arengr.1990@gmail.com')->send(new TestEmail($data)); */ //Es toxov a ashxatum, qani vor inputner chunneq

        return back();
    }


    /**
     * undocumented function
     *
     * @return void
     */
    public function subscriber(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'unique:subscribers'],
            /* 'token' => ['required'] */
        ]);

        $subscriber = Subscriber::make([
            'email'=>$request->input('email'),
            'recipient_id'=>$request->input('recipient_id') // ????
        ]);

        $subscriber->save();
        
        return back();
    }
    
}
