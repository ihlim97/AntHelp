@extends('layouts.app')

@section('header')
    @component('components.banner', ['imagePath'=> 'img/banners/handhold.jpg', 'bannerType'=> 'banner-medium', 'serviceCurator'=>''])
    @endcomponent
@endsection

@section('content')

    <div class="container">
        <h1>You are a service provider!</h1>
    </div>

@endsection

@section('footer')
    @component('components.footer')
        
    @endcomponent
@endsection