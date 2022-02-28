<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

# Rotas Acesso
Route::name('home.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/resutado', [HomeController::class, 'search'])->name('search');
    Route::get('/detalhes/{id}', [HomeController::class, 'detalhes'])->name('detalhes');
    Route::get('/filtro-marca', [HomeController::class, 'filtroMarca'])->name('filtroMarca');
    Route::get('/filtro-modelo', [HomeController::class, 'filtroModelo'])->name('filtroModelo');

    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login/acessar', [LoginController::class, 'loginAcessar'])->name('login.acessar');
    Route::get('/cadastro', [loginController::class, 'cadastro'])->name('cadastro');
    Route::post('/cadastro/novo', [loginController::class, 'cadastroNovo'])->name('cadastro.novo');
    Route::get('/logout', [loginController::class, 'logout'])->name('logout');
});

# Rotas Admin
Route::name('admin.')->group(function () {
    Route::get('/logado/home', [AdminController::class, 'index'])->name('home');
    Route::get('/logado/adicionar-dicas', [AdminController::class, 'adicionarDicas'])->name('novaDicas');
    Route::post('/logado/salvar-dicas', [AdminController::class, 'salvarDicas'])->name('salvarDicas');
    Route::get('/logado/editar-dicas/{id}', [AdminController::class, 'editarDicas'])->name('editarDicas');
    Route::post('/logado/savar-dicas-editado/{id}', [AdminController::class, 'editarSalvarDicas'])->name('editarSalvarDicas');
    Route::get('/logado/deletar-dicas/{id}', [AdminController::class, 'deletarDicas'])->name('delete');
});
