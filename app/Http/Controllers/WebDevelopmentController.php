<?php

namespace App\Http\Controllers;

class WebDevelopmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response['title'] = 'Web development and Design Services | CodeRiders';
        $response['description'] = 'We deliver web development and design services, including website migration and integration, migration to cloud, compliance with SEO standards, etc.';
        $response['target_blog']['image']['full_url'] = asset('/storage/images/fbshare/services.jpg');

        return view('webDevelopment')->with('response', $response);
    }
}
