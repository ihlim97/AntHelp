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
                <form class="service-request-form" method="POST" novalidate data-basis="{{$service->rate_type}}" data-rate="{{$service->rate}}">
                    @csrf

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

                        <li class="list-group-item list-group-item-success">
                            <div class="row no-gutter">
                                <div class="col">
                                    <div>
                                        <h6 class="my-0">Start Date/Time</h6>
                                        <small class="text-muted">When the service starts</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="position-relative">
                                        <input type="text" name="startDateTime" class="form-control daterangepickersingle px-1 text-right" required placeholder="Select a date" data-required="Please select a start date/time">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item list-group-item-success">
                            <div class="row no-gutter">
                                <div class="col">
                                    <div>
                                        <h6 class="my-0">End Date/Time</h6>
                                        <small class="text-muted">When the service ends</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="position-relative">
                                        <input type="text" name="endDateTime" class="form-control daterangepickersingle px-1 text-right" required placeholder="Select a date" data-required="Please select an end date/time">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item {{ (request('location') == null) ? 'list-group-item-success' : '' }}">
                            <div class="row no-gutter">
                                <div class="col">
                                    <div>
                                        <h6 class="my-0">Location</h6>
                                        <small class="text-muted">The job location</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div>
                                        @if(request('location') !== null)
                                            <p class="text-right">{{Request('location')}}</p>
                                            <input type="hidden" name="location" value="{{request('location')}}">
                                        @else
                                            <input type="text" name="location" class="form-control px-1 text-right" required placeholder="Your location" data-required="Please enter your location">
                                            <div class="invalid-feedback"></div>
                                        @endif
                                    </div>
                                </div>
                            </div>


                        </li>

                        @if ($service->rate_type == 'HOURLY')
                            <li class="list-group-item d-flex justify-content-between">
                                <div>
                                    <h6 class="my-0">Duration</h6>
                                    <small class="text-muted">How long is the service</small>
                                </div>
                                <span class="duration"></span>
                            </li>
                        @else
                        @endif

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (MYR)</span>
                            <strong><span class="total"></span></strong>
                        </li>

                    </ul>

                    <div class="form-group">
                        <textarea class="form-control" name="notes" cols="5" rows="3" placeholder="Leave a note to the service provider"></textarea>
                    </div>

                    <input type="hidden" name="service_id" value="{{$service->id}}">
                    <input type="hidden" name="total">
                    <input type="hidden" name="duration">
                    <input type="hidden" name="startDateTime">
                    <input type="hidden" name="endDateTime">
                    <button class="btn btn-primary btn-lg btn-block mb-5 text-white" type="submit">Request for the Service</button>
                </form>
                <script>
                    $(function() {
                        var durationInfo = (function() {

                            var startDateTime = null;
                            var endDateTime = null;
                            var duration = 0;

                            var basis = $('form.service-request-form').data("basis");
                            var $input = $('form.service-request-form').find("input[name=duration]");
                            var $label = $('form.service-request-form').find("span.duration");

                            events.on("startDateTimeChanged", setStartDateTime);
                            events.on("endDateTimeChanged", setEndDateTime);

                            function setStartDateTime(e) {
                                startDateTime = e;
                                setDuration();
                            }

                            function setEndDateTime(e) {
                                endDateTime = e;
                                setDuration();
                            }

                            function setDuration() {
                                if(basis == "HOURLY") {
                                    if(startDateTime && endDateTime) {
                                        duration = getBillableHours(moment(startDateTime, "DD/MM/YYYY HH:mm"), moment(endDateTime, "DD/MM/YYYY HH:mm"));
                                        if (duration <= 0) {
                                            duration = 1;
                                        }
                                        events.emit("durationAvailable", duration);
                                        render();
                                    }
                                } else {
                                    if(startDateTime && endDateTime) {
                                        var mstart = moment(startDateTime, "DD/MM/YYYY HH:mm");
                                        var mend = moment(endDateTime, "DD/MM/YYYY HH:mm");

                                        duration = moment.duration(mend.diff(mstart));

                                        if(duration.asDays() == 0) {
                                            duration.add(1, "days");
                                        }
                                        events.emit("durationAvailable", duration.asDays());
                                        render();
                                    }
                                }
                            }

                            function render() {
                                $input.val(duration);
                                if (basis == "HOURLY") {
                                    $label.text(duration + " hour(s)");
                                } else {
                                    $label.text(duration + " Day(s)");
                                }
                            }
                        })();

                        var totalInfo = (function() {
                            var total = 0;
                            var rate =  $('form.service-request-form').data("rate");

                            var $input = $('form.service-request-form').find("input[name=total]");
                            var $label = $('form.service-request-form').find("span.total");

                            events.on("durationAvailable", calculateTotal);

                            function render() {
                                $label.text("RM " + total.toFixed(2));
                                $input.val(total);
                            }

                            function calculateTotal(e) {
                                total = rate * e;
                                render();
                            }

                        })();

                        var startDatePicker = (function() {
                            var $picker = $('form.service-request-form input[name=startDateTime]');
                            var $input = $('form.service-request-form input[name=startDateTime]');

                            var currentTime = "";

                            $picker.on("hide.daterangepicker", setCurrentTime);
                            $picker.on("apply.daterangepicker", setCurrentTime);

                            function render() {
                                $input.val(currentTime);
                            }

                            function setCurrentTime(e) {
                                if (typeof e === "string") {
                                    currentTime = e;
                                } else {
                                    currentTime = $(e.target).val();
                                }
                                events.emit("startDateTimeChanged", currentTime);
                                render();
                                console.log("startDateTimeChanged");
                            }
                        })();

                        var endDatePicker = (function() {
                            var $picker = $('form.service-request-form input[name=endDateTime]');
                            var $input = $('form.service-request-form input[name=endDateTime]');

                            var currentTime = "";

                            $picker.on("hide.daterangepicker", setCurrentTime);
                            $picker.on("apply.daterangepicker", setCurrentTime);

                            function render() {
                                $input.val(currentTime);
                            }

                            function setCurrentTime(e) {
                                if (typeof e === "string") {
                                    currentTime = e;
                                } else {
                                    currentTime = $(e.target).val();
                                }
                                events.emit("endDateTimeChanged", currentTime);
                                render();
                                console.log("endDateTimeChanged");
                            }
                        })();

                        $('form.service-request-form').on("submit", function() {
                            $this = $(this);
                            if(!validateFormFields($this)) {
                                return false;
                            } else {
                                var obj = {};
                                var $inputs = $this.find("textarea, input");

                                $inputs.each(function(i, e) {
                                    obj[$(e).attr("name")] = $(e).val();
                                });
                            }

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
