<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BARTHÔ</title>


        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('site/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('site/css/custom.css') }}">

        <style>
            body {
                margin: 0;
                padding: 0;
                overflow-x: hidden;
                font-family: 'Roboto', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
    @include('Components.Header.index')
    @include('Components.Banner.index')
    @include('Components.Footer.index')
    </body>
<script type="text/javascript" src="{{asset('site/bootstrap.js')}}"></script>
</html>
