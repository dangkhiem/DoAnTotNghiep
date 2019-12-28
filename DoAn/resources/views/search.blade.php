@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">

                <div class="card-body card shadow m-3">
                    <form method="post" id="AjaxSearchData" action="{{route('Search')}}">
                        @csrf
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
                                <button type="submit" class="btn btn-success" id="btnAjaxSearchData">Tìm kiếm</button>
                            </div>

                    </div>
                    </form>
                </div>
                <div id="dataSearch">
                    @include('SearchComponent.AjaxSearch', ['getListPitch' => $getListPitch])
                </div>

            </div>
        </div>
    </div>

@endsection


<script type="text/javascript">
    // $(document).ready(function () {
    //     $("#btnAjaxSearchData").submit(function () {
    //
    //     })
    // });
{{--    AjaxSearchData--}}
</script>
