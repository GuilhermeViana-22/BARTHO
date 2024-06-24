@extends('adminpanel', ['admincss' => true])

@section('content')

<div class="page-header">
    <h4>Inclusão de uma pergunta</h4>
</div>

<div class="form-panel">
    <div class="form-body row">
        <form action="{{ route('arearestrita.configuracoes.adocoesperguntas.salvar') }}" method="POST" enctype="multipart/form-data" class="row" id="salvar_form">

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li><i class="fa fa-times" aria-hidden="true"></i> {{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @csrf

            <div class="col col-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                <label for="nome" class="form-label">Pergunta</label>
                <input type="text" class="form-control" id="pergunta" name="pergunta" placeholder="Pergunta que será realizada">
            </div>

            <div class="col col-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                <label for="tipo_pergunta_id" class="form-label">Tipo de resposta</label>

                <select class="form-select" id="tipo_pergunta_id" name="tipo_pergunta_id" aria-label="Default select example">
                    <option selected>Selecione uma opção</option>
                    @foreach($tipos_perguntas as $tipo_pergunta)
                        <option value="{{$tipo_pergunta->id}}">{{$tipo_pergunta->tipo}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col col-12 col-lg-6 col-md-6 col-sm-12 mb-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="obrigatorio" name="obrigatorio">
                    <label class="form-check-label" for="obrigatorio">Obrigatório?</label>
                </div>
            </div>

            <div class="col col-12 col-lg-6 col-md-6 col-sm-12 mb-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="ativo" checked name="ativo">
                    <label class="form-check-label  form-check-label-custom" for="ativo">Ativa?</label>
                </div>
            </div>
        </form>
    </div>
    <div class="form-footer">
        <div class="form-content">
            @permissao('configuracoes.perguntas.gerenciar')
                <button type="button" class="btn btn-success btn-ok" onclick="confirmarFormAjax('#salvar_form', 'Você tem certeza que todos os dados estão corretos? Não será possível realizar a alteração dos dados da pergunta.')">Salvar</button>
            @endpermissao
        </div>
    </div>
</div>
@endsection
