@extends('layouts.app')
{{--<link rel="stylesheet" href="{{asset('css/subPitch.css')}}">--}}
<link rel="stylesheet" href="{{asset('css/subPitch.css')}}">
@section('content')
    <div class="container-fluid d-flex">
        <div id="menu" class="col-2 mr-auto flex-fill p-0 ">
            <div id="menu_admin" class="">
                <div id="sidebar" class="">
                    <h2>DashBoard</h2>
                    <hr class="p-o m-0">
                    <ul id="menu_admin_users" class="nav nav-pills nav-fill">
                        <li class="nav-item m-0 p-0">
                            <a class="nav-link text-left" href="{{route('getAllUser')}}">
                                <i class="fa fa-users"></i> User Management</a>
                        </li>
                    </ul>
                    <ul id="menu_admin_catalogs" class="nav nav-pills nav-fill">
                        <li class="nav-item m-0 p-0">
                            <a class="nav-link text-left" href="{{route('pitch')}}">
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

        <div id="content" class="col-10 flex-fill m-0 p-0 ">
            <div class="pt-2">
                <div id="pitchInfo" class="card card-body shadow">
                    @foreach($Info as $data)
                        {{--                        <img class="d-block w-100" src="{{asset($data->img)}}" alt="" style="height: 200px; ">--}}
                        <div class="row">
                            <div class="col-4">
                                <div class="resizeImg text-white"
                                     style="background-image: url({{asset($data->img)}}); height: 200px;">
                                </div>
                            </div>
                            <div class="col-8 row align-items-center mx-auto">
                                <div>
                                    <h1 class="text-center">{{$data->pitch_name}}</h1>
                                    <div class="row">
                                        <div class="col-5">
                                            <label for="" class="font-weight-bold">Chủ sân: {{$data->name}} </label><br>
                                            {{--                                                                        <label for="" class="font-weight-bold"> Email: {{$data->email}} <br> </label>--}}
                                            <label for="" class="font-weight-bold"> Số điện
                                                thoại: {{$data->phone}} </label>
                                        </div>
                                        <div class="col-7">
                                            <label for="" class="font-weight-bold"> Khu vực: {{$data->area}}<br></label>
                                            <label for="" class="font-weight-bold"> Địa chỉ: {{$data->address}}</label>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    @endforeach
                </div>
                <div class="row col-0 m-0 pt-5  pb-3">
                    <div class="card card-body col-6 shadow">
                        <h1 class="text-uppercase text-center text-warning">Sân 5 người</h1>
                        <div class="row">
                            <div class="col-4">
                                <h3>Danh sách Sân</h3>
                                @foreach($ListSubPitch as $data)
                                    @if ($data->type == 5)
                                        <form action="#">
                                            @csrf
                                            <div class="input-group">
                                                <input class="form-control width100" placeholder="Tên Sân"
                                                       name="SubPitchName" value="{{$data->name}}" disabled>
                                                <span class="input-group-btn">
                                    </span>
                                            </div>
                                        </form>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-8">
                                <h3>Khung Giá</h3>
                                @foreach ($ListPrice as $price)
                                    @if ($price->type ==5)
                                        <form method="post">
                                            @csrf
                                            <div class="input-group">
                                                <input type="hidden" value="{{$price->pitch_id}}" name="pitch_id">
                                                <input type="hidden" value="5" name="type">
                                                <input class="form-control width100" name=""
                                                       value="{{$price->start_time}}">
                                                <input class="form-control width100" name=""
                                                       value="{{$price->end_time}}">
                                                <input class="form-control width100" name="" value="{{$price->cost}}">
                                                <span class="input-group-btn">
                                        </span>
                                            </div>
                                        </form>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{--                san 7--}}


                    <div class="card card-body col-6 shadow">
                        <h1 class="text-uppercase text-center text-warning">Sân 7 người</h1>
                        <div class="row">
                            <div class="col-4">
                                <h3>Danh sách Sân</h3>
                                @foreach($ListSubPitch as $data)
                                    @if ($data->type == 7)
                                        <form action="#">
                                            @csrf
                                            <div class="input-group">
                                                <input class="form-control width100" placeholder="Tên Sân"
                                                       name="SubPitchName" value="{{$data->name}}" disabled>
                                                <span class="input-group-btn">
                                    </span>
                                            </div>
                                        </form>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-8">
                                <h3>Khung Giá</h3>
                                @foreach ($ListPrice as $price)
                                    @if ($price->type == 7)
                                        <form method="post">
                                            @csrf
                                            <div class="input-group">
                                                <input type="hidden" value="{{$price->pitch_id}}" name="pitch_id">
                                                <input type="hidden" value="7" name="type">
                                                <input class="form-control width100" name=""
                                                       value="{{$price->start_time}}">
                                                <input class="form-control width100" name=""
                                                       value="{{$price->end_time}}">
                                                <input class="form-control width100" name="" value="{{$price->cost}}">
                                                <span class="input-group-btn">
                                        </span>
                                            </div>
                                        </form>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
