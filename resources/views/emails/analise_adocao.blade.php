@extends('emails.default')
@section('conteudo')
    <h1>Aprovação de Adoções</h1>
    <p>{{ $data['data']['body'] }}</p>
    <div class="button-container">
        <a href="https://bartho.org.br/arearestrita/adocoes/visualizar/{{ $data['data']['adocaoId'] }}" class="button">Verificar Solicitação</a>
    </div>
@endsection


