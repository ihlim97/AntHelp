@extends('layouts.app')

@section('header')
    @component('components.banner', ['imagePath'=> 'https://source.unsplash.com/1440x500', 'bannerType'=> 'banner-short', 'serviceCurator' => ''])
    @endcomponent
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 my-5">
            <div class="card">
                <div class="card-header text-center py-3">
                    <img src="{{asset('svg/logo-primary.svg')}}" width="150" alt="AntHELP Logo">
                </div>

                <div class="card-body">
                    <div class="text-center">
                        <h2 class="pb-3"><strong>Login</strong></h2>
                    </div>

                    <form method="POST" action="{{ route('serviceprovider.login.submit') }}">
                        @csrf

                        <div class="form-group">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{__('Password')}}" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                        </div>

                        <div class="form-group">
                            
                            <button type="submit" class="btn btn-primary w-100 mt-3">
                                <strong>{{ __('LOGIN') }}</strong>
                            </button>

                            <div class="text-right">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    <strong>{{ __('Forgot Your Password?') }}</strong>
                                </a>
                            </div>

                            <hr>

                            <div class="text-center">
                                <p>Don't have an account? <a href="{{route('serviceprovider.register')}}">Sign up today</a></p>
                            </div>
                            
                        </div>
                    </form>
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