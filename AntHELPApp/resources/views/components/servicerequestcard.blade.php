<div class="card service-card-2 mb-3">
    <div class="row no-gutters">
        <div class="col-12 col-lg-4">
            <div class="card-body pb-0">
                @if($svc_request->status == 'PENDING')
                    <div class="badge badge-warning">{{$svc_request->status}}</div>
                @endif
                @if($svc_request->status == 'COMPLETED')
                    <div class="badge badge-success">{{$svc_request->status}}</div>
                @endif
                @if($svc_request->status == 'ACCEPTED')
                    <div class="badge badge-info">{{$svc_request->status}}</div>
                @endif
                @if($svc_request->status == 'DECLINED')
                    <div class="badge badge-danger">{{$svc_request->status}}</div>
                @endif
                <h3 class="card-title text-dark">{{App\Service::find($svc_request->service_id)->category}}</h3>
                <p class="card-text">{{App\Service::find($svc_request->service_id)->description}}</p>
            </div>
        </div>
        <div class="col-12 col-lg-8">
            <div class="row">
                <div class="col-12 col-sm-9">
                    <div class="row mt-4 mb-2 metadata-wrapper">
                        <div class="col-4">
                            <div class="metadata">
                                <p class="card-subtitle text-muted">Requested By</p>
                                <h5 class="card-title text-dark">{{ App\User::find($svc_request->user_id)->name}}</h5>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="metadata">
                                <p class="card-subtitle text-muted">Start Date</p>
                                <h5 class="card-title text-dark">{{Carbon\Carbon::parse($svc_request->start_date_time)->toFormattedDateString()}}</h5>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="metadata">
                                <p class="card-subtitle text-muted">End Date</p>
                                <h5 class="card-title text-dark">{{Carbon\Carbon::parse($svc_request->end_date_time)->toFormattedDateString()}}</h5>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="metadata">
                                <p class="card-subtitle text-muted">Duration</p>
                                <h5 class="card-title text-dark">{{$svc_request->duration}}</h5>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="metadata">
                                <p class="card-subtitle text-muted">Worth</p>
                                <h5 class="card-title text-success">RM {{$svc_request->total}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card-body text-right">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="fas fa-cog"></span>
                            </button>

                            <div class="dropdown-menu">
                                @if ($svc_request->status == 'PENDING')
                                    <a class="dropdown-item" data-toggle="modal" data-target="#request-confirmation" data-service-request-id="{{$svc_request->id}}" data-status="ACCEPTED">Accept</a>
                                    <a class="dropdown-item" data-toggle="modal" data-target="#request-confirmation" data-service-request-id="{{$svc_request->id}}" data-status="DECLINED">Decline</a>
                                @else
                                    <a class="dropdown-item disabled">Accept</a>
                                    <a class="dropdown-item disabled">Decline</a>
                                @endif
                                <div class="dropdown-divider"></div>

                                @if ($svc_request->status != 'COMPLETED')
                                    <a class="dropdown-item disabled">Review</a>
                                @else
                                    <a class="dropdown-item disabled" href="review.html">Review</a>
                                @endif

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Notes: {{$svc_request->note}}</li>
    </ul>
</div>
