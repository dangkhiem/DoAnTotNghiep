@extends('layouts.app')

@section('content')
    <div class="container-fluid h-100 p-0 m-0">
        <div class="col-12 p-0 m-0 row d-flex position-absolute" style="height: 100% !important;">
            <div id="menu" class="col-2 m-0 p-0 bg-secondary" style="height: 100% !important;">
                @include('User.UserSidebar')
            </div>
            @foreach($data as $data)
                <div id="content" class="col-10 flex-fill   m-0 p-0 border-top">
                    <div class="col-md-10 offset-md-1">
                        <span class="anchor" id="formChangePassword"></span>
                        {{--                @foreach ($data as $data)--}}
                        <div class="card card-outline-secondary mt-1">
                            <form action="{{route('updateInfo')}}" method="post">
                                @csrf
                                <div class="card-header">
                                    <h3 class="mb-0">User Information</h3>
                                </div>
                                <div class="card-body">
                                    <form class="form" role="form" autocomplete="off">
                                        <div class="form-group">
                                            <label for="">Email Address</label>
                                            <input type="text" class="form-control" id="" required disabled
                                                   value="{{$data->email}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">User Name</label>
                                            <input type="text" class="form-control" id="UserName" required disabled name="name"
                                                   value="{{$data->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Phone Number</label>
                                            <input type="text" class="form-control" id="PhoneNumber" required disabled name="phone"
                                                   value="{{$data->phone}}">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" id="btnSubmit"
                                                    class="btn btn-danger btn-md float-right ml-2" disabled>Change
                                            </button>
                                            <button type="button" class="btn btn-primary btn-md float-right"
                                                    onclick="ChangeStatusButton()">Edit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                        {{--                @endforeach--}}


                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script type="text/javascript">
        function ChangeStatusButton() {
            $("#UserName").attr("disabled", false);
            $("#PhoneNumber").attr("disabled", false);
            $("#btnSubmit").attr("disabled", false);
        }

    </script>
@endsection
