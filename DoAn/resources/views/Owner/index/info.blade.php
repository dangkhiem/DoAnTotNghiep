@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@section('content')
    <div class="container-fluid h-100 p-0 m-0">
        <div class="col-12 p-0 m-0  row d-flex d-block position-absolute" style="height: 100%; ">
            <div id="menu" class="col-2 p-o m-o bg-dark " >
                {{--                style="height: 100%;"--}}
                @include('Owner.component.OwnerSidebar')
            </div>
            <div id="contentOwner" class="col-10 flex-fill bg-white m-0 p-0">
                <div class="col-md-10 offset-md-1">
                    <span class="anchor" id="formChangePassword"></span>
                    @foreach ($data as $data)
                        <div class="card card-outline-secondary mt-1">
                            <div class="card-header">
                                <h3 class="mb-0">User Information</h3>
                            </div>
                            <div class="card-body">
                                <form class="form" role="form" autocomplete="off">
                                    <div class="form-group">
                                        <label for="">User Name</label>
                                        <input type="text" class="form-control" id="" required="" disabled value="{{$data->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email Address</label>
                                        <input type="text" class="form-control" id="" required="" disabled value="{{$data->email}}">
                                        {{--                                <span class="form-text small text-muted">--}}
                                        {{--                                            The password must be 8-20 characters, and must <em>not</em> contain spaces.--}}
                                        {{--                                        </span>--}}
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone Number</label>
                                        <input type="text" class="form-control" id="" required="" disabled value="{{$data->phone}}">
                                        {{--                                <span class="form-text small text-muted">--}}
                                        {{--                                            To confirm, type the new password again.--}}
                                        {{--                                        </span>--}}
                                    </div>
                                    <div class="form-group">
                                        <button type="" class="btn btn-danger btn-md float-right ml-2" disabled>Change
                                        </button>
                                        <button type="submit" class="btn btn-success btn-md float-right" disabled>Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
            <div class="clearpostition clearfix col-12 p-0 m-0">
                @include('layouts.footer')
            </div>

        </div>

    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#formAddUser").validate({
                rules: {
                    name: "required",
                    // email: {
                    //     required: true,
                    //     email: true
                    // },
                    // password: {
                    //     required: true,
                    //     minlength: 6,
                    //     maxlength: 15
                    // },
                    // phone:{
                    //     required:true,
                    //     minlength:8,
                    //     maxlength:12,
                    //     phone: true
                    // }
                },
                messages: {
                    name: "Vui lòng nhập tên!",
                    // email: {
                    //     required: "Vui lòng nhập vào email",
                    //     email: "Nhập đúng định dạng email đê :D"
                    // },
                    // password: {
                    //     required: "Vui lòng nhập mật khẩu!",
                    //     minlength: "Độ dài tối thiểu 6 kí tự",
                    //     maxlength: "Độ tài tối đa 15 kí tự"
                    // },
                    // checkbox: "Xác nhận Admin đẹp zai"
                }
            });
        });
    </script>
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
                        alert('123')
                        // $("#btn_getStarted").attr("disabled", "disabled");
                        errors = XMLHttpRequest.responseJSON.errors
                        // alert(errors)
                        // $('#add-error-name').html(errors.name);
                        // $('#add-error-email').html(errors.email);
                        // $('#add-error-password').html(errors.password);

                    }
                })
            })
        });
    </script>
@endsection
