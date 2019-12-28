<script type="text/javascript">
function deleteUser(id){
    Swal.fire({
        title: 'Bạn muốn xóa user này? ',
        text: "Bạn sẽ không thể hoàn tác khi thực hiện",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('DeleteUser')}}",
                type: 'delete',
                data: {
                    dataGet: id,
                },
                success: function (data) {
                    $('#contentUser').html(data.view)
                    if (data.message) {
                        Swal.fire({
                            title: 'Ooops ...',
                            text: data.message,
                        })
                    } else {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                }
            });
        }
    })
}
</script>
