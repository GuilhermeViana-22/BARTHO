function showArquivo(url, title, tamanho = 'modal-lg', id= null, callback = function () {}) {
    Swal.fire({
        title: 'Aguarde!', html: 'Abrindo arquivo...', didOpen: () => {
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
                <div class="modal-body">
                    <div style="overflow: auto; height: 800px">
                        <embed src="${url}"frameborder="0" width="100%" height="100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
  `;

    $("#modal_area").append(modalWrap);

    let modal = new bootstrap.Modal(modalWrap.querySelector('.modal'));

    modalWrap.querySelector('.modal').addEventListener('shown.bs.modal', function (event) {
        Swal.close();
    })

    modal.show();
}

$.fn.FileUpload = function () {
    const FILEUPLOAD = $(this);
    FILEUPLOAD.hide();

    const ID = FILEUPLOAD.attr('id') ?? (Math.random() + 1).toString(36).substring(7);
    const NAME = FILEUPLOAD.attr('name') ?? "";
    const ID_GROUP = (Math.random() + 1).toString(36).substring(7);
    const ID_BTN_ADD = (Math.random() + 1).toString(36).substring(7);
    const ID_BTN_DEL = (Math.random() + 1).toString(36).substring(7);
    const ID_BTN_VER = (Math.random() + 1).toString(36).substring(7);
    const ID_HIDDEN_DEL = (Math.random() + 1).toString(36).substring(7);

    FILEUPLOAD.attr('id', ID);

    let url_arquivo =  FILEUPLOAD.attr('value');

    let botao_add = `<button data-bs-toggle="tooltip" data-bs-placement="bottom" type="button" id="`+ID_BTN_ADD+`" class="btn btn-outline-secondary" onclick="document.getElementById('` + ID + `').click();"><span class="fa fa-folder"></span> Adicionar arquivo</button>`;
    let botao_ver = `<button type="button" id="`+ID_BTN_VER+`" class="btn btn-outline-secondary" onclick="showArquivo('` +url_arquivo+ `', 'Visualizar arquivo')"><span class="fa fa-eye"></span> Visualizar</button>`;
    let botao_del = `<button type="button" id="`+ID_BTN_DEL+`" class="btn btn-outline-danger"><span class="fa fa-trash"></span></button>`;
    let hidden_del = `<input type="hidden" id="`+ID_HIDDEN_DEL+`" name="`+NAME+`" value="__DEL" style="display: none"/>`;

    let botoes = `<div class="btn-group" id="`+ID_GROUP+`">`;

    if (url_arquivo === "" || url_arquivo === undefined) {
        botoes += botao_add;
    }else {
        botoes += botao_ver;

        if (!FILEUPLOAD.prop('disabled') && !FILEUPLOAD.prop('readonly')) {
            botoes += botao_del;
        }
    }

    botoes += `</div>`;

    FILEUPLOAD.after(botoes);

    FILEUPLOAD.change(function () {
        if ($(this).val() !== "") {
            let nome_arquivo = $(this)[0].files[0].name;

            $("#"+ID_BTN_ADD).removeClass('btn-outline-secondary').addClass('btn-outline-success').html("<span class='fa fa-check'></span> Arquivo selecionado").attr('title', 'Arquivo: '+ nome_arquivo);
        }else{
            $("#"+ID_BTN_ADD).removeClass('btn-outline-success').addClass('btn-outline-secondary').html("<span class='fa fa-folder'></span> Adicionar arquivo").attr('title', '');
        }
    });

    $("#" + ID_BTN_DEL).click(function () {
        Swal.fire({
            icon: 'question',
            title: 'Remover arquivo',
            html: 'Deseja realmente remover o arquivo?',
            showCancelButton: true,
            confirmButtonText: 'Remover',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                $("#" + ID_GROUP).html(botao_add).after(hidden_del);

                Swal.fire('O arquivo foi removido!', '', 'success')
            }
        })
    });

    if (FILEUPLOAD.prop('disabled') || FILEUPLOAD.prop('readonly')) {
        $("#"+ID_BTN_ADD).prop('disabled', true);
    }
}

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})
