@extends('layouts.app')

@section('header')
    @component('components.banner', ['imagePath'=> 'img/banners/handhold.jpg', 'bannerType'=> 'banner-short', 'serviceCurator'=>''])
    @endcomponent
@endsection

@section('content')
    <div class="container-fluid bg-white">
		<div class="row">
            <div class="col p-0">
                <div class="container">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 bg-white">
                            <li class="breadcrumb-item"><a href="{{action('ServiceProviderController@index')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{action('ServiceProviderController@services')}}">Services</a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <img class="card-img-top" src="https://source.unsplash.com/600x400/?guy" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title mb-0"><strong>Hi, {{Auth::user()->name}}</strong></h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a class="text-info" href="{{route('serviceprovider.dashboard')}}">My Account</a></li>
                        <li class="list-group-item"><a class="text-info" href="{{route('serviceprovider.services')}}">Services</a></li>
                        <li class="list-group-item"><a class="text-info" href="{{route('serviceprovider.services')}}">Services Requests</a></li>
                        <li class="list-group-item active">
                            <a class="text-white" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <strong>{{ __('Logout') }}</strong>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <h1>Create a service</h1>
                @include("inc.messages")

                <div class="card">
                    <form action="{{action('ServicesController@store')}}" method="POST" autocomplete="off" class="card-body" novalidate>
                        @csrf

                        <div class="form-group">
                            <label for="category">Category of Service</label>
                            <input type="text" class="form-control" name="category" placeholder="e.g. Cleaning Services" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description of Service</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="e.g. Best service quality..." required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="rate">Rate</label>
                            <input type="number" class="form-control decimal" name="rate" placeholder="e.g. 50.00" onkeyup="formatCurrency(this)" required>
                        </div>
                        <div class="form-group">
                            <label for="rate_type">Rate Basis</label>
                            <select class="custom-select" name="rate_type" required>
                                <option selected value="HOURLY">Hourly</option>
                                <option value="DAILY">Daily</option>
                                <option value="SQUARE_FEET">Per Square Feet</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="location" placeholder="e.g. Petaling Jaya" required>
                        </div>
                        {{-- <div class="form-group">
                            <p class="mb-2">Upload a picture for your service</p>
                            <div class="form-group custom-file">
                                <input type="file" class="custom-file-input" name="photo">
                                <label class="custom-file-label" for="photo">Choose file</label>
                            </div>
                        </div> --}}
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @component('components.footer')
        
    @endcomponent
@endsection