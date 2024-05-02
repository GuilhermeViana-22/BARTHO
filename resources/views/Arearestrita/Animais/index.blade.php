@extends('adminpanel')

@section('content')

<div class="page-header">
    <p>Resultados da pesquisa / {{$tipo->tipo}} </p>

    <button type="button" class="btn btn-success" onclick="irPara('{{route('arearestrita.animais.incluir')}}')">
        Incluir
    </button>
</div>

<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Adotado?</th>
        <th scope="col">Opções</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($animais as $animal)
            <tr>
                <td scope="row"> {{$animal->id}} </td>
                <td> {{$animal->nome}} </td>
                <td> {{$animal->adotado ? "SIM" : "NÃO"}} </td>
                <td>

                    <button type="button" class="btn btn-primary">Visualizar</button>
                    <button type="button" class="btn btn-primary">Alterar</button>
                    <button type="button" class="btn btn-danger" onclick="confirmar('Deseja deletar esse registro?', '{{route('arearestrita.animais.excluir', ['id' => $animal->id])}}')">Excluir</button>

                </td>
            </tr>
        @endforeach

    </tbody>
  </table>

 <div class="table-footer">
    <p class="resultados">Total de resultados: {{ $animais->total() }} </p>
    {{ $animais->appends(['tipo_id' => request()->get('tipo_id')])->links('vendor.pagination.custom') }}
 </div>

@endsection
