@extends('emails.default')
@section('conteudo')
    <h1>Aprovação de Adoções</h1>
    <p>{{ $data['data']['body'] }}</p>
    <!-- Arte de Agradecimento -->
    <div style="text-align: center; margin-top: 20px;">
        <p style="font-style: italic; font-size: 14px; color: #666;">Agradecemos pelo seu apoio!</p>
    </div>
@endsection
