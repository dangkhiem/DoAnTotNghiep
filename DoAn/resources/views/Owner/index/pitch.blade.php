@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@section('content')
    <div class="container-fluid h-100 p-0 m-0">
        <div class="col-12 p-0 m-0  row d-flex d-block position-absolute" style="height: 100%; min-height: 600px">
            <div id="menu" class="col-2  p-0 m-0 bg-dark " >
                {{--                style="height: 100%;"--}}
                @include('Owner.component.OwnerSidebar')
            </div>
            <div id="contentOwner" class="col-10 flex-fill bg-white m-0 p-0">
                <div class=" container">
                    <div class="row m-0 p-0 col-1 pb-3">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewPitch">
                            Add new
                        </button>
                        {{--                    <button class="btn btn-group bg-primary btn-block text-white text-center">Add new</button>--}}
                    </div>
                    <div class="justify-content-center mx-auto col-11 p-0">
                        @foreach ($pitch as $data)
                            <div class="card card-body w-100 mb-3 shadow-sm bg-secondary p-0">
                                <div class="row p-0 m-0 bg-light" >

                                    <div class="col-4 p-0 m-0">
                                        <img class="img-fluid h-100" src="{{asset($data->img)}}" alt="">
                                    </div>
                                    <div class="col-8 pt-3 pb-3 align-self-center">
                                        <h3 class="text-uppercase text-info p-1">{{$data->name}}</h3>
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
{{--            <div class="col-12 p-0 m-0 clearfix clearpostition">--}}
{{--                @include('layouts.footer')--}}
{{--            </div>--}}

        </div>

    </div>
    @component('Owner.component.addPitch')
    @endcomponent

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
    <script type="text/javascript">
        $(document).ready(function () {
            $('#menuOwnerPitchDB li a').addClass("active");
        });
    </script>

@endsection
