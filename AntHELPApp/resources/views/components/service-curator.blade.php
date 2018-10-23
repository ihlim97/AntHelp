<div class="service-curator card p-5">
    <h3 class="text-center">{{$title}}</h3>
    <form class="d-flex justify-content-center flex-column flex-lg-row" action="services">
        <h3>I need</h3>
        <select name="service_type">
            <option value="cleaning">Cleaning Services</option>
            <option value="nursing">Nursing Services</option>
            <option value="meal-catering">Meal Catering Services</option>
        </select>
        <h3>at</h3>
        <select name="location">
            <option value="PJ">Petaling Jaya</option>
            <option value="BKTD">Bukit Damansara</option>
            <option value="Kepong">Kepong</option>
        </select>
        <h3>on</h3>
        <select name="time">
            <option value="20181010 13:00">Today, 1:00pm</option>
            <option value="20181010 14:00">Today, 2:00pm</option>
        </select>
        <button type="submit" class="btn btn-success mt-3 mt-lg-0 text-white py-2 px-3">Search</button>
    </form>
</div>