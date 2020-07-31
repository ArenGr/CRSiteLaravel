<?php

namespace App\Http\Controllers;

class IndustriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response['title'] = 'Software Solutions for All Types of Industries | CodeRiders';
        $response['description'] = 'Find your Healthcare, Legal, Finance, Entertainment, Retail and Wholesale software development provider at CodeRiders!';
        $response['target_blog']['image']['full_url'] = asset('/storage/images/fbshare/industries.jpg');

        return view('industries')->with('response', $response);
    }
}
