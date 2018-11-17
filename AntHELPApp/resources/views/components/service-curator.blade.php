<div class="service-curator card p-3 py-5 mt-5">
    <h3 class="text-center">{{$title}}</h3>
    <div>
        <form action="services" autocomplete="off" novalidate>
            <div class="row">
                <div class="form-group col-12 col-sm-4 p-0">
                    <h3 class="flex-shrink-0">I need</h3>
                    <div class="flex-fill">
                        <select class="form-control" name="service_type" required data-required="Please select a service">
                            <option value disabled hidden {{ request('service_type') ?? "selected"}}>Select a service</option>
                            <option value="all">All</option>
                            @foreach ($service_categories as $category)
                                <option value="{{$category}}">{{$category}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="form-group col-12 col-sm-3 p-0">
                    <h3>at</h3>
                    <div class="flex-fill">
                        <input type="text" class="form-control" name="location" placeholder="e.g. Petaling Jaya" value="{{$location ?? ''}}" required data-required="Please select a location">
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="form-group col-12 col-sm-3 p-0">
                    <h3>on</h3>
                    <div class="flex-fill">
                        <input type="text" class="form-control daterange" name="time" placeholder="Select a convenient time" value="{{$time ?? ''}}" required>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <input type="hidden" name="sort" value="Latest">  
                <div class="col-12 col-sm-2 text-right p-0 pl-sm-3">
                    <button type="submit" class="btn btn-success text-white w-100">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>