<?php

namespace App\Http\Controllers;

class ServicesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response['title'] = 'Web, Mobile and Custom Software Development Services | CodeRiders';
        $response['description'] = 'Professional software development services offering web/mobile development and design, custom software development, software outsourcing and IT consulting.';
        $response['target_blog']['image']['full_url'] = asset('/storage/images/fbshare/services.jpg');

        return view('services')->with('response', $response);
    }
}
