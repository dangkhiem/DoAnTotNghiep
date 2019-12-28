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
                <h5><i class="fa p-1">{{$data->open_time}} - {{$data->close_time}}</i></h5>
                <button class="btn btn-primary ml-auto  d-block"><a class="text-white"
                                                                    href="{{url(asset('search/'.$data->id))}}">Chi
                        tiết</a></button>
                {{--                                <a href="{{url(asset('search/'.$data->id))}}">Chi tiết</a>--}}
            </div>
        </div>
    </div>

@endforeach
