@extends('layout')
@section('content')
@include('Components.Banner.index')
<section class="sobre mt-4 mb-4">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
            <img id="logo_principal" src="{{ asset('img/nova-logo.png') }}" alt="Imagem" loading="lazy" class="img-fluid ">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 text-right">
            <h2><strong>Sobre nós</strong></h2>
            <div class="col-10">
                <p>O BARTHÔ é um Grupo de Proteção Animal situado no Brasil, mais especificamente na cidade de São Caetano
                    do Sul, no estado de São Paulo. O BARTHÔ atua há 6 anos em ações de resgate, tratamento e adoção de
                    animais abandonados ou vítimas de maus-tratos.</p>

                <p>O BARTHÔ resgata, acolhe e custeia tratamentos com a ajuda de doações de pessoas sensibilizadas pelos
                    casos, mantendo os animais em Lares Temporários até que possam ser adotados de forma responsável por uma
                    família. O Grupo também cuida de aproximadamente 180 animais (entre gatos e cachorros, adultos e
                    filhotes) em Lar Temporário, sob os cuidados de nossos ativistas.</p>

                <p>Além disso, o BARTHÔ promove Feiras de Adoção com os animais após o tratamento, a castração e a
                    vacinação, sempre buscando transformar suas vidas. Também realizamos um trabalho constante de
                    acompanhamento dos adotados, muitas vezes mesmo após a adoção. Até o momento, o Grupo já resgatou mais
                    de 800 animais.</p>

                <p>O "Mega-Resgate", o maior já realizado pelo BARTHÔ, ocorreu em agosto de 2020, quando, em um único dia,
                    foram resgatados 83 animais em condições extremas de maus-tratos em um sítio localizado na cidade de
                    Itaquaquecetuba. O resgate foi coordenado pelo BARTHÔ e contou com o apoio das Polícias locais
                    (Ambiental e Civil), Bombeiros Civis, Médicos Veterinários voluntários e outros Grupos de Proteção
                    Parceiros. Esse resgate pode ter sido o maior já realizado no estado de São Paulo envolvendo animais
                    "Sem Raça Definida" (SRD), já que a maioria dos grandes resgates ocorre em criadouros clandestinos de
                    animais de raça.</p>
            </div>
        </div>
    </div>
</section>
@include('Components.Sobre.qrcode')
<section class="doacoes" data-anime="right">
    <div class="row justify-content-center text-center">
        <div class="col-xs-12 col-sm-4 col-md-12 col-lg-4 mb-4">
            <div class="card card-doar">
                <i id="fa-paw" class="fas fa-paw"></i>
                <br>
                <h5>Alimentos</h5>
                <br>
                <p class="conteudo-sobre-doacoes">Com suas doações, somos capazes de garantir que todos os nossos animais recebam refeições nutritivas e balanceadas diariamente. Além disso, as rações doadas também são comumente destinadas a animais que vivem em situação de rua, ou em comunidades carentes.</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-12 col-lg-4 mb-4">
            <div class="card  card-doar">
                <i id="fa-paw" class="fas fa-paw"></i>
                <br>
                <h5>Medicamentos</h5>
                <br>
                <p class="conteudo-sobre-doacoes">Com suas doações, podemos adquirir os medicamentos vitais para o tratamento de doenças, infecções e outras condições de saúde que nossos animais possam enfrentar. Cada contribuição que recebemos nos permite oferecer-lhes os cuidados médicos necessários, fornecendo medicamentos de qualidade e com as dosagens corretas.</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-12 col-lg-4 mb-4">
            <div class="card card-doar">
                <i id="fa-paw" class="fas fa-paw"></i>
                <br>
                <h5>Cirurgias</h5>
                <br>
                <p class="conteudo-sobre-doacoes">Com suas doações, podemos cobrir os custos das cirurgias essenciais para nossos animais. Cada contribuição que recebemos nos permite oferecer-lhes acesso a procedimentos cirúrgicos realizados por profissionais qualificados e experientes. As doações possibilitam que eles recebam os cuidados médicos necessários para superar os desafios de saúde e terem uma chance maior de recuperação.</p>
            </div>
        </div>
    </div>
</section>
@include('Components.Footer.index')
<script type="text/javascript" src="{{asset('site/js/main.js')}}"></script>
<script type="text/javascript" src="{{asset('site/bootstrap.js')}}"></script>

@endsection
