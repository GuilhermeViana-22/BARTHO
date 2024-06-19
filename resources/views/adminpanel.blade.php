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
            <li><a class="nav-link btn btn-warning-doe btn-doe-principal btn-exit" onclick="irPara('{{ route('deslogar') }}')" style="color: #fff !important; padding: 5px;"><strong> DESLOGAR </strong></a></li>
        </ul>
    </div>

    <!-- Barra lateral -->
    <div class="sidebar">
        <div class="logo">
            <h2>BARTHÔ</h2><span>®</span>
            <img src="{{asset('img/ativo2.png')}}" height="55px" alt="logo da ONG">
        </div>
        <ul>
            <a href="{{route('arearestrita')}}"> <i class="fa fa-area-chart" aria-hidden="true"></i> <span>Dashboard</span></a>

            @permissao('animais.visualizar,animais.gerenciar')
            <li class="dropdown">
                <a href="#" class="dropdown-toggle"> <i class="fa fa-user-circle-o" aria-hidden="true"></i> <span>Cadastro</span></a>
                <ul class="dropdown-menu">
                    <a href="{{route('arearestrita.animais', ['tipo_id' => 1])}}"> <i class="fas fa-dog" aria-hidden="true"></i> <span>Cachorros</span></a>
                    <a href="{{route('arearestrita.animais', ['tipo_id' => 2])}}"> <i class="fas fa-cat" aria-hidden="true"></i> <span>Gatos</span></a>
                </ul>
            </li>
            @endpermissao

            @permissao('adocoes.visualizar,adocoes.gerenciar')
            <li class="dropdown">
                <a href="#" class="dropdown-toggle"> <i class="fa fa-user-circle-o" aria-hidden="true"></i> <span>Adoção</span></a>
                <ul class="dropdown-menu">
                    <a href="{{route('arearestrita.adocoes', ['tipo_id' => 1])}}"> <i class="fas fa-dog" aria-hidden="true"></i> <span>Cachorros</span></a>
                    <a href="{{route('arearestrita.adocoes', ['tipo_id' => 2])}}"> <i class="fas fa-cat" aria-hidden="true"></i> <span>Gatos</span></a>
                </ul>
            </li>
            @endpermissao

            @permissao('usuarios.visualizar,usuarios.gerenciar,permissoes.gerenciar')
            <a href="{{route('arearestrita.usuarios')}}"> <i class="fa fa-user-circle-o" aria-hidden="true"></i> <span>Usuários</span></a>
            @endpermissao

            @permissao('configuracoes.perguntas.visualizar,configuracoes.perguntas.gerenciar')
            <li class="dropdown">
                <a href="#" class="dropdown-toggle"> <i class="fa fa-cogs" aria-hidden="true"></i> <span>Configurações</span></a>
                <ul class="dropdown-menu">
                    <a href="{{route('arearestrita.configuracoes.adocoesperguntas')}}"> <i class="fas fa-dog" aria-hidden="true"></i> <span>Perguntas para adoção</span></a>
                </ul>
            </li>
            @endpermissao
        </ul>
    </div>

    <!-- Conteúdo principal -->
    <div class="main-content">
        @yield('content')
    </div>
</section>

@endsection
