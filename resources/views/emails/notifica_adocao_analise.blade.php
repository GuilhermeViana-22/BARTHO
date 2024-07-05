@extends('emails.default')

@section('conteudo')
    <h1>Aprovação de Adoções</h1>
    <p>{!! nl2br(($data['data']['body'])) !!}</p>
    <div style="text-align: center; margin-top: 20px;">
        <p style="font-style: italic; font-size: 14px; color: #666;">Agradecemos novamente por escolher adotar e por fazer parte da nossa missão de proteger e cuidar dos animais!</p>
    </div>
@endsection
