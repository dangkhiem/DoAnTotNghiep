@extends('layouts.app')
{{--<link rel="stylesheet" href="{{asset('css/signUpStyle.css')}}">--}}

@section('content')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add User
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
                        <div class="card card-signup">
                            <div class="card-body">
                                <h5 class="card-title text-center">Sign Up</h5>
                                <form class="form-signup" method="POST" id="formAddUser">
                                    @csrf

                                    <div class="form-label-group">
                                        <input type="text" id="inputName" class="form-control @error('name') is-invalid @enderror" name="name"
                                               value="{{ old('name') }}"  autocomplete="name" autofocus placeholder="Username" >
                                        <label for="inputName">Username</label>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong id="add-error-name">{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-label-group">
                                        <input type="email" id="inputEmail" class="form-control
@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email address"
                                               autofocus>
                                        <label for="inputEmail">Email address</label>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong id="add-error-email">{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>


                                    <div class="form-label-group">
                                        <input type="text" id="inputPhone" class="form-control
@error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Phone number"
                                               autofocus>
                                        <label for="inputPhone">Phone number</label>
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                        <strong id="add-error-phone">{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>


                                    <div class="form-label-group">
                                        <input type="password" id="inputPassword" class="form-control
@error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Password"
                                               autofocus>
                                        <label for="inputPassword">Password</label>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong id="add-error-password">{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-label-group">
                                        <input type="password" id="password_confirm" class="form-control
@error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Password confirm"
                                               autofocus>
                                        <label for="password_confirm">Password confirm</label>

                                    </div>

                                    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function () {--}}
{{--            $("#formAddUser").validate({--}}
{{--                rules: {--}}
{{--                    name: "required",--}}
{{--                    // email: {--}}
{{--                    //     required: true,--}}
{{--                    //     email: true--}}
{{--                    // },--}}
{{--                    // password: {--}}
{{--                    //     required: true,--}}
{{--                    //     minlength: 6,--}}
{{--                    //     maxlength: 15--}}
{{--                    // },--}}
{{--                    // phone:{--}}
{{--                    //     required:true,--}}
{{--                    //     minlength:8,--}}
{{--                    //     maxlength:12,--}}
{{--                    //     phone: true--}}
{{--                    // }--}}
{{--                },--}}
{{--                messages: {--}}
{{--                    name: "Vui lòng nhập tên!",--}}
{{--                    // email: {--}}
{{--                    //     required: "Vui lòng nhập vào email",--}}
{{--                    //     email: "Nhập đúng định dạng email đê :D"--}}
{{--                    // },--}}
{{--                    // password: {--}}
{{--                    //     required: "Vui lòng nhập mật khẩu!",--}}
{{--                    //     minlength: "Độ dài tối thiểu 6 kí tự",--}}
{{--                    //     maxlength: "Độ tài tối đa 15 kí tự"--}}
{{--                    // },--}}
{{--                    // checkbox: "Xác nhận Admin đẹp zai"--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}


    <script>
        // $(document).ready(function(){
        //     $("#btn_getStarted").attr("disabled", "disabled");
        //     $("#formAddUser").change(function(){
        //         $("#btn_getStarted").removeAttr("disabled");
        //     });
        // });
        $(document).ready(function () {
            $('#formAddUser').submit(function (e) {
                e.preventDefault();
                $('#add-error-name').html('')
                $('#add-error-email').html('')
                $('#add-error-phone').html('')
                $('#add-error-password').html('')
                // $('#add-error-password-confirmation').html('')
                var addForm = $('#formAddUser').serialize();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var deita = 'khiem'
                $.ajax({
                    url: 'admin/users/add',
                    type: 'post',
                    data: addForm,
                    // dataType: "json",
                    // cache: false ,
                    // contentType:false,
                    success: function (data) {
                        $('#myAddModal').modal('hide');
                        // $('#search_data').html(data.view)
                        location.reload()
                        swal({
                            text: "create new",
                            icon: "success",
                        });
                    },
                    error: function (XMLHttpRequest) {
                        // alert('123')
                        // $("#btn_getStarted").attr("disabled", "disabled");
                        errors = XMLHttpRequest.responseJSON.errors
                        // alert(errors)
                        $('#add-error-name').html(errors.name);
                        $('#add-error-email').html(errors.email);
                        $('#add-error-password').html(errors.password);

                    }
                })
            })
        });
    </script>

@endsection
