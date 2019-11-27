@extends('layouts.app')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@section('content')
    <div class=”row banner”>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="width: 100%;">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100 img-fluid" style="width: 100% ;height: 600px; object-fit: cover;"
                         src="{{asset('image/img1.png')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 img-fluid" style="width: 100% ;height: 600px; object-fit: cover;"
                         src="{{asset('image/img2.png')}}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 img-fluid" style="width: 100%  ;height: 600px;"
                         src="{{asset('image/img3.png')}}" alt="Third slide">
                </div>
            </div>
            {{--            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">--}}
            {{--                <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
            {{--                <span class="sr-only">Previous</span>--}}
            {{--            </a>--}}
            {{--            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">--}}
            {{--                <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
            {{--                <span class="sr-only">Next</span>--}}
            </a>
        </div>
    </div>


    <div>
        <div class="mx-auto red ">
            <div class="container mx-auto ">
                <div class="row">
                    <div class="col-xl-10">
                        <div class="text-center text-lg-left d-none d-md-block">
                            <p class="display-4 letter-spacing-1 mb-2 text-shadow" style="color: #fb8c00">Sporta</p>
                        </div>
                        <div class="text-center text-lg-left d-md-block">
                            <h3 class="display-5  text-shadow mb-3">
                                ĐẶT SÂN NHANH CHÓNG - TÌM ĐỐI DỄ DÀNG
                            </h3>
                        </div>
                        <div class="row m-0 p-0">
                            <form action="#" class="w-100 ">
                                <div class="row d-flex  p-0 m-0">
                                    <div class="col-6 align-items-center form-group p-0 m-0">
                                        <input type="text" name="search_string" id="search-input"
                                               placeholder="Tên Quận hoặc Tên sân bóng"
                                               class="form-control border-0 shadow-0 ui-autocomplete-input"
                                               autocomplete="off"><!-- params[:search_string] -->
                                    </div>
                                    <div class="col-2  p-0 m-0 input-group">
                                        <select class="custom-select" id="inputDate">
                                            <option value="1"
                                                    selected>{{ \Carbon\Carbon::now()->toDateString()}} </option>
                                            <option value="2">{{ \Carbon\Carbon::now()->add(1,'day')->toDateString() }} </option>
                                            <option value="3">{{ \Carbon\Carbon::now()->add(2,'day')->toDateString() }} </option>
                                            <option value="4">{{ \Carbon\Carbon::now()->add(3,'day')->toDateString() }} </option>
                                            <option value="5">{{ \Carbon\Carbon::now()->add(4,'day')->toDateString() }} </option>
                                            <option value="6">{{ \Carbon\Carbon::now()->add(5,'day')->toDateString() }} </option>
                                            <option value="7">{{ \Carbon\Carbon::now()->add(6,'day')->toDateString() }} </option>
                                        </select>
                                    </div>
                                    <div class="col-2  p-0 m-0 input-group">
                                        <select class="custom-select" id="inputTime">
                                            <option value="1"> {{\Carbon\Carbon::yesterday()->addHour(5)->toTimeString()}}   </option>
                                            <option value="1"> {{\Carbon\Carbon::yesterday()->addHour(6)->toTimeString()}}   </option>
                                            <option value="1"> {{\Carbon\Carbon::yesterday()->addHour(7)->toTimeString()}}   </option>
                                            <option value="1"> {{\Carbon\Carbon::yesterday()->addHour(8)->toTimeString()}}   </option>
                                            <option value="1"> {{\Carbon\Carbon::yesterday()->addHour(9)->toTimeString()}}   </option>
                                            <option value="1"> {{\Carbon\Carbon::yesterday()->addHour(10)->toTimeString()}}   </option>
                                            <option value="1"> {{\Carbon\Carbon::yesterday()->addHour(11)->toTimeString()}}   </option>
                                        </select>
                                    </div>
                                    <div class="col-2  p-0 m-0">
                                        <button type="submit" class="btn btn-primary btn-block rounded-xl ">Tìm kiếm
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="container  py-3">
            <div class="row p-0 m-0">
                <h2 class="mx-auto  text-warning-50">Nền tảng đặt sân với nhiều tiện ích</h2>
            </div>
            <div class="row p-o m-0">
                <div class="card card-body col-4">
                    <div class="px-0 px-lg-3">
                        <div class="icon-rounded bg-primary-light mb-3">
                            <img class="icon-image mx-auto d-block"
                                 src="https://www.sporta.vn/assets/book-d9bc1eefa8ffc1c1a130292a3714a9565f07b44eda536fe02456b2a55ba5af1b.svg"
                                 alt="Book">
                        </div>
                        <h3 class="h5 text-center">Công cụ quản lý sân bóng online</h3>
                        <p class="text-muted  text-center">Quản lý lịch đặt đơn giản, tiếp nhận đặt sân online dễ dàng,
                            lấp
                            đầy sân trống</p>
                    </div>
                </div>
                <div class="card card-body col-4">
                    <div class="px-0 px-lg-3">
                        <div class="icon-rounded bg-primary-light mb-3">
                            <img class="icon-image mx-auto d-block"
                                 src="https://www.sporta.vn/assets/info-b35871504f4af944c9e1f28c2419d2df5ee8fa2dcab47d650aa94d4c054eaa9a.svg"
                                 alt="Info">
                        </div>
                        <h3 class="h5 text-center">Tìm kiếm và đặt sân bóng online</h3>
                        <p class="text-muted text-center">Địa điểm, giá sân, giờ mở cửa,... các sân bóng trong khu vực
                            gần
                            nơi bạn ở.
                            Lựa chọn sân gần vị trí của bạn nhất, đặt sân online, tiện lợi, dễ dàng</p>
                    </div>
                </div>

                <div class="card card-body col-4">
                    <div class="px-0 px-lg-3">
                        <div class="icon-rounded bg-primary-light mb-3">
                            <img class="icon-image d-block mx-auto"
                                 src="https://www.sporta.vn/assets/pr-5099167e7f25e00100225c9db1dbd0fb96c51c1dd95fd7e2e9f90d5a3186c985.svg"
                                 alt="Pr">
                        </div>
                        <h3 class="h5 text-center">Tạo đội, tìm đối dễ với mobile app</h3>
                        <p class="text-muted text-center">
                            Tạo cơ hội cọ sát cho các cầu thủ, kết bạn muôn nơi, giải tỏa mội căng thẳng, áp lực công
                            việc
                        </p>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <h3 class="text-center row ml-1">Sân Bóng Nổi Bật</h3>
        <div class="row ">
            <div class="col-3">
                <div class="row imgRelative ml-1 mr-1" style="height: 300px;">
                    <div class="imgRS rounded" style="background-image: url({{asset('image/img1.png')}})">
                        <div class="textRelative">
                            <h5>Sân bóng Liên chiểu</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="row imgRelative ml-1 mr-1" style="height: 300px;">
                    <div class="imgRS rounded" style="background-image: url({{asset('image/img3.png')}})">
                        <div class="textRelative">
                            <h5>Sân bóng Hải Châu</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="row imgRelative ml-1 mr-1" style="height: 300px;">
                    <div class="imgRS rounded" style="background-image: url({{asset('image/img4.png')}})">
                        <div class="textRelative">
                            <h5>Sân bóng Cẩm Lệ</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="row imgRelative ml-1 mr-1" style="height: 300px;">
                    <div class="imgRS rounded" style="background-image: url({{asset('image/img5.png')}})">
                        <div class="textRelative">
                            <h5>Sân bóng Sơn Trà</h5>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>





    {{--    <div class="py-3">--}}
    {{--        <div class=" position-relative" >--}}
    {{--            <img alt="" class="bg-image w-100 position-absolute" src="https://www.sporta.vn/assets/handshake-ab7c15c813a3b0c5d04bce44da3f7601ea9a7fbdbdd54496b3fb0c6088539d53.jpg">--}}
    {{--            <div class="container position-absolute z-index-20">--}}
    {{--                <h1 class="text-warning">Sự hài lòng của bạn là niềm vui của chúng tôi</h1>--}}
    {{--            </div>--}}
    {{--            <div class="position-relative z-index-20" >--}}
    {{--                <div class="container  ">--}}
    {{--                    <div class="overlay-content  py-lg-5">--}}
    {{--                        <h3 class="display-3 font-weight-bold text-serif text-shadow mb-4 orange-text">Hợp tác với sporta</h3>--}}
    {{--                </div>--}}
    {{--            </div>--}}


    {{--        </div>--}}
    {{--    </div>--}}

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

