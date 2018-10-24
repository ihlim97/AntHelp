@extends('layouts.app', ['showCurator' => true])

@section('header')
    @component('components.banner', ['imagePath'=> 'img/banners/handhold.jpg', 'bannerType'=> 'banner-medium'])
        @slot('serviceCurator')
            @component('components.service-curator', ['title' => 'Refine your search'])                              
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
                <div class="d-flex align-items-center">
                    <p class="m-0 mr-3">SORT BY</p>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Popularity
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Price</a>
                            <a class="dropdown-item" href="#">Rating</a>
                        </div>
                    </div>
                </div>
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
                                    'freshness' => 'NEW!',
                                    'category' => $service->category,
                                    'rating' => '5.0',
                                    'description' => $service->description,
                                    'rate' => $service->rate,
                                    'rate_type' => $service->rate_type,
                                    'link' => "services/".($service->id)
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

@endsection

@section('footer')
    @component('components.footer')
        
    @endcomponent
@endsection