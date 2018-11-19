<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\ServiceProvider;
use App\ServiceRequest;
use App\Review;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ServiceProviderController extends Controller
{

    public function __construct() {
        $this->middleware('auth:serviceprovider');
    }

    public function index() {
        $serviceProvider = Auth::user();

        // return $serviceProvider->serviceRequests()->get();
        // return $serviceRequests = ServiceRequest::find(1);
        return view("serviceprovider.index")->with(["services_count" => count($serviceProvider->services), "requests_count" => count($serviceProvider->serviceRequests()->get())]);
    }

    public function services() {
        $serviceProvider = Auth::user();
        return view("serviceprovider.services")->with(["services" => $serviceProvider->services]);
    }

    public function serviceRequests() {
        $serviceProvider = Auth::user();

        $serviceRequests = $serviceProvider->serviceRequests()->get();

        foreach($serviceRequests as $serviceRequest) {
            if (Carbon::parse($serviceRequest->start_date_time)->lessThan(Carbon::now())) {
                if($serviceRequest->status == "PENDING") {
                    $serviceRequest->status = "EXPIRED";
                    $serviceRequest->save();
                }
            }
        }
        return view("serviceprovider.servicerequests")->with(["serviceRequests" => $serviceRequests]);
    }
}
