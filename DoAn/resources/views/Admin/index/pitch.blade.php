@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/adminIndex.css">
<link rel="stylesheet" href="css/signUpStyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@section('content')

    <div class="container-fluid h-100 p-0 m-0">
        <div class="col-12 p-0 m-0  row d-flex d-block position-absolute" style="height: 100%;">
            <div id="menu" class="col-2 p-o m-o bg-dark " >
                @include('Admin.menu')
            </div>
            <div id="content" class=" col-10 flex-fill bg-white m-0 p-0">
                <div class=" container">
                    <div class="justify-content-center">
                        @foreach ($getListPitch as $data)
                            <div class="card card-body w-100 mb-3">
                                <div class="row p-0 m-0" style="height: 150px;">
                                    <div class="col-4">
                                        <img class="img-fluid h-100" src="{{asset($data->img)}}" alt="">
                                    </div>
                                    <div class="col-8 pt-3 pb-3 align-self-center">
                                        <h3 class="text-uppercase text-info p-1">{{$data->name}}</h3>
                                        <h5><i class="fa fa-map-marker p-1" aria-hidden="true">{{$data->address}}</i></h5>
                                        <h5><i class="fa p-1">Area: {{$data->area}}</i></h5>
                                        <a href="{{ \Illuminate\Support\Facades\URL::to('admin/pitch/'.$data->id) }}">Chi tiết</a>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>

                    <div class="pagination-list-user justify-content-center d-flex">
                        <div class="m-auto align-content-center align-items-center">{{$getListPitch->links()}}</div>
                    </div>
                </div>
            </div>
            <div class="clearpostition clearfix col-12 p-0 m-0">
                @include('layouts.footer')
            </div>

        </div>
    </div>

@endsection

