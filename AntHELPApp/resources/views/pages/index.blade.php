@extends('layouts.app')

@section('header')
    @component('components.banner', ['imagePath'=> 'img/banners/handhold.jpg', 'bannerType'=> ''])
        @slot('serviceCurator')
            @component('components.service-curator', ['title' => 'How can we help you today?'])                              
            @endcomponent

            <div class="col-12 text-center text-white mt-5">
                <h1>Are you a service provider?</h1>
                <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#login-modal">
                    Post Services FREE
                </button>
            </div>
        @endslot
    @endcomponent
@endsection

@section('content')
    <div class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col">
                    @component('components.slider');
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @component('components.footer')
        
    @endcomponent
@endsection