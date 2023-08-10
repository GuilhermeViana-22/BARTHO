@extends('layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/custom.css') }}">
    @include('Components.Banner.index')
    <!------ Include the above in your HEAD tag ---------->
    <div class="container mt-4">
        <h2 class="card-title text-warning-title  mt-4 mb-3">Formas de ajudar</h2>
        <div class="timeline">
            <div class="row no-gutters justify-content-end justify-content-md-around align-items-start  timeline-nodes">
                <div class="col-10 col-md-5 order-3 order-md-1 timeline-content" data-anime="right">
                    <h2 class="card-title text-warning-title ">Adote um cachorro</h2>
                    <p class="card-text text-body-tertiary " style="margin-top: 35px;">Muitos animais aguardam uma segunda chance e um lar cheio de amor. Não compre, Adote.</p>
                    <!-- HTML -->
                    <a href="{{ route('adote.index') }}" class="btn btn-more-information-link mb-3"><i class="fas fa-paw"> Quero Adotar</i></a>

                </div>
                <div class="col-10 col-md-5 order-1 order-md-3 py-3 timeline-date">
                    <img src="{{ asset('img/nova-logo.png') }}" alt="Imagem" class="img-fluid" width="50" height="50" style="display: block; margin-left: auto; margin-right: auto; margin-top: 5vh">
                </div>
            </div>
            <div class="row no-gutters justify-content-end justify-content-md-around align-items-start  timeline-nodes">
                <div class="col-10 col-md-5 order-3 order-md-1 timeline-content" data-anime="right" >
                    <h2 class="card-title text-warning-title">Faça uma doação</h2>
                    <p class="card-text text-body-tertiary" style="margin-top: 35px;">Com o seu apoio podemos continuar nosso trabalho, resgatando mais animais e encontrando lares amorosos para eles. Cada doação conta muito!</p>
                    <a href="{{ route('doe.index') }}" class="btn btn-more-information-link mb-3"><i class="fas fa-paw">  Quero doar </i></a>
                </div>
                <div class="col-10 col-md-5 order-1 order-md-3 py-3 timeline-date">
                    <img src="{{ asset('img/nova-logo.png') }}" alt="Imagem" class="img-fluid" width="50" height="50" style="display: block; margin-left: auto; margin-right: auto; margin-top: 5vh">
                </div>
            </div>
            <div class="row no-gutters justify-content-end justify-content-md-around align-items-start  timeline-nodes">
                <div class="col-10 col-md-5 order-3 order-md-1 timeline-content" data-anime="right">
                    <h2 class="card-title text-warning-title">Seja um voluntário</h2>
                    <p class="card-text text-body-tertiary" style="margin-top: 35px;">Com uma doação mensal você garante os cuidados com alimentação, saúde e bem-estar dos nossos animais.</p>
                    <a href="https://docs.google.com/forms/d/1Qd18bITpQgkbBltzOSA07BU8hp72fcDtHBfX9HgJ67w/viewform?edit_requested=true" class="btn btn-more-information-link mb-3"><i class="fas fa-paw">  Quero voluntário</i></a>
                </div>
                <div class="col-10 col-md-5 order-1 order-md-3 py-3 timeline-date">
                    <img src="{{ asset('img/nova-logo.png') }}" alt="Imagem" class="img-fluid" width="50" height="50" style="display: block; margin-left: auto; margin-right: auto; margin-top: 5vh">
                </div>
            </div>
            <div class="row no-gutters justify-content-end justify-content-md-around align-items-start  timeline-nodes">
                <div class="col-10 col-md-5 order-3 order-md-1 timeline-content" data-anime="right">
                    <h2 class="card-title text-warning-title">Torne-se um lar temporário</h2>
                    <p class="card-text text-body-tertiary" style="margin-top: 35px;">A Residência Provisória é um cantinho da Barthô em sua residência, com total auxílio essencial para você zelar pelo animal, até mesmo se precisar de um médico veterinário!</p>
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSf_UEKSamtXLZXRnhOKjF6Y70DrGU5BEWuhIZZwsM3nDEXvHg/viewform?usp=sf_link" class="btn btn-more-information-link mb-3" style="color: #fff"><i class="fas fa-paw">  Quero ser LT</i></a>

                </div>
                <div class="col-10 col-md-5 order-1 order-md-3 py-3 timeline-date">
                    <img src="{{ asset('img/nova-logo.png') }}" alt="Imagem" class="img-fluid" width="50" height="50" style="display: block; margin-left: auto; margin-right: auto; margin-top: 5vh">
                </div>
            </div>
        </div>
    </div>
    @include('Components.Footer.index')

    <script type="text/javascript" src="{{asset('site/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('site/js/main.js')}}"></script>
@endsection
