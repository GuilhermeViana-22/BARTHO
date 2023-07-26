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
document.getElementById("idade").innerHTML = (year - 1998);


/// adicionando o script do botao
const btnMobile = document.getElementById('btnMobile');

btnMobile.addEventListener('click', toggleMenu);

function toggleMenu(){
    const nav = document.getElementById('nav');
    nav.classList.toggle('active');
}
