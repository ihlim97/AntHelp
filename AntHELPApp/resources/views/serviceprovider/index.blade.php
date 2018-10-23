@extends('layouts.app')

@section('header')
    @component('components.banner', ['imagePath'=> 'https://source.unsplash.com/1440x600', 'bannerType'=> 'banner-short', 'serviceCurator'=>''])
    @endcomponent
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-1 col-md-10 my-5">
                <div class="row">
                    <ul class="col-md-2 nav flex-column border">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Logout</a>
                        </li>
                    </ul>
                    <div class="col-md-10">
                        <div class="border">
                            <h1>My dashboard</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    @component('components.footer')
        
    @endcomponent
@endsection