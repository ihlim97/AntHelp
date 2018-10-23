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
        @if (count($services) > 0)
                <div class="col-12">
                    <p>Yay! We found {{count($services)}} service(s)</p>
                </div>
                <div class="col-12 cards-container">
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