<!-- Styles -->
<link rel="stylesheet" href="{{ asset('site/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('site/css/custom.css') }}">
@include('Components.Header.index')
<section class="adote">
    <div class="container text-center titulos ">
        <div class="card  text-center description">
            <div class="card-header">
                <h4 class="card-title text-warning">Tudo o que você precisa saber para adotar</h4>
                <p class="card-text">Para garantir a segurança e conforto dos resgatinhos, seguimos todas as regras e políticas de adoção responsável. Confira informações essenciais para adotar na Bartho.</p>
            </div>
        </div>
    </div>


    <div class="container text-center container_Adote_Descriptions">


        <div class="row justify-content-md-center ">
            <div class="row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <span class="elemento-icon">
                        <ion-icon name="star-outline" style="font-size: 45px; color: #dca821;"></ion-icon>
                    </span>
                    <div class="card description">
                        <div class="card-body">

                            <h5 class="card-title text-warning ">Proteger saídas e rotas de fuga</h5>
                            <p class="card-text text-body-tertiary">Apartamentos e casas precisam ter redes de proteção em todas as janelas, vitrôs, basculantes, sacadas e portões para impedir o acesso do cachorro de rua . Lembre-se que isso precisa ser feito antes da chegada do cachorrinho.</p>

                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <span class="elemento-icon">
                        <ion-icon name="wallet-outline" style="font-size: 45px; color: #dca821;"></ion-icon>
                    </span>
                    <div class="card description">
                        <div class="card-body">
                            <h5 class="card-title text-warning">Ter condições financeiras</h5>
                            <p class="card-text text-body-tertiary">Este ponto é de extrema importância para garantir a qualidade de vida do cachorrinho: é preciso ter condições financeiras para arcar com ração de boa qualidade, vacinas e consultas regulares com veterinário.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container text-center container_Adote_Descriptions">



        <div class="row justify-content-md-center">

            <div class="row">

                <div class="col-sm-6 mb-3 mb-sm-0">
                    <span class="elemento-icon">
                        <ion-icon name="home-outline" style="font-size: 45px; color: #dca821;"></ion-icon>
                    </span>
                    <div class="card description">
                        <div class="card-body">

                            <h5 class="card-title text-warning">Morar em São Paulo</h5>
                            <p class="card-text text-body-tertiary">É preciso morar na cidade de São Paulo, no ABC (Santo André, São Bernardo e São Caetano) ou arredores.</p>

                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <span class="elemento-icon">
                        <ion-icon name="document-text-outline" style="font-size: 45px; color: #dca821;"></ion-icon>
                    </span>
                    <div class="card description">
                        <div class="card-body">
                            <h5 class="card-title text-warning">Termo de responsabilidade</h5>
                            <p class="card-text text-body-tertiary">Não é preciso pagar nada para adotar, mas você vai assinar um termo de responsabilidade, comprometendo-se a não doar o resgatinho para terceiros sem consentimento e zelar por sua saúde e segurança.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center titulos ">
        <div class="card text-center description">
            <div class="card-header">
                <h4 class="card-title text-warning"> Cachorro disponiveis para a adoção</h4>

            </div>
        </div>
    </div>
    <div class="container text-center container_Adote_animais">



        <div class="row">
            <div class="col">
                <div class="card animais" style="width: 18rem;">
                    <img src="{{ asset('img/dogi_3.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title  ">Caramelo 1</h5>
                        <p class="card-text text-body-tertiary">Esse aqui 'e o caramelo, resgatado de maus cuidados e hoje esta feliz em procura uma casa nova</p>
                        <button type="button" class="btn btn-lg botao-adote">Adote</button>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card animais" style="width: 18rem;">
                    <img src="{{ asset('img/dogi_2.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title  ">Nome do animalzinho 2</h5>
                        <p class="card-text text-body-tertiary">Descricao do animalzinho</p>
                        <button type="button" class="btn btn-lg botao-adote ">Adote</button>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card animais" style="width: 18rem;">
                    <img src="{{ asset('img/dogi_1.jpeg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title  ">Nome do animalzinho 3</h5>
                        <p class="card-text text-body-tertiary">Descricao do animalzinho</p>
                        <button type="button" class="btn btn-lg botao-adote">Adote</button>

                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
@include('Components.Footer.index')