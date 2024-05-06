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
                            todas as janelas, vidros, sacadas e portões para impedir que o animal fuja para rua. Lembre-se que isso precisa ser feito antes da chegada do cachorrinho.</p>
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
                            qualidade de vida do cachorrinho é preciso ter condições financeiras para arcar com
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
                <a href="#info" role="tab" data-toggle="tab" class="nav-link @if(request()->has('pag_cachorro') || (!request()->has('pag_cachorro') && !request()->has('pag_gato'))) active @endif"> <i class="fas fa-dog">Cães</i>
                </a>
            </li>
            <li class="nav-item">
                <a href="#ratings" role="tab" data-toggle="tab" class="nav-link @if(request()->has('pag_gato')) active @endif"> <i class="fas fa-cat"> Gatos</i>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane @if(request()->has('pag_cachorro') || (!request()->has('pag_cachorro') && !request()->has('pag_gato'))) active @endif" role="tabpanel" id="info">
                <div class="container" style="padding: 30px">
                    <div class="row">

                        @foreach( $cachorros as $cachorro )
                            @if($cachorro->adotado)
                                <div class="col-md-12 col-lg-4" data-anime="right">
                                    <div class="card doacoes">
                                        <div class="card-body">
                                            <div  style="min-height: 100px"><h5 class="title-adotar">🐾 Conheça o(a) {{$cachorro->nome}}! 🐾</h5></div>
                                            <figure>
                                                <img src="{{\App\Models\AreaRestrita\Animal::imagem_url($cachorro->id, $cachorro->imagem)}}" alt="Imagem" class="img-fluid" style="height: 400px; width: 400px; background-color: #1a202c; opacity: 0.5">
                                                <figcaption>
                                                    <button type="button" class="btn btn-secondary" style="background-color:#6C5142; margin-top: 15px;" disabled><i class="fas fa-paw"> Adotado</i>
                                                    </button>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-12 col-lg-4" data-anime="right">
                                    <div class="card doacoes">
                                        <div class="card-body">
                                            <div  style="min-height: 100px"><h5 class="title-adotar">🐾 Conheça o(a) {{$cachorro->nome}}! 🐾</h5></div>
                                            <figure>
                                                <img src="{{\App\Models\AreaRestrita\Animal::imagem_url($cachorro->id, $cachorro->imagem)}}" style="height: 400px; width: 400px;" alt="Imagem" class="img-fluid">
                                                <figcaption>
                                                    <button type="button" class="btn btn-secondary" style="background-color: #6C5142; margin-top: 15px;">
                                                        <a href="#" target="_blank" style="color: #fff !important; text-decoration: none;">
                                                            <i class="fas fa-paw"></i> Quero Adotar
                                                        </a>
                                                    </button>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>

                <div style="width: 100%; display: flex; justify-content: center; align-content: center; align-items: center">
                    {{ $cachorros->links('vendor.pagination.custom') }}
                </div>
            </div>
            <div class="tab-pane @if(request()->has('pag_gato')) active @endif" role="tabpanel" id="ratings">
                <div class="container" style="padding: 30px">
                    <div class="row">

                        @foreach( $gatos as $gato )
                            @if($gato->adotado)
                                <div class="col-md-12 col-lg-4" data-anime="right">
                                    <div class="card doacoes">
                                        <div class="card-body">
                                            <div  style="min-height: 100px"><h5 class="title-adotar">🐾 Conheça o(a) {{$gato->nome}}! 🐾</h5></div>
                                            <figure>
                                                <img src="{{\App\Models\AreaRestrita\Animal::imagem_url($gato->id, $gato->imagem)}}" alt="Imagem" class="img-fluid" style="min-height: 400px; min-width: 400px; background-color: #1a202c; opacity: 0.5">
                                                <figcaption>
                                                    <button type="button" class="btn btn-secondary" style="background-color:#6C5142; margin-top: 15px;" disabled><i class="fas fa-paw"> Adotado</i>
                                                    </button>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-12 col-lg-4" data-anime="right">
                                    <div class="card doacoes">
                                        <div class="card-body">
                                            <div  style="min-height: 100px"><h5 class="title-adotar">🐾 Conheça (o)a {{$gato->nome}}! 🐾</h5></div>
                                            <figure>
                                                <img src="{{\App\Models\AreaRestrita\Animal::imagem_url($gato->id, $gato->imagem)}}" style="height: 400px; width: 400px;" alt="Imagem" class="img-fluid">
                                                <figcaption>
                                                    <button type="button" class="btn btn-secondary" style="background-color: #6C5142; margin-top: 15px;">
                                                        <a href="#" target="_blank" style="color: #fff !important; text-decoration: none;">
                                                            <i class="fas fa-paw"></i> Quero Adotar
                                                        </a>
                                                    </button>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div style="width: 100%; display: flex; justify-content: center; align-content: center; align-items: center">
                    {{ $gatos->links('vendor.pagination.custom') }}
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
