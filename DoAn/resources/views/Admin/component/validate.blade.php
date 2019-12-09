<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sample Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        .inline-label {
            white-space: nowrap;
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
            float:left;
        }
    </style>
{{--    <script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>--}}
{{--    <script type="text/javascript" src="/js/jquery.validate.min.js"></script>--}}
</head>
<body>
{{--@section('content')--}}

    <div class="container">
        <div>
            <label for="id1" class="inline-label">This is the dummy text i want to display::</label>
            <input type="text" id="id1"/>
        </div>
    </div>

{{--<div>--}}
{{--    <div class="pb-2"><strong>Provide User Information</strong></div>--}}
{{--    <form id="sampleUserInfoForm" action="#" method="get">--}}
{{--        <div class="form-group">--}}
{{--            <span>First Name: </span><input type="text" id="firstName" name="firstName">--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <span>Last Name: </span><input type="text" id="lastName" name="lastName">--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <span>Favorite Movie: </span><input type="text" id="favoriteMovie" name="favoriteMovie">--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <button type="submit">Submit</button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--</div>--}}
</body>
</html>

<script type="text/javascript">
    $(document).ready(function () {
        $("#sampleUserInfoForm").validate({
            rules: {
                firstName: {
                    required: true
                },
                lastName: {
                    required: true
                },
                favoriteMovie: {
                    required: true
                }
            },
            messages: {
                firstName: {
                    required: "First Name is a required field!!!"
                },
                lastName: {
                    required: "Last Name is a required field!!!"
                },
                favoriteMovie: {
                    required: "Favorite movie is a required field!!!"
                }
            }
        });
    });
</script>
{{--@endsection--}}
