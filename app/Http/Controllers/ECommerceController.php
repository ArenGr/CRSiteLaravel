<?php

namespace App\Http\Controllers;

class ECommerceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response['title'] =  'E-commerce Solutions Development | CodeRiders';        
        $response['description'] =  'Custom e-Commerce solutions development for small, mid-sized businesses and enterprises. Experts in website design and development, eCommerce module, etc.';
        $response['target_blog']['image']['full_url'] = asset('/storage/images/fbshare/solutions.jpg');

        return view('eCommerce')->with('response', $response);
    }
}
