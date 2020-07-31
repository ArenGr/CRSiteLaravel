<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response['title'] = 'Software Development Company - Why Us | CodeRiders';
        $response['description'] = 'We deliver timely and quality custom software development services. Our development team provides valuable solutions to enterprises and other businesses.';
        $response['clients']  = array(
            0 => array(
                'text'  => 'CRM and an e-mail marketing system for Worldsoft AG',
                'image' => '/public/images/worldsoft-crm-solution.png',
                'href'  => 'https://worldsoft-wbs.info/'
            ),
            1 => array(
                'text'  => 'Shopping engine and marketplace for Footmall',
                'image' => '/public/images/footmall-e-commerce-solution.png',
                'href'  => 'https://www.footmall.se/'
            ),
            2 => array(
                'text'  => 'YouTube Analytics, Optimization and Tracking SaaS application for Rankify',
                'image' => '/public/images/rankify-analytics-optimization-tracking-saas-app.png',
                'href'  => 'https://novelconcept.org/rankify-analytics/'
            ),
            3 => array(
                'text'  => 'E-commerce Solution with Real Time Dashboards for Abramov Software',
                'image' => '/public/images/portfolio/abramov-software-e-commerce-solution.png',
                'href'  => 'https://www.abramov-software.de/'
            ),
            4 => array(
                'text'  => 'Private Family Cloud Software for Lifestyle Management',
                'image' => '/public/images/portfolio/logo_dwel2.png',
                'href'  => 'https://www.dwel.online/'
            )
        );
        $response['blogs'] = Blog::where('publish_status', '1')->orderBy('id', 'desc')->take(2)->get(['title', 'slug', 'image']);
        $response['target_blog']['image']['full_url'] = asset('/storage/images/fbshare/company.jpg');

        return view('company')->with('response', $response);
    }
}
