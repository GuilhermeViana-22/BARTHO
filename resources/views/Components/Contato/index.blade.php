<link rel="stylesheet" href="{{ asset('site/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('site/css/custom.css') }}">
@include('Components.Header.index')
@include('Components.Banner.index')
<div class="container">
    <div class="card text-center container-contato">
        <div class="card-header">
            <h1 class="card-title-contato"><strong>Entre em Contato</strong></h1>
        </div>
        <div class="row d-flex justify-content-center ">
            <div class="col ">
                <div class="card card-contato">
                    <div class="card-body">
                        <ul class="list-group list-group-flush list-contao">
                            <li class="list-group-item  item-contato "><ion-icon name="location-outline" style="font-size: 35px; color: #dca821;"></ion-icon><a class="link-contato" href="http://">Rua dos Peludinhos, 123</a></li>
                            <li class="list-group-item item-contato"><ion-icon name="logo-instagram" style="font-size: 35px; color: #dca821;"> <a class="link-contato" href="http://"></ion-icon>@ongbartho</a></li>
                            <li class="list-group-item item-contato"><ion-icon name="logo-whatsapp" style="font-size: 35px; color: #dca821;"></ion-icon> <a class="link-contato" href="http://">+55 123456789</a></li>
                            <li class="list-group-item item-contato"><ion-icon name="mail-outline" style="font-size: 35px; color: #dca821;"></ion-icon> <a class="link-contato" href="http://">contato@ongbartho.org</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-contato">
                    <div class="card-body card-body-content">
                        <form class="card-body-content">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">
                                    <h5 class="card-title text-warning">Cadastre-se e receba novidades</h5>
                                </label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-mail">

                            </div>


                            <button type="submit" class="btn btn-more-information">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-contato">
                    <div class="card-body">
                        <img src="{{ asset('img/nova-logo.png') }}" class="rounded  img-logo" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('Components.Footer.index')
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script type="text/javascript" src="{{asset('site/bootstrap.js')}}"></script>
