@php use \App\Models\AreaRestrita\Animal; @endphp

@extends('adminpanel', ['admincss' => true])

@section('content')
    <style>
        .card-img-custom {
            width: 200px; /* largura desejada */
            height: 200px; /* altura desejada */
            object-fit: cover; /* para manter a proporção e cortar a imagem, se necessário */
            border-style: dotted;
            border-color: #e9cc66; /* Cor de fundo amarela */
            margin-left: auto;
            margin-right: auto;
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
        <h4>Visualização de um animal #{{ $animal->id }}</h4>
    </div>

    <div class="form-panel">
        <div class="form-body row">
            <!-- Nome -->
            <div class="col col-12 col-lg-6 col-md-6 col-sm-12 mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" disabled id="nome" name="nome" value="{{ $animal->nome }}">
            </div>

            <!-- Espécie -->
            <div class="col col-12 col-lg-6 col-md-6 col-sm-12 mb-3">
                <label for="tipo_id" class="form-label">Espécie do animal</label>
                <select class="form-select" id="tipo_id" disabled name="tipo_id">
                    @foreach($tipos_animais as $tipo_animal)
                        <option @if($animal->tipo_id == $tipo_animal->id) selected
                                @endif value="{{ $tipo_animal->id }}">{{ $tipo_animal->tipo }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">

                <!-- Sexo -->
                <div class="col col-12 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-3">
                    <label for="sexo_id" class="form-label">Sexo</label>
                    <select class="form-select" id="sexo_id" disabled name="sexo_id">
                        @foreach($sexos_animais as $sexo_animal)
                            <option @if($animal->sexo_id == $sexo_animal->id) selected
                                    @endif value="{{ $sexo_animal->id }}">{{ $sexo_animal->sexo }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Castrado -->
                <div class="col-12 col-sm-12 col-md-2 col-lg-2 mb-2 p-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" disabled @if($animal->castrado) checked @endif type="checkbox"
                               id="castrado" name="castrado">
                        <label class="form-check-label" for="castrado">Castrado?</label>
                    </div>
                </div>

                <!-- Vacinado -->
                <div class="col-12 col-sm-12 col-md-2 col-lg-2 mb-2 p-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" disabled @if($animal->vacinado) checked @endif type="checkbox"
                               id="vacinado" name="vacinado">
                        <label class="form-check-label" for="vacinado">Vacinado?</label>
                    </div>
                </div>

                <!-- Adotado -->
                <div class="col-12 col-sm-12 col-md-2 col-lg-2 mb-2 p-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" disabled @if($animal->adotado) checked @endif type="checkbox"
                               id="adotado" name="adotado">
                        <label class="form-check-label" for="adotado">Adotado?</label>
                    </div>
                </div>
            </div>

            <!-- Descrição -->
            <div class="col col-12 col-sm-12">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" disabled id="descricao" rows="3">{{ $animal->descricao }}</textarea>
            </div>

            <!-- Imagens -->
            <div class="container-fluid">
                <div class="row p-4">
                    <label for="imagens" class="form-label">Fotos do animal</label>

                    @if($animal->imagem1)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3">
                            <div class="card-img-custom">
                                <img src="{{ Animal::imagem_url($animal->id, $animal->imagem1) }}"
                                     class="card-img-top img-fluid card-img-custom" alt="Imagem 1">
                            </div>
                        </div>
                    @endif

                    @if($animal->imagem2)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3">
                            <div class="card-img-custom">
                                <img src="{{ Animal::imagem_url($animal->id, $animal->imagem2) }}"
                                     class="card-img-top img-fluid card-img-custom" alt="Imagem 2">
                            </div>
                        </div>
                    @endif

                    @if($animal->imagem3)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3">
                            <div class="card-img-custom">
                                <img src="{{ Animal::imagem_url($animal->id, $animal->imagem3) }}"
                                     class="card-img-top img-fluid card-img-custom" alt="Imagem 3">
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
        <div class="form-footer">
            <div class="form-content">


                <button type="button" class="btn btn-primary btn-edit"
                        onclick="irPara('{{ route('arearestrita.animais.alterar', ['id' => $animal->id]) }}')">Alterar
                </button>
                <button type="button" class="btn btn-danger btn-trash"
                        onclick="confirmarIrPara('Deseja deletar esse registro?', '{{ route('arearestrita.animais.excluir', ['id' => $animal->id]) }}')">
                    Excluir
                </button>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#imagem').FileUpload();
    </script>
@endsection
