<link rel="stylesheet" href="{{asset('css/signUpStyle.css')}}">
<div class="mx-auto">
    <div class="card-signup ">
        <div class="card-body shadow-lg">
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

                <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="checkRole"
                           name="role" value="2">
                    <label class="custom-control-label" for="checkRole">Đăng ký chủ sân</label>
                </div>

                <button class="btn btn-lg btn-danger btn-block text-uppercase" type="submit">Register
                </button>
{{--                <hr>--}}
{{--                <div class="mx-auto text-center text-dark"><span>You already have an account!</span></div>--}}

{{--                <div class="mx-auto text-center text-dark"><span><a href="{{route('register')}}"><strong class="">Log in now</strong></a></span></div>--}}

                {{--                            <div class="form-label-group">--}}
                {{--                                <a class="btn btn-lg btn-danger btn-block text-uppercase" href="{{route('register')}}">Log in</a>--}}
                {{--                            </div>--}}

            </form>
        </div>
    </div>
</div>

