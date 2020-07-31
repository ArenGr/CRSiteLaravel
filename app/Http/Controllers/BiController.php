<?php

namespace App\Http\Controllers;

class BiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response['title'] =  'Business Intelligence Solution Development I BI | CodeRiders';
        $response['description'] =  'We offer BI solutions like forecasting and analysis, structured data, optimization, budget planning, financial reporting, data visualization and many more.';
        $response['target_blog']['image']['full_url'] = asset('/storage/images/fbshare/solutions.jpg');

        return view('bi')->with('response', $response);
    }
}
