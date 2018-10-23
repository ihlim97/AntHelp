@extends('layouts.app')

@section('header')
    @component('components.banner', ['imagePath'=> 'img/banners/handhold.jpg', 'bannerType'=> 'banner-short', 'serviceCurator'=>''])
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
                        <h2 class="pb-3"><strong>Service Provider Signup</strong></h2>
                    </div>

                    <form method="POST" action="{{ route('serviceprovider.register') }}" novalidate>
                        @csrf

                        <input type="hidden" name="is_service_provider" value="true">

                        <div class="form-group">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="{{ __('Name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('E-mail') }}" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <input id="my_kad_no" type="text" class="form-control{{ $errors->has('my_kad_no') ? ' is-invalid' : '' }}" name="my_kad_no" value="{{ old('my_kad_no') }}" placeholder="{{ __('NRIC') }}" required>
                            @if ($errors->has('my_kad_no'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('my_kad_no') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <input id="mobile_no" type="text" class="form-control{{ $errors->has('mobile_no') ? ' is-invalid' : '' }}" name="mobile_no" value="{{ old('mobile_no') }}" placeholder="{{ __('Mobile Number') }}" required>
                            @if ($errors->has('mobile_no'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('mobile_no') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" placeholder="{{ __('Address') }}" required>
                            @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{__('Create a password')}}" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{__('Confirm password')}}" required>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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