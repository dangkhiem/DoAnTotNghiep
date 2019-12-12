<link rel="stylesheet" href=""{{asset('css/Dashboard.css')}} type="text/css">
<div id="" class="bg-secondary">
    <div id="sidebar" class="UserDash text-white">
        <h2>DashBoard</h2>
        <hr class="p-o m-0">
        <ul id="" class="nav nav-pills nav-fill">
            <li class="nav-item m-0 p-0">
                <a class="nav-link text-left" href="{{route('userDashboard')}}">
                    <i class="fa fa-users"></i> Personal information</a>
            </li>
        </ul>
        <ul id="" class="nav nav-pills nav-fill">
            <li class="nav-item m-0 p-0">
                <a class="nav-link text-left" href="{{route('UserOrder')}}">
                    <i class="fa fa-product-hunt"></i> Order Management</a>
            </li>
        </ul>
        <ul id="" class="nav nav-pills nav-fill">
            <li class="nav-item m-0 p-0">
                <a class="nav-link text-left" href="{{route('HistoryOrder')}}">
                    <i class="fa fa-product-hunt"></i> History Management</a>
            </li>
        </ul>
    </div>
</div>
