<form action="{{ route('arearestrita.adocoes.aprovar') }}" method="POST" enctype="multipart/form-data" class="row" id="aprovar_form">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                <i class="fa fa-times" aria-hidden="true"></i> {{$error}}
            </div>
        @endforeach
    @endif

    @csrf

    <div class="form-panel">
        <div class="form-body row">

            <input type="hidden" name="id" value="{{$adocao->id}}">

            <div class="col col-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                <label for="termo_adocao" class="form-label">Termo de Adoção</label>
                <br>
                <input class="form-control obrigatorio-file" type="file" accept="image/*" name="termo_adocao" id="termo_adocao">
            </div>

            <div class="col col-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                <label for="documento_identidade" class="form-label">Documento de Identidade (com Foto) </label>
                <br>
                <input class="form-control obrigatorio-file" type="file" accept="image/*" name="documento_identidade" id="documento_identidade">
            </div>

            <div class="col col-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                <label for="comprovante_endereco" class="form-label">Comprovante de Endereço</label>
                <br>
                <input class="form-control obrigatorio-file" accept="image/*" type="file" name="comprovante_endereco" id="comprovante_endereco">
            </div>

            <div class="col col-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                <label for="foto_adocao" class="form-label">Foto da Adoção</label>
                <br>
                <input class="form-control" accept="image/*" type="file" name="foto_adocao" id="foto_adocao">
            </div>

            <div class="col col-12 col-lg-12 col-md-12 col-sm-12 mb-3" >
                <label for="responsavel_aprovacao" class="form-label">Adoção Aprovada por</label>
                <input type="text" class="form-control obrigatorio" id="responsavel_aprovacao" name="responsavel_aprovacao" placeholder="Adoção aprovada por" value="{{ old('responsavel_aprovacao') }}">
            </div>

            <div class="col col-12 col-lg-12 col-md-12 col-sm-12">

                <label for="observacao" class="form-label">Observação</label>
                <textarea class="form-control" id="observacao" name="observacao" rows="4">{{ old('observacao') }}</textarea>
            </div>
        </div>
        <div class="form-footer">
            <div class="form-content">
                @permissao('adocoes.gerenciar')
                <button type="button" class="btn btn-success btn-ok" onclick="verificarFormulario( () => formAjax('#aprovar_form'), 'Por favor, verifique e inclua os arquivos obrigatórios para registro da adoção.')">Aprovar</button>
                @endpermissao
            </div>
        </div>
    </div>
</form>

<script>
    $('#termo_adocao').FileUpload();
    $('#documento_identidade').FileUpload();
    $('#comprovante_endereco').FileUpload();
    $('#foto_adocao').FileUpload();
</script>
