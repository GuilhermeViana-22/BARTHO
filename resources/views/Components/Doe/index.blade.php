

<link rel="stylesheet" href="{{ asset('site/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('site/css/custom.css') }}">
@include('Components.Header.index')
@include('Components.Banner.doe')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<section class="doe ">
    <h1 style="font-family: 'Knewave', cursive;">Doação única</h1>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="card  card-doe animate__animated animate__fadeInDown">
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
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="card card-doe animate__animated animate__fadeInDown">
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

            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="card card-doe animate__animated animate__fadeInDown">
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
        @include('Components.hr')
        <img src="{{ asset('img/nova-logo.png') }}" alt="Imagem" class="img-fluid" width="100" height="100" style="display: block; margin-left: auto; margin-right: auto; margin-top: 5vh">
        <h5 class="card-title">DOAÇÕES MENSAIS - BARTHÔ</h5>
          <p>  Ajude nossos animais mensalmente, através da opção que considerar melhor! 💛🤎</p>
        @include('Components.hr')
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-4 " >
                <div class="assinatura animate__animated animate__fadeInDown">
                    <i class="fas fa-donate" style="font-size: 24px"></i>
                    <p>  🤎 Doação mensal:  R$ 22,00/Mês! 💛</p>
                    <div class="card-footer" style="text-align: center">
                        <a href="https://www.mercadopago.com.br/checkout/v1/payment/redirect/b9c7e5a0-6d3f-4ec1-829b-37fdd1b2ece2/payment-option-form/?sniffing-rollout=sniffing-api&source=link&preference-id=1242403091-a66d668b-eb67-48b6-b375-ac68db7dcc38&router-request-id=1f35d4e8-e1ed-42a2-8336-04e1b9d94a9b&p=0c23019bd1367d79a89fbbbf15fe7a6a#/" class="btn botao-adote" _blank>  <i class="fas fa-paw"> Assinar</i></a>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-4 " >
                <div class="assinatura animate__animated animate__fadeInDown">
                    <i class="fas fa-donate" style="font-size: 24px"></i>
                    <p>  🤎 Doação mensal:  R$ 25,00/Mês! 💛</p>
                    <div class="card-footer" style="text-align: center">
                        <a href="https://www.mercadopago.com.br/subscriptions/checkout?preapproval_plan_id=2c938084862b040c01862ec762e40344" class="btn botao-adote" _blank> <i class="fas fa-paw"> Assinar</i></a>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-4 " >
                <div class="assinatura animate__animated animate__fadeInDown">
                    <i class="fas fa-donate" style="font-size: 24px"></i>
                    <p>  🤎 Doação mensal:  R$ 30,00/Mês! 💛</p>
                    <div class="card-footer" style="text-align: center">
                        <a href="https://www.mercadopago.com.br/subscriptions/checkout?preapproval_plan_id=2c9380848626724201862ec8edea086b" class="btn botao-adote" _blank> <i class="fas fa-paw"> Assinar</i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 " >
                <div class="assinatura animate__animated animate__fadeInDown">
                    <i class="fas fa-donate" style="font-size: 24px"></i>
                    <p>  🤎 Doação mensal:  R$ 50,00/Mês! 💛</p>
                    <div class="card-footer" style="text-align: center">
                        <a href="https://www.mercadopago.com.br/subscriptions/checkout?preapproval_plan_id=2c9380848611cf740186136a1c0e0242" class="btn botao-adote" _blank> <i class="fas fa-paw"> Assinar</i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 " >
                <div class="assinatura animate__animated animate__fadeInDown">
                    <i class="fas fa-donate" style="font-size: 24px"></i>
                    <p>  🤎 Doação mensal:  R$ 60,00/Mês! 💛</p>
                    <div class="card-footer" style="text-align: center">
                        <a href="https://www.mercadopago.com.br/subscriptions/checkout?preapproval_plan_id=2c9380848626724201862eca5dd1086e" class="btn botao-adote" _blank> <i class="fas fa-paw"> Assinar</i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 " >
                <div class="assinatura animate__animated animate__fadeInDown">
                    <i class="fas fa-donate" style="font-size: 24px"></i>
                    <p>  🤎 Doação mensal:  R$ 75,00/Mês! 💛</p>
                    <div class="card-footer" style="text-align: center">
                        <a href="https://www.mercadopago.com.br/subscriptions/checkout?preapproval_plan_id=2c938084862b040c01862ecb829a034a" class="btn botao-adote" _blank> <i class="fas fa-paw"> Assinar</i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 " >
                <div class="assinatura animate__animated animate__fadeInDown">
                    <i class="fas fa-donate" style="font-size: 24px"></i>
                    <p>  🤎 Doação mensal:  R$ 100,00/Mês! 💛</p>
                    <div class="card-footer" style="text-align: center">
                        <a href="https://www.mercadopago.com.br/subscriptions/checkout?preapproval_plan_id=2c9380848626724201862ecc65fd0874" class="btn botao-adote" _blank> <i class="fas fa-paw"> Assinar</i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 " >
                <div class="assinatura animate__animated animate__fadeInDown">
                    <i class="fas fa-donate" style="font-size: 24px"></i>
                    <p>  🤎 Doação mensal:  R$ 200,00/Mês! 💛</p>
                    <div class="card-footer" style="text-align: center">
                        <a href="https://www.mercadopago.com.br/subscriptions/checkout?preapproval_plan_id=2c9380848626721101862ece92ae08ab" class="btn botao-adote" _blank> <i class="fas fa-paw"> Assinar</i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 " >
                <div class="assinatura animate__animated animate__fadeInDown">
                    <i class="fas fa-donate" style="font-size: 24px"></i>
                    <p>  🤎 Doação mensal:  Livre escolha 💛</p>
                    <div class="card-footer" style="text-align: center">
                        <a href="https://www.mercadopago.com.br/subscriptions/checkout?preapproval_plan_id=2c9380848626721101862ed6286508b2" class="btn botao-adote" _blank> <i class="fas fa-paw"> Assinar</i></a>
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
                <p class="outras_formas_de_ajudar_text">Ajudar é uma atitude nobre que pode transformar vidas e fazer a diferença em diversos aspectos, especialmente quando se trata de organizações não governamentais (ONGs) dedicadas ao bem-estar animal. Existem várias formas de contribuir e apoiar essas instituições, como através de doações, participação em eventos e compartilhamento de conteúdo em páginas do Facebook e Instagram.
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
