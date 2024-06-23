<link rel="stylesheet" href="{{ asset('site/css/admin.css') }}">

<style>
    .modal-header {
        width: 100% !important;
        text-align: left;
    }
    .modal-header .modal-title {
        margin-left: 0;
    }
    .modal-body {
        width: 100% !important;
    }
</style>

<form action="{{ route('adote.salvar') }}" method="POST" enctype="multipart/form-data" class="row" id="salvar_form">

    @csrf

    <input type="hidden" name="animal_id" value="{{$animal->id}}">

    <div class="form-panel">
        <div class="form-header" style="background-color: #e9cc66">
            <p style="margin-left: 15px; color: ghostwhite"> Dados cadastrais </p>
        </div>
        <div class="form-body row">
            <div class="col col-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                <label for="nome" class="form-label">Nome completo <span style="color: red">*</span></label>
                <input type="text" class="form-control obrigatorio" id="nome" name="nome" placeholder="Informe seu nome completo">
            </div>

            <div class="col col-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                <label for="telefone" class="form-label">Telefone <span style="color: red">*</span></label>
                <input type="text" class="form-control obrigatorio" id="telefone" name="telefone" placeholder="Informe seu telefone">
            </div>

            <div class="col col-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                <label for="idade" class="form-label">Idade <span style="color: red">*</span></label>
                <input type="number" min="1" max="99" class="form-control obrigatorio" id="idade" name="idade" placeholder="Informe sua idade">
            </div>

            <div class="col col-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                <label for="email" class="form-label">E-mail <span style="color: red">*</span></label>
                <input type="email" class="form-control obrigatorio" id="email" name="email" placeholder="Informe seu e-mail">
            </div>

            <div class="col col-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                <label for="cpf" class="form-label">CPF <span style="color: red">*</span></label>
                <input type="text" class="form-control obrigatorio" id="cpf" name="cpf" placeholder="Informe seu CPF">
            </div>
        </div>
    </div>

    <hr style="margin-top: 20px;">

    @php $contador = 0; @endphp
    @foreach($perguntas as $pergunta)
        @php $contador++; @endphp

        <div class="form-panel">
            <div class="form-header" style="background-color: #e9cc66">
                <p style="margin-left: 15px; color: ghostwhite"> Pergunta nº{{$contador}} @if($pergunta->obrigatorio) <span style="color: red">*</span> @endif </p>
            </div>
            <div class="form-body row">
                @if($pergunta->tipo_pergunta_id == \App\Models\AreaRestrita\TipoPergunta::TIPO_TEXTO)
                    <div class="col col-12 col-lg-12 col-md-12 col-sm-12">
                        <label for="selecao" class="form-label">{{$pergunta->pergunta}}</label>
                        <textarea rows="4" class="form-control @if($pergunta->obrigatorio) obrigatorio @endif" id="perguntas-{{$pergunta->id}}" name="perguntas[{{$pergunta->id}}]" placeholder="Sua resposta aqui">{{ old("perguntas[$pergunta->id]") }}</textarea>
                    </div>
                @elseif($pergunta->tipo_pergunta_id == \App\Models\AreaRestrita\TipoPergunta::TIPO_SELECAO)
                    <div class="form-group">
                        <label for="perguntas-{{$pergunta->id}}">{{$pergunta->pergunta}}</label>
                        <br>
                        <br>

                        @foreach($pergunta->alternativas->where('ativo', 1) as $alternativa)
                            <div class="form-check">
                                <input class="form-check-input @if($pergunta->obrigatorio) obrigatorio-radio @endif" type="radio" name="perguntas[{{$pergunta->id}}]" id="alternativas-{{$alternativa->id}}" value="{{$alternativa->id}}">
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

    <div class="row">

        <div style="width: 100%">
            <div class="form-check form-switch">
                <input class="form-check-input declaracoes obrigatorio-checkbox" type="checkbox" role="switch">
                <label class="form-check-label" for="adotado">Você declara ter consciência que cães e gatos podem viver mais de 15 anos e que a adoção é um ato de grande responsabilidade.</label>
            </div>
        </div>

        <hr style="margin-top: 20px;">

        <div style="width: 100%">
            <div class="form-check form-switch">
                <input class="form-check-input declaracoes obrigatorio-checkbox" type="checkbox" role="switch">
                <label class="form-check-label" for="adotado">Você declara que não poderá doar o animal sem o consentimento do(a) protetor(a) responsável.</label>
            </div>
        </div>

        <hr style="margin-top: 20px;">

        <div style="width: 100%">
            <div class="form-check form-switch">
                <input class="form-check-input declaracoes obrigatorio-checkbox" type="checkbox" role="switch">
                <label class="form-check-label" for="adotado">Você declara que todas as suas respostas são verdadeiras e que assume total responsabilidade pelo aqui respondido.</label>
            </div>
        </div>

        <hr style="margin-top: 20px;">

        <div style="width: 100%">
            <div class="form-check form-switch">
                <input class="form-check-input declaracoes obrigatorio-checkbox" type="checkbox" role="switch">
                <label class="form-check-label" for="adotado">Você declara estar ciente e concorda que o Barthô Proteção Animal guardará seus dados pelo tempo necessário, caso a adoção seja efetuada.</label>
            </div>
        </div>

        <hr style="margin-top: 20px;">

        <div style="width: 100%">
            <div class="form-check form-switch">
                <input class="form-check-input declaracoes obrigatorio-checkbox" type="checkbox" role="switch">
                <label class="form-check-label" for="adotado">Você concorda em avisar o(a) protetor(a) responsável pela doação do animal caso alguma eventualidade aconteça (como acidentes, fugas, doenças, problemas com a adaptação...)</label>
            </div>
        </div>

        <hr style="margin-top: 20px;">
    </div>

    <button style="width: 100px" type="button" class="btn btn-success btn-ok" id="btn_salvar" onclick="verificarFormulario(() => confirmarFormAjax('#salvar_form', 'Você tem certeza que todos os dados estão corretos?'), 'Por favor, preencha todos os campos obrigatórios e confirme o aceite de todas as declarações para prosseguir.')">Salvar</button>
    <button style="width: 100px; margin-left: 5px" type="button" class="btn btn-secondary btn-trash" onclick="resetarForm('#salvar_form')">Limpar</button>
</form>

<script>
    /// aplica as mascáras
    $('#cpf').mask('000.000.000-00');

    $('#telefone').mask(function(val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    }, {
        onKeyPress: function(val, e, field, options) {
            field.mask(behavior.apply({}, arguments), options);
        }
    });

    function habilitarBtn()
    {
        $('#btn_salvar').prop('disabled', false);
    }
</script>
