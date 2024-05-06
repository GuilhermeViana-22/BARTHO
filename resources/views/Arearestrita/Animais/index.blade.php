@php use \App\Http\Controllers\AreaRestrita\AnimaisController; @endphp
@extends('adminpanel')

@section('content')

    <div class="page-header">
        <p>Resultados da pesquisa / {{$tipo->tipo}} </p>

        <button type="button" class="btn btn-success btn-new" onclick="irPara('{{route('arearestrita.animais.incluir', ['tipo_id' => request()->get('tipo_id')])}}')">
            Incluir
        </button>
    </div>

    <div class="form-panel">
        <div class="form-body row">
            <form class="row" id="form_filtro_animais_index">
                @csrf

                <input type="hidden" name="session_name" value="{{AnimaisController::SESSION_INDEX}}">

                <div class="col col-12 col-lg-4 col-md-6 col-sm-12 mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do animal" value="{{$session['nome'] ?? null}}">
                </div>

                <div class="col col-12 col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label for="adotado" class="form-label">Adotado?</label>

                    <select class="form-select" id="adotado" name="adotado">
                        <option @if(empty($session['adotado'])) selected @endif value="">Selecione uma opção</option>
                        <option @if( !empty($session['adotado']) && $session['adotado'] === "on") selected @endif value="on">Sim</option>
                        <option @if( !empty($session['adotado']) && $session['adotado'] === "off") selected @endif value="off">Não</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="form-footer">
            <div class="form-content">
                <button type="button" class="btn btn-primary btn-lupa" onclick="buscarFiltro('#form_filtro_animais_index', '{{route('arearestrita.session.salvar')}}')">Buscar</button>
                <button type="button" class="btn btn-secondary btn-trash" onclick="limparFiltro('#form_filtro_animais_index', '{{route('arearestrita.session.limpar')}}')">Limpar</button>
            </div>
        </div>
    </div>


    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Adotado?</th>
            <th scope="col">Opções</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($animais as $animal)
            <tr>
                <td scope="row"> {{$animal->id}} </td>
                <td> {{$animal->nome}} </td>
                <td> <span class="badge badge-{{$animal->adotado ? 'success' : 'danger'}}"> {{$animal->adotado ? "SIM" : "NÃO"}} </span> </td>
                <td>
                    <button type="button" class="btn btn-primary btn-eye" onclick="irPara('{{route('arearestrita.animais.visualizar', ['id' => $animal->id])}}')">Visualizar</button>
                    <button type="button" class="btn btn-primary btn-edit" onclick="irPara('{{route('arearestrita.animais.alterar', ['id' => $animal->id])}}')">Alterar</button>
                    <button type="button" class="btn btn-danger btn-trash" onclick="confirmarIrPara('Deseja deletar esse registro?', '{{route('arearestrita.animais.excluir', ['id' => $animal->id])}}')">Excluir</button>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <div class="table-footer">
        <p class="resultados">Total de resultados: {{ $animais->total() }} </p>
        <div style="margin-right: 30px;">{{ $animais->appends(['tipo_id' => request()->get('tipo_id')])->links('vendor.pagination.custom') }}</div>
    </div>

@endsection
