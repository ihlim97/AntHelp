@extends('layouts.app')

@section('header')
    @component('components.banner', ['imagePath'=> 'img/banners/handhold.jpg', 'bannerType'=> 'banner-short', 'serviceCurator'=>''])
    @endcomponent
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-1 col-md-10 my-5">
                <div class="row">
                    <ul class="col-md-2 nav flex-column border">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('serviceprovider.dashboard')}}">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">My Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">My Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout">Logout</a>
                        </li>
                    </ul>
                    <div class="col-md-10">
                        <div class="border p-4">
                            <h1>Senior Citizen Dashboard</h1>
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