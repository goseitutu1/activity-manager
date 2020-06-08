<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">
    <title>Activity Manager</title>

</head>

<body>
    <div class="wrapper">
        @include('includes.sidebar')
        @include('includes.main')
        <!-- bootstrap js import  -->
        <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
        <script>
            $(document).ready(function() {

                $('#sidebarCollapse').on('click', function() {
                    $('#sidebar').toggleClass('active');
                });
            });
        </script>
    </div>
</body>

</html>
