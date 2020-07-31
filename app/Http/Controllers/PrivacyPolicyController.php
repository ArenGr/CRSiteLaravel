<?php

namespace App\Http\Controllers;

class PrivacyPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response['title'] = 'Privacy Policy | CodeRiders';
        $response['description'] = 'CodeRiders privacy policies regarding the collection, use, and disclosure of personal data when you use our service.';

        return view('privacyPolicy')->with('response', $response);
    }
}
