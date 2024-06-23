@extends('adminpanel', ['admincss' => true])

@section('content')

    <div class="page-header">
        <h4>Inclusão de um usuário</h4>
    </div>

    <form action="{{ route('arearestrita.usuarios.salvar') }}" method="POST" enctype="multipart/form-data" class="row" id="salvar_usuario_form">
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
                <div class="col col-12 col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome do usúario" value="{{old('name')}}">
                </div>

                <div class="col col-12 col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="E-mail do usúario" value="{{old('email')}}">
                </div>

                <div class="col col-12 col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Senha do usúario">
                </div>

                <div class="col col-12 col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label for="password_confirmation" class="form-label">Confirmação da senha</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirme a senha">
                </div>

                <div class="col col-12 col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label for="imagem" class="form-label">Foto do usuário (opcional)</label>
                    <br>
                    <input class="form-control" type="file" name="imagem" id="imagem">
                </div>

                <div class="col col-12 col-lg-6 col-md-6 col-sm-12 mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" @if(old('ativo')) checked @endif type="checkbox" role="switch" id="ativo" name="ativo">
                        <label class="form-check-label form-check-label-custom" for="ativo">Ativo?</label>
                    </div>
                </div>
            </div>
            <div class="form-footer">
                <div class="form-content">
                    @permissao('usuarios.gerenciar')
                    <button type="button" class="btn btn-success" onclick="formAjax('#salvar_usuario_form')">Salvar</button>
                    @endpermissao
                </div>
            </div>
        </div>
    </form>
@endsection

@section('js')
    <script>
        $('#imagem').FileUpload();
    </script>
@endsection
