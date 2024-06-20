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
                <label for="imagem" class="form-label">Anexo 1</label>
                <br>
                <input class="form-control obrigatorio-file" type="file" name="anexo_1" id="anexo_1">
            </div>

            <div class="col col-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                <label for="imagem" class="form-label">Anexo 2</label>
                <br>
                <input class="form-control obrigatorio-file" type="file" name="anexo_2" id="anexo_2">
            </div>

        </div>
        <div class="form-footer">
            <div class="form-content">
                @permissao('adocoes.gerenciar')
                <button type="button" class="btn btn-success btn-ok" onclick="verificarFormulario( () => formAjax('#aprovar_form') )">Aprovar</button>
                @endpermissao
            </div>
        </div>
    </div>
</form>

<script>
    $('#anexo_1').FileUpload();
    $('#anexo_2').FileUpload();
</script>
