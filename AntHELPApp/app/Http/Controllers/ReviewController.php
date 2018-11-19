<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Review;
use App\ServiceRequest;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Get all eligible requests (must be completed)
        $reviewableRequests = ServiceRequest::where('status', 'COMPLETED')->get();

        // loop each service request
        // check if there's a review for the request
        foreach ($reviewableRequests as $svcReq) {

            $review = Review::where('request_id', $svcReq->id)->first();
            if($review == null) {
                $newReview = new Review;
                $newReview->user_id = $svcReq->user_id;
                $newReview->service_provider_id = $svcReq->service->serviceProvider['id'];
                $newReview->request_id = $svcReq->id;
                $newReview->save();
            }

        }

        $reviews = null;

        if (Auth::guard('web')->check()) {
            $reviews = Review::where('user_id', Auth::User()->id)->get();
        } else if(Auth::guard('serviceprovider')->check()) {
            $reviews = Review::where('service_provider_id', Auth::User()->id)->get();
        } else {
            return redirect()->route('login');
        }

        return view('review.seniorindex')->with(["reviews" => $reviews]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        $review = Review::find($id);

        if(Auth::guard('web')->check()) {
            $review->user_comment = $request->user_comment;
            $review->user_rating = $request->user_rating;
            $review->save();
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
