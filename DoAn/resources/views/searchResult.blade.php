<div class="container">
    <div class="row">

        @foreach($Orders as $data)
            <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#exampleModal{{$data->id}}">
                {{$data->start}}-{{$data->end}}
            </button>
            <div class="modal fade" id="exampleModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form action="#">
                                @csrf
                                <div class="row p-3">
                                    <div class="">
                                        <label for="">StartTime</label>
                                        <select class="custom-select" id="inputGroupSelect01">
                                            {{--                                    <option value="">Select Start time</option>--}}
                                            <?php $beginHour = \Illuminate\Support\Carbon::parse($data->start);
                                            $endHour = \Illuminate\Support\Carbon::parse($data->end);
                                            ?>
                                            @for($i = $beginHour; $i<$endHour; $i->addMinutes(30)){
                                            <option name="" value="{{$i->toTimeString()}}">{{$i->toTimeString()}}</option>
                                            }
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="">
                                        <label for="">End Time</label>
                                        <select class="custom-select" id="inputGroupSelect02">
                                            {{--                                    <option value="">Select End time</option>--}}
                                            <?php $beginHour = \Illuminate\Support\Carbon::parse($data->start);
                                            $endHour = \Illuminate\Support\Carbon::parse($data->end);
                                            ?>
                                            @for($i = $beginHour->addMinutes(30); $i<=$endHour; $i->addMinutes(30)){
                                            <option name="" value="{{$i->toTimeString()}}">{{$i->toTimeString()}}</option>
                                            }
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="button">Đăng Ký</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
