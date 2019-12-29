@extends('layouts.app')

@section('content')

    <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
        <ul class="nav nav-pills flex-column">
            <li class="nav-item nav-pills">
                <a class="nav-link active" href="#">Overview</a>
            </li>
            <li class="nav-item">
                <a class="" href="#">Account Details</a>
            </li>
            <li class="nav-item">
                <a class="" href="#">Admin</a>
            </li>
            <li class="nav-item">
                <a class="" href="#">Transactions</a>
            </li>
            <li class="nav-item">
                <a class="" href="#">Contract</a>
            </li>
        </ul>
    </nav>
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click', 'ul li a' , function () {
                $(this).addClass('active')
            })

            // $('.nav-link').on('click', '.nav-item a', function (e) {
            //     $('.nav .nav-link').find(".active").removeClass("active");
            //     $(this).parent().addClass('active');
            // });
            // $('.nav-item').on('click', function() {
            //     $(this).addClass('active').siblings('li').removeClass('active');
            // });
            // $('.nav-item').on('click', function() {
            //     $(this).addClass('active').siblings('li').removeClass('active');
            // });
        })
    </script>
@stop

