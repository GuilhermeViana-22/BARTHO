@extends('adminpanel', ['admincss' => true])

@section('content')
<style>

    .image-upload-box {
        border: 2px dashed #ced4da;
        padding: 1rem;
        text-align: center;
        cursor: pointer;
        position: relative;
    }

    .image-upload-box:hover {
        border-color: #6c757d;
    }

    .image-preview {
        width: 100%;
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        color: #6c757d;
        position: relative; /* Garante que o conteúdo esteja posicionado corretamente */
    }

    .image-preview img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain; /* Ajusta o dimensionamento da imagem */
    }

    .upload-icon {
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }

    .upload-text {
        margin-top: 0.5rem;
    }

     .card-img-custom {
         width: 200px; /* largura desejada */
         height: 200px; /* altura desejada */
         object-fit: cover; /* para manter a proporção e cortar a imagem, se necessário */
     }
    /* Estilo para o form-switch personalizado */
    .form-switch .form-check-input {
        width: 2rem; /* Largura do switch */
        height: 1rem; /* Altura do switch */
        border-radius: 1rem; /* Borda arredondada para criar um formato quadrado */
        background-color: #e9cc66; /* Cor de fundo amarela */
    }

    .form-switch .form-check-input:checked {
        background-color: #ffc107; /* Cor de fundo amarelo mais claro quando o switch está ativado */
    }

</style>

    <div class="page-header">
        <h4>Inclusão de um animal</h4>
    </div>
    <div class="form-panel">
        <div class="form-body row">
        <form action="{{ route('arearestrita.animais.salvar') }}" method="POST" enctype="multipart/form-data" id="salvar_animal_form">
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
                <div class="col col-12 col-lg-6 col-md-6 col-sm-12 mb-3" >
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do animal" value="{{ old('nome') }}">
                </div>

                <div class="col col-12 col-lg-6 col-md-6 col-sm-12 mb-2 ">
                    <label for="tipo_id" class="form-label">Espécie do animal</label>
                    <select class="form-select" id="tipo_id" name="tipo_id" aria-label="Selecione uma espécie">
                        <option selected>Selecione uma espécie</option>
                        @foreach($tipos_animais as $tipo_animal)
                            <option @if((old('tipo_id') ?? request()->get('tipo_id')) == $tipo_animal->id) selected @endif value="{{ $tipo_animal->id }}">{{ $tipo_animal->tipo }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

{{--                //INPUTS SELECT--}}
                <div class="row mb-3">
                    <div class="col col-12 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-3">
                        <label for="sexo_id" class="form-label">Sexo</label>
                        <select class="form-select" id="sexo_id" name="sexo_id" aria-label="Selecione um sexo">
                            <option selected>Selecione um sexo</option>
                            @foreach($sexos_animais as $sexo_animal)
                                <option @if((old('sexo_id')) == $sexo_animal->id) selected @endif value="{{ $sexo_animal->id }}">{{ $sexo_animal->sexo }}</option>
                            @endforeach
                        </select>
                    </div>
{{--                    castrado--}}
                    <div class="col-12 col-sm-12 col-md-2 col-lg-2 mb-2 p-4">
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="castrado" name="castrado" @if(old('castrado')) checked @endif>
                            <label class="form-check-label" for="castrado">castrado?</label>
                        </div>
                    </div>

{{--                    vacinado--}}
                    <div class="col-12 col-sm-12 col-md-2 col-lg-2 mb-2 p-4">
                        <div class="form-check form-switch mb-3 ">
                            <input class="form-check-input" type="checkbox" id="vacinado" name="vacinado" @if(old('vacinado')) checked @endif>
                            <label class="form-check-label" for="vacinado">vacinado?</label>
                        </div>
                    </div>
{{--                    Adotado--}}
                    <div class="col-12 col-sm-12 col-md-2 col-lg-2 mb-2 p-4">
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="adotado" name="adotado" @if(old('adotado')) checked @endif>
                        <label class="form-check-label" for="adotado">Adotado?</label>
                    </div>
                    </div>
                </div>
            <div class="row mb-3">
                <div class="col col-12 col-lg-6 col-md-6 col-sm-12">
                    <div class="row">
                        <label for="descricao" class="form-label">Fotos do animal</label>
                        <div class="col col-12 col-lg-4 mb-3">
                            <div class="image-upload-box">
                                <input type="file" id="image-input-1" name="imagem1" accept="image/*" style="display: none;" onchange="previewImage(event, 'preview-1');">
                                <label for="image-input-1">
                                    <div class="image-preview" id="preview-1">
                                        <span class="upload-icon"><i class="fas fa-cloud-upload-alt"></i></span>
                                        <span class="upload-text">Clique para selecionar uma imagem</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="col col-12 col-lg-4 mb-3">
                            <div class="image-upload-box">
                                <input type="file" id="image-input-2" name="imagem2" accept="image/*" style="display: none;" onchange="previewImage(event, 'preview-2');">
                                <label for="image-input-2">
                                    <div class="image-preview" id="preview-2">
                                        <span class="upload-icon"><i class="fas fa-cloud-upload-alt"></i></span>
                                        <span class="upload-text">Clique para selecionar uma imagem</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="col col-12 col-lg-4 mb-3">
                            <div class="image-upload-box">
                                <input type="file" id="image-input-3" name="imagem3" accept="image/*" style="display: none;" onchange="previewImage(event, 'preview-3');">
                                <label for="image-input-3">
                                    <div class="image-preview" id="preview-3">
                                        <span class="upload-icon"><i class="fas fa-cloud-upload-alt"></i></span>
                                        <span class="upload-text">Clique para selecionar uma imagem</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col col-12 col-lg-6 col-md-6 col-sm-12">

                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="4">{{ old('descricao') }}</textarea>
                </div>
            </div>
        </form>
    </div>
        <div class="form-footer">
            <div class="form-content">
                @permissao('animais.gerenciar')
                <button type="button" class="btn btn-success" onclick="formAjax('#salvar_animal_form')">Salvar</button>
                @endpermissao
            </div>
        </div>
@endsection

@section('js')
    <script>
    function previewImage(event, previewId) {
        var reader = new FileReader();
        var imageField = document.getElementById(previewId);

        reader.onload = function() {
            if (reader.readyState == 2) {
                imageField.innerHTML = '<img src="' + reader.result + '" style="max-width:100%; max-height: 200px;">';
            }
        }

        reader.readAsDataURL(event.target.files[0]);
    }

    $('#imagem').FileUpload();
    </script>
@endsection
