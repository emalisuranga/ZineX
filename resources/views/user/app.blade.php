<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ZineX</title>
    <!-- Styles -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="{{ URL::asset('../css/login.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ URL::asset('../js/login.js')}}"></script>

</head>

<body>
    <!-- <div id="app">
        <main class="py-4"> -->
            @yield('content')
        <!-- </main>
    </div> -->
</body>

</html>