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
                            <li class="breadcrumb-item">Reviews</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-3">
                <div class="card mb-5">
                    <img class="card-img-top" src="https://source.unsplash.com/600x400/?girl" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title mb-0"><strong>Hi, {{Auth::guard('serviceprovider')->user()->name}}</strong></h4>
                        <p class="card-text">{{Auth::guard('serviceprovider')->user()->address}}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a class="text-info" href="{{route('serviceprovider.dashboard')}}">My Account</a></li>
                        <li class="list-group-item"><a class="text-info" href="{{route('serviceprovider.services')}}">Services</a></li>
                        <li class="list-group-item"><a class="text-info" href="{{route('serviceprovider.servicerequests')}}">Services Requests</a></li>
                        <li class="list-group-item active"><a class="text-white" href="{{action('ReviewController@indexForServiceProvider')}}">Reviews</a></li>
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
                    <div class="col-12">
                        @include('inc.messages')
                        <h3><b>Your Reviews</b></h3>
                        <p>Interact with your customers!</p>
                    </div>
                </div>
                <div class="card no-shadow">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="info-tab" data-toggle="tab" href="#all">All</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body tab-content">
                        <div class="tab-pane fade show active" id="all">
                            <div class="row">
                                <div class="col">
                                    @foreach($reviews as $review)
                                        <form action="{{action('ReviewController@update', ['id' => $review->id])}}" class="review-card mb-2" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="review border rounded pt-3 px-3">
                                                <div class="row border-bottom">
                                                    <div class="col">
                                                        <div class="d-flex justify-content-between">
                                                            <h3>{{ $review->serviceRequest->service['category']}}</h3>
                                                            <p class="text-muted">Service completed {{$review->serviceRequest['updated_at']->diffForHumans()}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="info-block my-3">
                                                            <div class="row">
                                                                <div class="col-sm-3 mb-2">
                                                                    <div class="profile">
                                                                        <img src="https://source.unsplash.com/30x30" alt="Profile Img">
                                                                        <p><strong>{{ $review->user->name }}</strong></p>
                                                                    </div>
                                                                    @if ($review->user_comment != null && $review->user_rating != null)
                                                                        <small class="text-muted">Reviewed {{$review->updated_at->diffForHumans()}}</small>
                                                                    @endif
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    @if ($review->user_comment != null || $review->user_comment != '')
                                                                        <p><strong>{{$review->user_comment == '' ? 'User did not provide a feedback' : $review->user_comment}}</strong></p>
                                                                    @else
                                                                        <textarea name="user_comment" cols="30" rows="1" class="form-control" placeholder="Write a review"></textarea>
                                                                    @endif
                                                                    <div class="d-flex justify-content-between mt-2">
                                                                        @include('components.rating')
                                                                        @if ($review->user_comment == null && $review->user_rating == null)
                                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row border-top">
                                                    <div class="col-sm-12">
                                                        <div class="info-block mt-2">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p class="text-muted mb-0">Service provider feedback</p>
                                                                    @if ($review->service_provider_reply == null)
                                                                        @if (Auth::guard('serviceprovider')->check())
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" placeholder="Enter your feedback here" name="service_provider_reply">
                                                                                <div class="input-group-append">
                                                                                    <button class="btn btn-primary" type="submit">Submit</button>
                                                                                </div>
                                                                            </div>
                                                                        @else
                                                                            <p><strong>Service provider has not provided any feedback yet.</strong></p>
                                                                        @endif
                                                                    @else
                                                                        <p><strong>{{$review->service_provider_reply}}</strong></p>
                                                                    @endif
                                                                </div>
                                                                <div class="col-sm-3 mb-3">
                                                                    <div class="profile mt-2">
                                                                        <img src="https://source.unsplash.com/30x30" alt="Profile Img">
                                                                        <p><strong>{{ $review->serviceRequest->service->serviceProvider['name'] }}</strong></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
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
                            <h2><strong>Need somebody to help with chores?</strong></h2>
                            <p>AntHELP offers a wide range of services for your every need from cleaning the house to buying to shopping. Request a service now!</p>
                            <a href="{{action('ServicesController@index')}}" class="btn btn-primary">Browse services</a>
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
