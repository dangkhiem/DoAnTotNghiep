<link rel="stylesheet" href="{{asset('css/signUpStyle.css')}}">
<div class="mx-auto">
    <div class="card-signup ">
        <div class="card-body shadow-lg">
            <form class="form-signup" method="POST" id="formRegister"
{{--                                      action="{{ route('register') }}"--}}
            >
                @csrf
                <div  id="error-username-register" class="text-danger font-weight-bold"></div>

                <div class="form-label-group">
                    <input type="text" id="inputName" class="form-control @error('name') is-invalid @enderror"
                           name="name" value="{{ old('name') }}" autocomplete="name"
                           autofocus placeholder="Username" required>
                    <label for="inputName">Username</label>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div  id="error-email-register" class="text-danger font-weight-bold"></div>
                <div class="form-label-group">
                    <input type="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" autocomplete="email"
                           autofocus placeholder="Email address" required>
                    <label for="inputEmail">Email address</label>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div  id="error-phone-register" class="text-danger font-weight-bold"></div>
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

                <div  id="error-password-register" class="text-danger font-weight-bold"></div>
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
@error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                           value="{{ old('password_confirmation') }}" placeholder="Password confirm" required
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

            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#formRegister').submit(function (e) {
            e.preventDefault();
            $('#error-username-register').html('');
            $('#error-email-register').html('');
            $('#error-phone-register').html('');
            $('#error-password-register').html('');
            var formRegister = $('#formRegister').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('register')}}",
                type: 'POST',
                data: formRegister,
                success: function (data) {
                    $('#exampleModalAuthen').modal('hide');
                    location.reload();
                    {{--window.location.href = "{{route("verification.notice")}}";--}}
                },
                error: function (XMLHttpRequest) {
                    errors = XMLHttpRequest.responseJSON.errors;
                    // console.log(errors);
                    $('#error-username-register').html(errors.name);
                    $('#error-email-register').html(errors.email);
                    $('#error-phone-register').html(errors.phone);
                    $('#error-password-register').html(errors.password);
                }
            })
        });
    });
</script>
