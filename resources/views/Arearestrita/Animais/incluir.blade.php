@extends('adminpanel', ['admincss' => true])

@section('content')

    <div class="page-header">
        <h4>Inclusão de um animal</h4>
    </div>

    <form action="{{ route('arearestrita.animais.salvar') }}" method="POST" enctype="multipart/form-data" class="row" id="salvar_animal_form">
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
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do animal" value="{{old('nome')}}">
                </div>

                <div class="col col-12 col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label for="tipo_id" class="form-label">Espécie do animal</label>

                    <select class="form-select" id="tipo_id" name="tipo_id" aria-label="Default select example">
                        <option selected>Selecione uma espécie</option>
                        @foreach($tipos_animais as $tipo_animal)
                            <option @if((old('tipo_id')??request()->get('tipo_id')) == $tipo_animal['id']) selected @endif value="{{$tipo_animal->id}}">{{$tipo_animal->tipo}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col col-12 col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label for="imagem" class="form-label">Foto do animal</label>
                    <input class="form-control" type="file" name="imagem" id="imagem">
                </div>

                <div class="col col-12 col-lg-6 col-md-6 col-sm-12 mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" @if(old('adotado')) checked @endif type="checkbox" role="switch" id="adotado" name="adotado">
                        <label class="form-check-label" for="adotado">Adotado?</label>
                    </div>
                </div>

                <div class="col col-12 col-sm-12">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="3">{{old('descricao')}}</textarea>
                </div>
            </div>
            <div class="form-footer">
                <div class="form-content">
                    <button type="button" class="btn btn-success" onclick="formAjax('#salvar_animal_form')">Salvar</button>
                </div>
            </div>
        </div>
    </form>
@endsection
