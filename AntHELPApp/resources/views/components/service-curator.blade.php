<div class="service-curator card p-3 py-5 mt-5">
    <h3 class="text-center">{{$title}}</h3>
    <div>
        <form action="services" autocomplete="off" novalidate>
            <div class="row">
                <div class="form-group col-12 col-sm-3 p-0">
                    <h3 class="flex-shrink-0">I need</h3>
                    <div class="flex-fill">
                        <select class="form-control" name="service_type" required data-required="Please select a service">

                            @if (request("service_type"))
                                <option value disabled hidden>Select a service</option>
                                <option value="all">All</option>
                                
                                @foreach ($service_categories as $category)

                                    @if(request("service_type") == $category)
                                        <option selected value="{{$category}}">{{$category}}</option>
                                    @else
                                        <option value="{{$category}}">{{$category}}</option>
                                    @endif

                                @endforeach
                            @else
                                <option value disabled hidden selected>Select a service</option>
                                <option value="all">All</option>

                                @foreach ($service_categories as $category)
                                    <option value="{{$category}}">{{$category}}</option>
                                @endforeach
                            @endif
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="form-group col-12 col-sm-3 p-0">
                    <h3>at</h3>
                    <div class="flex-fill">
                        <input type="text" class="form-control" name="location" placeholder="e.g. Petaling Jaya" value="{{$location ?? ''}}" required data-required="Please enter your location">
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="form-group col-12 col-sm-4 p-0">
                    <h3>on</h3>
                    <div class="flex-fill">
                        <input type="text" class="form-control daterange" placeholder="Select a convenient time" value="{{$time ?? ''}}" required data-required="Please choose a date">
                        <div class="invalid-feedback"></div>
                        <div class="hidden">
                            <input type="hidden" name="startDateTime">
                            <input type="hidden" name="endDateTime">
                        </div>
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