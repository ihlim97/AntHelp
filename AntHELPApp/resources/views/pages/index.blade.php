@extends('layouts.app')

@section('header')
    @component('components.banner', ['imagePath'=> 'img/banners/handhold.jpg', 'bannerType'=> ''])
        @slot('serviceCurator')
            @component('components.service-curator', ['title' => 'How can we help you today?'])                              
            @endcomponent
            
            <div class="col-12 text-center text-white mt-5">
                <h1>Are you a service provider?</h1>
                <a class="btn btn-outline-light text-white" href="/serviceprovider">
                    Post Services FREE
                </a>
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

    <div class="container">
        <div class="row mt-5 my-sm-5 flex-row align-items-center">
            <div class="col-12 col-sm-6 my-5">
                <h2><b>Get your business on track. <br class="d-none d-sm-block">Sign up as a service provider.</b></h2>
                <p>Join the fastest growing and best services platform for senior citizens in Malaysia! Supercharge your services business by catering to a more elder audience. Enjoy better earnings and so much more benefits.</p>
                <a href="/serviceprovider" class="btn btn-primary">Get a free service provider account</a>
            </div>
            <div class="col-12 col-sm-6 p-0 p-sm-3">
                <img src="https://source.unsplash.com/600x400/?business"  alt="" class="img-fluid rounded-corners-sm">
            </div>
        </div>
    </div>

    <div class="content bg-light">
        <div class="container">
            <div class="row">
                <div class="col my-5">
                    <h4>What's happening at AntHELP</h4>

                    <div class="row mt-4">
                        @foreach ($articles as $article)
                            <div class="col-12 col-sm-6 col-md-3 mb-3">
                                @component('components.articlecard', [
                                    'articleImg' => $article['articleImg'],
                                    'articleTitle' => $article['articleTitle'],
                                    'articleDesc' => $article['articleDesc']
                                ])
                                @endcomponent
                            </div>
                        @endforeach
                    </div>

                    <div class="text-center mt-4"><a href="" class="btn btn-secondary">View More</a></div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Date picker for the service curator
        $("input.daterange").daterangepicker({
            "ranges" : {
                'Today' : [moment(), moment()],
                'Tomorrow' : [moment().add(1, 'days'), moment().add(1, 'days')]
            },
            "showDropdowns": true,
            "startDate": moment(),
            "endDate": moment(),
            "minDate": moment(),
            "opens": "center",
            "locale": {
                "format": "DD/MM/YYYY"
            } 
        });
    </script>
@endsection

@section('footer')
    @component('components.footer')
        
    @endcomponent
@endsection