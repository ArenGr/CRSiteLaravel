<?php

namespace App\Http\Controllers;

class ProcessesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response['title'] = 'Software Development Process and Approach | CodeRiders';
        $response['description'] = 'Explore most successful software development processes and methodologies to improve business efficiency. We offer Industry standard engagement models.';
        $response['target_blog']['image']['full_url'] = asset('/storage/images/fbshare/process.jpg');

        return view('processes')->with('response', $response);
    }
}
