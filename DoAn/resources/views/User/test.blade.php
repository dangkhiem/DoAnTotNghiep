@extends('layouts.app')
<link rel="stylesheet" href="{{asset('css/Dashboard.css')}}">
@section('content')
        <div class="container-fluid h-100 p-0 m-0">
            <div class="col-12 m-0 p-0 row d-flex d-block position-absolute" style="height: 100% !important;">
                <div class="col-3 p-0 m-0 bg-danger " style="height: 100%;">


                    <div id="myDIV">
                        <button class="btn btnUser">1</button>
                        <button class="btn btnUser active">2</button>
                        <button class="btn btnUser">3</button>
                        <button class="btn btnUser">4</button>
                        <button class="btn btnUser">5</button>
                    </div>
{{--                    <div id="myDIV">--}}
{{--                        <div class="row m-0 p-0">--}}
{{--                            <button class="btn btn-block rounded border active"><a href="#">dsabdas</a></button>--}}
{{--                        </div>--}}
{{--                        <div class="row m-0 p-0">--}}
{{--                            <button class="btn btn-block rounded border ">2</button>--}}
{{--                        </div>--}}

{{--                    </div>--}}
                </div>
                <div class=" col-9 p-0 m-0 bg-primary " style="height: 100% !important;">
                </div>
            </div>
        </div>
@endsection

<script>
    // Get the container element
    var btnContainer = document.getElementById("myDIV");

    // Get all buttons with class="btn" inside the container
    var btns = btnContainer.getElementsByClassName("btnUser");

    // Loop through the buttons and add the active class to the current/clicked button
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }
</script>
