@php use \App\Http\Controllers\AreaRestrita\UsuariosController; @endphp
@extends('adminpanel')

@section('content')

    <div class="page-header">
        <p>Resultados da pesquisa de Usuários </p>

        <button type="button" class="btn btn-success btn-new" onclick="irPara('{{route('arearestrita.usuarios.incluir')}}')">
            Incluir
        </button>
    </div>

    <div class="form-panel">
        <div class="form-body row">
            <form class="row" id="form_filtro_usuarios_index">
                @csrf

                <input type="hidden" name="session_name" value="{{UsuariosController::SESSION_INDEX}}">

                <div class="col col-12 col-lg-4 col-md-6 col-sm-12 mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do usuário" value="{{$session['nome'] ?? null}}">
                </div>

                <div class="col col-12 col-lg-4 col-md-6 col-sm-12 mb-3">
                    <label for="nome" class="form-label">E-mail</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="E-mail do usuário" value="{{$session['email'] ?? null}}">
                </div>
            </form>
        </div>
        <div class="form-footer">
            <div class="form-content">
                <button type="button" class="btn btn-primary btn-lupa" onclick="buscarFiltro('#form_filtro_usuarios_index', '{{route('arearestrita.session.salvar')}}')">Buscar</button>
                <button type="button" class="btn btn-secondary btn-trash" onclick="limparFiltro('#form_filtro_usuarios_index', '{{route('arearestrita.session.limpar')}}')">Limpar</button>
            </div>
        </div>
    </div>


    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">Opções</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($usuarios as $usuario)
            <tr>
                <td scope="row"> {{$usuario->id}} </td>
                <td> {{$usuario->nome}} </td>
                <td> <span class="badge badge-primary">{{$usuario->email}}</span> </td>
                <td>
                    <button type="button" class="btn btn-primary btn-eye" onclick="irPara('{{route('arearestrita.usuarios.visualizar', ['id' => $usuario->id])}}')">Visualizar</button>
                    <button type="button" class="btn btn-primary btn-edit" onclick="irPara('{{route('arearestrita.usuarios.alterar', ['id' => $usuario->id])}}')">Alterar</button>
                    <button type="button" class="btn btn-danger btn-trash" onclick="confirmarIrPara('Deseja deletar esse usuário?', '{{route('arearestrita.usuarios.excluir', ['id' => $usuario->id])}}')">Excluir</button>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <div class="table-footer">
        <p class="resultados">Total de resultados: {{ $usuarios->total() }} </p>
        {{ $usuarios->links('vendor.pagination.custom') }}
    </div>

@endsection
