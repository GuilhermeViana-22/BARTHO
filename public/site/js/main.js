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


