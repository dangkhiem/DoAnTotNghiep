<link rel="stylesheet" href="{{asset('css/loginStyle.css')}}">
<div class="mx-auto">
    <div class="card-signin">
        <div class="card-body shadow-lg">
            <form class="form-signin" method="POST" id="formLogin"
                    {{--                  action="{{ route('login') }}"--}}>
                @csrf
                <div for="" id="error-email-login" class="text-danger font-weight-bold"></div>
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
                <hr>
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in
                </button>
                {{--                            @if (Route::has('password.request'))--}}
                {{--                                <a class="btn btn-link" href="{{ route('password.request') }}">--}}
                {{--                                    {{ __('Forgot Your Password?') }}--}}
                {{--                                </a>--}}
                {{--                            @endif--}}
                {{--                <hr>--}}
                {{--                <div class="mx-auto text-center text-dark"><span>You don't have an account?</span></div>--}}
                {{--                <div class="mx-auto text-center text-dark"><a href="{{route('register')}}"><strong>Register now</strong></a></div>--}}
                {{--                            <div class="form-label-group">--}}
                {{--                                <a class="btn btn-lg btn-danger btn-block text-uppercase" href="{{route('register')}}">Register</a>--}}
                {{--                            </div>--}}


            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#formLogin').submit(function (e) {
            e.preventDefault();
            $('#error-email-login').html('');
            var formLogin = $('#formLogin').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route("login")}}",
                type: 'POST',
                data: formLogin,
                success: function (data) {
                    $('#exampleModalAuthen').modal('hide');
                    location.reload();
                },
                error: function (XMLHttpRequest) {
                    errors = XMLHttpRequest.responseJSON.errors;
                    console.log(errors);
                    $('#error-email-login').html(errors.email);
                }
            })
        });
    });
</script>
