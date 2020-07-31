<?php

namespace App\Http\Controllers;

class SolutionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response['title'] = 'Business Software Solutions | CodeRiders';
        $response['description'] = 'Custom software solutions for business. Creating e-Commerce, BI, CRM solutions, integrating APIs, developing big data analytics and real time solutions.';
        $response['target_blog']['image']['full_url'] = asset('/storage/images/fbshare/solutions.jpg');

        return view('solutions')->with('response', $response);
    }
}
