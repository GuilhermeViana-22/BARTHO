@extends('emails.default')
@section('conteudo')
    <h1>{{ $data['title'] }}</h1>
    <p>{{ $data['body'] }}</p>
    <div class="button-container">
        <a href="https://bartho.org.br/login" class="button">Verificar Solicitação</a>
    </div>
@endsection


