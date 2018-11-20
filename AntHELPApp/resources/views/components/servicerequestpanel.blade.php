<div class="card border-left-0 border-right-0 border-top-0 no-shadow">
    <div class="card-body d-flex align-items-sm-center flex-column flex-sm-row">
        <img src="https://source.unsplash.com/100x100/?{{urlencode($svc_request->service->category)}}" alt="">
        <div class="p-3">
            @if($svc_request->status == 'COMPLETED')
                <span class="badge badge-success">{{$svc_request->status}}</span>
            @endif
            @if($svc_request->status == 'ACCEPTED')
                    <div class="badge badge-info">{{$svc_request->status}}</div>
                @endif
            @if($svc_request->status == 'DECLINED' || $svc_request->status == 'CANCELLED')
                <span class="badge badge-danger" data-toggle="tooltip" data-placement="top" title="{{$svc_request->reason ?? 'Service Provider Declined'}}">{{$svc_request->status}}</span>
            @endif
            @if($svc_request->status == 'EXPIRED')
                <span class="badge badge-secondary" data-toggle="tooltip" data-placement="top" title="Service provider did not respond in time.">{{$svc_request->status}}</span>
            @endif
            @if($svc_request->status == 'PENDING')
                <span class="badge badge-warning" data-toggle="tooltip" data-placement="top" title="Waiting for confirmation from Service provider.">{{$svc_request->status}}</span>
            @endif

            <h6><strong>{{$svc_request->service->category}}</strong></h6>
            <p class="card-subtitle">Updated {{$svc_request->updated_at->diffForHumans()}}</p>
        </div>
        <div class="d-flex justify-content-between justify-content-sm-end align-items-center ml-md-auto">
            <div class="p-3">
                <p class="card-subtitle"><b>Start Date/Time</b></p>
                <p class="card-subtitle">{{Carbon\Carbon::parse($svc_request->start_date_time)->format('M j, H:i A')}}</p>
                <p class="card-subtitle mt-sm-2"><b>Duration</b></p>
            <p class="card-subtitle">{{ $svc_request->duration}}</p>
            </div>
            <div class="p-3">
                <p class="card-subtitle"><b>Service Provider</b></p>
                <p class="card-subtitle">{{ $svc_request->service->serviceProvider["name"] ?? "Unknown" }}</p>
                <p class="card-subtitle mt-sm-2"><b>Cost</b></p>
                <p class="text-primary card-subtitle">RM {{ $svc_request->total}}</p>
            </div>
            <div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="fas fa-cog"></span>
                    </button>

                    @if ($svc_request->status == 'PENDING')
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="review.html">Edit</a>
                            <div class="dropdown-divider"></div>
                            <button class="dropdown-item" data-toggle="modal" data-target="#request-confirmation" data-service-request-id="{{$svc_request->id}}" data-status="CANCELLED" data-reason="Cancelled By User">Cancel The Request</button>
                        </div>
                    @endif

                    @if ($svc_request->status == 'EXPIRED' || $svc_request->status == 'DECLINED' || $svc_request->status == 'CANCELLED')
                        <div class="dropdown-menu">
                            <form action="{{route('serviceRequests.destroy', ['id' => $svc_request->id])}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="dropdown-item pointer" type="submit">Delete</a>
                            </form>
                        </div>
                    @endif

                    @if ($svc_request->status == 'ACCEPTED')
                        <div class="dropdown-menu">
                            <button class="dropdown-item" data-toggle="modal" data-target="#request-confirmation" data-service-request-id="{{$svc_request->id}}" data-status="COMPLETED">Mark The Request as Complete</button>
                        </div>
                    @endif

                    @if ($svc_request->status == 'COMPLETED')
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{action('ReviewController@index')}}">Review</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
