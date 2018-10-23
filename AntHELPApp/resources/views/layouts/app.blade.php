<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        
        <title>{{env('APP_NAME')}}</title>
        <script src="{{asset('js/app.js')}}"></script>

    </head>
    <body>
        <div class="header">
            @yield('header')
        </div>

        <div class="main-content">
            @yield('content')
        </div>

        <div class="footer">
            @yield('footer')
        </div>
    </body>
</html>