@php
    use \App\Models\User;
    use Illuminate\Support\Facades\Auth;

    $usuario = Auth::user();
@endphp
@extends('base')

@section('css')
    <link rel="stylesheet" href="{{ asset('site/css/admin.css') }}">
@endsection

@section('conteudo')

<section id="arearestrita">
    <!-- Barra de navegação -->
    <div class="navbar">
        <ul>
            <li><a href="{{route('home.index')}}">Site</a></li>
            <li><a class="nav-link btn btn-warning-doe btn-doe-principal btn-exit" href="{{ route('deslogar') }}" style="color: #fff !important; padding: 5px;"><strong> DESLOGAR </strong></a></li>
        </ul>
    </div>

    <!-- Barra lateral -->
    <div class="sidebar">
        <div class="logo">
            <h2>BARTHÔ</h2>
            <img src="{{asset('img/ativo2.png')}}" height="55px" alt="logo da ONG">
        </div>
        <ul>
            <a href="{{route('arearestrita')}}"> <i class="fa fa-area-chart" aria-hidden="true"></i> <li>Dashboard</li></a>
            <a href="{{route('arearestrita.animais', ['tipo_id' => 1])}}"> <i class="fas fa-dog" aria-hidden="true"></i> <li>Cachorros</li></a>
            <a href="{{route('arearestrita.animais', ['tipo_id' => 2])}}"> <i class="fas fa-cat" aria-hidden="true"></i> <li>Gatos</li></a>
            <a href="{{route('arearestrita.usuarios')}}"> <i class="fa fa-user-circle-o" aria-hidden="true"></i> <li>Usuários</li></a>
        </ul>
    </div>

    <!-- Conteúdo principal -->
    <div class="main-content">
        @yield('content')
    </div>
</section>

@endsection
