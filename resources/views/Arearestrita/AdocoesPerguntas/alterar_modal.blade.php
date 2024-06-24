<div class="form-panel">
    <div class="form-header">
        <div class="alert alert-warning" role="alert">
            Atenção, não é possível realizar alterações dos dados sensíveis das perguntas. Para um mesmo efeito, tente inativa-lá e criar uma outra com os novos dados desejados.
        </div>
    </div>
    <div class="form-body row">
        <form action="{{ route('arearestrita.configuracoes.adocoesperguntas.salvaralteracao') }}" method="POST" enctype="multipart/form-data" class="row" id="salvar_alteracoes_form">

            @csrf

            <input type="hidden" name="id" value="{{$pergunta->id}}">

            <div class="col col-12 col-lg-6 col-md-6 col-sm-12 mb-3">
                <label for="nome" class="form-label">Pergunta</label>
                <input type="text" class="form-control" id="pergunta" name="pergunta" disabled placeholder="Pergunta que será realizada" value="{{$pergunta->pergunta}}">
            </div>

            <div class="col col-12 col-lg-6 col-md-6 col-sm-12 mb-3">
                <label for="tipo_pergunta_id" class="form-label">Tipo de resposta</label>

                <select class="form-select" id="tipo_pergunta_id" name="tipo_pergunta_id" disabled aria-label="Default select example">
                    <option selected>Selecione uma opção</option>
                    @foreach($tipos_perguntas as $tipo_pergunta)
                        <option @if($pergunta->tipo_pergunta_id == $tipo_pergunta['id']) selected @endif value="{{$tipo_pergunta->id}}">{{$tipo_pergunta->tipo}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col col-12 col-lg-6 col-md-6 col-sm-12 mb-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" @if($pergunta->obrigatorio) checked @endif type="checkbox" role="switch" id="obrigatorio" name="obrigatorio">
                    <label class="form-check-label" for="adotado">Obrigatório?</label>
                </div>
            </div>

            <div class="col col-12 col-lg-6 col-md-6 col-sm-12 mb-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" @if($pergunta->ativo) checked @endif type="checkbox" role="switch" id="ativo" name="ativo">
                    <label class="form-check-label" for="ativo">Ativa?</label>
                </div>
            </div>
        </form>
    </div>
    <div class="form-footer">
        <div class="form-content">
            @permissao('configuracoes.perguntas.gerenciar')
                <button type="button" class="btn btn-success btn-ok" onclick="formAjax('#salvar_alteracoes_form')">Salvar</button>
            @endpermissao
        </div>
    </div>
</div>
