@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@section('content')

    <div class="container-fluid h-100 p-0 m-0">
        <div class="col-12 p-0 m-0  row d-flex d-block position-absolute" style="height: 100%;">
            <div id="menu" class="col-2 p-0 m-0 bg-dark " style="height: 100%;">
                @include('Admin.menu')
            </div>
            <div id="PersonalInfo" class="col-10 flex-fill bg-white m-0 p-0">
                <div class="col-md-10 offset-md-1">
                    <span class="anchor" id="formChangePassword"></span>
                {{--                <hr class="mb-1">--}}

                <!-- form card change user data-->
                    @foreach ($data as $data)
                        <div class="card card-outline-secondary mt-1">
                            <div class="card-header">
                                <h3 class="mb-0">User Information</h3>
                            </div>
                            <div class="card-body">

                                <form class="form" role="form" autocomplete="off" id="formAdminInfo"  method="post"  action="{{route('updateAdminInfo')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Email Address</label>
                                        <input type="text" class="form-control" id="AdminId" required="" disabled value="{{$data->email}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">User Name</label>
                                        <input name="name" type="text" class="form-control" id="AdminName" required="" disabled value="{{$data->name}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Phone Number</label>
                                        <input type="text" name="phone" class="form-control" id="AdminPhone" required="" disabled value="{{$data->phone}}">
                                        {{--                                <span class="form-text small text-muted">--}}
                                        {{--                                            To confirm, type the new password again.--}}
                                        {{--                                        </span>--}}
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger btn-md float-right ml-2"  id="btnAdminInfoSubmit" disabled>Change
                                        </button>
                                        <button type="button" class="btn btn-success btn-md float-right" id="btnEnableAdmin" onclick="AdminChangeEnableButton()">Edit</button>
                                        <button type="button" hidden class="btn btn-success btn-md float-right" id="btnDisableAdmin" onclick="AdminChangeDisableButton()">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>

        </div>
    </div>


            {{--            <div class="row p-0 m-0">--}}
            {{--                <div class="col-md-7 ">--}}
            {{--                    <span class="anchor" id="formChangePassword"></span>--}}
            {{--                    <hr class="mb-5">--}}

            {{--                    <!-- form card change password -->--}}
            {{--                    <div class="card card-outline-secondary">--}}
            {{--                        <div class="card-header">--}}
            {{--                            <h3 class="mb-0">Change Password</h3>--}}
            {{--                        </div>--}}
            {{--                        <div class="card-body">--}}
            {{--                            <form class="form" role="form" autocomplete="off">--}}
            {{--                                <div class="form-group">--}}
            {{--                                    <label for="inputPasswordOld">Current Password</label>--}}
            {{--                                    <input type="password" class="form-control" id="inputPasswordOld" required="">--}}
            {{--                                </div>--}}
            {{--                                <div class="form-group">--}}
            {{--                                    <label for="inputPasswordNew">New Password</label>--}}
            {{--                                    <input type="password" class="form-control" id="inputPasswordNew" required="">--}}
            {{--                                    <span class="form-text small text-muted">--}}
            {{--                                            The password must be 8-20 characters, and must <em>not</em> contain spaces.--}}
            {{--                                        </span>--}}
            {{--                                </div>--}}
            {{--                                <div class="form-group">--}}
            {{--                                    <label for="inputPasswordNewVerify">Verify</label>--}}
            {{--                                    <input type="password" class="form-control" id="inputPasswordNewVerify" required="">--}}
            {{--                                    <span class="form-text small text-muted">--}}
            {{--                                            To confirm, type the new password again.--}}
            {{--                                        </span>--}}
            {{--                                </div>--}}
            {{--                                <div class="form-group">--}}
            {{--                                    <button type="submit" class="btn btn-success btn-lg float-right">Save</button>--}}
            {{--                                </div>--}}
            {{--                            </form>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                    <!-- /form card change password -->--}}

            {{--                </div>--}}
            {{--                <div class="col-md-5 ">--}}
            {{--                    <span class="anchor" id="formResetPassword"></span>--}}
            {{--                    <hr class="mb-5">--}}

            {{--                    <!-- form card reset password -->--}}
            {{--                    <div class="card card-outline-secondary">--}}
            {{--                        <div class="card-header">--}}
            {{--                            <h3 class="mb-0">Password Reset</h3>--}}
            {{--                        </div>--}}
            {{--                        <div class="card-body">--}}
            {{--                            <form class="form" role="form" autocomplete="off">--}}
            {{--                                <div class="form-group">--}}
            {{--                                    <label for="inputResetPasswordEmail">Email</label>--}}
            {{--                                    <input type="email" class="form-control" id="inputResetPasswordEmail" required="">--}}
            {{--                                    <span id="helpResetPasswordEmail" class="form-text small text-muted">--}}
            {{--                                            Password reset instructions will be sent to this email address.--}}
            {{--                                        </span>--}}
            {{--                                </div>--}}
            {{--                                <div class="form-group">--}}
            {{--                                    <button type="submit" class="btn btn-success btn-lg float-right">Reset</button>--}}
            {{--                                </div>--}}
            {{--                            </form>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                    <!-- /form card reset password -->--}}

            {{--                </div>--}}
            {{--            </div>--}}

    <script type="text/javascript">
        function AdminChangeEnableButton() {
            $("#AdminName").attr("disabled", false);
            $("#AdminPhone").attr("disabled", false);
            $("#btnAdminInfoSubmit").attr("disabled", false);
            $("#btnEnableAdmin").attr("hidden",  true);
            $("#btnDisableAdmin").attr("hidden",  false);
        }
        function AdminChangeDisableButton() {
            $("#AdminName").attr("disabled", true);
            $("#AdminPhone").attr("disabled", true);
            $("#btnAdminInfoSubmit").attr("disabled", true);
            $("#btnEnableAdmin").attr("hidden",  false);
            $("#btnDisableAdmin").attr("hidden", true);
        }
    </script>
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('#btnAdminInfoSubmit').submit(function (e) {--}}
{{--                e.preventDefault();--}}
{{--                // $('#add-error-name').html('')--}}
{{--                // $('#add-error-email').html('')--}}
{{--                // $('#add-error-phone').html('')--}}
{{--                var addForm = $('#formAdminInfo').serialize();--}}
{{--                $.ajaxSetup({--}}
{{--                    headers: {--}}
{{--                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                    }--}}
{{--                });--}}
{{--                $.ajax({--}}
{{--                    url: "{{route('updateAdminInfo')}}",--}}
{{--                    type: 'post',--}}
{{--                    data: addForm,--}}
{{--                    success: function (data) {--}}
{{--                        // $('#myAddModal').modal('hide');--}}
{{--                        // $('#search_data').html(data.view)--}}
{{--                        // location.reload()--}}
{{--                        swal({--}}
{{--                            text: "Cập nhật thông tin thành công",--}}
{{--                            icon: "success",--}}
{{--                        });--}}
{{--                    },--}}
{{--                    error: function (XMLHttpRequest) {--}}
{{--                        // $("#btn_getStarted").attr("disabled", "disabled");--}}
{{--                        errors = XMLHttpRequest.responseJSON.errors--}}
{{--                    }--}}
{{--                })--}}
{{--            })--}}
{{--        });--}}
{{--    </script>--}}
@endsection
