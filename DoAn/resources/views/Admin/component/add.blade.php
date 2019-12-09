<link rel="stylesheet" href="{{asset('css/signUpStyle.css')}}">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
                    <div class="card card-signup">
                        <div class="card-body">
                            <h5 class="card-title text-center">Sign Up</h5>
                            <form class="form-signup"
{{--                                  method="POST" --}}
                                  id="formAddUser">
                                @csrf

                                <div class="form-label-group">
                                    <input type="text" id="inputName"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" autocomplete="name" autofocus
                                           placeholder="Username">
                                    <label for="inputName">Username</label>
                                    {{--                                    @error('name')--}}
                                    <div class="text-danger">
                                        <label for="" class="m-0 p-0">
                                            <strong id="add-error-name"></strong>
                                        </label>
                                    </div>
                                    {{--                                    @enderror--}}
                                </div>

                                <div class="form-label-group">
                                    <input type="email" id="inputEmail" class="form-control
@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email address"
                                           autofocus>
                                    <label for="inputEmail">Email address</label>
                                    <div class="text-danger">
                                        <label for="" class="m-0 p-0">
                                            <strong id="add-error-email"></strong>
                                        </label>
                                    </div>
                                </div>


                                <div class="form-label-group">
                                    <input type="text" id="inputPhone" class="form-control
@error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Phone number"
                                           autofocus>
                                    <label for="inputPhone">Phone number</label>
                                    <div class="text-danger">
                                        <label for="" class="m-0 p-0">
                                            <strong id="add-error-phone"></strong>
                                        </label>
                                    </div>
                                </div>


                                <div class="form-label-group">
                                    <input type="password" id="inputPassword" class="form-control
@error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Password"
                                           autofocus>
                                    <label for="inputPassword">Password</label>
                                    <div class="text-danger">
                                        <label for="" class="m-0 p-0">
                                            <strong id="add-error-password"></strong>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-label-group">
                                    <input type="password" id="password_confirm" class="form-control
@error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                           value="{{ old('password_confirmation') }}" placeholder="Password confirm"
                                           autofocus>
                                    <label for="password_confirm">Password confirm</label>

                                </div>

                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" value="Validate!">Register
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
