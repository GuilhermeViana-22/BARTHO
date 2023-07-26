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
                    <p class="card-text text-body-tertiary " style="margin-top: 35px;">Muitos animais aguardam uma segunda chance e um lar cheio de amor. Não compre, adote.</p>
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
    {{--<section class="text-center comoajudar">--}}
    {{--    <div class="c_ajudar_white">--}}
    {{--        <div class="row container_row">--}}
    {{--            <div class="col-sm-6 mb-3 mb-sm-0">--}}
    {{--                <div class="card ajudar_description">--}}
    {{--                    <div class="card-body">--}}
    {{--                        <div class="card-img-top ajuda_img_container">--}}
    {{--                            <img src="{{ asset('img/pacoca/pacoca_01.jpeg') }}" class="rounded mx-auto d-block  ajuda_img" alt="...">--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="col-sm-6">--}}
    {{--                <div class="card ajudar_description">--}}
    {{--                    <div class="card-body">--}}
    {{--                        <h2 class="card-title text-warning ">Adote um cachorro</h2>--}}
    {{--                        <p class="card-text text-body-tertiary " style="margin-top: 35px;">Muitos cachorrinhos aguardam uma segunda chance e um lar cheio de amor. Não compre, adote..</p>--}}
    {{--                        <button type="button" class="btn botao-adote" style=" margin-top: 15px;">Quero Adotar</button>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <div class="c_ajudar_dark">--}}
    {{--        <div class="row container_row">--}}
    {{--            <div class="col-sm-6 mb-3 mb-sm-0">--}}
    {{--                <div class="card ajudar_description" style=" background-color: #F1F1F1;">--}}
    {{--                    <div class="card-body">--}}
    {{--                        <h2 class="card-title text-warning ">Faça uma doação</h2>--}}
    {{--                        <p class="card-text text-body-tertiary " style="margin-top: 35px;">Com o seu apoio podemos continuar nosso trabalho, resgatando mais gatos e encontrando lares amorosos para eles. Cada doação conta muito!</p>--}}
    {{--                        <button type="button" class="btn botao-adote" style=" margin-top: 15px;">Quero doar</button>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="col-sm-6">--}}
    {{--                <div class="card ajudar_description " style=" background-color: #F1F1F1;">--}}
    {{--                    <div class="card-body">--}}
    {{--                        <div class="col ajuda_img_container">--}}
    {{--                            <img src="{{ asset('img/dandara/dandara.jpeg') }}" class="rounded mx-auto d-block  ajuda_img" alt="...">--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--    </div>--}}
    {{--    <div class="c_ajudar_white">--}}
    {{--        <div class="row container_row">--}}
    {{--            <div class="col-sm-6 mb-3 mb-sm-0">--}}
    {{--                <div class="card ajudar_description">--}}
    {{--                    <div class="card-body">--}}
    {{--                        <div class="card-img-top ajuda_img_container">--}}
    {{--                            <img src="{{ asset('img/urso/urso_02.jpeg') }}" class="rounded mx-auto d-block ajuda_img" alt="...">--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="col-sm-6">--}}
    {{--                <div class="card ajudar_description">--}}
    {{--                    <div class="card-body">--}}
    {{--                        <h2 class="card-title text-warning ">Seja tutor online</h2>--}}
    {{--                        <p class="card-text text-body-tertiary " style="margin-top: 35px;">Com uma doação mensal você garante os cuidados com alimentação, saúde e bem-estar dos resgatinhos.</p>--}}
    {{--                        <button type="button" class="btn botao-adote" style=" margin-top: 15px;">Quero ser tutor</button>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <div class="c_ajudar_dark">--}}
    {{--        <div class="row container_row">--}}
    {{--            <div class="col-sm-6 mb-3 mb-sm-0">--}}
    {{--                <div class="card ajudar_description" style=" background-color: #F1F1F1;">--}}
    {{--                    <div class="card-body">--}}
    {{--                        <h2 class="card-title text-warning ">Torne-se lar temporário</h2>--}}
    {{--                        <p class="card-text text-body-tertiary " style="margin-top: 35px;">O Lar Temporário é um pedacinho da Catland na sua casa, com todo o apoio necessário para você cuidar do gato, até se precisar de um veterinário!</p>--}}
    {{--                        <button type="button" class="btn botao-adote" style=" margin-top: 15px;">Quero ser LT </button>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="col-sm-6">--}}
    {{--                <div class="card ajudar_description " style=" background-color: #F1F1F1;">--}}
    {{--                    <div class="card-body">--}}
    {{--                        <div class="col ajuda_img_container">--}}
    {{--                            <img src="{{ asset('img/duque/duque.jpeg') }}" class="rounded mx-auto d-block ajuda_img" alt="...">--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--    </div>--}}
    {{--</section>--}}
    @include('Components.Footer.index')

    <script type="text/javascript" src="{{asset('site/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('site/js/main.js')}}"></script>
@endsection
