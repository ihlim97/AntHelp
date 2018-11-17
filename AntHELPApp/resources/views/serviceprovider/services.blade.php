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
                            <li class="breadcrumb-item"><a href="{{ route("serviceprovider.dashboard") }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Services</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-1 col-md-10 my-5">
                <div class="row">
                    <ul class="col-md-2 nav flex-column border">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('serviceprovider.dashboard')}}">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Logout</a>
                        </li>
                    </ul>
                    <div class="col-md-10">
                        <div class="border p-4">
                            <h1>Service Provider Dashboard</h1>
                            <div class="row">
                                <div class="card col">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>Account Information</strong></h5>
                                        <h6 class="card-subtitle">{{Auth::user()->name}}</h6>
                                        <p class="card-text">{{Auth::user()->email}}</p>
                                    </div>
                                </div>
                                <div class="card col">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>Active Services</strong></h5>
                                        <h1>0 service(s)</h1>
                                    </div>
                                </div>
                                <div class="card col">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>Reviews</strong></h5>
                                        <h1>300 review(s)</h1>
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