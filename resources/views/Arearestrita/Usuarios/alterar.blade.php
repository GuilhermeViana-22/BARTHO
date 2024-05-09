@php use \App\Models\User; @endphp
@extends('adminpanel', ['admincss' => true])

@section('content')

    <div class="page-header">
        <h4>Alteração do usuário: {{$usuario->name}}</h4>
    </div>

    <form action="{{ route('arearestrita.usuarios.salvaralteracao') }}" method="POST" enctype="multipart/form-data" class="row" id="salvar_usuario_form">
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

                <input type="hidden" name="id" value="{{$usuario->id}}">

                <div class="col col-12 col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome do usúario" value="{{$usuario->name}}">
                </div>

                <div class="col col-12 col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label for="imagem" class="form-label">Foto do usuário</label>
                    <br>
                    <input class="form-control" type="file" name="imagem" id="imagem" value="{{User::imagem_url($usuario->id, $usuario->imagem)}}">
                </div>

                <div class="col col-12 col-lg-6 col-md-6 col-sm-12 mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" @if($usuario->ativo) checked @endif type="checkbox" role="switch" id="ativo" name="ativo">
                        <label class="form-check-label" for="ativo">Ativo?</label>
                    </div>
                </div>
            </div>

            <div class="form-footer">
                <div class="form-content">
                    <button type="button" class="btn btn-success btn-ok" onclick="formAjax('#salvar_usuario_form')">Salvar</button>
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
