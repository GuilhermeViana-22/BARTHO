<link rel="stylesheet" href="{{ asset('site/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('site/css/custom.css') }}">
<div class="index">
    <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6 card-body text-banner ">
        <div class="card-banner">
            <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6 card-body ">
                <h1 class="text-banner-1"><strong>JUNTOS, TRANSFORMAMOS VIDAS DESTES <span class="text-banner-1-style">QUE NÃO PODEM SE PROTEGER SOZINHOS</span></strong></h1>
                <h1 class="text-banner-2"><strong id="subtittle">Eles merecem uma vida com amor e dignidade</strong></h1><br><br>
                <a href="{{ route('Ajudar.index') }}"><button type="button" class="btn btn-more-information text-banner-button"><i class="fas fa-paw"> Saiba mais </i></button></a>
            </div>
        </div>
    </div>
    <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6 card-body banner-box">
        <section class="banner"></section>
    </div>
</div>
{{--adicionado via css conteudo renderizado no css--}}

<script type="text/javascript" src="{{asset('site/bootstrap.js')}}"></script>