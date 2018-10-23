@extends('layouts.app', ["showCurator" => false])

@section('content')
    <h1 class="mt-4">Create a service</h1>
    <form action="{{action('ServicesController@store')}}" method="POST" autocomplete="off">
        @csrf

        <div class="form-group">
            <label for="category">Category of Service</label>
            <input type="email" class="form-control" name="category" placeholder="e.g. Cleaning Services" required>
        </div>
        <div class="form-group">
            <label for="description">Description of Service</label>
            <textarea class="form-control" name="description" rows="3" placeholder="e.g. Best service quality..." required></textarea>
        </div>
        <div class="form-group">
            <label for="rate_type">Rate Basis</label>
            <select class="custom-select" name="rate_type" required>
                <option selected value="HOURLY">Hourly</option>
                <option value="DAILY">Daily</option>
                <option value="SQUARE_FEET">Per Square Feet</option>
            </select>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" name="city" placeholder="e.g. Petaling Jaya" required>
        </div>
        <div class="form-group">
            <p class="mb-2">Upload a picture for your service</p>
            <div class="form-group custom-file">
                <input type="file" class="custom-file-input" name="photo">
                <label class="custom-file-label" for="photo">Choose file</label>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
@endsection