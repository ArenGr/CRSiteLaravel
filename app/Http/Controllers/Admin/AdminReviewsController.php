<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/pages/review')->with('allReviews', Review::findAll('asc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/pages/reviewCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pageTitle = "Create New Review";

        $request->validate([
            'clientName' => ['required','max:255'],
            'clientPosition' => ['required', 'max:255'],
            'clientCompany' => ['required', 'max:255'],
            'review' => ['required', 'max:255'],
            'clientImage' => ['required', 'mimes:jpg,jpeg,png', 'max:2000000']
        ]);

        $path = $request->client_image->store('uploads');
        if ($request->hasFile('clientImage') && $request->file('clientImage')->isValid()) {
            $review = Review::make([
                'name' => $request->input('clientName'),
                'position' => $request->input('clientPosition'),
                'company' => $request->input('clientCompany'),
                'review' => $request->input('clientReview'),
                'image' => $path
            ]);
            $review->save();
        }
        return redirect('admin/pages/reviewCreate')->with('pageTitle', $pageTitle);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = Review::findOrFail($id);

        $data['pageTitle'] = "Update Review";
        $data['review'] = $review;

        return view('admin/pages/reviewCreate')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        Storage::delete($review->image);

        $request->validate([
            'clientName' => ['required','max:255'],
            'clientPosition' => ['required', 'max:255'],
            'clientCompany' => ['required', 'max:255'],
            'review' => ['required', 'max:255'],
            'clientImage' => ['required', 'mimes:jpg,jpeg,png', 'max:2000000']
        ]);

        $path = $request->client_image->store('uploads');
        if ($request->hasFile('clientImage') && $request->file('clientImage')->isValid()) {
            $review->clientName = $request->input('clientName');
            $review->clientPosition = $request->input('clientPosition');
            $review->clientCompany = $request->input('clientCompany');
            $review->clientReview = $request->input('clientReview');
            $review->clientImage = $path;
            $review->save();
        }
        return view('admin/pages/review');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Storage::delete(Review::findOrFail($id)->client_image);
        Review::destroy($id);
    }

    /**
     * undocumented function
     *
     * @return void
     */
    public function changeReviewCarouselStatus($id, $status)
    {
        $review = Review::findOrFail($id);
        $review->carousel_status = $status;
        $review->save();
    }
}
