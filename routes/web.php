<?php

use App\Http\Controllers\AcoesController;
use App\Http\Controllers\AdoteController;
use App\Http\Controllers\AreaRestrita\AdocoesController;
use App\Http\Controllers\AreaRestrita\AdocoesPerguntasController;
use App\Http\Controllers\DoeController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\SobreController;
use App\Http\Controllers\AjudarController;
use App\Http\Controllers\AreaRestrita\AnimaisController;
use App\Http\Controllers\AreaRestrita\AreaRestritaController;
use App\Http\Controllers\AreaRestrita\UsuariosController;
use Illuminate\Support\Facades\Session;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/acoes', [AcoesController::class, 'index'])->name('acoes.index');
Route::get('/adote', [AdoteController::class, 'index'])->name('adote.index');
Route::get('/contato', [ContatoController::class, 'index'])->name('contato.index');
Route::get('/sobreNos', [SobreController::class, 'index'])->name('sobrenos.index');
Route::get('/ajudar', [AjudarController::class, 'index'])->name('ajudar.index');
Route::get('/doe', [DoeController::class, 'index'])->name('doe.index');

//// rota para deslogar
Route::get('/deslogar', [AreaRestritaController::class, 'deslogar'])->name('deslogar');

//// ROTAS PROTEGIDAS PRECISAM ESTAR DENTRO DESSE MIDLEWARE!! \\\
Route::middleware(['auth'])->prefix('arearestrita')->name('arearestrita')->group(function () {
    Route::get('/', [AreaRestritaController::class, 'index']);

    // Grupo de rotas para a session
    Route::prefix('session')->name('.session')->group(function () {
        Route::post('/salvar', function (Request $request) {
            // Obtenha os dados do formulário
            $dados = $request->except('_token');

            // Armazene os dados na sessão
            Session::put($request->get('session_name'), $dados);

            return response('session salva com sucesso!');
        })->name('.salvar');

        /// método para limpar todos os dados da session
        Route::post('/limpar', function (Request $request) {
            // Armazene os dados na sessão
            Session::remove($request->get('session_name'));

            return response('session salva com sucesso!');
        })->name('.limpar');
    });

   // Grupo de rotas para animais
    Route::prefix('animais')->name('.animais')->group(function () {
        // Rota para a lista de animais
        Route::get('/', [AnimaisController::class, 'index']);
        Route::get('/visualizar/{id}', [AnimaisController::class, 'visualizar'])->name('.visualizar');

        // Rotas adicionais para animais...
        Route::get('/incluir', [AnimaisController::class, 'incluir'])->name('.incluir');
        Route::post('/salvar', [AnimaisController::class, 'salvar'])->name('.salvar');

        Route::get('/alterar/{id}', [AnimaisController::class, 'alterar'])->name('.alterar');
        Route::post('/salvaralteracao', [AnimaisController::class, 'salvarAlteracao'])->name('.salvaralteracao');

        Route::get('/excluir', [AnimaisController::class, 'excluir'])->name('.excluir');
    });

    // Grupo de rotas para as adoções
    Route::prefix('adocoes')->name('.adocoes')->group(function () {

        // Rota para a lista de adoções
        Route::get('/', [AdocoesController::class, 'index']);
    });

    // Grupo de rotas para usuários
    Route::prefix('usuarios')->name('.usuarios')->group(function () {
        // Rota para a lista de usuários
        Route::get('/', [UsuariosController::class, 'index']);

        // Rotas adicionais para usuários...
        Route::get('/visualizar/{id}', [UsuariosController::class, 'visualizar'])->name('.visualizar');

        Route::get('/incluir', [UsuariosController::class, 'incluir'])->name('.incluir');
        Route::post('/salvar', [UsuariosController::class, 'salvar'])->name('.salvar');

        Route::get('/alterar/{id}', [UsuariosController::class, 'alterar'])->name('.alterar');
        Route::post('/salvaralteracao', [UsuariosController::class, 'salvarAlteracao'])->name('.salvaralteracao');

        Route::get('/excluir', [UsuariosController::class, 'excluir'])->name('.excluir');
        Route::get('/ativar', [UsuariosController::class, 'ativar'])->name('.ativar');

        // permissões
        Route::get('/configurarpermissoesmodal/{id}', [UsuariosController::class, 'configurarPermissoesModal'])->name('.configurarpermissoesmodal');
        Route::post('/salvarpermissoes', [UsuariosController::class, 'salvarPermissoes'])->name('.salvarpermissoes');
    });

    // Grupo de rotas para as de configurações
    Route::prefix('configuracoes')->name('.configuracoes')->group(function () {


        /// Grupo de rotas para as de perguntas da adoção
        Route::prefix('adocoesperguntas')->name('.adocoesperguntas')->group(function () {
            Route::get('/', [AdocoesPerguntasController::class, 'index']);

            Route::get('/incluir', [AdocoesPerguntasController::class, 'incluir'])->name('.incluir');
            Route::post('/salvar', [AdocoesPerguntasController::class, 'salvar'])->name('.salvar');

            Route::get('/alterarmodal/{id}', [AdocoesPerguntasController::class, 'alterarModal'])->name('.alterarmodal');
            Route::post('/salvaralteracao', [AdocoesPerguntasController::class, 'salvarAlteracao'])->name('.salvaralteracao');

            Route::get('/gerenciaralternativas/{id}', [AdocoesPerguntasController::class, 'gerenciarAlternativas'])->name('.gerenciaralternativas');

        });
    });
});
