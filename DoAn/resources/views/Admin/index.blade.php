@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('css/adminIndex.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/signUpStyle.css')}}">
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
            <div class="table-wrapper table-responsive">
                <div class="table-title flex-fill">
                    <div class="row p-0 m-0">
                        <div>
                            <h2>User <b>Management</b></h2>
                        </div>
                        <div class=" p-0 m-0 ml-auto">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Launch demo modal
                            </button>
{{--                            <button onclick="getAddModal()" class="btn btn-primary"><i class="fa fa-plus"--}}
{{--                                                                                       aria-hidden="true"></i><span>Add New User</span>--}}
{{--                            </button>--}}
                        </div>
                    </div>
                </div>
                <table class="table table-striped  table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($getListUser as $key => $data)
                        <tr id="rowUser{{$data->id}}">
                            <td class="align-middle">{{$data->id }}</td>
                            <td class="align-middle">{{$data->name }}</td>
                            <td class="align-middle">{{$data->email }}</td>
                            <td class="align-middle">{{$data->phone}}</td>
                            <td class="align-middle">{{$data->role_id}}</td>
{{--                            <td class="align-middle">--}}
{{--                                <div class="btn-group ">--}}
{{--                                    <button type="button" class="btn-lg bg-info  m-1 text-white"--}}
{{--                                            onclick="getEditModal({{$data->id}})">--}}
{{--                                        <i class="fa fa-edit text-white"></i>--}}
{{--                                    </button>--}}
{{--                                                                    @if(($data->role_id) != (\App\Enums\UserEnums::ADMIN))--}}
{{--                                    <button type="button" class="btn-lg bg-danger  m-1 text-white"--}}
{{--                                            onclick="deleteUser({{$data->id}})">--}}
{{--                                        <i class="fa fa-trash"></i>--}}
{{--                                    </button>--}}

{{--                                                                    @endif--}}
{{--                                </div>--}}

{{--                            </td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="clearfix mx-auto">

                </div>
            </div>
            <div class="pagination-list-user justify-content-center d-flex">
                <div class="m-auto align-content-center align-items-center">{{$getListUser->links()}}</div>
            </div>
        </div>
    </div>
    @component('Admin.component.add')
    @endcomponent
{{--    @component('component.edit')--}}
{{--    @endcomponent--}}
{{--    @component('component.delete')--}}
{{--    @endcomponent--}}

@endsection
