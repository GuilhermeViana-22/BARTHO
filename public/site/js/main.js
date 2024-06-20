let modalWrap = null;

//animação dos itens
const target = document.querySelectorAll('[data-anime]');
const animationClass = 'animate';

function animeScroll(){
    ///distancia entre a barra e o topo do site
    const windowTop = window.pageYOffset + (window.innerHeight*3)/4; //1268

    target.forEach( (e) => {

        if((windowTop) > e.offsetTop){
            e.classList.add(animationClass);

        }else{
            e.classList.remove(animationClass);
        }

    });
}
window.addEventListener('scroll', function(){
    animeScroll();
});

date = new Date();
year = date.getFullYear();
document.getElementById("ano").innerHTML = year;

/**
 * Função para criar uma string aleatória
 * @param length
 * @returns {string}
 */
function radomString(length) {
    let result = '';
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    const charactersLength = characters.length;
    let counter = 0;
    while (counter < length) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
        counter += 1;
    }
    return result;
}

/**
 * Função para carregar uma página em janela modal
 * @param url
 * @param title
 * @param tamanho
 * @param id
 * @param callback
 */
function showModal(url, title, tamanho = 'modal-lg', id= null, callback = function () {}) {
    Swal.fire({
        title: 'Aguarde!', html: 'Abrindo janela...', didOpen: () => {
            Swal.showLoading();
        }
    });

    if (modalWrap !== null) {
        modalWrap.remove();
    }

    if (id == null) {
        id = radomString(10)
    }

    modalWrap = document.createElement('div');
    modalWrap.innerHTML = `
    <div class="modal fade" tabindex="-1" id="` + id + `" data-bs-backdrop="static">
        <div class="modal-dialog ` + tamanho + `">
            <div class="modal-content">
                <div class="modal-header bg-light">
                <h5 class="modal-title">${title}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal_corpo">
                <div class="text-center">

                    <div class="lds-dual-ring"></div>
                    <h4>Carregando, aguarde...</h4>
                </div>
                </div>
            </div>
        </div>
    </div>
  `;

    $("#modal_area").append(modalWrap);

    $("#modal_corpo").load(url, function (body, message, xhr) {
        if (xhr.status === 200) {
            let modal = new bootstrap.Modal(modalWrap.querySelector('.modal'));

            modalWrap.querySelector('.modal').addEventListener('shown.bs.modal', function (event) {
                Swal.close();
            })

            modal.show();

        } else {
            ajaxErro(xhr);
        }
    });
}

