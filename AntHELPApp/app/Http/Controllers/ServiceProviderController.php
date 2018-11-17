<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class ServiceProviderController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth:serviceprovider');
    }

    public function index() {
        return view("serviceprovider.index");
    }

    public function services() {
        $serviceProvider = Auth::user();

        return view("serviceprovider.services")->with(["services" => $serviceProvider->services]);
    }

}
