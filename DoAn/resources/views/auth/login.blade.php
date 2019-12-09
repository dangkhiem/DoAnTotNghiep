@extends('layouts.app')
<link rel="stylesheet" href="css/loginStyle.css">
<link rel="stylesheet" href="css/bodyStyle.css">
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sign In</h5>
                        <form class="form-signin" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-label-group">
                                <input type="email" id="inputEmail" class="form-control
@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email address" required
                                       autofocus>
                                <label for="inputEmail">Email address</label>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="inputPassword" class="form-control
@error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Password" required
                                       autofocus>
                                <label for="inputPassword">Password</label>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="customCheck1"
                                       name="remember"
                                        {{ old('remember') ? 'checked' : '' }} >
                                <label class="custom-control-label" for="customCheck1">Remember password</label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in
                            </button>
                            {{--                            @if (Route::has('password.request'))--}}
                            {{--                                <a class="btn btn-link" href="{{ route('password.request') }}">--}}
                            {{--                                    {{ __('Forgot Your Password?') }}--}}
                            {{--                                </a>--}}
                            {{--                            @endif--}}
                            <hr>
                            <div class="mx-auto text-center text-dark"><span>You don't have an account?</span></div>
                            <div class="mx-auto text-center text-dark"><a href="{{route('register')}}"><strong>Register now</strong></a></div>
{{--                            <div class="form-label-group">--}}
{{--                                <a class="btn btn-lg btn-danger btn-block text-uppercase" href="{{route('register')}}">Register</a>--}}
{{--                            </div>--}}


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    <div class="container">--}}
    {{--        <div class="row justify-content-center">--}}
    {{--            <div class="col-md-8">--}}
    {{--                <div class="card">--}}
    {{--                    <div class="card-header">{{ __('Login') }}</div>--}}

    {{--                    <div class="card-body">--}}
    {{--                        <form method="POST" action="{{ route('login') }}">--}}
    {{--                            @csrf--}}

    {{--                            <div class="form-group row">--}}
    {{--                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

    {{--                                <div class="col-md-6">--}}
    {{--                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

    {{--                                    @error('email')--}}
    {{--                                    <span class="invalid-feedback" role="alert">--}}
    {{--                                            <strong>{{ $message }}</strong>--}}
    {{--                                        </span>--}}
    {{--                                    @enderror--}}
    {{--                                </div>--}}
    {{--                            </div>--}}

    {{--                            <div class="form-group row">--}}
    {{--                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

    {{--                                <div class="col-md-6">--}}
    {{--                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

    {{--                                    @error('password')--}}
    {{--                                    <span class="invalid-feedback" role="alert">--}}
    {{--                                            <strong>{{ $message }}</strong>--}}
    {{--                                        </span>--}}
    {{--                                    @enderror--}}
    {{--                                </div>--}}
    {{--                            </div>--}}

    {{--                            <div class="form-group row">--}}
    {{--                                <div class="col-md-6 offset-md-4">--}}
    {{--                                    <div class="form-check">--}}
    {{--                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

    {{--                                        <label class="form-check-label" for="remember">--}}
    {{--                                            {{ __('Remember Me') }}--}}
    {{--                                        </label>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}

    {{--                            <div class="form-group row mb-0">--}}
    {{--                                <div class="col-md-8 offset-md-4">--}}
    {{--                                    <button type="submit" class="btn btn-primary">--}}
    {{--                                        {{ __('Login') }}--}}
    {{--                                    </button>--}}

    {{--                                    @if (Route::has('password.request'))--}}
    {{--                                        <a class="btn btn-link" href="{{ route('password.request') }}">--}}
    {{--                                            {{ __('Forgot Your Password?') }}--}}
    {{--                                        </a>--}}
    {{--                                    @endif--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </form>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection
