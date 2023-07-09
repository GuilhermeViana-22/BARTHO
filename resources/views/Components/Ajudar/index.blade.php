<link rel="stylesheet" href="{{ asset('site/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('site/css/custom.css') }}">
@include('Components.Header.index')
@include('Components.Banner.index')
<section class="text-center comoajudar">
    <div class="container-fluid c_ajudar_white">
        <div class="container text-center justify-content-between">
            <div class="row container_row">
                <div class="col ajuda_img_container">
                    <img src="{{ asset('img/pacoca.jpg') }}" class="rounded float-start ajuda_img" alt="...">
                </div>
                <div class="col">
                    <div class="card ajudar_description">
                        <div class="card-body ">

                            <h2 class="card-title text-warning ">Adote um cachorro</h2>
                            <p class="card-text text-body-tertiary " style="margin-top: 35px;">Muitos cachorrinhos aguardam uma segunda chance e um lar cheio de amor. Não compre, adote..</p>
                            <button type="button" class="btn btn-secondary" style="background-color:#6C5142; margin-top: 15px;">Quero Adotar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid c_ajudar_dark">
        <div class="container text-center justify-content-between">
            <div class="row container_row  ">
                <div class="col">
                    <div class="card ajudar_description" style=" background-color: #F1F1F1;">
                        <div class="card-body" style="padding: 40px;">

                            <h2 class="card-title text-warning ">Faça uma doação</h2>
                            <p class="card-text text-body-tertiary " style="margin-top: 35px;">Com o seu apoio podemos continuar nosso trabalho, resgatando mais gatos e encontrando lares amorosos para eles. Cada doação conta muito!</p>
                            <button type="button" class="btn btn-secondary" style="background-color:#6C5142; margin-top: 15px;">Quero doar</button>
                        </div>
                    </div>
                </div>


                <div class="col ajuda_img_container">
                    <img src="{{ asset('img/dandara.jpg') }}" class="rounded float-start ajuda_img" alt="...">
                </div>


            </div>
        </div>
    </div>
    <div class="container-fluid c_ajudar_white">
        <div class="container text-center justify-content-between">
            <div class="row container_row">
                <div class="col ajuda_img_container">
                    <img src="{{ asset('img/domitila.jpg') }}" class="rounded float-start ajuda_img" alt="...">
                </div>
                <div class="col">
                    <div class="card ajudar_description">
                        <div class="card-body ">

                            <h2 class="card-title text-warning ">Seja tutor online</h2>
                            <p class="card-text text-body-tertiary " style="margin-top: 35px;">Com uma doação mensal você garante os cuidados com alimentação, saúde e bem-estar dos resgatinhos.</p>
                            <button type="button" class="btn btn-secondary" style="background-color:#6C5142; margin-top: 15px;">Quero ser tutor</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid c_ajudar_dark">
        <div class="container text-center justify-content-between">
            <div class="row container_row  ">
                <div class="col">
                    <div class="card ajudar_description" style=" background-color: #F1F1F1;">
                        <div class="card-body" style="padding: 40px;">

                            <h2 class="card-title text-warning ">Torne-se lar temporário</h2>
                            <p class="card-text text-body-tertiary " style="margin-top: 35px;">O Lar Temporário é um pedacinho da Catland na sua casa, com todo o apoio necessário para você cuidar do gato, até se precisar de um veterinário!</p>
                            <button type="button" class="btn btn-secondary" style="background-color:#6C5142; margin-top: 15px;">Quero ser LT </button>
                        </div>
                    </div>
                </div>
                <div class="col ajuda_img_container">
                    <img src="{{ asset('img/duque.jpg') }}" class="rounded float-start ajuda_img" alt="...">
                </div>
            </div>
        </div>
    </div>
</section>
@include('Components.Footer.index')
<script type="text/javascript" src="{{asset('site/bootstrap.js')}}"></script>
