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
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
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
                    <img class="card-img-top" src="https://source.unsplash.com/600x400/?girl" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title mb-0"><strong>Hi, {{Auth::user()->name}}</strong></h4>
                        <p class="card-text">{{Auth::user()->address}}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item active"><a class="text-white" href="{{route('home')}}">My Account</a></li>
                        <li class="list-group-item"><a class="text-info" href="{{route('serviceprovider.servicerequests')}}">Services Requests</a></li>
                        <li class="list-group-item"><a class="text-info" href="{{route('serviceprovider.servicerequests')}}">Reviews</a></li>
                        <li class="list-group-item">
                            <a class="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <strong>{{ __('Logout') }}</strong>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-9">
                <div class="row mb-3">
                    <div class="col-8"><h3>Account Overview</h3></div>
                </div>
                <div class="card no-shadow">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info">My Info</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body tab-content">
                        <div class="tab-pane fade show active" id="info">
                            <div class="row">

                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><strong>Account Information</strong></h5>
                                            <h6 class="card-subtitle">{{Auth::user()->name}}</h6>
                                            <p class="card-text">{{Auth::user()->email}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><strong>My Services</strong></h5>
                                            <div class="d-flex align-items-baseline">
                                                {{-- <h1>{{$services_count}}</h1> --}}
                                                <h6 class="ml-2">service(s)</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><strong>Service Requests</strong></h5>
                                            <div class="d-flex align-items-baseline">
                                                {{-- <h1>{{$requests_count}}</h1> --}}
                                                <h6 class="ml-2">request(s)</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection

@section('footer')
    @component('components.footer')

    @endcomponent
@endsection
