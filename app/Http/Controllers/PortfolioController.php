<?php

namespace App\Http\Controllers;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response['title'] = 'Portfolio, Software Development Case Studies | CodeRiders';
        $response['description'] = 'Explore CodeRiders\' expertise in delivering quality software development services for SMB\'s and enterprises worldwide.';
        $response['target_blog']['image']['full_url'] = asset('/storage/images/fbshare/portfolio.jpg');

        return view('portfolio')->with('response', $response);
    }
}
