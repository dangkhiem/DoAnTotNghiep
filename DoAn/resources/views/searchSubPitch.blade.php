@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
      type="text/css">
@section('content')
    <div class="container">
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

        <div class="row pt-3 m-0 ">
            <div class="card-body card shadow ">
                <div class="row p-0 m-0">

                    <div class="col-4">
                        <div class="row ">
                            <div class="col-12">
                                <div class="card-body card shadow">
                                    <h1 class="text-center text-white" style="background-color: #ff9800">Sân 5</h1>
                                    @foreach ($ListPrice as $data)
                                        @if ($data->type ==5)
                                            <table class="table table-striped text-center align-middle table-bordered">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Giờ bắt đầu</th>
                                                    <th scope="col">Giờ kết thúc</th>
                                                    <th scope="col">Giá(Nghìn đồng/h)</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>{{$data->start_time}}</td>
                                                    <td>{{$data->end_time}}</td>
                                                    <td>{{$data->cost}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        @endif

                                    @endforeach

                                    <h1 class="text-center text-white" style="background-color: #ff9800">Sân 7</h1>
                                    @foreach ($ListPrice as $data)
                                        @if ($data->type ==7)
                                            <table class="table table-striped text-center align-middle table-bordered">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Giờ bắt đầu</th>
                                                    <th scope="col">Giờ kết thúc</th>
                                                    <th scope="col">Giá(Nghìn đồng/h)</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>{{$data->start_time}}</td>
                                                    <td>{{$data->end_time}}</td>
                                                    <td>{{$data->cost}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        @endif

                                    @endforeach
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card card-body shadow">
                            <div class="row p-0 m-0">
                                <form  class="w-100" method="post" id="FormSearchFreeTime">
                                    @csrf
                                    <div class="row d-flex  p-0 m-0">
                                        <div class="col-6 p-0 m-0 input-group">
                                            <select class="custom-select" id="inputDate" name="subpitch_id">
                                            @foreach ($SubPitch as $data)
                                                    <option value="{{$data->id}}">{{$data->name}} (Sân {{$data->type}} người)</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="col-4  p-0 m-0 input-group">
                                            <select class="custom-select" id="inputDate" name="date">
                                                @for ($i =0; $i<=6;  $i++)
                                                    <option value=" {{\Carbon\Carbon::now()->add($i,'day')->toDateString()}}"> {{\Carbon\Carbon::now()->add($i,'day')->toDateString()}}</option>
                                                @endfor
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

                        <div class="card card-body shadow">
                            <div id="dataSearch">
                                <h5>Chọn sân và thời gian rồi nhấn Button tìm kiếm để tìm thời gian trống...</h5>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#FormSearchFreeTime').submit(function (e) {
                e.preventDefault();
                var searchForm = $('#FormSearchFreeTime').serialize();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('SearchFreeTime')}}",
                    type: 'post',
                    data: searchForm,
                    success: function (data) {
                        $('#dataSearch').html(data.view)
                    },
                    error: function (XMLHttpRequest) {
                        alert('123')
                        // $("#btn_getStarted").attr("disabled", "disabled");
                        errors = XMLHttpRequest.responseJSON.errors
                    }
                })
            })
        });
    </script>
@endsection
