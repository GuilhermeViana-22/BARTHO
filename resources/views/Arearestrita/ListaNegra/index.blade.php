@extends('adminpanel')

@section('content')

    <div class="page-header">
        <h4>Lista Negra </h4>
        <button type="button" class="btn btn-success btn-new" onclick="irPara('{{route('arearestrita.configuracoes.listanegra.incluir') }}')">
            Incluir
        </button>
    </div>

    <div class="form-panel">
        <div class="form-body row">
            <form class="row" id="form_filtro_lista_index">
                <input type="hidden" name="session_name" value="{{\App\Http\Controllers\AreaRestrita\ListaNegraController::SESSION_INDEX}}">
                @csrf
                <div class="col col-12 col-lg-4 col-md-6 col-sm-12 mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="{{$session['nome'] ?? null}}">
                </div>
                <div class="col col-12 col-lg-4 col-md-6 col-sm-12 mb-3">
                        <label for="nome" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" value="{{$session['nome'] ?? null}}">
                </div>
            </form>
        </div>
        <div class="form-footer">
            <div class="form-content">
                <button type="button" class="btn btn-primary btn-lupa" onclick="buscarFiltro('#form_filtro_lista_index', '{{route('arearestrita.session.salvar')}}')">Buscar</button>
                <button type="button" class="btn btn-secondary btn-trash" onclick="limparFiltro('#form_filtro_lista_index', '{{route('arearestrita.session.limpar')}}')">Limpar</button>
            </div>
        </div>
    </div>


    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
            <th scope="col">Opções</th>
        </tr>
        </thead>
        <tbody>

        @forelse ($listas as $lista)
            <tr>
                <td scope="row"> {{$lista->id}} </td>
                <td scope="row"> {{$lista->nome}} </td>
                <td> {{$lista->cpf}} </td>
                <td>
{{--                    <button type="button" class="btn btn-primary btn-edit" onclick="irPara('{{route('arearestrita.configuracoes.listanegra.alterar', ['id' => $lista->id])}}')">Alterar</button>--}}
                    <button type="button" class="btn btn-danger btn-trash" onclick="confirmarIrPara('Deseja deletar esse registro?', '{{route('arearestrita.configuracoes.listanegra.excluir', ['id' => $lista->id])}}')">Excluir</button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Nenhum dado encontrado</td>
            </tr>
        @endforelse

        </tbody>
    </table>

    <div class="table-footer">
        <p class="resultados">Total de resultados: {{ $listas->count() }} </p>
   </div>

@endsection
