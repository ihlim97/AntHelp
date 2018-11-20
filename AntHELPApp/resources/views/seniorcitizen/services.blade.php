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
                <div class="card mb-5">
                    <img class="card-img-top" src="https://source.unsplash.com/600x400/?guy" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title mb-0"><strong>Hi, {{Auth::user()->name}}</strong></h4>
                        <p class="card-text">Here's all your services</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a class="text-info" href="{{route('home')}}">My Account</a></li>
                        <li class="list-group-item active"><a class="text-white" href="{{action('HomeController@services')}}">Services</a></li>
                        <li class="list-group-item"><a class="text-info" href="{{action('ReviewController@index')}}">Reviews</a></li>
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
                        <h3><b>Manage your services</b></h3>
                        <p>Get more information about your services.</p>
                    </div>
                </div>
                <div class="card no-shadow requests-tabbed-nav">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all">All ({{count($serviceRequests)}})</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="all-tab" data-toggle="tab" href="#pending">Pending ({{count($serviceRequests->where('status', 'PENDING'))}})</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="all-tab" data-toggle="tab" href="#completed">Completed ({{count($serviceRequests->where('status', 'COMPLETED'))}})</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="all-tab" data-toggle="tab" href="#accepted">Accepted ({{count($serviceRequests->where('status', 'ACCEPTED'))}})</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="all-tab" data-toggle="tab" href="#expired">Expired ({{count($serviceRequests->where('status', 'EXPIRED'))}})</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="all-tab" data-toggle="tab" href="#cancelled">Cancelled ({{count($serviceRequests->where('status', 'CANCELLED'))}})</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body tab-content">
                        <div class="tab-pane fade show active" id="all">
                            @foreach ($serviceRequests as $svc_request)
                                @include('components.servicerequestpanel', ['svc_request' => $svc_request])
                            @endforeach
                        </div>
                        <div class="tab-pane fade show" id="pending">
                            @foreach ($serviceRequests as $svc_request)
                                @if($svc_request->status == 'PENDING')
                                    @include('components.servicerequestpanel', ['svc_request' => $svc_request])
                                @endif
                            @endforeach
                        </div>
                        <div class="tab-pane fade show" id="completed">
                            @foreach ($serviceRequests as $svc_request)
                                @if($svc_request->status == 'COMPLETED')
                                    @include('components.servicerequestpanel', ['svc_request' => $svc_request])
                                @endif
                            @endforeach
                        </div>
                        <div class="tab-pane fade show" id="accepted">
                            @foreach ($serviceRequests as $svc_request)
                                @if($svc_request->status == 'ACCEPTED')
                                    @include('components.servicerequestpanel', ['svc_request' => $svc_request])
                                @endif
                            @endforeach
                        </div>
                        <div class="tab-pane fade show" id="expired">
                            @foreach ($serviceRequests as $svc_request)
                                @if($svc_request->status == 'EXPIRED')
                                    @include('components.servicerequestpanel', ['svc_request' => $svc_request])
                                @endif
                            @endforeach
                        </div>
                        <div class="tab-pane fade show" id="cancelled">
                            @foreach ($serviceRequests as $svc_request)
                                @if($svc_request->status == 'CANCELLED')
                                    @include('components.servicerequestpanel', ['svc_request' => $svc_request])
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                @if (count($serviceRequests) == 0)
                    <div class="border p-4 mt-4">
                        <div class="row">
                            <div class="col-8">
                                <h3>It's seems a bit lonely here...</h3>
                            </div>
                            <div class="col-4">
                                <img class="img-fluid" src="{{ asset('img/tumbleweed.png') }}" alt="Tumbleweed" srcset="{{ asset('svg/tumbleweed.svg') }}">
                            </div>
                        </div>
                    </div>
                @endif

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

    <div class="modal fade" id="request-confirmation" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h1 class="mt-4">Are you sure?</h1>
                    <p>This cannot be reverted once it has been submitted.</p>

                    <form class="service-confirm-form" method="POST">
                        <input type="hidden" name="id">
                        <input type="hidden" name="status">
                        <input type="hidden" name="reason">
                        <input type="hidden" name="trigger" value="manage-service-dropdown">
                        <button type="submit" class="btn btn-block btn-primary text-white">OK</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {

            $('[data-toggle="tooltip"]').tooltip();

            $(".modal#request-confirmation").on("show.bs.modal", function(e) {
                var $trigger = $(e.relatedTarget);
                $(this).find("input[name=id]").val($trigger.data("service-request-id"));
                $(this).find("input[name=status]").val($trigger.data("status"));
                $(this).find("input[name=reason]").val($trigger.data("reason"));
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
