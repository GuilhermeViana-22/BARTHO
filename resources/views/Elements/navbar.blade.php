<nav class="navbar navbar-expand-sm">
    <!-- Estrutura de div para o logo -->
    <div class="structure-navbar">
        <div class="menu-container">
            <!-- Toggle Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="menu-container2">
            <!-- Logo -->
            <a class="navbar-brand" href="{{ route('home.index') }}">
                <img id="titile" src="{{ asset('img/titile.jpg') }}" alt="Imagem" class="img-fluid" style="max-width: 150px; margin-left: 50px">
            </a>
        </div>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Adicione a classe text-left ao elemento ul -->
        <ul class="navbar-nav justify-content-end">
            <li class="nav-item alinhamento">
                <a class="nav-link active alinhamento" href="{{ route('home.index') }}" style="color: #FFD129;">Início</a>
            </li>
            <hr>
            <li class="nav-item alinhamento">
                <a class="nav-link alinhamento" href="https://docs.google.com/forms/d/1Qd18bITpQgkbBltzOSA07BU8hp72fcDtHBfX9HgJ67w/edit" target="_blank">Seja um voluntário</a>
            </li>
            <hr>
            <li class="nav-item alinhamento">
                <a class="nav-link alinhamento" href="https://docs.google.com/forms/d/e/1FAIpQLSc4jGV5KnMMXp4x0lojyA1Vjsl0XFR1y1l5-6o9elZLaU2-ow/viewform?pli=1" target="_blank">Entrevista para adoção</a>
            </li>
            <hr>
            <li class="nav-item alinhamento">
                <a class="nav-link alinhamento" href="{{ route('adote.index') }}">Adote</a>
            </li>
            <hr>
            <li class="nav-item alinhamento">
                <a class="nav-link alinhamento" href="{{ route('ajudar.index') }}">Como ajudar</a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link btn btn-warning-doe btn-doe-principal" href="{{ route('doe.index') }}" style="color: #fff !important;"><strong> 🤎 DOE 🤎 </strong></a>
            </li>
        </ul>
    </div>
</nav>
<script>
    function toggleNavbar() {
        const navbarCollapse = document.getElementById("navbarSupportedContent");
        if (navbarCollapse.classList.contains("collapse-hidden")) {
            navbarCollapse.classList.remove("collapse-hidden");
        } else {
            navbarCollapse.classList.add("collapse-hidden");
        }
    }

    const navbarToggler = document.querySelector(".navbar-toggler");
    navbarToggler.addEventListener("click", toggleNavbar);
</script>
