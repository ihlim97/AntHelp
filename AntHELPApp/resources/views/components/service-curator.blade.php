<div class="service-curator card p-3 py-5 mt-5">
    <h3 class="text-center">{{$title}}</h3>
    <div>
        <form action="services">
            <div class="row">
                <div class="form-group col-12 col-sm-4 p-0">
                    <h3 class="flex-shrink-0">I need</h3>
                    <select class="form-control" name="service_type">
                        <option value="cleaning">Cleaning Services</option>
                        <option value="nursing">Nursing Services</option>
                        <option value="meal-catering">Meal Catering Services</option>
                    </select>
                </div>
                <div class="form-group col-12 col-sm-3 p-0">
                    <h3>at</h3>
                    <select class="form-control" name="location">
                        <option value="PJ">Petaling Jaya</option>
                        <option value="BKTD">Bukit Damansara</option>
                        <option value="Kepong">Kepong</option>
                    </select>
                </div>
                <div class="form-group col-12 col-sm-3 p-0">
                    <h3>on</h3>
                    <input type="text" class="form-control daterange" name="time" placeholder="Select a convenient time">
                </div>
                <div class="col-12 col-sm-2 text-right p-0 pl-sm-3">
                    <button type="submit" class="btn btn-success text-white w-100">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>