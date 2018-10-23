<div class="card service-card mb-3">
    <div class="row no-gutters">
        <div class="col-12">
            <img src="https://source.unsplash.com/500x400/?maid" alt="" class="card-img">
        </div>
        <div class="col">
            <div class="card-body">
                <div class="row no-gutters">
                    <div class="col-12 col-sm-7 card-info">
                        <h6 class="card-subtitle text-info">{{$freshness}}</h6>
                        <h3 class="card-title text-dark"><b>{{$category}}</b></h3>
                        <div class="rating text-warning">
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span>
                            {{$rating}}
                        </div>
                    </div>
                    <div class="col-12 col-sm-5 pricing text-right">
                        <h4 class="text-danger m-0"><b>RM{{$rate}}</b></h4>
                        <h6 class="text-dark">{{$rate_type}}</h6>
                    </div>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="row no-gutters">
                        <div class="col-12 d-flex justify-content-between">
                            <p>{{$description}}</p>
                            <a href="{{$link}}" class="btn btn-lg btn-success cta text-white">Book Now</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>