<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use App\Http\Middleware\CheckRoute;

use App\Http\Controllers\MenuController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SaveObjectController;
use App\Http\Controllers\GrupoMenuController;
use App\Http\Controllers\ContraChequeController;
use App\Http\Controllers\UtilsController;
use App\Models\SaveObject;

use App\Http\Controllers\PDFController;

require_once('Routes/auth.php');

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
Route::get('/', function () {
    // return view('psicologos.registro');
    return view('pages.registro');
});



Route::get('/sem-permissao', function () {
    // return view('psicologos.registro');
    return view('pages.sem-permissao');
});

// Route::get('/excluir/{classe}/{id}', function () {
//     // return view('psicologos.registro');
//     return view('pages.excluir');
// });

Route::get('refresh-csrf', function () {
    if (Auth::user())
        return csrf_token();

    return 'false';
});
Route::get('refresh-csrf-login', function(){
    //if (Auth::user())
    return csrf_token();

    //return 'false';
});


Route::middleware('auth')->group(function () {

    Route::get('/home', function () {
        // return view('psicologos.registro');
        return view('pages.home');
    });
    
    Route::get('usuarios', [UserController::class, 'index'])->middleware(['auth', 'verified', 'checkRoute'])
    ->name('usuarios');
    Route::get('/usuarios-edit/{id}', [UserController::class, 'usuariosEdit'])->middleware(['auth', 'verified', 'checkRoute'])
    ->name('usuarios-edit');




    Route::get('grupos', [GrupoController::class, 'listaGrupos'])->middleware(['auth', 'verified', 'checkRoute'])
    ->name('grupos');
    
    
    Route::get('grupos-menus', [GrupoMenuController::class, 'listaGruposMenus'])->middleware(['auth', 'verified', 'checkRoute'])
    ->name('grupos-menus');
    
    
    Route::get('menus', [MenuController::class, 'listaMenus'])->middleware(['auth', 'verified', 'checkRoute'])
    ->name('menus');
    Route::get('/menus-edit/{id}', [MenuController::class, 'menusEdit'])->middleware(['auth', 'verified', 'checkRoute'])
    ->name('menus-edit');
    
    
    Route::get('profile-edit', [UserController::class, 'meuPerfil'])->middleware(['auth', 'verified', 'checkRoute'])
    ->name('profile-edit');

    Route::get('images/{filename}', [UserController::class, 'getImage'])->name('image.show');

    Route::post('update-object', [SaveObjectController::class, 'update']);
    
    Route::get('/prepara-excluir/{className}/{id}', [SaveObjectController::class, 'preparaExcluir'])->middleware(['auth', 'verified', 'checkRoute'])
    ->name('prepara-excluir');
    
    Route::get('/prepara-editar/{className}/{id}', [SaveObjectController::class, 'preparaEditar'])->middleware(['auth', 'verified', 'checkRoute'])
    ->name('prepara-editar');
    
    Route::get('/confirma-excluir', [SaveObjectController::class, 'confirmaExcluir'])->middleware(['auth', 'verified', 'checkRoute'])
    ->name('confirma-excluir');
    
    
    Route::get('/voltar', [UtilsController::class, 'voltar'])->middleware(['auth', 'verified', 'checkRoute'])
    ->name('voltar');

});


Route::middleware('auth', 'verified', 'checkRoute')->group(function () {
    Route::get('/meus-contracheques', function () {
        // return view('psicologos.registro');
        return view('pages.contracheques.meus-contracheques');
    })->name('meus-contracheques');
    
    Route::get('/contracheques', function () {
        return view('pages/contracheques/index');
    })->name('contracheques');

    Route::get('/erro', function () {
        return view('pages/contracheques/erro-enviar');
    })->name('erro');
    
    Route::get('/sem-contracheque', function () {
        return view('pages/contracheques/sem-contracheque');
    })->name('sem-contracheque');
    
    Route::get('/incluidocontracheque', function () {
        return view('pages/contracheques/incluido-contracheque');
    })->name('incluidocontracheque');
    
    Route::post('/download-contracheque', [PDFController::class, 'download'])->name('download-contracheque');
    Route::post('enviar-contracheques', [ContraChequeController::class, 'salvarDados'])->name('enviar-contracheques');
    
});



    



