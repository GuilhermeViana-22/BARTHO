@extends('layout')

@section('content')
    <div class="container">
        <div class="css-selector">
            <div>
                <img alt="foto de cachorro" src="{{ asset('img/ativo2.png') }}">
            </div>
            <div class="col-md-6 login-form">
                <form id="login-form" action="{{ route('login') }}" method="POST">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                <i class="fa fa-times" aria-hidden="true"></i> {{$error}}
                            </div>
                        @endforeach
                    @endif

                    @csrf
                    <div class="form-group mt-3">
                        <input type="email" value="{{ old('email') }}" class="form-control" name="email" placeholder="E-mail" required>
                    </div>
                    <div class="form-group mt-3">
                        <input type="password" class="form-control" name="password" placeholder="Senha" required>
                    </div>
                    <div class="form-group mt-3 text-center">
                        <!-- Container para o reCAPTCHA -->
                        <div id="recaptcha-container"></div>
                    </div>
                    <div class="form-group mt-3 text-center">
                        <button type="submit" class="btn btn-brown btn-lg btn-block" id="login-button">Logar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Função para criar um campo de entrada escondido
        function createHiddenInput(name, value) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = name;
            input.value = value;
            return input;
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Renderiza o reCAPTCHA
            grecaptcha.enterprise.ready(function() {
                grecaptcha.enterprise.render('recaptcha-container', {
                    'sitekey': '6Lfg8f4pAAAAALBzaUjcBx03oSd8pEFOgS_KKIA0',
                    'callback': function(token) {
                        // Adiciona o token reCAPTCHA ao formulário
                        document.getElementById('login-form').appendChild(createHiddenInput('recaptcha_token', token));
                    }
                });
            });
        });

        document.getElementById('login-button').addEventListener('click', function(e) {
            e.preventDefault();
            grecaptcha.enterprise.ready(async () => {
                const token = await grecaptcha.enterprise.execute('6Lfg8f4pAAAAALBzaUjcBx03oSd8pEFOgS_KKIA0', {action: 'LOGIN'});
                document.getElementById('login-form').appendChild(createHiddenInput('recaptcha_token', token));
                document.getElementById('login-form').submit();
            });
        });
    </script>
@endsection
