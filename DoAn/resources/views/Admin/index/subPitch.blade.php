@extends('layouts.app')
{{--<link rel="stylesheet" href="{{asset('css/subPitch.css')}}">--}}
<link rel="stylesheet" href="{{asset('css/subPitch.css')}}">
@section('content')

    <div class="container-fluid h-100 p-0 m-0">
        <div class="col-12 p-0 m-0  row d-flex d-block position-absolute" style="height: 100%;">
            <div id="menu" class="col-2 p-o m-o bg-dark " >
{{--                style="height: 100%;"--}}
                @include('Admin.menu')
            </div>

            <div id="content" class="col-10 flex-fill m-0 p-0 ">
                <div class="p-2">
                    <div class="row m-0 p-0">
                        @foreach($Info as $data)
                            <div class="w-100"
                                 style="background-image: url({{asset($data->img)}});min-height: 200px ;
                                         background-repeat: no-repeat !important;
                                         background-position: center center;
                                         background-size: cover;
                                         background-color: #444;
                                         background-blend-mode: overlay;
                                         ">
                                <div class="container">
                                    <div class="p-5">
                                        <h1 class="font-weight-normal font-weight-light"
                                            style="color: orange">{{$data->pitch_name}}</h1>
                                        <button class="btn btn-primary text-white badge">
                                            {{$data->area}}
                                        </button>
                                        <div class="pt-3 "
                                             style="font-family: 'Nunito', sans-serif; font-size:18px !important;">
                                            <table>
                                                <tbody class="text-white">
                                                {{--                                            <tr>--}}
                                                {{--                                                <td><i class="far fa-clock"></i>{{$data->open_time}}-{{$data->close_time}}</td>--}}
                                                {{--                                            </tr>--}}
                                                <tr>
                                                    <td><i class="fas fa-map-marker-alt "
                                                           style="font-size: 20px"></i>{{$data->address}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Chu san: {{$data->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>So dien thoai: {{$data->phone}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
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

            <div class="clearpostition clearfix col-12 p-0 m-0">
                @include('layouts.footer')
            </div>
        </div>
    </div>

@endsection
