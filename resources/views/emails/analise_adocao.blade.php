@extends('emails.default')

@section('conteudo')

    <p>{!! nl2br($data['body']) !!}</p>
    <p> Este cpf está constando no registro de lista negra de doações <strong>{{$data['cpf_na_lista_negra']}}</strong></p>
    <div class="button-container">
        <a href="https://bartho.org.br/arearestrita/adocoes/visualizar/{{ $data['adocaoId'] }}" class="button">Verificar Solicitação</a>
    </div>
@endsection
