@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/adminIndex.css">
<link rel="stylesheet" href="css/signUpStyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@section('content')
    <div class="container-fluid d-flex">
        <div id="menu" class="col-2 mr-auto flex-fill p-0 ">
            <div id="menu_admin" class="">
                <div id="sidebar" class="">
                    <h2>DashBoard</h2>
                    <hr class="p-o m-0">
                    <ul id="menu_admin_users" class="nav nav-pills nav-fill">
                        <li class="nav-item m-0 p-0">
                            <a class="nav-link text-left" href="{{url('/admin/users')}}">
                                <i class="fa fa-users"></i> User Management</a>
                        </li>
                    </ul>
                    <ul id="menu_admin_catalogs" class="nav nav-pills nav-fill">
                        <li class="nav-item m-0 p-0">
                            <a class="nav-link text-left" href="{{url('admin/pitch')}}">
                                <i class="fa fa-list"></i> Pitch Management</a>
                        </li>
                    </ul>
                    <ul id="menu_admin_products" class="nav nav-pills nav-fill">
                        <li class="nav-item m-0 p-0">
                            <a class="nav-link text-left" href="#">
                                <i class="fa fa-product-hunt"></i> History Management</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>


        <div id="content" class=" col-10 flex-fill bg-white m-0 p-0">
            <div class=" container">
                    <div class="justify-content-center">
                        @foreach ($getListPitch as $data)
                        <div class="card card-body w-100 mb-3">
                            <div class="row p-0 m-0" style="height: 150px;">

                                <div class="col-4">
                                    <img class="img-fluid h-100" src="{{asset($data->img)}}" alt="">
                                </div>
                                <div class="col-8 pt-3 pb-3 align-self-center">
                                    <h3 class="text-uppercase text-info p-1">{{$data->name}}</h3>
                                    <h5><i class="fa fa-map-marker p-1" aria-hidden="true">{{$data->address}}</i></h5>
                                    <h5><i class="fa p-1">Area: {{$data->area}}</i></h5>
                                    <a href="{{ \Illuminate\Support\Facades\URL::to('admin/pitch/'.$data->id) }}">Chi tiết</a>
                                </div>
                            </div>
                        </div>

                        @endforeach

                        {{--                        <div class="justify-content-center">--}}
                        {{--                            --}}{{--                    @foreach($getListPitch as $key => $data)--}}
                        {{--                            <div class="card card-body w-100" style="height: 200px;">--}}
                        {{--                                <div class="row p-0 m-0">--}}
                        {{--                                    <div class="col-4 bg-secondary">--}}
                        {{--                                        <img class="img-fluid" src="{{asset("image/img1.png")}}" alt="">--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="col-8 bg-danger">--}}
                        {{--                                        chan that su chan--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                    </div>--}}
                    </div>


                {{--            <div class="table-wrapper table-responsive">--}}
                {{--                <div class="table-title flex-fill">--}}
                {{--                    <div class="row p-0 m-0">--}}
                {{--                        <div>--}}
                {{--                            <h2>Pitch <b>Management</b></h2>--}}
                {{--                        </div>--}}
                {{--                        <div class=" p-0 m-0 ml-auto">--}}
                {{--                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">--}}
                {{--                                Launch demo modal--}}
                {{--                            </button>--}}
                {{--                            --}}{{--                            <button onclick="getAddModal()" class="btn btn-primary"><i class="fa fa-plus"--}}
                {{--                            --}}{{--                                                                                       aria-hidden="true"></i><span>Add New User</span>--}}
                {{--                            --}}{{--                            </button>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--                <table class="table table-striped  table-hover">--}}
                {{--                    <thead>--}}
                {{--                    <tr>--}}
                {{--                        <th>Id</th>--}}
                {{--                        <th>Name</th>--}}
                {{--                        <th>Email</th>--}}
                {{--                        <th>Phone</th>--}}
                {{--                        <th>Role</th>--}}
                {{--                    </tr>--}}
                {{--                    </thead>--}}
                {{--                    <tbody>--}}
                {{--                    @foreach($getListPitch as $key => $data)--}}
                {{--                        <tr id="rowUser{{$data->id}}">--}}
                {{--                            <td class="align-middle">{{$data->user_id }}</td>--}}
                {{--                            <td class="align-middle">{{$data->img}}</td>--}}
                {{--                            <td class="align-middle">{{$data->address }}</td>--}}
                {{--                            <td class="align-middle">{{$data->area}}</td>--}}

                {{--                        </tr>--}}
                {{--                    @endforeach--}}
                {{--                    </tbody>--}}
                {{--                </table>--}}
                {{--                <div class="clearfix mx-auto">--}}

                {{--                </div>--}}
                {{--            </div>--}}
                            <div class="pagination-list-user justify-content-center d-flex">
                                <div class="m-auto align-content-center align-items-center">{{$getListPitch->links()}}</div>
                            </div>
            </div>
        </div>
    </div>


@endsection
{{--    @component('Admin.component.add')--}}
{{--    @endcomponent--}}
{{--    @component('component.edit')--}}
{{--    @endcomponent--}}
{{--    @component('component.delete')--}}
{{--    @endcomponent--}}
