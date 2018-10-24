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
                    <select class="form-control" name="time">
                        <option value="20181010 13:00">Today, 12:00pm</option>
                        <option value="20181010 13:00">Today, 1:00pm</option>
                        <option value="20181010 14:00">Today, 2:00pm</option>
                        <option value="20181010 15:00">Today, 3:00pm</option>
                        <option value="20181010 16:00">Today, 4:00pm</option>
                        <option value="20181010 17:00">Today, 5:00pm</option>
                        <option value="20181010 18:00">Today, 6:00pm</option>
                        <option value="20181010 19:00">Today, 7:00pm</option>
                        <option value="20181010 20:00">Today, 8:00pm</option>
                        <option value="20181010 21:00">Today, 9:00pm</option>
                    </select>
                </div>
                <div class="col-12 col-sm-2 text-right p-0 pl-sm-3">
                    <button type="submit" class="btn btn-success text-white w-100">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>