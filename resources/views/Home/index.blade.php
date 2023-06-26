<!DOCTYPE html>
<html lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:twitter="http://ogp.me/ns/twitter#">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/nova-logo.png') }}">
    <title>BARTHÔ</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">

    <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('banner.css') }}">
</head>

<body>
@include('Components.Header.index')
@include('Components.Banner.index')
<main class="master-container">
    @include('Components.Sobre.index')
    @include('Components.Doacoes.index')
</main>
@include('Components.Footer.index')
</body>

<!-- CDN do jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="{{asset('site/bootstrap.js')}}"></script>

</html>
