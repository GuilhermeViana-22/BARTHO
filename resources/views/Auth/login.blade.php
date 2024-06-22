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
                        <div class="row d-flex justify-content-center">
                            <div class="g-recaptcha" data-sitekey="6Lfg8f4pAAAAALBzaUjcBx03oSd8pEFOgS_KKIA0"></div>
                        </div>

                        <div class="form-group mt-3 text-center">
                        <button type="submit" class="btn btn-brown btn-lg btn-block" id="login-button">Logar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            function rescaleCaptcha() {
                var width = $('.g-recaptcha').parent().width();
                var scale;
                if (width < 302) {
                    scale = width / 302;
                } else {
                    scale = 1.0;
                }

                $('.g-recaptcha').css('transform', 'scale(' + scale + ')');
                $('.g-recaptcha').css('-webkit-transform', 'scale(' + scale + ')');
                $('.g-recaptcha').css('transform-origin', '0 0');
                $('.g-recaptcha').css('-webkit-transform-origin', '0 0');
            }

            rescaleCaptcha();
            $(window).resize(function() {
                rescaleCaptcha();
            });

        });
    </script>
@endsection
