<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Review;

class IndexController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $response['title'] = 'Custom Software Development Company | CodeRiders';
        $response['description'] = 'CodeRiders is custom software development company delivering web development and design services, mobile and desktop applications, BI, e-Commerce, CRM solutions, etc.';
        $response['carousel_admin'] = false;

        $response['target_blog']['image']['full_url'] = asset('/storage/images/fbshare/homepage.jpg');

        $response['reviews'] = Review::where('carousel_status', '1')->orderBy('id', 'asc')->get();
        $response['blogs'] = Blog::where('publish_status', '1')->orderBy('id', 'desc')->take(3)->get(['title', 'slug', 'image']);

        return view('index')->with('response', $response);
    }
}
