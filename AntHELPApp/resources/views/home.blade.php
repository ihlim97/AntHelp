@extends('layouts.app')

@section('header')
    @component('components.banner', ['imagePath'=> 'img/banners/handhold.jpg', 'bannerType'=> 'banner-short', 'serviceCurator'=>''])
    @endcomponent
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 my-4">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
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