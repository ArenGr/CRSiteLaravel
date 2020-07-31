<?php

namespace App\Http\Controllers;

class BigDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response['title'] = 'Big Data & Analytics Software Solutions | CodeRiders';
        $response['description'] = 'We provide big data and analytics software development solutions including data visualization, segmentation & clustering, and predictive analytics.';
        $response['target_blog']['image']['full_url'] = asset('/storage/images/fbshare/solutions.jpg');

        return view('bigData')->with('response', $response);
    }
}