function irPara(rota){
    // Exibe um SweetAlert indicando que está carregando
    Swal.fire({
        title: 'Carregando...',
        html: 'Por favor, aguarde...',
        allowOutsideClick: false,
        showCloseButton: false,
        showConfirmButton: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    // Redireciona para a rota após 2 segundos
    setTimeout(() => {
        window.location.href = rota;
    }, 500);
}

function irParaOutraGuia(rota){
    // Exibe um SweetAlert indicando que está carregando
    Swal.fire({
        title: 'Carregando...',
        html: 'Por favor, aguarde...',
        allowOutsideClick: false,
        showCloseButton: false,
        showConfirmButton: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    // Redireciona para a rota após 2 segundos
    setTimeout(() => {
        window.open(rota, '_blank');
        Swal.close();
    }, 500);
}

function confirmarIrPara(texto, url)
{
    Swal.fire({
        title: "Você tem certeza?",
        text: texto ?? "Essa ação é ireversivel.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Não, cancelar",
        confirmButtonText: "Sim"
      }).then((result) => {
        if (result.isConfirmed) {
            irPara(url);
        }
      });
}


function confirmarFormAjax(form, texto)
{
    Swal.fire({
        title: "Você tem certeza?",
        text: texto ?? "Essa ação é ireversivel.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Não, cancelar",
        confirmButtonText: "Sim"
    }).then((result) => {
        if (result.isConfirmed) {
            formAjax(form);
        }
    });
}

function formAjax(form)
{
    // Exibe um SweetAlert indicando que está carregando
    Swal.fire({
        title: 'Carregando...',
        html: 'Por favor, aguarde...',
        allowOutsideClick: false,
        showCloseButton: false,
        showConfirmButton: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    // Redireciona para a rota após 2 segundos
    setTimeout(() => {
        $(form).submit();
    }, 500);
}

/**
 * Helper para o fileinput customizado que eu criei
 * @param e
 */
function changeFile(e)
{
    let parentElement = $(e).parent();
    let allspans = parentElement.find('span');
    let changeInputElement = parentElement.find('.change-input');
    let fileInputElement = parentElement.find('.file-input');

    /// mostra o input vazio e habilita ele
    changeInputElement.show();
    changeInputElement.prop('disabled', false);

    /// esconde o resto
    fileInputElement.hide();
    $(e).hide();
    allspans.each(function(){
        $(this).hide();
    })
}

/**
 * Método que realiza a busca no filtro da session passada
 */
function buscarFiltro(form, url_)
{
    // Exibe um SweetAlert indicando que está carregando
    Swal.fire({
        title: 'Carregando...',
        html: 'Por favor, aguarde...',
        allowOutsideClick: false,
        showCloseButton: false,
        showConfirmButton: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    // Redireciona para a rota após 2 segundos
    setTimeout(() => {
        var formData = $(form).serialize();

        $.post({
            url: url_,
            data: formData,
            success: function(){
                location.reload();
            }
        });

    }, 500);
}

/**
 * Método que limpa a session e o filtro
 */
function limparFiltro(form, url_)
{
    // Exibe um SweetAlert indicando que está carregando
    Swal.fire({
        title: 'Carregando...',
        html: 'Por favor, aguarde...',
        allowOutsideClick: false,
        showCloseButton: false,
        showConfirmButton: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    // Redireciona para a rota após 2 segundos
    setTimeout(() => {
        var formData = $(form).serialize();

        $.post({
            url: url_,
            data: formData,
            success: function(){
                location.reload();
            }
        });

    }, 500);
}

/**
 * Função para criação de URLs
 * @param action
 * @returns {string}
 */
function obterUrl(action = "") {
    return BASE_URL + action
}

/**
 * Tratamento e exibição de erros do ajax
 * @param data
 * @param callback
 */
function ajaxErro(data, callback = function(){}) {
    if (data.status === 0) {
        Swal.fire('Erro de rede', "Verifique sua conexão com a internet e tente novamente.", 'error').then((r) => r.value ? callback() : null)
    } else if (data.status === 400) {
        Swal.fire('Atenção!', data.responseText, 'error').then((r) => r.value ? callback() : null)
    } else if (data.status === 401) {
        Swal.fire('Não autorizado', data.responseText, 'error').then((r) => r.value ? callback() : null)
    } else if (data.status === 403) {
        Swal.fire('Acesso não permitido', 'Você não pode efetuar essa ação.', 'error').then((r) => r.value ? callback() : null)
    } else if (data.status === 404) {
        Swal.fire('Item não localizado', 'Este item não foi localizado.', 'error').then((r) => r.value ? callback() : null)
    } else if (data.status === 409) {
        Swal.fire('Conflito', data.responseText, 'error').then((r) => r.value ? callback() : null)
    } else if (data.status === 410) {
        Swal.fire('Sessão expirada', 'Sua sessão está expirada, faça login novamente para acessar o conteúdo.', 'error').then(() => {
            irPara(obterUrl())
        });
    } else if (data.status === 419) {
        Swal.fire('Página expirada', 'Essa página está expirada, atualize e tente novamente.', 'error').then((r) => r.value ? callback() : null)
    } else if (data.status === 422) {
        erroValidacao(JSON.parse(data.responseText), callback);
    } else if (data.status === 500) {
        Swal.fire('Erro interno', 'Ocorreu um erro interno ao processar sua solicitação, tente novamente mais tarde.', 'error').then((r) => r.value ? callback() : null)
    } else {
        Swal.fire('Erro [' + data.status + ']', data.responseText, 'error').then((r) => r.value ? callback() : null)
    }
}

/**
 * Função para exibição de erros de formulário
 * @param erros
 * @param callback
 */
function erroValidacao(erros, callback = function(){}) {
    Swal.fire('Alguns campos estão inválidos', 'Corrija os erros e tente novamente.', 'error').then((r) => r.value ? callback() : null)
}

/**
 * Faz a verificação se todos os inputs obrigatórios foram preenchidos
 *
 * @param callback
 */
function verificarFormulario(callback = function(){}){
    let obrigatorios = document.querySelectorAll('.obrigatorio');
    let obrigatoriosRadio = document.querySelectorAll('.obrigatorio-radio');
    let obrigatoriosCheckbox = document.querySelectorAll('.obrigatorio-checkbox');
    let obrigatoriosFile = document.querySelectorAll('.obrigatorio-file');

    let preenchido = true;

    /// verifica os textareas
    obrigatorios.forEach(function(element) {
        if (element.value.trim() === '') {
            preenchido = false;
            element.classList.add('is-invalid');
        } else {
            element.classList.remove('is-invalid');
        }
    });

    /// verifica os inputs-radios
    obrigatoriosRadio.forEach(function(element) {
        let name = element.name;
        if (document.querySelector('input[name="'+name+'"]:checked') === null) {
            preenchido = false;
            let radios = document.querySelectorAll('input[name="'+name+'"]');
            radios.forEach(function(radio) {
                radio.classList.add('is-invalid');
            });
        } else {
            let radios = document.querySelectorAll('input[name="'+name+'"]');
            radios.forEach(function(radio) {
                radio.classList.remove('is-invalid');
            });
        }
    });

    obrigatoriosCheckbox.forEach(function(element) {
        if (!element.checked) {
            preenchido = false;
            element.classList.add('is-invalid');
        } else {
            element.classList.remove('is-invalid');
        }
    });

    obrigatoriosFile.forEach(function(element) {
        if (element.files.length === 0) {
            preenchido = false;
            element.classList.add('is-invalid');
        } else {
            element.classList.remove('is-invalid');
        }
    });

    if (preenchido) {
        callback();
    } else {
        alert('Por favor, preencha todas os campos obrigatórios e marque todas as declarações como verdadeiras.');
    }
}

/**
 * Método para resetar o formulário
 *
 * @param form
 */
function resetarForm(form) {
    Swal.fire({
        title: 'Limpar formulário?',
        text: "Ao limpar o formulário todos os dados preenchidos serão perdidos, deseja continuar?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#222',
        //cancelButtonColor: '#d33',
        confirmButtonText: 'Limpar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $(form).trigger("reset");
        }
    });
}
