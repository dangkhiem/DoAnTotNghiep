@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex">
        <div id="menu" class="col-2 mr-auto flex-fill p-0 ">
            @include('Owner.component.OwnerSidebar')
        </div>

        <div id="content" class="col-10 flex-fill  m-0 p-0 border-top">
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
        </div>
    </div>

@endsection
