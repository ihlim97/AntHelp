<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ServiceRequest;
use App\Review;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $senior = Auth::user();
        $serviceRequests = $senior->serviceRequests()->get();
        $reviews = Review::where('user_id', $senior->id)->get();
        return view('home')->with(["serviceRequests" => $serviceRequests, "reviewCount" => count($reviews)]);
    }

    public function services() {
        $senior = Auth::user();
        $serviceRequests = $senior->serviceRequests()->get()->sortByDesc('updated_at');

        foreach($serviceRequests as $serviceRequest) {
            if (Carbon::parse($serviceRequest->start_date_time)->lt(Carbon::now())) {
                if($serviceRequest->status == "PENDING") {
                    $serviceRequest->status = "EXPIRED";
                    $serviceRequest->save();
                }
            }
        }
        return view("seniorcitizen.services")->with(["serviceRequests" => $serviceRequests]);
    }
}
