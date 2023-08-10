@extends('layout')
@section('content')
<!-- Styles -->
<link rel="stylesheet" href="{{ asset('site/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('site/css/custom.css') }}">

@include('Components.Banner.index')
<style>
    figcaption {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }

    .ver-mais {
        text-align: center;
    }
</style>
<section class="adote">
    <div class="container text-center titulos mt-4">
        <div class="card  text-center description ">
            <h2 class="card-title text-warning-title">Tudo o que você precisa saber para adotar</h2>
            <p class="card-text">Para garantir a segurança e conforto dos animais, seguimos todas as regras e
                políticas de adoção responsável. Confira informações essenciais para adotar na Barthô.</p>
        </div>
    </div>
    <div class="container text-center container_Adote_Descriptions">
        <div class="row justify-content-md-center">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <span class="elemento-icon">
                    <ion-icon name="star-outline" style="font-size: 45px; color: #654737;"></ion-icon>
                </span>
                <div class="card description">
                    <div class="card-body ">
                        <h3 class="card-title text-warning-title">Proteger saídas e rotas de fuga</h3>
                        <p class="card-text text-body-tertiary">Apartamentos e casas precisam ter redes de proteção
                            em
                            todas as janelas, vidros, sacadas e portões para impedir que o animal fuja para rua . Lembre-se que isso precisa ser feito antes da chegada do cachorrinho.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <span class="elemento-icon">
                    <ion-icon name="wallet-outline" style="font-size: 45px; color: #654737;"></ion-icon>
                </span>
                <div class="card description">
                    <div class="card-body">
                        <h3 class="card-title text-warning-title">Ter condições financeiras</h3>
                        <p class="card-text text-body-tertiary">Este ponto é de extrema importância para garantir a
                            qualidade de vida do cachorrinho: é preciso ter condições financeiras para arcar com
                            ração
                            de boa qualidade, vacinas e consultas regulares com veterinário.</p>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <span class="elemento-icon">
                        <ion-icon name="home-outline" style="font-size: 45px; color: #654737;"></ion-icon>
                    </span>
                    <div class="card description">
                        <div class="card-body ">

                            <h3 class="card-title text-warning-title">Morar em SP (ou prover transporte para longas
                                distâncias)</h3>
                            <p class="card-text text-body-tertiary">É preciso morar na cidade de São Paulo, no ABC
                                (Santo André, São Bernardo e São Caetano) ou arredores. Interessados em adotar que
                                estejam em longas distâncias, devem se responsabilizar pelo transporte adequado do
                                animal.</p>

                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <span class="elemento-icon">
                        <ion-icon name="document-text-outline" style="font-size: 45px; color: #654737;"></ion-icon>
                    </span>
                    <div class="card description">
                        <div class="card-body">
                            <h3 class="card-title text-warning-title">Termo de responsabilidade</h3>
                            <p class="card-text text-body-tertiary">Não é preciso pagar nada para adotar, mas você
                                vai
                                assinar um termo de responsabilidade, comprometendo-se a não doar o animal para
                                terceiros sem consentimento e zelar por sua saúde e segurança.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('Components.hr')
    <div class="container">
        <h3 class="card-title text-warning-title">Animais para doação</h3>
        <p class="lead">
            <small> Alterne entre os conteúdos e escolha um de nossos bichinhos</small>
        </p>
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a href="#info" role="tab" data-toggle="tab" class="nav-link active"> <i class="fas fa-dog">Cães</i>
                </a>
            </li>
            <li class="nav-item">
                <a href="#ratings" role="tab" data-toggle="tab" class="nav-link"> <i class="fas fa-cat"> Gatos</i>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="info">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-4" data-anime="right">
                            <div class="card doacoes">
                                <div class="card-header">
                                    <h5 class="title-adotar">🐾 Conheça o Urso! 🐾</h5>
                                    <figure>
                                        <img src="{{ asset('img/urso/urso_02.jpeg') }}" alt="Imagem" class="img-fluid">
                                        <figcaption>
                                            <button type="button" class="btn btn-secondary" style="background-color:#6C5142; margin-top: 15px;"><i class="fas fa-paw"> Quero Adotar</i>
                                            </button>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4" data-anime="right">
                            <div class="card doacoes">
                                <div class="card-header">
                                    <h5 class="title-adotar">🐾 Conheça o Luke! 🐾</h5>
                                    <figure>
                                        <img src="{{ asset('img/luke/luke_01.jpeg') }}" alt="Imagem" class="img-fluid">
                                        <figcaption>
                                            <button type="button" class="btn btn-secondary" style="background-color:#6C5142; margin-top: 15px;"><i class="fas fa-paw"> Quero Adotar</i>
                                            </button>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4" data-anime="right">
                            <div class="card doacoes">
                                <div class="card-header">
                                    <h5 class="title-adotar">🐾 Conheça a Paçoca! 🐾</h5>
                                    <figure>
                                        <img src="{{ asset('img/pacoca/03.jpeg') }}" alt="Imagem" class="img-fluid">
                                        <figcaption>
                                            <button type="button" class="btn btn-secondary" style="background-color:#6C5142; margin-top: 15px;"><i class="fas fa-paw"> Quero Adotar</i>
                                            </button>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4" data-anime="right">
                            <div class="card doacoes">
                                <div class="card-header">
                                    <h5 class="title-adotar">🐾 Conheça a Nazaré! 🐾</h5>
                                    <figure>
                                        <img src="{{ asset('img/nazare/nazare_02.jpeg') }}" alt="Imagem" class="img-fluid">
                                        <figcaption>
                                            <button type="button" class="btn btn-secondary" style="background-color:#6C5142; margin-top: 15px;"><i class="fas fa-paw"> Quero Adotar</i>
                                            </button>
                                        </figcaption>
                                    </figure>

                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 col-lg-4" data-anime="right">
                            <div class="card doacoes">
                                <div class="card-header">
                                    <h5 class="title-adotar">🐾 Conheça o Duque! 🐾</h5>
                                    <figure>
                                        <img src="{{ asset('img/duque/duque.jpeg') }}" alt="Imagem" class="img-fluid">
                                        <figcaption>
                                            <button type="button" class="btn btn-secondary" style="background-color:#6C5142; margin-top: 15px;"><i class="fas fa-paw"> Quero Adotar</i>
                                            </button>
                                        </figcaption>
                                    </figure>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-4" data-anime="right">


                            <div class="card doacoes">
                                <div class="card-header">
                                    <h5 class="title-adotar">🐾 Conheça a Dandara! 🐾</h5>
                                    <figure>
                                        <img src="{{ asset('img/dandara/dandara.jpeg') }}" alt="Imagem" class="img-fluid">
                                        <figcaption>
                                            <button type="button" class="btn btn-secondary" style="background-color:#6C5142; margin-top: 15px;"><i class="fas fa-paw"> Quero Adotar</i>
                                            </button>
                                        </figcaption>
                                    </figure>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane" role="tabpanel" id="ratings">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-4" data-anime="right">
                            <div class="card doacoes">
                                <div class="card-header">
                                    <h5 class="title-adotar">🐾 Conheça o Gigante! 🐾</h5>
                                    <figure>
                                        <img src="{{ asset('img/gatos/gato_01.jpeg') }}" alt="Imagem" class="adotar-animais">
                                        <figcaption>
                                            <button type="button" class="btn btn-secondary" style="background-color:#6C5142; margin-top: 15px;"><i class="fas fa-paw"> Quero Adotar</i>
                                            </button>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4" data-anime="right">
                            <div class="card doacoes">
                                <div class="card-header">
                                    <h5 class="title-adotar">🐾 Conheça o bethoven ! 🐾</h5>
                                    <figure>
                                        <img src="{{ asset('img/gatos/gato_03.jpeg') }}" alt="Imagem" class="adotar-animais">
                                        <figcaption>
                                            <button type="button" class="btn btn-secondary" style="background-color:#6C5142; margin-top: 15px;"><i class="fas fa-paw"> Quero Adotar</i>
                                            </button>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4" data-anime="right">
                            <div class="card doacoes">
                                <div class="card-header">
                                    <h5 class="title-adotar">🐾 Conheça o Bernardo! 🐾</h5>
                                    <figure>
                                        <img src="{{ asset('img/gatos/gato_04.jpeg') }}" alt="Imagem" class="adotar-animais">
                                        <figcaption>
                                            <button type="button" class="btn btn-secondary" style="background-color:#6C5142; margin-top: 15px;"><i class="fas fa-paw"> Quero Adotar</i>
                                            </button>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4" data-anime="right">
                            <div class="card doacoes">
                                <div class="card-header">
                                    <h5 class="title-adotar">🐾 Conheça o mooroe! 🐾</h5>
                                    <figure>
                                        <img src="{{ asset('img/gatos/gato_05.jpeg') }}" alt="Imagem" class="adotar-animais">
                                        <figcaption>
                                            <button type="button" class="btn btn-secondary" style="background-color:#6C5142; margin-top: 15px;"><i class="fas fa-paw"> Quero Adotar</i>
                                            </button>
                                        </figcaption>
                                    </figure>
                
                                </div>
                            </div>
                        </div>


                       <div class="col-md-12 col-lg-4" data-anime="right">
                            <div class="card doacoes">
                                <div class="card-header">
                                    <h5 class="title-adotar">🐾 Conheça o Lázara! 🐾</h5>
                                    <figure>
                                        <img src="{{ asset('img/gatos/gato_06.jpg') }}" alt="Imagem" class="adotar-animais">
                                        <figcaption>
                                            <button type="button" class="btn btn-secondary" style="background-color:#6C5142; margin-top: 15px;"><i class="fas fa-paw"> Quero Adotar</i>
                                            </button>
                                        </figcaption>
                                    </figure>

                                </div>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- se remover esse script aqui o tab nao fucniona mais , o boostrap depende deste script entao por favor manter-->
<script type="text/javascript" src="{{asset('site/js/main.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<!-- footer-->
@include('Components.Footer.index')
@endsection
