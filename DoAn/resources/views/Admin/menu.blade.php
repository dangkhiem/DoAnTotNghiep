<div id="menu_admin" class="bg-dark">
    <button id="btn_left_menu" data-toggle="collapse" data-target="#sidebar">
        <i class="fa fa-navicon fa-lg"><label class="text-white btn btn-group " for="">DashBoard</label>
        </i>
    </button>
    <div id="sidebar" class="bg-dark admin_ui_sidebar">
        <label class="text-white btn btn-group " for="">DashBoard</label>
        <hr class="p-o m-0">
        {{--<ul id="menu_admin_accounts" class="nav nav-pills nav-fill ">
            <li class="nav-item m-0 p-0">
                <a class="nav-link
                 text-left" href="#">
                    <i class="fa fa-user" id="test"></i> Profile</a>
            </li>
        </ul>--}}
        <ul id="menu_admin_catalogs" class="nav nav-pills nav-fill">
            <li class="nav-item m-0 p-0">
                <a class="nav-link text-left" href="{{route('catalogs.index')}}">
                    <i class="fa fa-list"></i> Catalog Management</a>
            </li>
        </ul>
        <ul id="menu_admin_products" class="nav nav-pills nav-fill">
            <li class="nav-item m-0 p-0">
                <a class="nav-link text-left" href="{{route('products.index')}}">
                    <i class="fa fa-product-hunt"></i> Product Management</a>
            </li>
        </ul>
        <ul id="menu_admin_users" class="nav nav-pills nav-fill">
            <li class="nav-item m-0 p-0">
                <a class="nav-link text-left" href="{{route('users')}}">
                    <i class="fa fa-users"></i> User Management</a>
            </li>
        </ul>
        <ul id="menu_admin_campaigns" class="nav nav-pills nav-fill">
            <li class="nav-item m-0 p-0">
                <a class="nav-link text-left" href="{{route('campaigns.index')}}">
                    <i class="fa fa-copyright"></i> Campaign Management</a>
            </li>
        </ul>
        <ul id="menu_admin_campaingdetails" class="nav nav-pills nav-fill">
            <li class="nav-item m-0 p-0">
                <a class="nav-link text-left" href="{{route('campaigndetails.index')}}">
                    <i class="fa fa-bookmark"></i> See Reporting</a>
            </li>
        </ul>
    </div>
</div>
