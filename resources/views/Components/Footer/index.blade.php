<svg id="footer-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#e9cc66" fill-opacity="1" d="M0,224L26.7,218.7C53.3,213,107,203,160,176C213.3,149,267,107,320,85.3C373.3,64,427,64,480,85.3C533.3,107,587,149,640,186.7C693.3,224,747,256,800,266.7C853.3,277,907,267,960,240C1013.3,213,1067,171,1120,170.7C1173.3,171,1227,213,1280,197.3C1333.3,181,1387,107,1413,69.3L1440,32L1440,320L1413.3,320C1386.7,320,1333,320,1280,320C1226.7,320,1173,320,1120,320C1066.7,320,1013,320,960,320C906.7,320,853,320,800,320C746.7,320,693,320,640,320C586.7,320,533,320,480,320C426.7,320,373,320,320,320C266.7,320,213,320,160,320C106.7,320,53,320,27,320L0,320Z"></path>
</svg>

<section class="footer">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
            <div class="content">
                <h3>Conheça o Barthô</h3>
                <p class="link-contato">Grupo de Proteção Animal fundado em São Caetano do Sul/SP que, desde 2016, atua na Grande São Paulo e Interior realizando resgates, salvamentos, tratamentos veterinários e acolhimento através de Lares Temporários, até que sejam adotados. Realizamos Feiras de Adoção Presenciais e Entrevistas e para Adoções, em um trabalho 100% Voluntário que já resgatou mais de <b>1400</b> animais.</p>
                <h5 class="card-title link-contato">Siga-nos nas redes sociais</h5>
                <div class="redes-sociais">
                    <a class="btn  mx-2" href="https://www.facebook.com/barthoprotecaoanimal" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    <a class="btn mx-2" href="https://www.instagram.com/p/Ctzw9NMv6Kb" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>

                    <a class="btn mx-2" href="https://www.linkedin.com/company/barthoprotecaoanimal" target="_blank">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>
          <hr>
            <div class="text-center p-4">
                <b  class="mt-4">Barthô - Grupo de Proteção Animal</b>
                <br>
                <b class="mt-4">CNPJ: 40.074.637/0001-47</b>
                <br>
                <b><a href="mailto:atendimento@bartho.org.br" style="color: #6e4735 !important">atendimento@bartho.org.br</a></b>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
            <img id="logo_footer" src="{{ asset('img/logo_Bartho_Grupo_protecao_animal.svg') }}" alt="Imagem" class="img-fluid">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
            <div class="content">
                <h3>Reportagens Mega-Resgate</h3>
                <ul class="list-group list-group-flush list-contao">
                    <li class="list-group-item item-contato">
                        <a class="link-contato" href="http://r7.com/DnVy" target="_blank">
                          <b> <i class="fa fa-arrow-circle-right" style="padding-right: 20px"></i>   Reportagem no R7 - FALA BRASIL</b>
                        </a>
                    </li>
                    <li class="list-group-item item-contato">
                        <a class="link-contato" href="•	https://g1.globo.com/sp/mogi-das-cruzes-suzano/noticia/2020/08/31/mais-de-80-animais-em-situacao-de-maus-tratos-sao-resgatados-em-itaquaquecetuba-diz-policia.ghtml" target="_blank">

                            <b> <i class="fa fa-arrow-circle-right" style="padding-right: 20px"></i>  Reportagem no G1</b>
                        </a>
                    </li>
                </ul>

                <div class="card receba-novidades-content">
                    <div class="card-body card-receba-novidades">
                        <form class="card-body-content" id="cadastroForm">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">
                                    <h5 class="card-title">Cadastre-se e receba novidades</h5>
                                    <p class="link-contato" style="text-align: center">Coloque aqui o seu melhor e-mail e não se preocupe, pois não vamos enviar nenhum spam. 🤎💛</p>
                                </label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-mail" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-more-information mx-auto"><i class="fas fa-paw">  Enviar</i></button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<article class="finally">
    <p class="copyright" style="text-align: center">Todos os direitos reservados © BARTHÔ Grupo de Proteção Animal <span id="ano"></span></p>
</article>
<script>
    // Função para exibir o SweetAlert de sucesso
    function exibirMensagemDeSucesso() {
        Swal.fire({
            icon: 'success',
            title: 'Email enviado com sucesso!',
            text: 'Muito obrigado 😃! Seu email foi enviado com sucesso.',
            confirmButtonText: 'Fechar'
        });
    }

    // Função para lidar com o envio do formulário
    function handleSubmit(event) {
        event.preventDefault(); // Evitar o envio tradicional do formulário

        // Aqui você pode adicionar código para enviar o formulário para o servidor
        // Por enquanto, vamos apenas exibir o SweetAlert de sucesso
        exibirMensagemDeSucesso();
    }

    // Adicionar evento de submit ao formulário
    const cadastroForm = document.getElementById('cadastroForm');
    cadastroForm.addEventListener('submit', handleSubmit);
</script>
