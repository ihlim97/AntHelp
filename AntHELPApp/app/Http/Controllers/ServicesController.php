<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ServicesController extends Controller
{
    public function __construct() {
        $this->middleware('auth:serviceprovider')->except(["index", "show"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $services = new Service;

        if(request()->has('sort')) {
            if (request('sort') == "Latest") {
                $services = $services::orderBy("updated_at", "desc");
            } else if (request('sort') == "Price") {
                $services = $services::orderBy("rate", "asc");
            }
        }

        $services = $services->paginate(9)->appends([
            'sort' => request('sort')
        ]);

        return view("services.index")->with(['services' => $services, 'service_categories' => $this->getCategories()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("services.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
            'description' => 'required',
            'rate' => 'required',
            'rate_type' => 'required',
            'location' => 'required'
        ]);

        // Create Service
        $service = new Service();
        $service->user_id = Auth::User()->id;
        $service->category = $request->input('category');
        $service->description = $request->input('description');
        $service->rate = $request->input('rate');
        $service->rate_type = $request->input('rate_type');
        $service->location = $request->input('location');
        $service->save();

        return redirect()->action('ServiceProviderController@index')->with(['success' => 'Service has been successfully created.']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        // $startDateTime = Carbon::createFromFormat('d/m/Y H:i', $request->startDateTime);
        // $endDateTime = Carbon::createFromFormat('d/m/Y H:i', $request->endDateTime);

        $service = Service::find($id);
        return view("services.show")->with(["service" => $service]);
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

    public static function getCategories() {
        $services = Service::all();
        $categories = [];

        foreach($services as $service) {
            $categories[] = $service->category;
        }

        return array_unique($categories);
    }

    /**
     * Returns the billable working hours for AntHELP
     * @param Carbon $start the start datetime
     * @param Carbon $end the end datetime
     * @return decimal
     */
    public static function getBillableHours($start, $end) {

        $minsWorked = 0;

        // Define work range
        $workingHrs_start = 9;
        $workingHrs_end = 19;

        // For looping
        $current = $start;

        // Check if current time is in the working hour range
        while($current->lessThanOrEqualTo($end)) {
            if($current->hour >= $workingHrs_start && $current->hour <= $workingHrs_end) {
                $minsWorked++;
            }

            $current->addMinute();
        }

        return $minsWorked / 60;
    }
}
