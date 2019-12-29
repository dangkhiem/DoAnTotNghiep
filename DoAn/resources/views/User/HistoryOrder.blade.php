@extends('layouts.app')
@section('content')
    <div class="container-fluid h-100 p-0 m-0">
        <div class="col-12 p-0 m-0 row d-flex position-absolute" style="height: 100% !important;">
            <div id="menu" class="col-2 m-0 p-0 bg-dark" style="height: 100% !important;">
                @include('User.UserSidebar')
            </div>

                <div id="content" class="col-10 flex-fill   m-0 p-0 border-top">
                    <div class="col-12 pt-2">
                        <div class="table-responsive">
                        <table class="table table-hover border">
                            <thead>
                            <tr>
                                <th scope="col">Stt</th>
                                <th scope="col">Pitch</th>
                                <th scope="col">Address</th>
                                <th scope="col">Type</th>
                                <th scope="col">Date</th>
                                <th scope="col">Start time</th>
                                <th scope="col">End time</th>
                                <th scope="col">Bill</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $data)

                                <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$data->name}}</td>
                                <td>{{$data->address}}</td>
                                <td>{{$data->type}}</td>
                                <td>{{$data->date_order}}</td>
                                <td>{{$data->start_time}}</td>
                                <td>{{$data->end_time}}</td>
                                <td>{{$data->bill }}</td>
                            </tr>
                            @endforeach
                            </tbody>

                        </table>
                        </div>
                    </div>
                </div>

        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#menuHistoryDB li a').addClass("active");
        });
    </script>
@endsection

