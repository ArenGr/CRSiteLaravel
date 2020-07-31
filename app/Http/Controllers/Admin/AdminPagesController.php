<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Review;

class AdminPagesController extends Controller
{
    /**
     * undocumented function
     *
     * @return void
     */
    public function index()
    {
        $response = array();

        $response['reviews'] = Review::findCarouselReviews();
        return view('admin/pages/carousel')->with('response', $response);
    }
}
