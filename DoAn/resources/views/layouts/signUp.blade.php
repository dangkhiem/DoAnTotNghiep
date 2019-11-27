@extends('layouts.app')

<link rel="stylesheet" href="css/signUpStyle.css">
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signup my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sign Up</h5>
                        <form class="form-signup">

                            <div class="form-label-group">
                                <input type="text" id="inputName" class="form-control" placeholder="Username" required>
                                <label for="inputName">Username</label>
                            </div>

                            <div class="form-label-group">
                                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                                <label for="inputEmail">Email address</label>
                            </div>

                            <div class="form-label-group">
                                <input type="text" id="inputPhone" class="form-control" placeholder="Phone" required>
                                <label for="inputPhone">Phone</label>
                            </div>


                            <div class="form-label-group">
                                <input type="text" id="inputAddress" class="form-control" placeholder="Address" required>
                                <label for="inputAddress">Address</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                                <label for="inputPassword">Password</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="inputRePassword" class="form-control" placeholder="Retype Password" required>
                                <label for="inputRePassword">Retype Password</label>
                            </div>

{{--                            <div class="custom-control custom-checkbox mb-3">--}}
{{--                                <input type="checkbox" class="custom-control-input" id="customCheck1">--}}
{{--                                <label class="custom-control-label" for="customCheck1">Remember password</label>--}}
{{--                            </div>--}}
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign Up</button>
{{--                            <hr class="my-4">--}}
{{--                            <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>--}}
{{--                            <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>--}}
                        </form>
{{--                        <button class="btn btn-lg btn-success btn-block text-uppercase" type="submit">Sign Up</button>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
