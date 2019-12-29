@extends('layouts.app')

@section('content')
    <div class="container-fluid h-100 p-0 m-0">
        <div class="col-12 p-0 m-0  row d-flex d-block position-absolute" style="height: 100%; min-height: 600px ">
            <div id="menu" class="col-2  p-0 m-0 bg-dark " >
                {{--                style="height: 100%;"--}}
                @include('Owner.component.OwnerSidebar')
            </div>
            <div id="contentOwner" class="col-10 flex-fill bg-white m-0 p-0">
                <div class="card card-body shadow">
                    <table class="table-striped table-hover font-weight-normal text-center">
                        <thead class="p-2">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Sân</th>
                            <th scope="col">Sân con</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Ngày</th>
                            <th scope="col">Giờ bắt đầu</th>
                            <th scope="col">Giờ kết thúc</th>
                            <th scope="col">Hóa đơn</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($ListOrder as $key => $data)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$data->name}}</td>
                                <td>{{$data->subpitch_name}}</td>
                                <td>{{$data->type}}</td>
                                <td>{{$data->date_order}}</td>
                                <td>{{$data->start_time}}</td>
                                <td>{{$data->end_time}}</td>
                                <td>{{$data->bill}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @if (!count($ListOrder))
                    <div class="card shadow col-9 mx-auto text-center">Không có danh sách đặt sân nào tồn tại...</div>
                @endif
            </div>

            {{--            <div class="clearpostition col-12 p-0 m-0">--}}
            {{--                @include('layouts.footer')--}}
            {{--            </div>--}}

        </div>
        {{--        <div class="col-12 p-0 m-0 clearpostition clearfix d-block">--}}
        {{--            @include('layouts.footer')--}}
        {{--        </div>--}}

    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#menuOwnerHistoryDB li a').addClass("active");
        });
    </script>
@endsection
