<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;
use App\ServiceRequest;

class ServiceRequestController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth')->only(["store"]);
    //     $this->middleware('auth:serviceprovider')->except(["show"]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        if (!Auth::guard("web")->check()) {
            return response()->json(['success' => false, "error_msg" => "Unauthenticated"], 401);
        }

        $startDateTime = DateTime::createFromFormat("d/m/Y G:i", $request->startDateTime);
        $endDateTime = DateTime::createFromFormat("d/m/Y G:i", $request->endDateTime);

        $svcReq = new ServiceRequest;
        $svcReq->service_id = $request->service_id;
        $svcReq->user_id = Auth::user()->id;
        $svcReq->start_date_time = $startDateTime;
        $svcReq->end_date_time = $endDateTime;
        $svcReq->status = "PENDING";
        $svcReq->note = "Test";
        $svcReq->save();

        $svcReqFromDB = ServiceRequest::find($svcReq->id);
        if($svcReqFromDB !== null) {
            return response()->json(['success' => true, "error_msg" => "", "service_request" => $svcReqFromDB]);
        } else {
            return response()->json(['success' => false, "error_msg" => "Object not found in database."], 500);
        }

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
        //
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
