@php use \App\Http\Controllers\AreaRestrita\AdocoesController; @endphp

@extends('adminpanel')

@section('content')

    <div class="page-header">
        <p>Resultados da pesquisa de adoções / {{$tipo->tipo}} </p>
    </div>

    <div class="form-panel">
        <div class="form-body row">
            <form class="row" id="form_filtro_adocoes_index">
                @csrf

                <input type="hidden" name="session_name" value="{{AdocoesController::SESSION_INDEX}}">

                <div class="col col-12 col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label for="situacao_id" class="form-label">Situação</label>

                    <select class="form-select" id="situacao_id" name="situacao_id">

                        <option @if(empty($session['situacao_id'])) selected @endif value="">Selecione uma opção
                        </option>

                        @foreach( $situacoes as $situacao )
                            <option @if(($session['situacao_id'] ?? null) == $situacao->id) selected
                                    @endif value="{{$situacao->id}}">{{$situacao->situacao}}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
        <div class="form-footer">
            <div class="form-content">
                <button type="button" class="btn btn-primary btn-lupa"
                        onclick="buscarFiltro('#form_filtro_adocoes_index', '{{route('arearestrita.session.salvar')}}')">
                    Buscar
                </button>
                <button type="button" class="btn btn-secondary btn-trash"
                        onclick="limparFiltro('#form_filtro_adocoes_index', '{{route('arearestrita.session.limpar')}}')">
                    Limpar
                </button>
            </div>
        </div>
    </div>

    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Animal</th>
            <th scope="col">Situação</th>
            <th scope="col">Opções</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($adocoes as $adocao)
            <tr>
                <td scope="row"> {{$adocao->id}} </td>
                <td> {{$adocao->animal->nome}} </td>
                <td><span class="badge"
                          style="background-color: {{$adocao->situacao->cor}}"> {{$adocao->situacao->situacao}} </span>
                </td>
                <td>
                    <button type="button" class="btn btn-primary btn-eye"
                            onclick="irPara('{{route('arearestrita.adocoes.visualizar', ['id' => $adocao->id])}}')">
                        Visualizar
                    </button>

                    @permissao('adocoes.gerenciar')

                    @if($adocao->situacao_id == \App\Models\AreaRestrita\Situacao::SITUACAO_EM_ANALISE)
                        <button type="button" class="btn btn-success btn-ok"
                                onclick="showModal('{{route('arearestrita.adocoes.aprovarmodal', ['id' => $adocao->id])}}', 'Aprovar pedido de adoção #{{$adocao->id}}')">
                            Aprovar
                        </button>

                        <button type="button" class="btn btn-danger btn-times"
                                onclick="confirmarIrPara('Você tem certeza que deseja reprovar esse pedido de adoção?', '{{route('arearestrita.adocoes.reprovar', ['id' => $adocao->id])}}')">
                            Reprovar
                        </button>
                    @endif

                    @endpermissao

                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <div class="table-footer">
        <p class="resultados">Total de resultados: {{ $adocoes->total() }} </p>
        <div
            style="margin-right: 30px;">{{ $adocoes->appends(['tipo_id' => request()->get('tipo_id')])->links('vendor.pagination.custom') }}</div>
    </div>

@endsection
