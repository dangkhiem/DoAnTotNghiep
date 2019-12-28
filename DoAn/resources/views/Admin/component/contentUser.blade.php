<div class="table-wrapper table-responsive">
    <div class="table-title flex-fill">
        <div class="row p-0 m-0">
            <div>
                <h3>Quản lý User</h3>
            </div>
            <div class=" p-0 m-0 ml-auto">
                <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#exampleModal">
                    Thêm User
                </button>
            </div>
        </div>
    </div>
    <div class="table-responsive mx-auto  p-2">
        <table class="table  table-striped">
            <thead>
            <tr class="font-weight-light">
                <th>STT</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Vai trò</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($getListUser as $key => $data)
                <tr id="rowUser{{$data->id}}">
                    <td class="align-middle">{{$key+1}}</td>
                    <td class="align-middle">{{$data->name }}</td>
                    <td class="align-middle">{{$data->email }}</td>
                    <td class="align-middle">{{$data->phone}}</td>
                    @if ($data->role_id ==2)
                        <td class="align-middle text-danger font-weight-bold">
                            Shop
                        </td>
                    @elseif ($data->role_id ==3)
                        <td class="align-middle btn-group">
                            User
                        </td>

                    @endif
                    <td class="align-middle">
                        <div class="btn-group ">
                            <button type="button" class="btn bg-info  m-1 text-white"
                                    onclick="editUserFunction({{$data->id}})">
                                <i class="fa fa-edit text-white"></i>
                            </button>
                            @if(($data->role_id) > 2)
                                {{--                                                                                                @if(($data->role_id) != (\App\Enums\UserEnums::ADMIN))--}}
                                <button type="button" class="btn bg-danger  m-1 text-white "
                                        onclick="deleteUser({{$data->id}})">
                                    <i class="fa fa-trash"></i>
                                </button>

                            @endif
                        </div>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="clearfix mx-auto">

    </div>
</div>
<div class="pagination-list-user justify-content-center d-flex">
    <div class="m-auto align-content-center align-items-center">{{$getListUser->links()}}</div>
</div>
