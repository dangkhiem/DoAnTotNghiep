<div class="modal fade" id="myEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
                    <div class="card card-signup">
                        <div class="card-body">
                            <h5 class="card-title text-center">Change User Informati0n</h5>
                            <form class="form-signup" method="POST" id="formEditUser">
                                @csrf
                                <div class="form-label-group">

                                    <input type="text" id="name-edit" class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}"  autocomplete="name" autofocus placeholder="Username" >
                                    <label for="name-edit">Username</label>
                                    <input type="text" id="user_id" class="form-control" name="user_id"
                                           autofocus placeholder="Username" hidden>
{{--                                    @error('name')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong id="add-error-name">{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
                                </div>

                                <div class="form-label-group">
                                    <input type="email" id="email-edit" class="form-control
@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email address"
                                           autofocus>
                                    <label for="email-edit">Email address</label>
{{--                                    @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong id="add-error-email">{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
                                </div>


                                <div class="form-label-group">
                                    <input type="text" id="phone-edit" class="form-control
@error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Phone number"
                                           autofocus>
                                    <label for="phone-edit">Phone number</label>
{{--                                    @error('phone')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong id="add-error-phone">{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
                                </div>


                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Change
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function editUserFunction(id) {
        $("#myEditModal").modal();
        // $('#edit-error-name').html('');
        // $('#edit-error-email').html('');
        // $('#edit-error-phone').html('');
        // $('#edit-error-password').html('');
        $.ajax({
            url: "admin/users/getInfoAUser",
            type: 'GET',
            data: {
                dataGet: id
            },
            success: function (data) {
                // $fullName = data.user[0]['full_name']
                // $email =data.user[0]['email'];
                // $phone = data.user[0]['phone_number'];
                // $id = data.user[0]['id'];
                $('#name-edit').val(data.user[0]['name'])
                $('#email-edit').val(data.user[0]['email'])
                $('#phone-edit').val(data.user[0]['phone'])
                $('#user_id').val(data.user[0]['id'])
                $('#password-edit').val(data.user[0]['password'])

                // $("#btn_edit").attr("disabled", "disabled");
                $(document).ready(function () {
                    var a =window.location.href;
                    var splitUrl = a.split('page=');
                    $('#page_number').val(splitUrl[1]);
                });
                // $("#btn_edit").prop("disabled", true)
                // $("#btn_edit").prop("disabled", false)
            }
        })
    }

    $(document).ready(function () {
        $('#formEditUser').submit(function (e) {
            e.preventDefault();
            // $('#edit-error-name').html('');
            // $('#edit-error-email').html('');
            // $('#edit-error-phone').html('');
            var editForm = $('#formEditUser').serialize();
            console.log(editForm)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: 'admin/users/edit',
                type: 'POST',
                data: editForm,
                success: function (data) {
                    $('#myEditModal').modal('hide');
                    // $('#search_data').html(data.view)
                    location.reload();
                    swal({
                        text: "updated",
                        icon: "success",
                    });
                },
                error: function (XMLHttpRequest) {
                    alert('loi cmnr')
                    console.log('loi roi')
                    errors = XMLHttpRequest.responseJSON.errors;
                    console.log(errors);
                    // $('#edit-error-name').html(errors.name);

                    // $('#edit-error-email').html(errors.email);
                    // $('#edit-error-phone').html(errors.phone);
                }
            })
        });
    });
    // $(document).ready(function(){
    //     $("#btn_edit").attr("disabled", "disabled");
    //     $("#formEditUser").change(function(){
    //         $("#btn_edit").removeAttr("disabled");
    //     });
    // });
</script>

