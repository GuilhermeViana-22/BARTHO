<nav class="navbar navbar-expand-lg navbar-dark bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home.index') }}">   <img id="titile" src="{{ asset('img/titile.jpg') }}" alt="Imagem" class="img-fluid"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home.index') }}" style=" color: #FFD129;">Inicio
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('acoes.index') }}">Ações</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.index') }}">Seja um voluntário</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.index') }}">Seja um doador</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('adote.index') }}">Adote</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('Ajudar.index') }}">Como Ajudar</a>
                </li>
                <!---
                <li class="nav-item">
                    <a class="nav-link" href=" #route('home.index') ">Depoimentos</a>
                </li> --->
                <li class="nav-item">
                    <a class="nav-link btn btn-warning" href="{{ route('doe.index') }}">DOE</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
