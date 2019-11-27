@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@section('content')
    <div class="container-fluid d-flex">
        <div id="menu" class="col-2 mr-auto flex-fill p-0 ">
            <div id="" class="">
                <div id="sidebar" class="">
                    <h2>DashBoard</h2>
                    <hr class="p-o m-0">
                    <ul id="" class="nav nav-pills nav-fill">
                        <li class="nav-item m-0 p-0">
                            <a class="nav-link text-left" href="">
                                <i class="fa fa-users"></i> Personal information</a>
                        </li>
                    </ul>
                    <ul id="" class="nav nav-pills nav-fill">
                        <li class="nav-item m-0 p-0">
                            <a class="nav-link text-left" href="{{url('owner/pitch')}}">
                                <i class="fa fa-list"></i> Pitch Management</a>
                        </li>
                    </ul>
                    <ul id="" class="nav nav-pills nav-fill">
                        <li class="nav-item m-0 p-0">
                            <a class="nav-link text-left" href="#">
                                <i class="fa fa-product-hunt"></i> Order Management</a>
                        </li>
                    </ul>

                    <ul id="" class="nav nav-pills nav-fill">
                        <li class="nav-item m-0 p-0">
                            <a class="nav-link text-left" href="#">
                                <i class="fa fa-product-hunt"></i> History Management</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

        <div id="content" class=" col-10 flex-fill bg-white m-0 p-0">
            <div class="container">
                <div class="row m-0 p-0 col-1 float-right pb-3">
                    <button class="btn btn-group bg-primary btn-block text-white text-center">Add new</button>
                </div>
            </div>
            <div class=" container">
                <div class="justify-content-center">
                    @foreach ($pitch as $data)
                        <div class="card card-body w-100 mb-3">
                            <div class="row p-0 m-0" style="height: 150px;">

                                <div class="col-4">
                                    <img class="img-fluid h-100" src="{{asset($data->img)}}" alt="">
                                </div>
                                <div class="col-8 pt-3 pb-3 align-self-center">
                                    <h3 class="text-uppercase text-info p-1">Sân bóng đá Xuyên Việt</h3>
                                    <h5><i class="fa fa-map-marker p-1" aria-hidden="true">{{$data->address}}</i></h5>
                                    <h5><i class="fa p-1">Area: {{$data->area}}</i></h5>
                                    <a href="{{ \Illuminate\Support\Facades\URL::to('owner/pitch/'.$data->id) }}">Chi tiết</a>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>



{{--                <div class="pagination-list-user justify-content-center d-flex">--}}
{{--                    <div class="m-auto align-content-center align-items-center">{{$getListPitch->links()}}</div>--}}
{{--                </div>--}}
            </div>
        </div>

{{--        <div id="content" class="col-10 flex-fill   m-0 p-0 border-top">--}}



{{--        </div>--}}
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
