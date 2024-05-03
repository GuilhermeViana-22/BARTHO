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
        $('#salvar_animal_form').submit();
    }, 500);
}
