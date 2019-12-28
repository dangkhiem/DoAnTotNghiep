@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset("css/adminIndex.css")}}">
<link rel="stylesheet" href="{{asset("css/signUpStyle.css")}}">
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
@section('content')
    <div class="container-fluid h-100 p-0 m-0">
        <div class="col-12 p-0 m-0  row d-flex d-block position-absolute" style="height: 100%; ">
            <div id="menu" class="col-2 p-o m-o bg-dark " >
{{--                style="height: 100%;"--}}
                @include('Admin.menu')
            </div>
            <div id="contentUser" class="col-10 flex-fill bg-white m-0 p-0">
                @include('Admin.component.contentUser', ['getListUser' => $getListUser])
            </div>
            <div class="clearpostition clearfix col-12 p-0 m-0">
                @include('layouts.footer')
            </div>

        </div>
    </div>
    @component('Admin.component.add')
    @endcomponent
    @component('Admin.component.edit')
    @endcomponent
    @component('Admin.component.delete')
    @endcomponent

    <script>
        $(document).ready(function () {
            $('#formAddUser').submit(function (e) {
                e.preventDefault();
                $('#add-error-name').html('')
                $('#add-error-email').html('')
                $('#add-error-phone').html('')
                $('#add-error-password').html('')
                var addForm = $('#formAddUser').serialize();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('StoreUser')}}",
                    type: 'post',
                    data: addForm,
                    success: function (data) {
                        $('#myAddModal').modal('hide');
                        location.reload()
                        swal({
                            text: "create new",
                            icon: "success",
                        });
                    },
                    error: function (XMLHttpRequest) {
                        errors = XMLHttpRequest.responseJSON.errors
                        $('#add-error-name').html(errors.name);
                        $('#add-error-email').html(errors.email);
                        $('#add-error-password').html(errors.password);
                        $('#add-error-phone').html(errors.phone);
                    }
                })
            })
        });
    </script>


@endsection
