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

                <div class="card no-shadow mt-3">
                    <div class="card-body">
                        <h3><strong>Reviews</strong></h3>
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

                <form class="service-request-form" method="POST" novalidate>
                    <div class="form-group">
                        <textarea class="form-control" name="notes" cols="5" rows="3" placeholder="Leave a note to the service provider"></textarea>
                    </div>
                    @csrf
                    <input type="hidden" name="service_id" value="{{$service->id}}">
                    <input type="hidden" name="startDateTime" value="{{request('startDateTime')}}">
                    <input type="hidden" name="endDateTime" value="{{request('endDateTime')}}">
                    <input type="hidden" name="location" value="{{request('location')}}">
                    <button class="btn btn-primary btn-lg btn-block mb-5 text-white" type="submit">Request for the Service</button>
                </form>
                <script>                    
                    $(function() {
                        $('form.service-request-form').on("submit", function() {
                            $this = $(this);

                            var obj = {};
                            var $inputs = $this.find("textarea, input");

                            $inputs.each(function(i, e) {
                                obj[$(e).attr("name")] = $(e).val();
                            });

                            $.ajax({
                                method: "POST",
                                url: "{{ route('servicerequest.store') }}",
                                data: obj
                            }).done(function(data, textStatus, jqXHR) {
                                console.log("server received data");
                                if(data.success == true) {
                                    $(".modal#request-confirmation").modal('show');
                                    console.log(data.service_request);
                                } 
                            }).fail(function(jqXHR, textStatus, errorThrown) {
                                if(jqXHR.status == 401) {
                                    console.log(jqXHR);
                                    $(".modal#login").modal('show');
                                }
                            });
                            
                            return false;
                        });

                        $(".modal#request-confirmation").on('hidden.bs.modal', function() {
                            window.location.href = "{{action('HomeController@index')}}";
                        });
                    });
                </script>
            </div>
        </div>
    </div>

    <div class="modal fade" id="login" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h1 class="mt-4">Login to your account</h1>
                    <p>Sorry, but we need you to login first.</p>
                    <form class="login-modal-form" novalidate>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="e.g. john.doe@example.com" required data-required="Please enter your email." data-re="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}" data-re-msg="The email you entered is not valid">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="your password" required data-required="Please enter your password.">
                            <div class="invalid-feedback"></div>
                        </div>
                        <p class="invalid-feedback text-center form-master-feedback"></p>
                        <button class="btn btn-primary btn-block" type="submit">OK</button>
                    </form>
                </div>
            </div>
        </div>
        <script>
            
            $("form.login-modal-form").on("submit", function() {
                $this = $(this);
                $this.find("p.form-master-feedback").text("").show();

                if(!validateFormFields($this)) {
                    return false;
                } else {

                    var obj = {};
                    var $inputs = $this.find("textarea, input");
                    $inputs.removeClass("is-feedback");
                    $inputs.each(function(i, e) {
                        obj[$(e).attr("name")] = $(e).val();
                    });

                    $.ajax({
                        method: "POST",
                        url: "{{route('login')}}",
                        data: JSON.stringify(obj),
                        contentType: "application/json",
                        headers: {
                            'X-CSRF-TOKEN' : '{{@csrf_token()}}'
                        }
                    }).done(function(data, textStatus, jqXHR) {
                        window.location.reload();
                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        $inputs.addClass("is-invalid");
                        $this.find("p.form-master-feedback").text(jqXHR.responseJSON.message).show();
                        console.log(jqXHR);
                    });
                    return false;
                }
            });
        </script>
    </div>

    <div class="modal fade" id="request-confirmation" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="big-red-tick fas fa-check"></div>
                    <h1 class="mt-4">Awesome!</h1>
                    <p>Your request has been submitted! Please hang on while our service provider, <b>{{App\ServiceProvider::find($service->user_id)->name}}</b> gets back to you.</p>
                    <a href="{{action('HomeController@index')}}" class="btn btn-block btn-primary text-white">OK</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @component('components.footer')
        
    @endcomponent
@endsection