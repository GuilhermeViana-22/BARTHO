<link rel="stylesheet" href="{{ asset('site/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('site/css/custom.css') }}">
@include('Components.Header.index')
@include('Components.Banner.index')
<section class="text-center comoajudar">
    <div class="c_ajudar_white">
        <div class="row container_row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card ajudar_description">
                    <div class="card-body">
                        <div class="card-img-top ajuda_img_container">
                            <img src="{{ asset('img/pacoca/pacoca_01.jpeg') }}" class="rounded mx-auto d-block  ajuda_img" alt="...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card ajudar_description">
                    <div class="card-body">
                        <h2 class="card-title text-warning ">Adote um cachorro</h2>
                        <p class="card-text text-body-tertiary " style="margin-top: 35px;">Muitos cachorrinhos aguardam uma segunda chance e um lar cheio de amor. Não compre, adote..</p>
                        <button type="button" class="btn botao-adote" style=" margin-top: 15px;">Quero Adotar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="c_ajudar_dark">
        <div class="row container_row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card ajudar_description" style=" background-color: #F1F1F1;">
                    <div class="card-body">
                        <h2 class="card-title text-warning ">Faça uma doação</h2>
                        <p class="card-text text-body-tertiary " style="margin-top: 35px;">Com o seu apoio podemos continuar nosso trabalho, resgatando mais gatos e encontrando lares amorosos para eles. Cada doação conta muito!</p>
                        <button type="button" class="btn botao-adote" style=" margin-top: 15px;">Quero doar</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card ajudar_description " style=" background-color: #F1F1F1;">
                    <div class="card-body">
                        <div class="col ajuda_img_container">
                            <img src="{{ asset('img/dandara/dandara.jpeg') }}" class="rounded mx-auto d-block  ajuda_img" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="c_ajudar_white">
        <div class="row container_row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card ajudar_description">
                    <div class="card-body">
                        <div class="card-img-top ajuda_img_container">
                            <img src="{{ asset('img/urso/urso_02.jpeg') }}" class="rounded mx-auto d-block ajuda_img" alt="...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card ajudar_description">
                    <div class="card-body">
                        <h2 class="card-title text-warning ">Seja tutor online</h2>
                        <p class="card-text text-body-tertiary " style="margin-top: 35px;">Com uma doação mensal você garante os cuidados com alimentação, saúde e bem-estar dos resgatinhos.</p>
                        <button type="button" class="btn botao-adote" style=" margin-top: 15px;">Quero ser tutor</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="c_ajudar_dark">
        <div class="row container_row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card ajudar_description" style=" background-color: #F1F1F1;">
                    <div class="card-body">
                        <h2 class="card-title text-warning ">Torne-se lar temporário</h2>
                        <p class="card-text text-body-tertiary " style="margin-top: 35px;">O Lar Temporário é um pedacinho da Catland na sua casa, com todo o apoio necessário para você cuidar do gato, até se precisar de um veterinário!</p>
                        <button type="button" class="btn botao-adote" style=" margin-top: 15px;">Quero ser LT </button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card ajudar_description " style=" background-color: #F1F1F1;">
                    <div class="card-body">
                        <div class="col ajuda_img_container">
                            <img src="{{ asset('img/duque/duque.jpeg') }}" class="rounded mx-auto d-block ajuda_img" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@include('Components.Footer.index')
<script type="text/javascript" src="{{asset('site/bootstrap.js')}}"></script>