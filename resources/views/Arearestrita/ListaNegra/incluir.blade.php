@extends('adminpanel', ['admincss' => true])

@section('content')
    <div class="page-header">
        <h4>Inclusão</h4>
    </div>
    <div class="form-panel">
        <div class="form-body row">
            <form action="{{ route('arearestrita.configuracoes.listanegra.salvar') }}" method="POST"
                  enctype="multipart/form-data" id="salvar_listanegra_form">
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

                <div class="row mb-3">
                    <div class="col col-12 col-lg-4 col-md-4 col-sm-12 mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome"
                               value="{{ old('nome') }}">
                    </div>
                    <div class="col col-12 col-lg-4 col-md-4 col-sm-12 mb-3">
                        <label for="nome" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF"
                               value="{{ old('cpf') }}">
                    </div>

                </div>
            </form>
        </div>
        <div class="form-footer">
            <div class="form-content">
                <button type="button" class="btn btn-success" onclick="formAjax('#salvar_listanegra_form')">Salvar
                </button>
            </div>
        </div>
@endsection

@section('js')
    <script>
        //mascara para o cpf
        var $seuCampoCpf = $("#cpf");
        $seuCampoCpf.mask('000.000.000-00', {reverse: true});
    </script>
@endsection
