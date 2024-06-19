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
                        <textarea rows="4" class="form-control" id="perguntas-{{$pergunta->id}}" name="perguntas[{{$pergunta->id}}]" placeholder="Sua resposta aqui">{{ old("perguntas[$pergunta->id]") }}</textarea>
                    </div>
                @elseif($pergunta->tipo_pergunta_id == \App\Models\AreaRestrita\TipoPergunta::TIPO_SELECAO)
                    <div class="form-group">
                        <label for="perguntas-{{$pergunta->id}}">{{$pergunta->pergunta}}</label>
                        <br>
                        <br>

                        @foreach($pergunta->alternativas as $alternativa)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="perguntas[{{$pergunta->id}}]" id="alternativas-{{$alternativa->id}}" value="{{$alternativa->id}}">
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

    <button style="width: 100px" type="button" class="btn btn-success btn-ok" onclick="confirmarFormAjax('#salvar_form', 'Você tem certeza que todos os dados estão corretos? verifique se alguma pergunta obrigatória não foi respondida.')">Salvar</button>
</form>
