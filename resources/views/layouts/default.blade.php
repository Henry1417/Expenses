<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Expenses App</title>
    <!-- Fonts
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'> -->
    <!-- Styles -->
    <link href="/assets/css/font-awesome/4.4.0/css/font-awesome.css" rel='stylesheet' type='text/css'>
    <link href="/assets/css/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet" type='text/css'>
    <link href="/assets/css/fonts.css" rel="stylesheet" type='text/css'>
    <link href="/assets/css/layout.css" rel="stylesheet" type='text/css'>
    <link href="/assets/css/app.css" rel="stylesheet" type='text/css'>

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>

    </style>
</head>
<body id="app-layout">

    @yield('content')

    <footer>
        Copyright © 2016 PageLab
    </footer>

    <!-- JavaScripts -->
    <script src="/assets/js/libs/jquery/2.1.4/jquery.js"></script>
    <script src="/assets/js/libs/bootstrap/3.3.6/js/bootstrap.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
