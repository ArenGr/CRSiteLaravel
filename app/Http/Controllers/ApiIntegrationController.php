<?php

namespace App\Http\Controllers;

class ApiIntegrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response['title'] = 'Integration Software | CodeRiders';
        $response['description'] = 'We provide high-quality software integration services like social media APIs, legacy system integrations, order processing,data integration, mobile APIs.';
        $response['target_blog']['image']['full_url'] = asset('/storage/images/fbshare/solutions.jpg');

        return view ('apiIntegration')->with('response', $response);
    }
}

