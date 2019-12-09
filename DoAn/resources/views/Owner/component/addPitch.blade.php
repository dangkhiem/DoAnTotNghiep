<div class="container">
    <div class="modal fade" id="addNewPitch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="row justify-content-center">
                    <div class="mx-auto col-lg-12 col-sm-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center">Add new Pitch</h5>
                                <form method="post" id="formAddPitch" enctype="multipart/form-data">
                                    <div class="row form-row ">
                                        <label for="name">Pitch name</label>
                                        <input type="text" name="name" class="form-control">
                                        <div class="text-danger">
                                            <label for="" class="m-0 p-0">
                                                <strong id="add-error-pitch"></strong>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row form-row ">
                                        <label for="area">Area</label>
                                        <input type="text" name="area" class="form-control">
                                        <div class="text-danger">
                                            <label for="" class="m-0 p-0">
                                                <strong id="add-error-area"></strong>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row form-row ">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control">
                                        <div class="text-danger">
                                            <label for="" class="m-0 p-0">
                                                <strong id="add-error-address"></strong>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row form-row ">
                                        <label for="open_time">Time open</label>
                                        <input type="text" name="open_time" class="form-control">
                                        <div class="text-danger">
                                            <label for="" class="m-0 p-0">
                                                <strong id="add-error-open-time"></strong>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row form-row ">
                                        <label for="close_time">Time Closed</label>
                                        <input type="text" name="close_time" class="form-control">
                                        <div class="text-danger">
                                            <label for="" class="m-0 p-0">
                                                <strong id="add-error-close-time"></strong>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row form-row ">
                                        <label for="image">Image</label>
                                        <input type="file" name="img" class="form-control">
                                        <div class="text-danger">
                                            <label for="" class="m-0 p-0">
                                                <strong id="add-error-img"></strong>
                                            </label>
                                        </div>
                                        <div style="width: 200px; height: 200px" class="mx-auto">
                                        </div>
                                    </div>
                                    <button class="btn btn-group" type="submit">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                data: new  FormData(this),
                dataType: "json",
                cache: false ,
                contentType:false,
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
                    $('#add-error-open-time').html(errors.open_time);
                    $('#add-error-close-time').html(errors.close_time);
                    $('#add-error-img').html(errors.img);

                }
            })
        })
    });
</script>

