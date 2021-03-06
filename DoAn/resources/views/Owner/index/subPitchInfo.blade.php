@extends('layouts.app')
{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">--}}
{{--<link rel="stylesheet" href="{{asset('css/subPitch.css')}}">--}}
@section('content')

    <div class="container-fluid d-flex p-0 m-0">
        <div id="menu" class="col-2 mr-auto flex-fill p-0 m-0 bg-dark">
            @include('Owner.component.OwnerSidebar')
        </div>

        <div id="content" class="col-10 flex-fill m-0 p-0 ">
            <div class="row m-0 p-0">
                @foreach($Pitch as $data)
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
                                <h1 class="font-weight-normal font-weight-light" style="color: orange">{{$data->name}}</h1>
                                <button class="btn btn-primary text-white badge">
                                    {{$data->area}}
                                </button>
                                <div class="pt-3 " style="font-family: 'Nunito', sans-serif; font-size:18px !important;">
                                    <table>
                                        <tbody class="text-white">
                                        <tr>
                                            <td><i class="far fa-clock"></i>{{$data->open_time}}-{{$data->close_time}}</td>
                                        </tr>
                                        <tr>
                                            <td><i class="fas fa-map-marker-alt "
                                                   style="font-size: 20px"></i>{{$data->address}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="container ">
                {{--form 5--}}
                <div class="card card-body p-5 m-3  shadow">
                    <h1 class="text-uppercase text-center text-white p-2" style="background-color: #fb8c00">Sân 5 người</h1>
                    <div class="row">
                        <div class="col-4">
                            <h3>Danh sách sân</h3>

                            @foreach($ListSubPitch as $data)
                                @if ($data->type == 5)
                                    <form action="#">
                                        @csrf
                                        <div class="input-group p-2">
                                            <input class="form-control width100" placeholder="Tên Sân"
                                                   name="SubPitchName" value="{{$data->name}}">
                                            <span class="input-group-btn">
                                            <button class="btn btn-success" disabled type="submit">Lưu</button>
                                            <button class="btn btn-danger" type="button"
                                                    onclick="FunctionDeleteSubPitch({{$data->id}})">Xóa</button>
                                    </span>
                                        </div>
                                    </form>
                                @endif
                            @endforeach
                            <div class="font-weight-bold">
                                <hr class="border-dark">
                            </div>

                            {{--form thêm sân--}}
                            <form method="post" id="formAddSubPitch" class="p-2">
                                @csrf
                                <div class="input-group">
                                    @foreach ($Pitch as $data)
                                        <input type="hidden" name="pitch_id" value="{{$data->id}}">
                                    @endforeach
                                    <input type="hidden" name="type" value="5">
                                    <input class="form-control width100" placeholder="Tên Sân" name="SubPitchName">
                                    <span class="input-group-btn">
                                            <button class="btn btn-primary" type="submit">Thêm</button>
                                    </span>
                                </div>
                                <div class="w-100 p-0 m-0">
                                    <label for="" class="m-0 p-0 row bg-danger text-white"
                                           id="add-error-sub-name">
                                    </label>
                                </div>
                            </form>


                        </div>

                        <div class="col-8">
                            <h3>Khung Giá</h3>
                            {{--                            view gia thue san theo thoiw gian--}}
                            @foreach ($ListPrice as $price)
                                @if ($price->type ==5)

                                    <form method="post" class="p-2">
                                        @csrf
                                        <div class="input-group">
                                            <input type="hidden" value="{{$price->pitch_id}}" name="pitch_id">
                                            <input type="hidden" value="5" name="type">
                                            <input class="form-control width100" name="" value="{{$price->start_time}}">
                                            <input class="form-control width100" name="" value="{{$price->end_time}}">
                                            <input class="form-control width100" name="" value="{{$price->cost}}">
                                            <span class="input-group-btn">
                                            <button class="btn btn-success" type="submit" disabled onclick="">Lưu</button>
                                            <button class="btn btn-danger" type="button"
                                                    onclick="FunctionDeletePrice({{$price->id}})">Xóa
                                            </button>
                                        </span>
                                        </div>
                                    </form>
                                @endif
                            @endforeach
                            <div class="font-weight-bold">
                                <hr class="border-dark">
                            </div>
                            <form method="post" id="formAddPrice">
                                @csrf
                                @foreach ($Pitch as $dataPrice)
                                    <input type="hidden" value="{{$dataPrice->id}}" name="pitch_id">
                                    <input type="hidden" value="5" name="type">
                                    @break
                                @endforeach

                                @foreach($Pitch as $data)
                                    <?php $time1 = $data->open_time;
                                    $time2 = $data->close_time;
                                    ?>
                                @endforeach
                                <div class="input-group">
                                    <div class="form-label-group col-4">
                                        <label for="time5start">Thời gian bắt đầu</label>
                                        <select class="form-control rounded-0" id="time5start" name="start_time">
                                            <?php
                                            $beginHour = \Illuminate\Support\Carbon::parse($time1);
                                            $endHour = \Illuminate\Support\Carbon::parse($time2);
                                            ?>
                                            @for ($i = $beginHour; $i<=$endHour;  $i->addMinutes(30))
                                                <option value=" {{$i->toTimeString()}}"> {{$i->toTimeString()}}   </option>
                                            @endfor
                                        </select>

                                    </div>
                                    <div class="form-label-group col-4">
                                        <label for="time5end">Thời gian kết thúc</label>
                                        <select class="form-control rounded-0" id="time5end" name="end_time">
                                            <?php
                                            $beginHour = \Illuminate\Support\Carbon::parse($time1);
                                            $endHour = \Illuminate\Support\Carbon::parse($time2);
                                            ?>
                                            @for ($i = $beginHour; $i<=$endHour;  $i->addMinutes(30))
                                                <option value=" {{$i->toTimeString()}}"> {{$i->toTimeString()}}   </option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-label-group">
                                        <label for="Đơn giá">Đơn giá</label>
                                        <input class="form-control width100" name="cost">
                                    </div>
                                    <div class="w-100 p-0 m-0">
                                        <label for="" class="m-0 p-0 row bg-danger text-white"
                                               id="add-error-start_time">
                                        </label>
                                        <label for="" class="m-0 p-0 row bg-danger text-white" id="add-error-end_time">
                                        </label>
                                        <label for="" class="m-0 p-0 bg-danger text-white" id="add-error-cost">
                                        </label>
                                    </div>
                                    <span class="input-group-btn">
                                            <button type="submit" id="btnAddPrice" class="btn btn-success">Thêm</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                {{--form 7--}}
                <div class="card card-body p-5 m-3  shadow">
                    <h1 class="text-uppercase text-center text-white p-1" style="background-color: #fb8c00">Sân 7 người</h1>
                    <div class="row">
                        <div class="col-4">
                            <h3>Danh sách sân</h3>

                            @foreach($ListSubPitch as $data)
                                @if ($data->type == 7)
                                    <form action="#">
                                        @csrf
                                        <div class="input-group p-2">
                                            <input class="form-control width100" placeholder="Tên Sân"
                                                   name="SubPitchName" value="{{$data->name}}">
                                            <span class="input-group-btn">
                                            <button class="btn btn-success" disabled type="submit">Lưu</button>
                                            <button class="btn btn-danger" type="button"
                                                    onclick="FunctionDeleteSubPitch({{$data->id}})">Xóa</button>
                                    </span>
                                        </div>
                                    </form>
                                @endif
                            @endforeach
                            <div class="font-weight-bold">
                                <hr class="border-dark">
                            </div>

                            {{--form thêm sân--}}
                            <form method="post" id="formAddSubPitch7" class="p-2">
                                @csrf
                                <div class="input-group">
                                    @foreach ($Pitch as $data)
                                        <input type="hidden" name="pitch_id" value="{{$data->id}}">
                                    @endforeach
                                    <input type="hidden" name="type" value="7">
                                    <input class="form-control width100" placeholder="Tên Sân" name="SubPitchName">
                                    <span class="input-group-btn">
                                            <button class="btn btn-primary" type="submit">Thêm</button>
                                    </span>
                                </div>
                                <div class="w-100 p-0 m-0">
                                    <label for="" class="m-0 p-0 row bg-danger text-white"
                                           id="add-error-sub-name7">
                                    </label>
                                </div>
                            </form>


                        </div>

                        <div class="col-8">
                            <h3>Khung Giá</h3>
                            {{--                            view gia thue san theo thoiw gian--}}
                            @foreach ($ListPrice as $price)
                                @if ($price->type ==7)


                                    <form method="post" class="p-2">
                                        @csrf
                                        <div class="input-group">
                                            <input type="hidden" value="{{$price->pitch_id}}" name="pitch_id">
                                            <input type="hidden" value="7" name="type">
                                            <input class="form-control width100" name="" value="{{$price->start_time}}">
                                            <input class="form-control width100" name="" value="{{$price->end_time}}">
                                            <input class="form-control width100" name="" value="{{$price->cost}}">
                                            <span class="input-group-btn">
                                            <button class="btn btn-success" disabled type="submit" onclick="">Lưu</button>
                                            <button class="btn btn-danger" type="button"
                                                    onclick="FunctionDeletePrice({{$price->id}})">Xóa
                                            </button>
                                        </span>
                                        </div>
                                    </form>
                                @endif
                            @endforeach
                            <div class="font-weight-bold">
                                <hr class="border-dark">
                            </div>
                            <form method="post" id="formAddPrice7">
                                @csrf
                                @foreach ($Pitch as $dataPrice)
                                    <input type="hidden" value="{{$dataPrice->id}}" name="pitch_id">
                                    <input type="hidden" value="7" name="type">
                                    @break
                                @endforeach

                                <div class="input-group">
                                    <div class="form-label-group col-4">
                                        <label for="time7start">Thời gian bắt đầu</label>
                                        <select class="form-control rounded-0" id="time7start" name="start_time">
                                            <?php
                                            $beginHour = \Illuminate\Support\Carbon::parse($time1);
                                            $endHour = \Illuminate\Support\Carbon::parse($time2);
                                            ?>
                                            @for ($i = $beginHour; $i<=$endHour;  $i->addMinutes(30))
                                                <option value=" {{$i->toTimeString()}}"> {{$i->toTimeString()}}   </option>
                                            @endfor
                                        </select>

                                    </div>
                                    <div class="form-label-group col-4">
                                        <label for="time7end">Thời gian kết thúc</label>
                                        <select class="form-control rounded-0" id="time7end" name="end_time">
                                            <?php
                                            $beginHour = \Illuminate\Support\Carbon::parse($time1);
                                            $endHour = \Illuminate\Support\Carbon::parse($time2);
                                            ?>
                                            @for ($i = $beginHour; $i<=$endHour;  $i->addMinutes(30))
                                                <option value=" {{$i->toTimeString()}}"> {{$i->toTimeString()}}   </option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-label-group">
                                        <label for="Đơn giá">Đơn giá</label>
                                        <input class="form-control width100" name="cost">
                                    </div>
                                    <div class="w-100 p-0 m-0">
                                        <label for="" class="m-0 p-0 row bg-danger text-white"
                                               id="add-error-start_time7">
                                        </label>
                                        <label for="" class="m-0 p-0 row bg-danger text-white" id="add-error-end_time7">
                                        </label>
                                        <label for="" class="m-0 p-0 bg-danger text-white" id="add-error-cost7">
                                        </label>
                                    </div>
                                    <span class="input-group-btn">
                                            <button type="submit" id="btnAddPrice7"
                                                    class="btn btn-success">Thêm</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("#btnAddPrice").attr("disabled", "disabled");
            $("#formAddPrice").change(function () {
                $("#btnAddPrice").removeAttr("disabled");

                $("#btnAddPrice7").attr("disabled", "disabled");
                $("#formAddPrice7").change(function () {
                    $("#btnAddPrice7").removeAttr("disabled");
                });
            });
        });
        $(document).ready(function () {
            $('#formAddPrice').submit(function (e) {
                e.preventDefault();
                $('#add-error-start_time').html('')
                $('#add-error-end_time').html('')
                $('#add-error-cost').html('')
                var formAddPrice = $('#formAddPrice').serialize();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('StorePrice')}}",
                    type: 'post',
                    data: formAddPrice,
                    // dataType: "json",
                    // cache: false ,
                    // contentType:false,
                    success: function (data) {
                        // $('#myAddModal').modal('hide');
                        // $('#search_data').html(data.view)
                        location.reload()
                        swal({
                            text: "create new",
                            icon: "success",
                        });
                    },
                    error: function (XMLHttpRequest) {
                        // alert('123')
                        // $("#btn_getStarted").attr("disabled", "disabled");
                        errors = XMLHttpRequest.responseJSON.errors
                        console.log(errors)
                        $('#add-error-start_time').html(errors.start_time)
                        $('#add-error-end_time').html(errors.end_time)
                        $('#add-error-cost').html(errors.cost)
                    }
                })
            })

            $('#formAddSubPitch').submit(function (e) {
                e.preventDefault();
                $('#add-error-sub-name').html('')
                var formAddSubPitch = $('#formAddSubPitch').serialize();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('StoreSubPitch')}}",
                    type: 'post',
                    data: formAddSubPitch,
                    success: function (data) {
                        location.reload()
                        swal({
                            text: "Thêm sân thành công",
                            icon: "success",
                        });
                    },
                    error: function (XMLHttpRequest) {
                        errors = XMLHttpRequest.responseJSON.errors
                        console.log(errors)
                        $('#add-error-sub-name').html(errors.SubPitchName)
                    }
                })
            })



            $('#formAddPrice7').submit(function (e) {
                e.preventDefault();
                $('#add-error-start_time7').html('')
                $('#add-error-end_time7').html('')
                $('#add-error-cost7').html('')
                var formAddPrice = $('#formAddPrice7').serialize();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('StorePrice')}}",
                    type: 'post',
                    data: formAddPrice,
                    // dataType: "json",
                    // cache: false ,
                    // contentType:false,
                    success: function (data) {
                        // $('#myAddModal').modal('hide');
                        // $('#search_data').html(data.view)
                        location.reload()
                        swal({
                            text: "create new",
                            icon: "success",
                        });
                    },
                    error: function (XMLHttpRequest) {
                        // alert('123')
                        // $("#btn_getStarted").attr("disabled", "disabled");
                        errors = XMLHttpRequest.responseJSON.errors
                        console.log(errors)
                        $('#add-error-start_time7').html(errors.start_time)
                        $('#add-error-end_time7').html(errors.end_time)
                        $('#add-error-cost7').html(errors.cost)
                    }
                })
            })

            $('#formAddSubPitch7').submit(function (e) {
                e.preventDefault();
                $('#add-error-sub-name7').html('')
                var formAddSubPitch = $('#formAddSubPitch7').serialize();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('StoreSubPitch')}}",
                    type: 'post',
                    data: formAddSubPitch,
                    success: function (data) {
                        location.reload()
                        swal({
                            text: "create new",
                            icon: "success",
                        });
                    },
                    error: function (XMLHttpRequest) {
                        errors = XMLHttpRequest.responseJSON.errors
                        console.log(errors)
                        $('#add-error-sub-name7').html(errors.SubPitchName)
                    }
                })
            })


        });

        function FunctionDeletePrice(id) {
            Swal.fire({
                title: 'Bạn muốn xóa? ',
                text: "Bạn sẽ không thể hoàn tác khi thực hiện",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{route('deletePrice')}}",
                        type: 'delete',
                        data: {
                            dataGet: id,
                        },
                        success: function (data) {
                            if (data.message) {
                                Swal.fire({
                                    title: 'Oops...',
                                    text: data.message,
                                })
                            } else {
                                // $('#search_data').html(data.view)
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                            }
                            location.reload();
                        }
                    });
                }
            })
        }

        function FunctionDeleteSubPitch($id) {
            Swal.fire({
                title: 'Bạn muốn xóa sân này? ',
                text: "Bạn không thể hoàn tác khi thực hiện!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{route('deleteSubPitch')}}",
                        type: 'delete',
                        data: {
                            dataGet: $id,
                        },
                        success: function (data) {
                            if (data.message) {
                                Swal.fire({
                                    title: 'Oops...',
                                    text: data.message,
                                })
                            } else {
                                // $('#search_data').html(data.view)
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                            }
                            location.reload();
                        }
                    });
                }
            })
        }

    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#menuOwnerPitchDB li a').addClass("active");
        });
    </script>
@endsection
