@php use \App\Http\Controllers\AreaRestrita\UsuariosController; @endphp
@extends('adminpanel')

@section('content')

    <div class="page-header">
        <h4>Consultar Usuários Cadastrados </h4>

        @permissao('usuarios.gerenciar')
        <button type="button" class="btn btn-success btn-new" onclick="irPara('{{route('arearestrita.usuarios.incluir')}}')">
            Incluir
        </button>
        @endpermissao
    </div>

    <div class="form-panel">
        <div class="form-body row">
            <form class="row" id="form_filtro_usuarios_index">
                @csrf

                <input type="hidden" name="session_name" value="{{UsuariosController::SESSION_INDEX}}">

                <div class="col col-12 col-lg-4 col-md-6 col-sm-12 mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome do usuário" value="{{$session['name'] ?? null}}">
                </div>

                <div class="col col-12 col-lg-4 col-md-6 col-sm-12 mb-3">
                    <label for="nome" class="form-label">E-mail</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="E-mail do usuário" value="{{$session['email'] ?? null}}">
                </div>

                <div class="col col-12 col-lg-4 col-md-4 col-sm-12 mb-3">
                    <label for="ativo" class="form-label">Ativo?</label>

                    <select class="form-select" id="ativo" name="ativo">
                        <option @if(empty($session['ativo'])) selected @endif value="">Selecione uma opção</option>
                        <option @if( !empty($session['ativo']) && $session['ativo'] === "on") selected @endif value="on">Sim</option>
                        <option @if( !empty($session['ativo']) && $session['ativo'] === "off") selected @endif value="off">Não</option>
                    </select>
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
            <th scope="col">Ativo?</th>
            <th scope="col">Opções</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($usuarios as $usuario)
            <tr>
                <td scope="row"> {{$usuario->id}} </td>
                <td> {{$usuario->name}} </td>
                <td> <span class="badge badge-primary">{{$usuario->email}}</span> </td>
                <td> <span class="badge badge-{{$usuario->ativo ? 'success' : 'danger'}}"> {{$usuario->ativo ? "SIM" : "NÃO"}} </span> </td>
                <td>
                    @permissao('usuarios.visualizar,usuarios.gerenciar')
                    <button type="button" class="btn btn-primary btn-eye" onclick="irPara('{{route('arearestrita.usuarios.visualizar', ['id' => $usuario->id])}}')">Visualizar</button>
                    @endpermissao

                    @permissao('usuarios.gerenciar')
                    <button type="button" class="btn btn-primary btn-edit" onclick="irPara('{{route('arearestrita.usuarios.alterar', ['id' => $usuario->id])}}')">Alterar</button>

                    @if($usuario->id != 1)
                        @if(!$usuario->ativo)
                            <button type="button" class="btn btn-success btn-ok" onclick="confirmarIrPara('Deseja reativar esse usuário?', '{{route('arearestrita.usuarios.ativar', ['id' => $usuario->id])}}')">Ativar</button>
                        @else
                            <button type="button" class="btn btn-danger btn-trash" onclick="confirmarIrPara('Deseja inativar esse usuário?', '{{route('arearestrita.usuarios.excluir', ['id' => $usuario->id])}}')">Inativar</button>
                        @endif
                    @endif
                    @endpermissao

                    @permissao('permissoes.gerenciar')
                        @if($usuario->id != 1)
                        <button type="button" class="btn btn-warning btn-gear" onclick="showModal('{{route('arearestrita.usuarios.configurarpermissoesmodal', ['id' => $usuario->id])}}', 'Alterar permissões do usuário: {{$usuario->name}}')">Alterar permissões</button>
                       @endif
                    @endpermissao
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <div class="table-footer">
        <p class="resultados">Total de resultados: {{ $usuarios->total() }} </p>
        <div style="margin-right: 30px;">{{ $usuarios->links('vendor.pagination.custom') }}</div>
    </div>

@endsection
