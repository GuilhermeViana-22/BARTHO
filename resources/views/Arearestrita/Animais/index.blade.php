@extends('adminpanel')

@section('content')

<p>Resultados da pesquisa / {{$tipo->tipo}} </p>

<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Adotado?</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($animais as $animal)
            <tr>
                <th scope="row"> {{$animal->id}} </th>
                <th> {{$animal->nome}} </th>
                <th> {{$animal->adotado ? "SIM" : "NÃO"}} </th>
            </tr>
        @endforeach

    </tbody>
  </table>

 <div style="display: flex; flex-direction: row">
    <p style="margin-right: auto; margin-left: 0">Total de resultados: {{ $animais->total() }} </p>
    {{ $animais->appends(['tipo_id' => request()->get('tipo_id')])->links('vendor.pagination.custom') }}
 </div>

@endsection
