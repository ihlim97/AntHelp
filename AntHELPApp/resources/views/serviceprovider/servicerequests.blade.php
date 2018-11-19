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
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a class="text-info" href="{{route('serviceprovider.dashboard')}}">My Account</a></li>
                        <li class="list-group-item"><a class="text-info" href="{{route('serviceprovider.services')}}">Services</a></li>
                        <li class="list-group-item active"><a class="text-white" href="{{route('serviceprovider.servicerequests')}}">Services Requests</a></li>
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
                    <div class="col-8"><h3>Service Requests Overview</h3></div>
                </div>
                <div class="card no-shadow">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all">All ({{count($serviceRequests)}})</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="archive-tab" data-toggle="tab" href="#pending">Pending ({{count($serviceRequests->where('status', 'PENDING'))}})</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="archive-tab" data-toggle="tab" href="#accepted">Accepted ({{count($serviceRequests->where('status', 'ACCEPTED'))}})</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="archive-tab" data-toggle="tab" href="#declined">Declined ({{count($serviceRequests->where('status', 'DECLINED'))}})</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="archive-tab" data-toggle="tab" href="#expired">Expired ({{count($serviceRequests->where('status', 'EXPIRED'))}})</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body tab-content">
                        <div class="tab-pane fade show active" id="all">
                            {{-- Sorter --}}
                            {{-- <form class="d-flex align-items-center justify-content-end sorter mb-3">
                                <p class="m-0 mr-3">SORT BY</p>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        {{request('sort') ?? "Latest"}}
                                    </button>
                                    <ul class="dropdown-menu pointer" aria-labelledby="dropdownMenuButton">
                                        <li class="dropdown-item"><a href="{{action("ServicesController@index", ['service_type' => request('service_type'), 'location' => request('location'), 'time' => request('time'), 'sort' => 'Latest'])}}">Latest</a></li>
                                        <li class="dropdown-item"><a href="{{action("ServicesController@index", ['service_type' => request('service_type'), 'location' => request('location'), 'time' => request('time'), 'sort' => 'Price'])}}">Price</a></li>
                                    </ul>
                                </div>
                            </form> --}}

                            @foreach ($serviceRequests as $svc_request)
                                @include('components.servicerequestcard', ['svc_request' => $svc_request])
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="pending">
                            @if (count($serviceRequests->where('status', 'PENDING')) > 0)
                                @foreach ($serviceRequests as $svc_request)
                                    @if ($svc_request->status == "PENDING")
                                        @include('components.servicerequestcard', ['svc_request' => $svc_request])
                                    @endif
                                @endforeach
                            @else
                                <h5 class="text-center">No pending service requests yet.</h5>
                            @endif
                        </div>
                        <div class="tab-pane fade" id="accepted">
                            @if (count($serviceRequests->where('status', 'ACCEPTED')) > 0)
                                @foreach ($serviceRequests as $svc_request)
                                    @if ($svc_request->status == "ACCEPTED")
                                        @include('components.servicerequestcard', ['svc_request' => $svc_request])
                                    @endif
                                @endforeach
                            @else
                                <h5 class="text-center">No accepted service requests yet.</h5>
                            @endif
                        </div>
                        <div class="tab-pane fade" id="declined">
                            @if (count($serviceRequests->where('status', 'DECLINED')) > 0)
                                @foreach ($serviceRequests as $svc_request)
                                    @if ($svc_request->status == "DECLINED")
                                        @include('components.servicerequestcard', ['svc_request' => $svc_request])
                                    @endif
                                @endforeach
                            @else
                                <h5 class="text-center">No declined service requests yet.</h5>
                            @endif
                        </div>
                        <div class="tab-pane fade" id="expired">
                            @if (count($serviceRequests->where('status', 'EXPIRED')) > 0)
                                @foreach ($serviceRequests as $svc_request)
                                    @if ($svc_request->status == "EXPIRED")
                                        @include('components.servicerequestcard', ['svc_request' => $svc_request])
                                    @endif
                                @endforeach
                            @else
                                <h5 class="text-center">No expired service requests yet.</h5>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="border p-4 mt-4">
                    @if (count($serviceRequests) == 0)
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
                        {{$serviceRequests}}
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

    <div class="modal fade" id="request-confirmation" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h1 class="mt-4">Are you sure?</h1>
                    <p>The request cannot be reverted once it has been submitted.</p>

                    <form class="service-confirm-form" method="POST">
                        <input type="hidden" name="id">
                        <input type="hidden" name="status">
                        <input type="hidden" name="trigger" value="manage-service-dropdown">
                        <button type="submit" class="btn btn-block btn-primary text-white">OK</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $(".modal#request-confirmation").on("show.bs.modal", function(e) {
                var $trigger = $(e.relatedTarget);
                $(this).find("input[name=id]").val($trigger.data("service-request-id"));
                $(this).find("input[name=status]").val($trigger.data("status"));
            });

            $("form.service-confirm-form").on("submit", function() {
                var obj = {};
                var $inputs = $(this).find("textarea, input");
                $inputs.each(function(i, e) {
                    obj[$(e).attr("name")] = $(e).val();
                });

                $.ajax({
                    headers : {
                        'X-CSRF-TOKEN' : '{{ @csrf_token() }}'
                    },
                    method: "PUT",
                    data: obj,
                    url: '/serviceRequests/' + $(this).find("input[name=id]").val()
                }).done(function() {
                    window.location.reload();
                }).fail(function() {
                    alert("failed");
                });
                return false;
            });
        });

    </script>
@endsection

@section('footer')
    @component('components.footer')

    @endcomponent
@endsection
