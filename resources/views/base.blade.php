<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/nova-logo.png') }}">
    <title>BARTHÔ</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Knewave&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('site/font-awesome-4.7.0/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('site/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/fileinput.min.cs') }}">
    <link rel="stylesheet" href="{{ asset('site/css/fileinput-rtl.min.css') }}">

    <!-- Styles -->
    @hasSection('css')
        @yield('css')
    @else
        <link rel="stylesheet" href="{{ asset('site/css/custom.css') }}">
    @endif

    <link rel="stylesheet" href="{{ asset('site/css/Toast.css') }}">

    <script>
        const BASE_URL = "<?php echo e(route('home.index')); ?>";
    </script>
</head>
<body>

<div class="content">
    @yield('conteudo')
</div>

<div id="modal_area"></div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{asset('site/js/main.js')}}"></script>
<script src="{{asset('site/bootstrap.js')}}"></script>
<script src="{{asset('site/js/sweetalert2.all.js')}}"></script>
<script src="{{asset('site/js/fileinput.js')}}"></script>
<script src="{{asset('site/js/fileupload.js')}}"></script>
{{--<script src="{{asset('site/js/Toast.js')}}"></script>--}}


@if (Session::has('message_success'))
    <script>
        Swal.fire({
            title: "Sucesso!",
            text: "{{Session::get('message_success')}}",
            icon: "success"
        });
    </script>
@endif

@if (Session::has('message_error'))
    <script>
        Swal.fire({
            title: "Erro!",
            text: "{{Session::get('message_error')}}",
            icon: "error"
        });
    </script>
@endif

@yield('js')

</body>
</html>
