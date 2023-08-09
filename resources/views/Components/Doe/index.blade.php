@extends('layout')
@section('content')

    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/custom.css') }}">


    @include('Components.Banner.doe')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <section class="doe ">
        <h4 class="card-title" style="margin-bottom: 20px"> Doações Únicas</h4>

        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div class="card card-doe animate__animated animate__fadeInDown">
                        <div class="card-body">
                            <h5 class="card-title">
                                <svg style="width: 30px; height: 30px;" viewBox="0 0 512 512"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <defs/>
                                    <g fill="#4BB8A9" fill-rule="evenodd">
                                        <path
                                            d="M112.57 391.19c20.056 0 38.928-7.808 53.12-22l76.693-76.692c5.385-5.404 14.765-5.384 20.15 0l76.989 76.989c14.191 14.172 33.045 21.98 53.12 21.98h15.098l-97.138 97.139c-30.326 30.344-79.505 30.344-109.85 0l-97.415-97.416h9.232zm280.068-271.294c-20.056 0-38.929 7.809-53.12 22l-76.97 76.99c-5.551 5.53-14.6 5.568-20.15-.02l-76.711-76.693c-14.192-14.191-33.046-21.999-53.12-21.999h-9.234l97.416-97.416c30.344-30.344 79.523-30.344 109.867 0l97.138 97.138h-15.116z"/>
                                        <path
                                            d="M22.758 200.753l58.024-58.024h31.787c13.84 0 27.384 5.605 37.172 15.394l76.694 76.693c7.178 7.179 16.596 10.768 26.033 10.768 9.417 0 18.854-3.59 26.014-10.75l76.989-76.99c9.787-9.787 23.331-15.393 37.171-15.393h37.654l58.3 58.302c30.343 30.344 30.343 79.523 0 109.867l-58.3 58.303H392.64c-13.84 0-27.384-5.605-37.171-15.394l-76.97-76.99c-13.914-13.894-38.172-13.894-52.066.02l-76.694 76.674c-9.788 9.788-23.332 15.413-37.172 15.413H80.782L22.758 310.62c-30.344-30.345-30.344-79.524 0-109.868"/>
                                    </g>
                                </svg>
                                𝘗𝘐𝘟
                            </h5>
                            <p class="card-text text-content">Chave PIX:</p>
                            <p class="card-text text-content"  onclick="copyTextToClipboard('barthoprotecaoanimal@gmail.com')">barthoprotecaoanimal@gmail.com <i class="fas fa-copy copy-icon"></i></p>


                            <!-- Conteúdo da segunda coluna aqui -->
                            <p class="card-text text-content">QR code</p>
                            <!-- Conteúdo da segunda coluna aqui -->
                            <img id="logo_sobre" src="{{ asset('img/QRCODE.jpg') }}" loading="lazy"
                                 style="width: 220px; height: 220px;" alt="Imagem" class="img-fluid mx-auto d-block">
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div class="card card-doe animate__animated animate__fadeInDown">
                        <div class="card-body" style="text-align: center">
                            <div class="row">
                                <div class="col-md-12 d-flex align-items-center">
                                    <img id="logo_sobre" src="{{ asset('img/mercadopago.png') }}" style="width: 50px; height: 50px; margin-right: 5px;" alt="Imagem" class="img-fluid">
                                    <h5 class="card-title mb-0">Cartão de crédito</h5>
                                </div>
                            </div>
                            <!-- Conteúdo da segunda coluna aqui -->
                            <p class="card-text text-content">QR code</p>
                            <!-- Conteúdo da segunda coluna aqui -->
                            <img id="logo_sobre" src="{{ asset('img/qrcode_mercado_pago.jpeg') }}" loading="lazy"
                                 style="width: 208px; height: 208px;" alt="Imagem" class="img-fluid mx-auto d-block">
                            <br>
                            <p><a href="https://link.mercadopago.com.br/bartho" class="btn btn-more-information-link"
                                  target="_blank">
                                    <i class="fas fa-paw"></i> Acesse aqui
                                </a></p>
                        </div>
                    </div>
                </div>

                {{--                <div class="col-sm-12 col-md-12 col-lg-4 text-center">--}}
                {{--                    <div class="card card-doe animate__animated animate__fadeInDown">--}}
                {{--                        <div class="card-body">--}}
                {{--                            <i class="fas fa-university" style="font-size: 24px">Cartão de crédito</i>--}}
                {{--                            <a href="" class="btn btn-more-information" _blank> <i class="fas fa-paw"> Acesse aqui para doar</i></a>--}}
                {{--                            <img id="logo_sobre" src="{{ asset('img/qrcode_mercado_pago.jpeg') }}" loading="lazy" style="width: 200px; height: 200px;" alt="Imagem" class="img-fluid mx-auto d-block">--}}
                {{--                        </div>--}}
                {{--                    </div>--}}

                {{--                    <div class="card card-doe animate__animated animate__fadeInDown">--}}
                {{--                        <p>Dados bancários: </p>--}}
                {{--                        <p> Banco Itaú</p>--}}
                {{--                        <div class="card-body-dados-bancarios">--}}
                {{--                            <p class="card-text text-content">Agência: 4822</p>--}}
                {{--                            <p class="card-text text-content">Conta: 99899-5</p>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}

                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div class="card card-doe animate__animated animate__fadeInDown">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">
                                <svg style="width: 40px; height: 40px;" viewBox=" 0 0 192 192"
                                     xmlns="http://www.w3.org/2000/svg" fill="none">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path stroke="#4db94b" stroke-linejoin="round" stroke-width="12"
                                              d="M45.259 77.594v34.86h22.855a18.587 18.587 0 0 0 12.97-5.224 17.001 17.001 0 0 0 3.843-5.577 16.92 16.92 0 0 0-3.843-18.83 18.591 18.591 0 0 0-12.97-5.229H45.26ZM22 161.996V77.594h23.22V56h22.894A40.275 40.275 0 0 1 96.19 67.385a38.386 38.386 0 0 1 8.735 12.624 38.221 38.221 0 0 1 0 30.034 38.383 38.383 0 0 1-8.735 12.624 40.274 40.274 0 0 1-28.076 11.382H45.26V162L22 161.996Z"
                                              clip-rule="evenodd"></path>
                                        <path stroke="#4db94b" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="12" d="M170 30h-42v42h42V30Z"></path>
                                        <rect width="12" height="12" x="143" y="45" fill="#4db94b" rx="2"></rect>
                                    </g>
                                </svg>
                                𝘗𝘐𝘊𝘗𝘈𝘠
                            </h6>
                            <p class="card-text text-content">Chave PIX:</p>
                            <p class="card-text text-content"  onclick="copyTextToClipboard('@barthoprotoecaoanimal')">@barthoprotoecaoanimal <i class="fas fa-copy copy-icon"></i></p>

                            <p class="card-text text-content">QR code</p>
                            <img id="logo_sobre" src="{{ asset('img/QRCODE.jpg') }}" loading="lazy"
                                 style="width: 210px; height: 210px;" alt="Imagem" class="img-fluid mx-auto d-block">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="container">
            @include('Components.hr')
            <img src="{{ asset('img/nova-logo.png') }}" alt="Imagem" class="img-fluid" width="100" height="100"
                 style="display: block; margin-left: auto; margin-right: auto; margin-top: 5vh">
            <h5 class="card-title">DOAÇÕES MENSAIS - BARTHÔ</h5>
            <p class="card-title"> Ajude nossos animais mensalmente, através da opção que considerar melhor! 💛🤎</p>
            @include('Components.hr')
            <div class="row">


                <div class="col-sm-12 col-md-12 col-lg-4 " data-anime="right">
                    <div class="assinatura animate__animated animate__fadeInDown">
                        <i class="fas fa-donate" style="font-size: 24px"></i>
                        <p> 🤎 Doação mensal: R$ 25,00/Mês! 💛</p>
                        <div class="card-footer" style="text-align: center">
                            <a href="https://www.mercadopago.com.br/subscriptions/checkout?preapproval_plan_id=2c938084862b040c01862ec762e40344"
                               class="btn btn-more-information" _blank> <i class="fas fa-paw"> Assinar</i></a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-4 " data-anime="right">
                    <div class="assinatura animate__animated animate__fadeInDown">
                        <i class="fas fa-donate" style="font-size: 24px"></i>
                        <p> 🤎 Doação mensal: R$ 30,00/Mês! 💛</p>
                        <div class="card-footer" style="text-align: center">
                            <a href="https://www.mercadopago.com.br/subscriptions/checkout?preapproval_plan_id=2c9380848626724201862ec8edea086b"
                               class="btn btn-more-information" _blank> <i class="fas fa-paw"> Assinar</i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4 " data-anime="right">
                    <div class="assinatura animate__animated animate__fadeInDown">
                        <i class="fas fa-donate" style="font-size: 24px"></i>
                        <p> 🤎 Doação mensal: R$ 50,00/Mês! 💛</p>
                        <div class="card-footer" style="text-align: center">
                            <a href="https://www.mercadopago.com.br/subscriptions/checkout?preapproval_plan_id=2c9380848611cf740186136a1c0e0242"
                               class="btn btn-more-information" _blank> <i class="fas fa-paw"> Assinar</i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4 " data-anime="right">
                    <div class="assinatura animate__animated animate__fadeInDown">
                        <i class="fas fa-donate" style="font-size: 24px"></i>
                        <p> 🤎 Doação mensal: R$ 60,00/Mês! 💛</p>
                        <div class="card-footer" style="text-align: center">
                            <a href="https://www.mercadopago.com.br/subscriptions/checkout?preapproval_plan_id=2c9380848626724201862eca5dd1086e"
                               class="btn btn-more-information" _blank> <i class="fas fa-paw"> Assinar</i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4 " data-anime="right">
                    <div class="assinatura animate__animated animate__fadeInDown">
                        <i class="fas fa-donate" style="font-size: 24px"></i>
                        <p> 🤎 Doação mensal: R$ 75,00/Mês! 💛</p>
                        <div class="card-footer" style="text-align: center">
                            <a href="https://www.mercadopago.com.br/subscriptions/checkout?preapproval_plan_id=2c938084862b040c01862ecb829a034a"
                               class="btn btn-more-information" _blank> <i class="fas fa-paw"> Assinar</i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4 " data-anime="right">
                    <div class="assinatura animate__animated animate__fadeInDown">
                        <i class="fas fa-donate" style="font-size: 24px"></i>
                        <p> 🤎 Doação mensal: R$ 100,00/Mês! 💛</p>
                        <div class="card-footer" style="text-align: center">
                            <a href="https://www.mercadopago.com.br/subscriptions/checkout?preapproval_plan_id=2c9380848626724201862ecc65fd0874"
                               class="btn btn-more-information" _blank> <i class="fas fa-paw"> Assinar</i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4 " data-anime="right">
                    <div class="assinatura animate__animated animate__fadeInDown">
                        <i class="fas fa-donate" style="font-size: 24px"></i>
                        <p> 🤎 Doação mensal: R$ 200,00/Mês! 💛</p>
                        <div class="card-footer" style="text-align: center">
                            <a href="https://www.mercadopago.com.br/subscriptions/checkout?preapproval_plan_id=2c9380848626721101862ece92ae08ab"
                               class="btn btn-more-information" _blank> <i class="fas fa-paw"> Assinar</i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4 " data-anime="right">
                    <div class="assinatura animate__animated animate__fadeInDown">
                        <i class="fas fa-donate" style="font-size: 24px"></i>
                        <p> 🤎 Doação mensal: Livre escolha 💛</p>
                        <div class="card-footer" style="text-align: center">
                            <a href="https://www.mercadopago.com.br/subscriptions/checkout?preapproval_plan_id=2c9380848626721101862ed6286508b2"
                               class="btn btn-more-information" _blank> <i class="fas fa-paw"> Assinar</i></a>
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
                        <p class="outras_formas_de_ajudar_text">Ajudar é uma atitude nobre que pode transformar vidas e
                            fazer a diferença em diversos aspectos, especialmente quando se trata de organizações não
                            governamentais (ONGs) dedicadas ao bem-estar animal. Existem várias formas de contribuir e
                            apoiar essas instituições, como através de doações, participação em eventos e
                            compartilhamento de conteúdo em páginas do Facebook e Instagram.
                        </p>
                        <br>
                        <br>
                        <br>
                        <p class="outras_formas_de_ajudar_text">EM NOME DOS NOSSOS ANIMAIS, MUITO OBRIGADO!</p>
                    </div>


                </div>
            </div>
        </div>
    </section>

    @include('Components.Footer.index')
    <script type="text/javascript" src="{{asset('site/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('site/js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <script>
        function copyTextToClipboard(text) {
            const tempTextArea = document.createElement("textarea");
            tempTextArea.value = text;
            document.body.appendChild(tempTextArea);

            tempTextArea.select();
            document.execCommand("copy");

            document.body.removeChild(tempTextArea);

            Swal.fire({
                icon: 'success',
                title: 'Chave copiada!',
                text: text,
                timer: 2000
            });
        }
    </script>
@endsection
