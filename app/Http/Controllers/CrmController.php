<?php

namespace App\Http\Controllers;

class CrmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response['title'] =  'CRM Solution Development | CodeRiders';
        $response['description'] =  'We offer Customer Relationship Management development services including mobile CRM, marketing automation, customer experience management, etc.';
        $response['target_blog']['image']['full_url'] = asset('/storage/images/fbshare/solutions.jpg');

        return view('crm')->with('response', $response);
    }
}
