@php use \App\Models\User; @endphp

@extends('adminpanel', ['admincss' => true])

@section('content')

    <div class="page-header">
        <h4>Visualização do usuário: {{$usuario->name}}</h4>
    </div>

    <div class="form-panel">
        <div class="form-body row">
            <div class="col col-12 col-lg-6 col-md-6 col-sm-12 mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" disabled id="nome" name="nome" placeholder="Nome do usuário" value="{{$usuario->name}}">
            </div>

            <div class="col col-12 col-lg-6 col-md-6 col-sm-12 mb-3">
                <label for="imagem" class="form-label">Foto do usuário</label>
                <br>
                <input class="form-control" type="file" name="imagem" id="imagem" readonly value="{{User::imagem_url($usuario->id, $usuario->imagem)}}">
            </div>

            <div class="col col-12 col-lg-6 col-md-6 col-sm-12 mb-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" disabled @if($usuario->ativo) checked @endif type="checkbox" role="switch" id="ativo" name="ativo">
                    <label class="form-check-label form-check-label-custom" for="ativo">Ativo?</label>
                </div>
            </div>
        </div>
        <div class="form-footer">
            <div class="form-content">
                @permissao('usuarios.gerenciar')
                <button type="button" class="btn btn-primary btn-edit" onclick="irPara('{{route('arearestrita.usuarios.alterar', ['id' => $usuario->id])}}')">Alterar</button>
                @if(!$usuario->ativo)
                    <button type="button" class="btn btn-success btn-ok" onclick="confirmarIrPara('Deseja reativar esse usuário?', '{{route('arearestrita.usuarios.ativar', ['id' => $usuario->id])}}')">Ativar</button>
                @else
                    <button type="button" class="btn btn-danger btn-trash" onclick="confirmarIrPara('Deseja inativar esse usuário?', '{{route('arearestrita.usuarios.excluir', ['id' => $usuario->id])}}')">Inativar</button>
                @endif
                @endpermissao
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#imagem').FileUpload();
    </script>
@endsection
