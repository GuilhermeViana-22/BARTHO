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

                        @foreach($cachorros as $cachorro)
                            <div class="col-md-12 col-lg-4" data-anime="right">
                                <div class="card doacoes">
                                    <div class="card-body">
                                        <div style="min-height: 100px"><h5 class="title-adotar">🐾 Conheça o(a) {{$cachorro->nome}}! 🐾</h5></div>
                                        <figure>
                                            <div id="carousel-{{$cachorro->id}}" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    @php
                                                        $images = [
                                                            $cachorro->imagem1,
                                                            $cachorro->imagem2,
                                                            $cachorro->imagem3,
                                                        ];
                                                        $activeSet = false;
                                                    @endphp
                                                    @foreach($images as $image)
                                                        @if($image)
                                                            <div class="carousel-item {{ !$activeSet ? 'active' : '' }}">
                                                                <img src="{{ \App\Models\AreaRestrita\Animal::imagem_url($cachorro->id, $image) }}" class="d-block w-100" style="height: 400px; width: 400px;" alt="Imagem">
                                                            </div>
                                                            @php $activeSet = true; @endphp
                                                        @endif
                                                    @endforeach
                                                </div>
                                                @if($activeSet)
                                                    <a class="carousel-control-prev" href="#carousel-{{$cachorro->id}}" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carousel-{{$cachorro->id}}" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                    <p class="text-center p-4">{{$cachorro->descricao}}</p>
                                                @endif
                                            </div>
                                            <figcaption>
                                                @if($cachorro->adotado)
                                                    <button type="button" class="btn btn-secondary" style="background-color:#6C5142; margin-top: 15px;" disabled>
                                                        <i class="fas fa-paw"> Adotado</i>
                                                    </button>
                                                @else
                                                    <button type="button" class="btn btn-secondary" style="background-color: #6C5142; margin-top: 15px;">
                                                        <a onclick="showModal('{{route('adote.adotarmodal', ['id' => $cachorro->id])}}', 'Solicitar pedido de adoção do cachorro: {{$cachorro->nome}}')" style="color: #fff !important; text-decoration: none;">
                                                            <i class="fas fa-paw"></i> Quero Adotar
                                                        </a>
                                                    </button>
                                                @endif
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                            </div>
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

                        @foreach($gatos as $gato)
                            <div class="col-md-12 col-lg-4" data-anime="right">
                                <div class="card doacoes">
                                    <div class="card-body">
                                        <div style="min-height: 100px"><h5 class="title-adotar">🐾 Conheça o(a) {{$gato->nome}}! 🐾</h5></div>
                                        <figure>
                                            <div id="carousel-{{$gato->id}}" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    @php
                                                        $images = [
                                                            $gato->imagem1,
                                                            $gato->imagem2,
                                                            $gato->imagem3,
                                                        ];
                                                        $activeSet = false;
                                                    @endphp
                                                    @foreach($images as $image)
                                                        @if($image)
                                                            <div class="carousel-item {{ !$activeSet ? 'active' : '' }}">
                                                                <img src="{{ \App\Models\AreaRestrita\Animal::imagem_url($gato->id, $image) }}" class="d-block w-100" style="height: 400px; width: 400px;" alt="Imagem">
                                                            </div>
                                                            @php $activeSet = true; @endphp
                                                        @endif
                                                    @endforeach
                                                </div>
                                                @if($activeSet)
                                                    <a class="carousel-control-prev" href="#carousel-{{$gato->id}}" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carousel-{{$gato->id}}" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                    <p class="text-center p-4">{{$gato->descricao}}</p>
                                                @endif
                                            </div>
                                            <figcaption>
                                                @if($gato->adotado)
                                                    <button type="button" class="btn btn-secondary" style="background-color:#6C5142; margin-top: 15px;" disabled>
                                                        <i class="fas fa-paw"> Adotado</i>
                                                    </button>
                                                @else
                                                    <button onclick="showModal('{{route('adote.adotarmodal', ['id' => $gato->id])}}', 'Solicitar pedido de adoção do gato: {{$gato->nome}}', 'modal-lg')" type="button" class="btn btn-secondary" style="background-color: #6C5142; margin-top: 15px;">
                                                        <a style="color: #fff !important; text-decoration: none;">
                                                            <i class="fas fa-paw"></i> Quero Adotar
                                                        </a>
                                                    </button>
                                                @endif
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                            </div>
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
<!-- footer-->
@include('Components.Footer.index')
@endsection
