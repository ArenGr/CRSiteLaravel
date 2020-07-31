<?php

namespace App\Http\Controllers;

use App\Review;

class CustomDevelopementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response['title'] =  'Custom Software Development Services | CodeRiders';
        $response['description'] =  'Delivery of high level custom software development services, including enterprise solutions and product development, project recovery, software upgrade, etc';
        $response['carousel_admin'] = false;
        $response['target_blog']['image']['full_url'] = asset('/storage/images/fbshare/services.jpg');

        $response['reviews'] = Review::where('carousel_status', '1')->orderBy('id', 'asc')->get();

        return view('customDevelopement')->with('response', $response);
    }
}
