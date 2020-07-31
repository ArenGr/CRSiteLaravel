<?php

namespace App\Http\Controllers;

class MobileDevelopmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response['title'] = 'Mobile App Development Services | CodeRiders';
        $response['description'] = 'Experts in mobile app development services such as native and cross-platform mobile development, wire framing and custom design architecture, UI/UX, etc.';
        $response['target_blog']['image']['full_url'] = asset('/storage/images/fbshare/services.jpg');

        return view('mobileDevelopment')->with('response', $response);
    }
}
