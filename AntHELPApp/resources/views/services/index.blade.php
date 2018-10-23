@extends('layouts.app')

@section('content')

    @if (count($services) > 0)

        <div class="row">
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
                    @endforeach
                </div>

            </div>
        </div>
        

    @else
        <h4 class="text-muted">No Services Yet!</h4>
    @endif

@endsection