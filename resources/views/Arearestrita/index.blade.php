@extends('adminpanel')

@section('content')
    <h4>Dashboard</h4>
    <br>

    <div class="row">


        <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">
                    <h4><span class="fa fa-check"></span> <b>Adoções</b></h4>
                </div>
                <div class="card-body">
                    <p class="card-text">Adotados: {{ $animaisAdotados }}</p>
                    <hr>
                    <p class="card-text">Não adotados: {{ $animaisNaoAdotados }}</p>
                </div>
                <div class="card-footer">
                    <small class="text-white">Informações atualizadas</small>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">
                    <h4><span class="fa fa-shield"></span> <b>Vacinas</b></h4>
                </div>
                <div class="card-body">
                    <p class="card-text">Vacinados: {{ $animaisVacinados }}</p>
                    <hr>
                    <p class="card-text">Não vacinados: {{ $animaisNaoVacinados }}</p>
                </div>
                <div class="card-footer">
                    <small class="text-white">Informações atualizadas</small>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">
                    <h4><span class="fa fa-shield"></span> <b>Castrações</b></h4>
                </div>
                <div class="card-body">
                    <p class="card-text">Castrados: {{ $animaisCastrados }}</p>
                    <hr>
                    <p class="card-text">Não Castrados: {{ $animaisNaoVacinados }}</p>
                </div>
                <div class="card-footer">
                    <small class="text-white">Informações atualizadas</small>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">
                    <h4>
                        <span class="fa fa-list"></span>
                        <b>Animais</b>
                    </h4>
                </div>
                <div class="card-body">
                    <p class="card-text">Total: {{ $animaisCadastrados }}</p>
                </div>
                <div class="card-footer">
                    <small class="text-white">Informações atualizadas</small>
                </div>
            </div>
        </div>
    </div>


    {{--    grafico de rosca--}}
    <div class="col-3 col-lg-3 col-md-6 col-sm-12 mb-3">
        <div class="card p-4">
            <canvas id="animalChart" width="200" height="250"></canvas>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('site/js/chart.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Suponha que você tenha definido essas variáveis no seu template Blade
            var countDogsMacho = {{ $countDogsMacho }};
            var countDogsFemea = {{ $countDogsFemea }};
            var countCatsMacho = {{ $countCatsMacho }};
            var countCatsFemea = {{ $countCatsFemea }};

            // Chama a função criarGrafico() com os dados obtidos do backend
            var animalChart = criarGrafico(countDogsMacho, countDogsFemea, countCatsMacho, countCatsFemea);

            // Opcional: atualiza o gráfico quando os dados mudarem
            function atualizarGrafico() {
                animalChart.data.datasets[0].data = [countDogsMacho, countDogsFemea, countCatsMacho, countCatsFemea];
                animalChart.update();
            }

            // Exemplo de como você poderia chamar a função atualizarGrafico() quando os dados mudarem
            // Se necessário, ajuste para corresponder à lógica do seu aplicativo
            setInterval(atualizarGrafico, 5000); // Atualiza a cada 5 segundos como exemplo
        });
    </script>
@endsection
