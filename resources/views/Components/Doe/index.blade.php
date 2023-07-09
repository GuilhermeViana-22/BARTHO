<link rel="stylesheet" href="{{ asset('site/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('site/css/custom.css') }}">
@include('Components.Header.index')
@include('Components.Banner.doe')

<section class="doe ">
    <h1 style="font-family: 'Knewave', cursive;">Doação única</h1>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="card  card-doe">
                    <div class="card-body">
                        <h5 class="card-title">💠 𝘗𝘐𝘟</h5>
                        <p class="card-text">Chave PIX:</p>
                        <p class="card-text">𝘣𝘢𝘳𝘵𝘩𝘰𝘱𝘳𝘰𝘵𝘦𝘤𝘢𝘰𝘢𝘯𝘪𝘮𝘢𝘭@𝘨𝘮𝘢𝘪𝘭.𝘤𝘰𝘮</p>
                        <!-- Conteúdo da segunda coluna aqui -->
                        <p class="card-text">QR code</p>
                        <img id="qrcode_doa" src="{{ asset('img/QRCODE.jpg') }}" alt="Imagem" class="img-fluid ">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card card-doe">
                    <div class="card-body">
                        <h5 class="card-title">Banco: Itaú</h5>
                        <br>
                        <p class="card-text"> Agência: 4822 / 𝘊𝘊. 99899-5</p>
                        <br>
                        <p class="card-text"> CNPJ: 40.074.637/0001-47 - 40074637000147</p>
                        <br>
                        <p class="card-text">Bartho - Grupo de Protecao Animal</p>
                        <br>
                        <p class="card-text">Razão Social: Associacao Bartho - Grupo de Protecao Animal</p>
                        <p class="card-text">Natureza Jurídica: Associação Privada</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card  card-doe">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">🟢 𝘗𝘐𝘊𝘗𝘈𝘠</h6>
                        <p class="card-text">Chave PIX:</p>
                        <p class="card-text">@barthoprotoecaoanimal</p>
                        <p class="card-text">QR code</p>
                        <img id="qrcode_picpay" src="{{ asset('img/picpay.png') }}" alt="Imagem" class="img-fluid ">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="container">
        <div class="row">
            <div class="outras_formas_de_ajudar">
                <div class="col-sm-6">
                    .
                </div>
                <div class="col-sm-6">
                    <h5 class="card-text outras_formas_de_ajudar_title">Outras formas de ajudar</h5>
                <p class="outras_formas_de_ajudar_text">     Ajudar é uma atitude nobre que pode transformar vidas e fazer a diferença em diversos aspectos, especialmente quando se trata de organizações não governamentais (ONGs) dedicadas ao bem-estar animal. Existem várias formas de contribuir e apoiar essas instituições, como através de doações, participação em eventos e compartilhamento de conteúdo em páginas do Facebook e Instagram.
                </p>
                    <br>
                    <br>
                    <br>
                    <p  class="outras_formas_de_ajudar_text">EM NOME DOS NOSSOS ANIMAIS, MUITO OBRIGADO!</p>
                </div>


           </div>
        </div>
    </div>
</section>

@include('Components.Footer.index')
<script type="text/javascript" src="{{asset('site/bootstrap.js')}}"></script>
