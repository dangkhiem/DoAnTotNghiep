<link rel="stylesheet" href=""{{asset('css/Dashboard.css')}} type="text/css">
<div id="" class="bg-dark">
    <div id="sidebar" class="UserDash text-white">
        <h5 class="nav-link text-left">DashBoard</h5>
        <hr class="p-o m-0">
        <ul id="menuUserDB" class="nav nav-pills nav-fill">
            <li class="nav-item m-0 p-0 ">
                <a class="nav-link text-left "  href="{{route('userDashboard')}}">
                    <i class="fa fa-users"></i> Personal information</a>
            </li>
        </ul>
        <ul id="menuOrderDB" class="nav nav-pills nav-fill">
            <li class="nav-item m-0 p-0">
                <a class="nav-link text-left" href="{{route('UserOrder')}}">
                    <i class="fa fa-list"></i> Order Management</a>
            </li>
        </ul>
        <ul id="menuHistoryDB" class="nav nav-pills nav-fill">
            <li class="nav-item m-0 p-0">
                <a class="nav-link text-left" href="{{route('HistoryOrder')}}">
                    <i class="fa fa-history"></i> History Management</a>
            </li>
        </ul>
    </div>
</div>
