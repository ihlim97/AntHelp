@extends('layouts.app')

@section('header')
    @component('components.banner', ['imagePath'=> 'img/banners/handhold.jpg', 'bannerType'=> 'banner-short'])
        @slot('serviceCurator')
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
                        <li class="breadcrumb-item"><a href="{{route('services.index')}}">Services</a></li>
                        <li class="breadcrumb-item active">{{$service->category}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col col-md-8">
                <div class="card no-shadow">
                    <img class="card-img-top" src="https://source.unsplash.com/1440x300/?{{urlencode($service->category)}}" alt="{{$service->category}}">
                    <div class="card-body">
                        <h1><strong>{{$service->category}}</strong></h1>
                        <p class="card-subtitle">{{$service->description}}</p>
                    </div>
                </div>
            </div>
            <div class="col col-md-4">
                <ul class="list-group mb-3 mt-3 mt-md-0">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Service Provider</h6>
                            <small class="text-muted">Who will provide the service</small>
                        </div>
                        <span class="text-muted">{{App\ServiceProvider::find($service->user_id)->name}}</span>  
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Rate</h6>
                            <small class="text-muted">The rate for the service</small>
                        </div>
                        <span class="text-muted">RM {{$service->rate}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Basis</h6>
                            <small class="text-muted">How the charges are calculated</small>
                        </div>
                        <span class="text-muted">{{$service->rate_type}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <div>
                            <h6 class="my-0">Start Date/Time</h6>
                            <small class="text-muted">When the service starts</small>
                        </div>
                        <span class="text-right">{{Request('startDateTime')}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <div>
                            <h6 class="my-0">End Date/Time</h6>
                            <small class="text-muted">When the service ends</small>
                        </div>
                        <span class="text-right">{{Request('endDateTime')}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <div>
                            <h6 class="my-0">Location</h6>
                            <small class="text-muted">The job location</small>
                        </div>
                        <span class="text-right">{{Request('location')}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                    <span>Total (MYR)</span>
                    <strong>RM {{$service->rate * 1}}</strong>
                    </li>
                </ul>

                <form action="{{ action('ServiceRequestController@store') }}" class="hidden" method="POST">
                    @csrf
                    <input type="hidden" name="startDateTime" value="{{request('startDateTime')}}">
                    <input type="hidden" name="endDateTime" value="{{request('endDateTime')}}">
                    <input type="hidden" name="location" value="{{request('location')}}">
                    <button class="btn btn-primary btn-lg btn-block mb-5 text-white" type="submit">Request for the Service</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @component('components.footer')
        
    @endcomponent
@endsection