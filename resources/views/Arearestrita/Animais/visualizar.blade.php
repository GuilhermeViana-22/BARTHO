@php use \App\Models\AreaRestrita\Animal; @endphp

@extends('adminpanel', ['admincss' => true])

@section('content')

    <div class="page-header">
        <h4>Visualização de um animal #{{$animal->id}}</h4>
    </div>

    <div class="form-panel">
        <div class="form-body row">
            <div class="col col-sm-6 mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" disabled id="nome" name="nome" placeholder="Nome do animal" value="{{$animal->nome}}">
            </div>

            <div class="col col-sm-6 mb-3">
                <label for="tipo_id" class="form-label">Espécie do animal</label>

                <select class="form-select" id="tipo_id" disabled name="tipo_id" aria-label="Default select example">
                    <option selected>Selecione uma espécie</option>
                    @foreach($tipos_animais as $tipo_animal)
                        <option @if($animal->tipo_id == $tipo_animal['id']) selected @endif value="{{$tipo_animal->id}}">{{$tipo_animal->tipo}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col col-sm-6 mb-3">
                <label for="imagem" disabled class="form-label">Foto do animal</label>
                <input type="text" class="form-control file-input" placeholder="Clique aqui para ver o arquivo" onclick="irParaOutraGuia('{{Animal::imagem_url($animal->id, $animal->imagem)}}')">
            </div>

            <div class="col col-sm-6 mb-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" disabled @if($animal->adotado) checked @endif type="checkbox" role="switch" id="adotado" name="adotado">
                    <label class="form-check-label" for="adotado">Adotado?</label>
                </div>
            </div>

            <div class="col col-sm-12">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" disabled id="descricao" rows="3">{{$animal->descricao}}</textarea>
            </div>


        </div>
        <div class="form-footer">
            <div class="form-content">


            </div>
        </div>
    </div>
@endsection
