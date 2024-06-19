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

    <div class="alert alert-info" role="alert">
        Atenção, responda todas as perguntas obrigatórias (<span style="color: red">*</span>) para realizar o pedido de adoção do animal.
    </div>

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

            <div class="col col-12 col-lg-12 col-md-12 col-sm-12 mb-3">
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
                <p style="margin-left: 15px; color: ghostwhite"> Pergunta nº{{$contador}} @if($pergunta->opcional) (opcional) @else <span style="color: red">*</span>@endif </p>
            </div>
            <div class="form-body row">
                @if($pergunta->tipo_pergunta_id == \App\Models\AreaRestrita\TipoPergunta::TIPO_TEXTO)
                    <div class="col col-12 col-lg-12 col-md-12 col-sm-12">
                        <label for="selecao" class="form-label">{{$pergunta->pergunta}}</label>
                        <textarea rows="4" class="form-control @if(!$pergunta->opcional) obrigatorio @endif" id="perguntas-{{$pergunta->id}}" name="perguntas[{{$pergunta->id}}]" placeholder="Sua resposta aqui">{{ old("perguntas[$pergunta->id]") }}</textarea>
                    </div>
                @elseif($pergunta->tipo_pergunta_id == \App\Models\AreaRestrita\TipoPergunta::TIPO_SELECAO)
                    <div class="form-group">
                        <label for="perguntas-{{$pergunta->id}}">{{$pergunta->pergunta}}</label>
                        <br>
                        <br>

                        @foreach($pergunta->alternativas as $alternativa)
                            <div class="form-check">
                                <input class="form-check-input @if(!$pergunta->opcional) obrigatorio-radio @endif" type="radio" name="perguntas[{{$pergunta->id}}]" id="alternativas-{{$alternativa->id}}" value="{{$alternativa->id}}">
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

    <button style="width: 100px" type="button" class="btn btn-success btn-ok" onclick="verificarFormulario()">Salvar</button>
    <button style="width: 100px; margin-left: 5px" type="button" class="btn btn-secondary btn-trash" onclick="resetarForm()">Limpar</button>
</form>

<script>
    /// aplica as mascáras
    $('#cpf').mask('000.000.000-00');

    let behavior = function(val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    };

    let options = {
        onKeyPress: function(val, e, field, options) {
            field.mask(behavior.apply({}, arguments), options);
        }
    };

    $('#telefone').mask(behavior, options);

    /// resetar o formulário
    function resetarForm() {
        Swal.fire({
            title: 'Limpar formulário?',
            text: "Ao limpar o formulário todos os dados preenchidos serão perdidos, deseja continuar?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#222',
            //cancelButtonColor: '#d33',
            confirmButtonText: 'Limpar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#salvar_form').trigger("reset");
            }
        });
    }

    /// faz a verificação se todos os inputs obrigatórios foram preenchidos
    function verificarFormulario(){
        let obrigatorios = document.querySelectorAll('.obrigatorio');
        let obrigatoriosRadio = document.querySelectorAll('.obrigatorio-radio');
        let preenchido = true;

        /// verifica os textareas
        obrigatorios.forEach(function(element) {
            if (element.value.trim() === '') {
                preenchido = false;
                element.classList.add('is-invalid');
            } else {
                element.classList.remove('is-invalid');
            }
        });

        /// verifica os inputs-radios
        obrigatoriosRadio.forEach(function(element) {
            let name = element.name;
            if (document.querySelector('input[name="'+name+'"]:checked') === null) {
                preenchido = false;
                let radios = document.querySelectorAll('input[name="'+name+'"]');
                radios.forEach(function(radio) {
                    radio.classList.add('is-invalid');
                });
            } else {
                let radios = document.querySelectorAll('input[name="'+name+'"]');
                radios.forEach(function(radio) {
                    radio.classList.remove('is-invalid');
                });
            }
        });

        if (preenchido) {
            confirmarFormAjax('#salvar_form', 'Você tem certeza que todos os dados estão corretos?');
        } else {
            alert('Por favor, preencha todas as perguntas obrigatórias.');
        }
    }
</script>
