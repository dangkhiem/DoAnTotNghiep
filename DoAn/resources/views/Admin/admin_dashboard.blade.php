@extends('layouts.app')
@section('content')
    <div id="menu_and_content_admin" class="flex">
        @include('Admin.menu')
        @yield('content_dashboard')
    </div>
@endsection
