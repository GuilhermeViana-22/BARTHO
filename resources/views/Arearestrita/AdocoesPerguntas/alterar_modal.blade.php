<div class="form-panel">
    <div class="form-header">

    </div>
    <div class="form-body row">
        <form action="{{ route('arearestrita.configuracoes.adocoesperguntas.salvaralteracao') }}" method="POST" enctype="multipart/form-data" class="row" id="salvar_alteracoes_form">








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
