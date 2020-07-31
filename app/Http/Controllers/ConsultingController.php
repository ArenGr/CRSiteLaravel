<?php

namespace App\Http\Controllers;

class ConsultingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response['title'] = 'Software Development Outsourcing, IT Consulting | CodeRiders';
        $response['description'] = 'We can completely outsource your software development project or provide IT consulting to make better decisions.';
        $response['target_blog']['image']['full_url'] = asset('/storage/images/fbshare/services.jpg');

        return view('consulting')->with('response', $response);
    }
}
