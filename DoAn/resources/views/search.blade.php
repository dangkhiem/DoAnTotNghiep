@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">

                <div class="card-body card shadow m-3">
                    <form method="post">
                    <div class="row d-flex justify-content-center p-0 m-0">

                            <div class="col-6 p-0 m-0">
                                <input type="text" name="name" value="{{\Request::get('name') ?? ''}}"
                                       class="form-control"
                                       placeholder="Nhập tên sân bóng hoặc địa chỉ">
                            </div>
                            <div class="col-2 form-group">
                                <select class="custom-select" id="inputTime" name="time">
                                    <option value="{{\Request::get('time') ?? ''}}">{{\Request::get('time') ?? ''}}</option>
                                    <?php $start = "05:00"; $end = "23:30";
                                    $beginHour = \Illuminate\Support\Carbon::parse($start);
                                    $endHour = \Illuminate\Support\Carbon::parse($end);
                                    ?>
                                    @for ($i = $beginHour; $i<=$endHour;  $i->addMinutes(30))
                                        <option value=" {{$i->toTimeString()}}"> {{$i->toTimeString()}}   </option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-2 form-group">
                                <select class="custom-select" id="inputDate" name="date">
                                    <option value="{{\Request::get('date') ?? ''}}">{{\Request::get('date')}}</option>
                                    @for ($i =0; $i<=6;  $i++)
                                        <option value=" {{\Carbon\Carbon::now()->add($i,'day')->toDateString()}}"> {{\Carbon\Carbon::now()->add($i,'day')->toDateString()}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-2 form-group">
                                <button type="submit" class="btn btn-success">Tìm kiếm</button>
                            </div>

                    </div>
                    </form>
                </div>
                @foreach ($getListPitch as $data)


                    <div class="card card-body m-3 shadow ">
                        <div class="row p-0 m-0">
                            <div class="col-4 pl-3 pr-3 m-0 pb-0">
                                <img class="img-fluid" src="{{asset($data->img)}}" alt="" style="">
                            </div>
                            <div class="col-8 align-self-center">
                                <h3 class="text-uppercase text-info p-1">{{$data->name}}</h3>
                                <h5><i class="fa fa-map-marker p-1" aria-hidden="true">{{$data->address}}</i></h5>
                                <h5><i class="fa p-1">Area: {{$data->area}}</i></h5>
                                <button class="btn btn-primary ml-auto  d-block"><a class="text-white"
                                                                                    href="{{url(asset('search/'.$data->id))}}">Chi
                                        tiết</a></button>
                                {{--                                <a href="{{url(asset('search/'.$data->id))}}">Chi tiết</a>--}}
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
@endsection
