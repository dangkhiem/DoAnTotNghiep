<div class="container">
    <h5>Danh sách các khoảng thời gian trống</h5>
    <div>
        <label for="" id="error-time" class="text-danger font-weight-bold"></label>
        <label for="" id="error-time-start" class="text-danger font-weight-bold"></label>
    </div>
    <div id="accordion">
        @foreach($Orders as $key=>$data)
            @if ($data->start == $data->end)
                @continue
            @endif
            <div class="pt-4">
                <div class="card ">
                    <div class="card-header" id="heading{{$key+1}}">
                        <h5 class="mb-0">
                            <button class="btn btn-group badge-danger" data-toggle="collapse"
                                    data-target="#collapse{{$key+1}}" aria-expanded="true"
                                    aria-controls="collapse{{$key+1}}">
                                {{$data->start}}-{{$data->end}}
                            </button>
                        </h5>
                    </div>

                    <div id="collapse{{$key+1}}" class="collapse " aria-labelledby="heading{{$key+1}}"
                         data-parent="#accordion">
                        <div class="card-body">
                            <form method="post"  id="FormOrder{{$key+1}}">
                                @csrf
                                <div class="row p-3">
                                    <div class="">
                                        <input type="hidden" name="pitch_id" value="{{{ $Data['pitch_id'] }}}">
                                        <input type="hidden" name="subpitch_id" value="{{{ $Data['subpitch_id'] }}}">
                                        <input type="hidden" name="date" value="{{{ $Data['date'] }}}">
                                        <input type="hidden" name="type" value="{{{ $Data['type'] }}}">
                                        <input type="hidden" name="name" value="{{{ $Data['name'] }}}">
                                        <label for="">StartTime</label>
                                        <select class="custom-select" id="inputGroupSelect{{$key+1}}" name="startTime">
                                            {{--                                    <option value="">Select Start time</option>--}}
                                            <?php $beginHour = \Illuminate\Support\Carbon::parse($data->start);
                                            $endHour = \Illuminate\Support\Carbon::parse($data->end);
                                            ?>
                                            @for($i = $beginHour; $i<$endHour; $i->addMinutes(30)){
                                            <option name=""
                                                    value="{{$i->toTimeString()}}">{{$i->toTimeString()}}</option>
                                            }
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="">
                                        <label for="">End Time</label>
                                        <select class="custom-select"  name="endTime">
                                            {{--                                    <option value="">Select End time</option>--}}
                                            <?php $beginHour = \Illuminate\Support\Carbon::parse($data->start);
                                            $endHour = \Illuminate\Support\Carbon::parse($data->end);
                                            ?>
                                            @for($i = $beginHour->addMinutes(30); $i<=$endHour; $i->addMinutes(30)){
                                            <option name=""
                                                    value="{{$i->toTimeString()}}">{{$i->toTimeString()}}</option>
                                            }
                                            @endfor
                                        </select>
                                    </div>
                                </div>
{{--                                <div>--}}
{{--                                    <label for="" id="error-time" class="text-danger"></label>--}}
{{--                                </div>--}}
                                <button class="btn btn-primary" type="button" onclick="OrderFunction('FormOrder{{$key+1}}')">Đăng Ký</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


<script type="text/javascript">
    function OrderFunction(form){
        $('#error-time').html('');
            var OrderForm = $("#"+form+"").serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('Order')}}",
                type: 'post',
                data: OrderForm,
                success: function (data) {
                    $('#dataSearch').html(data.view)
                    Swal.fire({
                        title: data.message,
                        showClass: {
                            popup: 'animated fadeInDown faster'
                        },
                        hideClass: {
                            popup: 'animated fadeOutUp faster'
                        }
                    })
                    // location.reload()
                },
                error: function (XMLHttpRequest) {
                    message =XMLHttpRequest.responseJSON.message
                    errors = XMLHttpRequest.responseJSON.errors
                    if (XMLHttpRequest.responseJSON.errors){
                        $('#error-time').html(errors.endTime);
                        $('#error-time-start').html(errors.startTime);
                    }
                    else {
                        Swal.fire({
                            title: message,
                            showClass: {
                                popup: 'animated fadeInDown faster'
                            },
                            hideClass: {
                                popup: 'animated fadeOutUp faster'
                            }
                        })
                    }

                }
            })

    }
</script>

