<div class="container">
    <div class="modal fade" id="addNewPitch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="row justify-content-center">
                    <div class="mx-auto col-lg-12 col-sm-12 col-md-12">
                        <div class="card  p-3">
                            <h3 class="card-title text-center text-danger align-middle d-block "> THÊM SÂN MỚI</h3>
                            <div class=" card-body shadow-lg p-3">
                                <form method="post" id="formAddPitch" enctype="multipart/form-data" class="">
                                    <div class="row form-row pb-2">
                                        <label for="name" class="m-0 p-0">Tên sân</label>
                                        <input type="text" name="name" class="form-control rounded-0" >
                                        <div class="text-danger">
                                            <label for="" class="m-0 p-0">
                                                <strong id="add-error-pitch"></strong>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <label for="exampleFormControlSelect1">Khu vực</label>
                                        <select class="form-control rounded-0" id="exampleFormControlSelect1" name="area">
                                            <option value="Hải Châu">Hải Châu</option>
                                            <option value="Cẩm Lệ">Cẩm Lệ</option>
                                            <option value="Thanh Khê">Thanh Khê</option>
                                            <option value="Liên Chiểu">Liên Chiểu</option>
                                            <option value="Ngũ Hành Sơn">Ngũ Hành Sơn</option>
                                            <option value="Sơn Trà">Sơn Trà</option>
                                            <option value="Hòa vang">Hòa vang</option>
                                        </select>
                                        <div class="text-danger">
                                            <label for="" class="m-0 p-0">
                                                <strong id="add-error-area"></strong>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row form-row  pb-2">
                                        <label for="address" class="m-0 p-0">Địa chỉ</label>
                                        <input type="text" name="address" class="form-control rounded-0">
                                        <div class="text-danger">
                                            <label for="" class="m-0 p-0">
                                                <strong id="add-error-address"></strong>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <label for="TimeOpen">Thời gian mở cửa</label>
                                        <select class="form-control rounded-0" id="TimeOpen" name="open_time">
                                            <?php $start = "00:00"; $end = "23:30";
                                            $beginHour = \Illuminate\Support\Carbon::parse($start);
                                            $endHour = \Illuminate\Support\Carbon::parse($end);
                                            ?>
                                            @for ($i = $beginHour; $i<=$endHour;  $i->addMinutes(30))
                                                <option value=" {{$i->toTimeString()}}"> {{$i->toTimeString()}}   </option>
                                            @endfor
                                        </select>
                                        <div class="text-danger">
                                            <label for="" class="m-0 p-0">
                                                <strong id="add-error-open-time"></strong>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <label for="TimeClosed">Thời gian đóng cửa</label>
                                        <select class="form-control rounded-0" id="TimeClosed" name="close_time">
                                            <?php $start = "00:00"; $end = "23:30";
                                            $beginHour = \Illuminate\Support\Carbon::parse($start);
                                            $endHour = \Illuminate\Support\Carbon::parse($end);
                                            ?>
                                            @for ($i = $beginHour; $i<=$endHour;  $i->addMinutes(30))
                                                <option value=" {{$i->toTimeString()}}"> {{$i->toTimeString()}}   </option>
                                            @endfor
                                        </select>
                                        <div class="text-danger">
                                            <label for="" class="m-0 p-0">
                                                <strong id="add-error-close-time"></strong>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row form-row  pb-2">
                                        <label for="image" class="m-0 p-0">Image</label>
                                        <input type="file" name="img" accept="image/*" class="form-control rounded-0" onchange="loadFile(event)">
                                        <img src=""  id="output" style="width: 100%;" max-height="150px">

                                        <div class="text-danger">
                                            <label for="" class="m-0 p-0">
                                                <strong id="add-error-img"></strong>
                                            </label>
                                        </div>
                                    </div>
                                    <button class="btn btn-group btn-success float-right  rounded-0" type="submit">Add</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var loadFile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#formAddPitch').submit(function (e) {
            e.preventDefault();
            $('#add-error-pitch').html('')
            $('#add-error-area').html('')
            $('#add-error-address').html('')
            $('#add-error-open-time').html('')
            $('#add-error-close-time').html('')
            $('#add-error-img').html('')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{route("StorePitch")}}',
                type: 'post',
                data: new FormData(this),
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    $('#addNewPitch').modal('hide');
                    // $('#search_data').html(data.view)
                    location.reload()
                    swal({
                        text: "create new",
                        icon: "success",
                    });
                },
                error: function (XMLHttpRequest) {
                    errors = XMLHttpRequest.responseJSON.errors
                    console.log(errors)
                    $('#add-error-pitch').html(errors.name);
                    $('#add-error-area').html(errors.area);
                    $('#add-error-address').html(errors.address);
                    $('#add-error-open-time').html(errors.start_time);
                    $('#add-error-close-time').html(errors.end_time);
                    $('#add-error-img').html(errors.img);

                }
            })
        })
    });
</script>

