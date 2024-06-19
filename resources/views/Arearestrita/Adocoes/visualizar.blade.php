@extends('adminpanel', ['admincss' => true])

@section('content')

    <div class="page-header">
        <h4>Visualização do pedido de adoção #{{$adocao->id}} <span class="badge"
                                                                      style="background-color: {{$adocao->situacao->cor}}"> {{$adocao->situacao->situacao}} </span></h4>
    </div>

    <div class="form-panel">
        <div class="form-header" style="background-color: #e9cc66">
            <p style="margin-left: 15px; color: ghostwhite"> Dados da adoção </p>
        </div>
        <div class="form-body row">
            <div class="col col-4 col-lg-4 col-md-4 col-sm-12 mb-3">
                <label for="cpf" class="form-label">Data de cadastro</label>
                <input type="text" class="form-control obrigatorio" id="cpf" name="cpf" disabled value="{{ \Carbon\Carbon::parse($adocao->created_at)->format('d/m/Y')}}" placeholder="Informe seu CPF">
            </div>

            <div class="col col-4 col-lg-4 col-md-4 col-sm-12 mb-3">
                <label for="cpf" class="form-label">Animal</label>
                <input type="text" class="form-control obrigatorio" id="cpf" name="cpf" disabled value="{{ $adocao->animal->nome }}" placeholder="Informe seu CPF">
            </div>

            <div class="col col-4 col-lg-4 col-md-4 col-sm-12 mb-3">
                <label for="cpf" class="form-label">Espécie do animal</label>
                <input type="text" class="form-control obrigatorio" id="cpf" name="cpf" disabled value="{{ $adocao->animal->tipo->tipo }}" placeholder="Informe seu CPF">
            </div>

        </div>
    </div>

    <div class="form-panel">
        <div class="form-header" style="background-color: #e9cc66">
            <p style="margin-left: 15px; color: ghostwhite"> Dados cadastrais </p>
        </div>
        <div class="form-body row">
            <div class="col col-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                <label for="nome" class="form-label">Nome completo <span style="color: red">*</span></label>
                <input type="text" class="form-control obrigatorio" value="{{$adocao->nome}}" disabled id="nome" name="nome" placeholder="Informe seu nome completo">
            </div>

            <div class="col col-4 col-lg-4 col-md-4 col-sm-12 mb-3">
                <label for="cpf" class="form-label">CPF <span style="color: red">*</span></label>
                <input type="text" class="form-control obrigatorio" id="cpf" name="cpf" disabled value="{{$adocao->cpf}}" placeholder="Informe seu CPF">
            </div>

            <div class="col col-4 col-lg-4 col-md-4 col-sm-12 mb-3">
                <label for="telefone" class="form-label">Telefone <span style="color: red">*</span></label>
                <input type="text" class="form-control obrigatorio" value="{{$adocao->telefone}}" disabled id="telefone" name="telefone" placeholder="Informe seu telefone">
            </div>

            <div class="col col-4 col-lg-4 col-md-4 col-sm-12 mb-3">
                <label for="idade" class="form-label">Idade <span style="color: red">*</span></label>
                <input type="number" min="1" max="99" class="form-control obrigatorio" disabled value="{{$adocao->idade}}" id="idade" name="idade" placeholder="Informe sua idade">
            </div>
        </div>
    </div>

    <hr style="margin-top: 20px;">

    @php $contador = 0; @endphp
    @foreach($adocao->respostas as $resposta)
        @php $contador++; @endphp

        <div class="form-panel">
            <div class="form-header" style="background-color: #e9cc66">
                <p style="margin-left: 15px; color: ghostwhite"> Pergunta nº{{$contador}} @if($resposta->adocao_pergunta->opcional) (opcional) @else <span style="color: red">*</span>@endif </p>
            </div>
            <div class="form-body row">
                @if($resposta->adocao_pergunta->tipo_pergunta_id == \App\Models\AreaRestrita\TipoPergunta::TIPO_TEXTO)
                    <div class="col col-12 col-lg-12 col-md-12 col-sm-12">
                        <label for="selecao" class="form-label">{{$resposta->adocao_pergunta->pergunta}}</label>
                        <textarea rows="4" class="form-control @if(!$resposta->adocao_pergunta->opcional) obrigatorio @endif" disabled id="perguntas-{{$resposta->adocao_pergunta->id}}" name="perguntas[{{$resposta->adocao_pergunta->id}}]" placeholder="Sua resposta aqui">{{ $resposta->resposta }}</textarea>
                    </div>
                @elseif($resposta->adocao_pergunta->tipo_pergunta_id == \App\Models\AreaRestrita\TipoPergunta::TIPO_SELECAO)
                    <div class="form-group">
                        <label for="perguntas-{{$resposta->adocao_pergunta->id}}">{{$resposta->adocao_pergunta->pergunta}}</label>
                        <br>
                        <br>

                        @foreach($resposta->adocao_pergunta->alternativas as $alternativa)
                            <div class="form-check">
                                <input class="form-check-input" @if($resposta->adocao_selecao_id == $alternativa->id) checked @endif disabled type="radio" name="perguntas[{{$resposta->adocao_pergunta->id}}]" id="alternativas-{{$alternativa->id}}" value="{{$alternativa->id}}">
                                <label class="form-check-label" for="cor1">
                                    {{$alternativa->selecao}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <hr style="margin-top: 20px;">
    @endforeach

    @permissao('adocoes.gerenciar')

    @if($adocao->situacao_id == \App\Models\AreaRestrita\Situacao::SITUACAO_AGUARDANDO_APROVACAO)
        <button type="button" class="btn btn-success btn-ok" onclick="confirmarIrPara('Você tem certeza que deseja aprovar esse pedido de adoção?','{{route('arearestrita.adocoes.aprovar', ['id' => $adocao->id])}}')">Aprovar</button>

        <button type="button" class="btn btn-danger btn-times" onclick="confirmarIrPara('Você tem certeza que deseja reprovar esse pedido de adoção?', '{{route('arearestrita.adocoes.reprovar', ['id' => $adocao->id])}}')">Reprovar</button>
    @endif

    @endpermissao
@endsection
