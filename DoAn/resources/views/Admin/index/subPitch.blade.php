@extends('layouts.app')

<link rel="stylesheet" href="{{asset('css/subPitch.css')}}">
@section('content')
    <div class="container-fluid p-0 m-0 ">
        @foreach($Pitch as $data)
{{--            banner--}}
            <div class="row resizeImg p-0 m-0">
                <div class="resizeImg" style="background-image: url({{asset($data->img)}});">
                </div>
            </div>

{{--        Pitch info--}}
            <div>

            </div>

            <div class="container mt-3 mb-5">
                <div class="row">
                    @if ($ListSubPitch->min('type') == 5)
                        <div class="col-6">
                            <div class="card card-body">
                                <h5 class="p-3 text-white text-center text-uppercase" style="background-color: #fb8c00">
                                    SÂN 5</h5>
                                <h5 class="text-center">{{$ListSubPitch->min('start_time')}}
                                    - {{$ListSubPitch->max('end_time')}}</h5>
                                {{--                            <h5>Bảng giá thuê sân theo giờ</h5>--}}
                                <div class="row" p-0 m-0>
                                    <div class="col-6 text-center">Thời gian</div>
                                    <div class="col-6 text-center">Đơn giá/h</div>
                                </div>
                                @foreach($ListSubPitch as $money)
                                    @if ($money->type == 5)
                                        <hr>
                                        <div class="text-center text-danger text row">
                                            <div class="col-6 text-center"><strong>{{$money->start_time}}
                                                    - {{$money->end_time}}</strong></div>
                                            <div class="col-6 text-center"><strong>  {{$money->cost}}(nghìn
                                                    đồng) </strong></div>

                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if ($ListSubPitch->max('type') == 7)
                        <div class="col-6">
                            <div class="card card-body">
                                <h5 class="p-3 text-white text-center text-uppercase" style="background-color: #fb8c00">
                                    SÂN 7</h5>
                                <h5 class="text-center">{{$ListSubPitch->min('start_time')}}
                                    - {{$ListSubPitch->max('end_time')}}</h5>
                                <div class="row" p-0 m-0>
                                    <div class="col-6 text-center">Thời gian</div>
                                    <div class="col-6 text-center">Đơn giá/h</div>
                                </div>
                                @foreach($ListSubPitch as $money)
                                    @if ($money->type == 7)
                                        <hr>
                                        <div class="text-center text-danger text row">
                                            <div class="col-6 text-center"><strong>{{$money->start_time}}
                                                    - {{$money->end_time}}</strong></div>
                                            <div class="col-6 text-center"><strong>  {{$money->cost}}(nghìn
                                                    đồng) </strong></div>
                                        </div>
                                    @endif
                                @endforeach
                                <div></div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        @endforeach
    </div>

    {{--    FOOTER--}}
    <div class="py-5  text-muted clearpostition">
        <div class="container ">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                    <h6 class="font-weight-bold text-uppercase text-dark mb-3">Về Sporta</h6>
                    <ul class="list-unstyled">
                        <li><a href="/pages/about-us" class="text-muted">Giới thiệu Sporta</a></li>
                        <li><a href="/bai-viet/" class="text-muted">Blog</a></li>
                        <li><a href="/pages/dieu-khoan-su-dung" class="text-muted">Điều khoản sử dụng</a></li>
                        <li><a href="/pages/chinh-sach-bao-mat" class="text-muted">Chính sách bảo mật</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-5 mb-lg-0">
                    <div class="font-weight-bold text-uppercase text-dark mb-3">Thông tin liên hệ</div>
                    <ul class="list-unstyled">
                        <li class="text-muted"><a href="https://www.facebook.com/sportavn/" target="_blank"
                                                  title="facebook" class="text-muted text-hover-primary"><i
                                        class="fab fa-facebook"></i> /sportavn</a></li>
                        <li class="text-muted"><a class="text-muted text-hover-primary" href="mailto:hello@sporta.vn"><i
                                        class="fas fa-envelope"></i> hello@sporta.vn</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                    <h6 class="text-uppercase text-dark mb-3 font-weight-bold">Thanh toán</h6>
                    <ul class="list-unstyled">
                        <li class="text-muted"><a class="text-muted text-hover-primary"><img
                                        style="height: 25px; margin-bottom: 10px"
                                        src="https://www.sporta.vn/assets/momo-f2c88c55af645265139d91c8ec6e31182b68283d335ef35dff10bc90da8ddb3b.png"
                                        alt="Momo"> Momo</a></li>
                        <li class="text-muted"><a class="text-muted text-hover-primary"><i
                                        class="fas fa-money-check-alt" style="font-size: 20px;"></i> Tiền mặt</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                    <h6 class="text-uppercase text-dark mb-3 font-weight-bold">Ứng dụng di động</h6>
                    <ul class="list-unstyled">
                        <li><a href="https://apps.apple.com/vn/app/sporta/id1469001632"><img style="width: 150px"
                                                                                             src="https://www.sporta.vn/assets/icon-appstore-0ac658e90248e413db2bdc584e50b25b06a8229f6a74efb816b93194d0491829.svg"
                                                                                             alt="Icon appstore"></a>
                        </li>
                        <li><a href="https://play.google.com/store/apps/details?id=vn.sporta.sportaandroid"><img
                                        style="width: 150px"
                                        src="https://www.sporta.vn/assets/icon-googleplaystore-87014b724e646f2c8dce71506e67424975dd3f81a59b3e8f356ce501a0c6e458.svg"
                                        alt="Icon googleplaystore"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
