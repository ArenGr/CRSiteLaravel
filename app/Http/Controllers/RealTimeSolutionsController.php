<?php

namespace App\Http\Controllers;

class RealTimeSolutionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response['title'] = 'Real-Time Reporting with Business Dashboards | CodeRiders';
        $response['description'] = 'Our real-time dashboards cover all your visualization dreams including infrastructure-wide visibility, smart visualizations, metric transforms, etc.';
        $response['target_blog']['image']['full_url'] = asset('/storage/images/fbshare/solutions.jpg');

        return view('realTimeSolutions')->with('response', $response);
    }
}
