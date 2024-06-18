<div class="form-panel">
    <div class="form-body row">
        <form action="{{ route('arearestrita.configuracoes.adocoesperguntas.salvaralternativa') }}" method="POST" enctype="multipart/form-data" class="row" id="salvar_alternativa_form">
            @csrf

            <input type="hidden" name="pergunta_id" value="{{$pergunta->id}}">

            <div class="col col-12 col-lg-12 col-md-12 col-sm-12">
                <label for="selecao" class="form-label">Alternativa</label>
                <input type="text" class="form-control" id="selecao" name="selecao" placeholder="Alternativa" value="{{ old('selecao') }}">
            </div>
        </form>
    </div>
    <div class="form-footer">
        <div class="form-content">
            @permissao('permissoes.gerenciar')
                <button type="button" class="btn btn-success btn-new" onclick="formAjax('#salvar_alternativa_form')">Incluir</button>
            @endpermissao
        </div>
    </div>
</div>
