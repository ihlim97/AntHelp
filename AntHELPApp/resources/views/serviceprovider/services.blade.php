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
                            <li class="breadcrumb-item active" aria-current="page">Services</li>
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
                        <p class="card-text">Here's all your services</p>
                    </div>
                    <ul class="list-group list-group-flush account-nav">
                        <li class="list-group-item"><a class="text-info" href="{{route('serviceprovider.dashboard')}}">My Account</a></li>
                        <li class="list-group-item active"><a class="text-white" href="{{route('serviceprovider.services')}}">Services</a></li>
                        <li class="list-group-item"><a class="text-info" href="{{route('serviceprovider.servicerequests')}}">Services Requests <span class="badge badge-pill badge-primary">{{$pending_count}}</span></a></li>
                        <li class="list-group-item"><a class="text-info" href="{{action('ReviewController@indexForServiceProvider')}}">Reviews</a></li>
                        <li class="list-group-item">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <strong>{{ __('Logout') }}</strong>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row mb-3">
                    <div class="col-8"><h3>Services Overview</h3></div>
                    <div class="col-4 text-right"><a href="{{action('ServicesController@create')}}" class="btn btn-secondary">Create a new Service</a></div>
                </div>
                <div class="card no-shadow">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all">All ({{count($services)}})</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="archive-tab" data-toggle="tab" href="#archived">Archived</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body tab-content">
                        <div class="tab-pane fade show active" id="all">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Rate</th>
                                        <th>Basis</th>
                                        <th>Location</th>
                                        <th>Last Update</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{$service->category}}</td>
                                            <td>{{$service->rate}}</td>
                                            <td>{{$service->rate_type}}</td>
                                            <td>{{$service->location}}</td>
                                            <td>{{$service->updated_at}}</td>
                                            <td>Edit</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="archived">
                            <h5 class="card-title">Nothing archived yet</h5>
                        </div>
                    </div>
                </div>

                <div class="border p-4 mt-4">
                    @if (count($services) == 0)
                        <div class="row">
                            <div class="col-8">
                                <h3>It's seems a bit lonely here...</h3>
                            </div>
                            <div class="col-4">
                                <img class="img-fluid" src="{{ asset('img/tumbleweed.png') }}" alt="Tumbleweed" srcset="{{ asset('svg/tumbleweed.svg') }}">
                            </div>
                        </div>
                    @else
                        <p><strong>Hello from backend!</strong></p>
                        {{$services}}
                    @endif
                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col bg-white">

                <div class="container my-5">
                    <div class="row">
                        <div class="col-8">
                            <h2><strong>Have another service?</strong></h2>
                            <p>If you have an idea in mind for a service, let us help you reach a wider and more mature audience! Simply register your service with AntHELP today!</p>
                            <a href="{{action('ServicesController@create')}}" class="btn btn-primary">Add a service</a>
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
