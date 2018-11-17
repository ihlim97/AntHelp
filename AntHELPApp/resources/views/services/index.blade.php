@extends('layouts.app', ['showCurator' => true])

@section('header')
    @component('components.banner', ['imagePath'=> 'img/banners/handhold.jpg', 'bannerType'=> 'banner-medium'])
        @slot('serviceCurator')
            @component('components.service-curator', [
                'title' => 'Refine your search', 
                'service_type' => request('service_type'), 
                'location' => request('location'), 
                'time' => request('time'),
                'service_categories' => $service_categories])                              
            @endcomponent
        @endslot
    @endcomponent
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-between my-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Services</li>
                    </ol>
                </nav>
                <form class="d-flex align-items-center sorter">
                    <p class="m-0 mr-3">SORT BY</p>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            {{request('sort') ?? "Latest"}}
                        </button>
                        <ul class="dropdown-menu pointer" aria-labelledby="dropdownMenuButton">
                            <li class="dropdown-item"><a href="{{action("ServicesController@index", ['service_type' => request('service_type'), 'location' => request('location'), 'time' => request('time'), 'sort' => 'Latest'])}}">Latest</a></li>
                            <li class="dropdown-item"><a href="{{action("ServicesController@index", ['service_type' => request('service_type'), 'location' => request('location'), 'time' => request('time'), 'sort' => 'Price'])}}">Price</a></li>
                        </ul>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
        @if (count($services) > 0)
                <div class="col-12 mt-3">
                    <p>Yay! We found {{count($services)}} service(s)</p>
                </div>
                <div class="col-12 cards-container mb-3">
                    <div class="row">
                        @foreach ($services as $service)
                            <div class="col-12 col-lg-4">
                                @component("components.servicecard", [
                                    'freshness' => $service->freshness,
                                    'category' => $service->category,
                                    'rating' => '5.0',
                                    'description' => $service->description,
                                    'rate' => $service->rate,
                                    'rate_type' => $service->rate_type,
                                    'link' => action("ServicesController@show", ['id' => $service->id,'location' => request('location'), 'time' => request('time')])
                                ])         
                                @endcomponent
                            </div>
                            {{$services->links()}}
                        @endforeach
                    </div>
                </div>
        @else
            <div class="col text-center my-5">
                <h4 class="text-muted">No Services Yet!</h4>
            </div>
        @endif
        </div>
    </div>

    <script>
        // Date picker for the service curator
        $("input.daterange").daterangepicker({
            "ranges" : {
                'Today' : [moment(), moment()],
                'Tomorrow' : [moment().add(1, 'days'), moment().add(1, 'days')]
            },
            "showDropdowns": true,
            "startDate": "{{request('time')}}".split(" - ")[0] || moment(),
            "endDate": "{{request('time')}}".split(" - ")[1] || moment().add(1, 'days'),
            "minDate": moment(),
            "opens": "center",
            "locale": {
                "format": "DD/MM/YYYY"
            } 
        });
    </script>
@endsection

@section('footer')
    @component('components.footer')
        
    @endcomponent
@endsection