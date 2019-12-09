@extends('layouts.app')

<link rel="stylesheet" href="css/signUpStyle.css">
<link rel="stylesheet" href="css/bodyStyle.css">
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signup my-2">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sign Up</h5>
                        <form class="form-signup" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-label-group">
                                <input type="text" id="inputName" class="form-control @error('name') is-invalid @enderror" name="name"
                                       value="{{ old('name') }}"  autocomplete="name" autofocus placeholder="Username" required>
                                <label for="inputName">Username</label>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

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
                                <input type="text" id="inputPhone" class="form-control
@error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Phone number" required
                                       autofocus>
                                <label for="inputPhone">Phone number</label>
                                @error('phone')
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

                            <div class="form-label-group">
                                <input type="password" id="password_confirm" class="form-control
@error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Password confirm" required
                                       autofocus>
                                <label for="password_confirm">Password confirm</label>

                            </div>

                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register
                            </button>
                            <hr>
                            <div class="mx-auto text-center text-dark"><span>You already have an account!</span></div>

                            <div class="mx-auto text-center text-dark"><span><a href="{{route('register')}}"><strong class="">Log in now</strong></a></span></div>

{{--                            <div class="form-label-group">--}}
{{--                                <a class="btn btn-lg btn-danger btn-block text-uppercase" href="{{route('register')}}">Log in</a>--}}
{{--                            </div>--}}

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--<div class="container">--}}
    {{--    <div class="row justify-content-center">--}}
    {{--        <div class="col-md-8">--}}
    {{--            <div class="card">--}}
    {{--                <div class="card-header">{{ __('Register') }}</div>--}}

    {{--                <div class="card-body">--}}
    {{--                    <form method="POST" action="{{ route('register') }}">--}}
    {{--                        @csrf--}}

    {{--                        <div class="form-group row">--}}
    {{--                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

    {{--                            <div class="col-md-6">--}}
    {{--                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

    {{--                                @error('name')--}}
    {{--                                    <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                    </span>--}}
    {{--                                @enderror--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <div class="form-group row">--}}
    {{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

    {{--                            <div class="col-md-6">--}}
    {{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

    {{--                                @error('email')--}}
    {{--                                    <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                    </span>--}}
    {{--                                @enderror--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

{{--                            <div class="form-group row">--}}
{{--                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--                                    @error('password')--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                            <strong>{{ $message }}</strong>--}}
{{--                                        </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row">--}}
{{--                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                                </div>--}}
{{--                            </div>--}}

    {{--                        <div class="form-group row mb-0">--}}
    {{--                            <div class="col-md-6 offset-md-4">--}}
    {{--                                <button type="submit" class="btn btn-primary">--}}
    {{--                                    {{ __('Register') }}--}}
    {{--                                </button>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </form>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--</div>--}}
@endsection
