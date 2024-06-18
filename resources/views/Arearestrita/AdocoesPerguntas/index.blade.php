@php use \App\Http\Controllers\AreaRestrita\AdocoesPerguntasController; @endphp
@php use \App\Models\AreaRestrita\TipoPergunta; @endphp

@extends('adminpanel')

@section('content')

    <div class="page-header">
        <p>Resultados da pesquisa de perguntas </p>

        @permissao('configuracoes.perguntas.gerenciar')
        <button type="button" class="btn btn-success btn-new" onclick="irPara('{{route('arearestrita.configuracoes.adocoesperguntas.incluir')}}')">
            Incluir
        </button>
        @endpermissao
    </div>

    <div class="form-panel">
        <div class="form-body row">
            <form class="row" id="form_filtro_adocoes_perguntas_index">
                @csrf

                <input type="hidden" name="session_name" value="{{AdocoesPerguntasController::SESSION_INDEX}}">

                <div class="col col-12 col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label for="tipo_pergunta_id" class="form-label">Tipo de resposta</label>

                    <select class="form-select" id="tipo_pergunta_id" name="tipo_pergunta_id">
                        <option @if(empty($session['tipo_pergunta_id'])) selected @endif value="">Selecione uma opção</option>

                        @foreach( $tipos_perguntas as $tipo_pergunta )
                            <option @if(($session['tipo_pergunta_id'] ?? null) == $tipo_pergunta->id) selected
                                    @endif value="{{$tipo_pergunta->id}}">{{$tipo_pergunta->tipo}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col col-2 col-lg-2 col-md-6 col-sm-12 mb-3">
                    <label for="ativo" class="form-label">Somente ativas?</label>

                    <select class="form-select" id="adotado" name="ativo">
                        <option @if( empty($session['ativo']) || $session['ativo'] === "on") selected @endif value="on">Sim</option>
                        <option @if( !empty($session['ativo']) && $session['ativo'] === "off") selected @endif value="off">Não</option>
                        <option @if( !empty($session['ativo']) && $session['ativo'] === "all") selected @endif value="all">Todas</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="form-footer">
            <div class="form-content">
                <button type="button" class="btn btn-primary btn-lupa"
                        onclick="buscarFiltro('#form_filtro_adocoes_perguntas_index', '{{route('arearestrita.session.salvar')}}')">
                    Buscar
                </button>
                <button type="button" class="btn btn-secondary btn-trash"
                        onclick="limparFiltro('#form_filtro_adocoes_perguntas_index', '{{route('arearestrita.session.limpar')}}')">
                    Limpar
                </button>
            </div>
        </div>
    </div>

    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Pergunta</th>
            <th scope="col">Tipo de pergunta</th>
            <th scope="col">Situação</th>
            <th scope="col">Opcional?</th>
            <th scope="col">Opções</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($perguntas as $pergunta)
            <tr>
                <td scope="row"> {{$pergunta->id}} </td>
                <td> {{$pergunta->pergunta}} </td>
                <td> {{$pergunta->tipo_pergunta->tipo}} </td>
                <td> <span class="badge badge-{{$pergunta->ativo ? 'success' : 'danger'}}"> {{$pergunta->ativo ? "ATIVO" : "INATIVA"}} </span> </td>
                <td> <span class="badge badge-{{$pergunta->opcional ? 'success' : 'danger'}}"> {{$pergunta->opcional ? "SIM" : "NÃO"}} </span> </td>
                <td>
                    @permissao('configuracoes.perguntas.gerenciar')
                    <button type="button" class="btn btn-primary btn-edit" onclick="showModal('{{route('arearestrita.configuracoes.adocoesperguntas.alterarmodal', ['id' => $pergunta->id])}}', 'Alteração de pergunta #{{$pergunta->id}}')">Alterar</button>

                    @if($pergunta->tipo_pergunta_id == TipoPergunta::TIPO_SELECAO)
                        <button type="button" class="btn btn-warning btn-gear" onclick="irPara('{{route('arearestrita.configuracoes.adocoesperguntas.gerenciaralternativas', ['id' => $pergunta->id])}}')">Gerenciar alternativas</button>
                    @endif

                    @endpermissao
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <div class="table-footer">
        <p class="resultados">Total de resultados: {{ $perguntas->total() }} </p>
        <div style="margin-right: 30px;">{{ $perguntas->links('vendor.pagination.custom') }}</div>
    </div>

@endsection
