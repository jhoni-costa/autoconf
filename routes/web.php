<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function(){

    Route::group(['prefix' => 'marcas'], function (){
        Route::get('/', [App\Http\Controllers\MarcaController::class, 'index'])->name('marcas');
        Route::post('/', [App\Http\Controllers\MarcaController::class, 'store'])->name('marcas.store');
        Route::post('/update', [App\Http\Controllers\MarcaController::class, 'update'])->name('marcas.update');
        Route::get('/edit/{id}', [App\Http\Controllers\MarcaController::class, 'edit'])->name('marcas.edit');
        Route::post('/delete', [App\Http\Controllers\MarcaController::class, 'delete'])->name('marcas.delete');
        Route::post('/buscar', [App\Http\Controllers\MarcaController::class, 'buscar'])->name('marcas.buscar');
    });

    Route::group(['prefix' => 'modelos'], function (){
        Route::get('/', [App\Http\Controllers\ModeloController::class, 'index'])->name('modelos');
        Route::post('/', [App\Http\Controllers\ModeloController::class, 'store'])->name('modelos.store');
        Route::post('/update', [App\Http\Controllers\ModeloController::class, 'update'])->name('modelos.update');
        Route::get('/edit/{id}', [App\Http\Controllers\ModeloController::class, 'edit'])->name('modelos.edit');
        Route::post('/delete', [App\Http\Controllers\ModeloController::class, 'delete'])->name('modelos.delete');
        Route::post('/modelos', [App\Http\Controllers\ModeloController::class, 'modelos'])->name('modelos.marca');
        Route::post('/buscar', [App\Http\Controllers\ModeloController::class, 'buscar'])->name('modelos.buscar');

    });

    Route::group(['prefix' => 'veiculos'], function (){
        Route::get('/', [App\Http\Controllers\VeiculoController::class, 'index'])->name('veiculos');
        Route::get('/new', [App\Http\Controllers\VeiculoController::class, 'new'])->name('veiculos.new');
        Route::post('/', [App\Http\Controllers\VeiculoController::class, 'store'])->name('veiculos.store');
        Route::post('/update', [App\Http\Controllers\VeiculoController::class, 'update'])->name('veiculos.update');
        Route::post('/addFotos', [App\Http\Controllers\VeiculoController::class, 'addFotos'])->name('veiculos.addFotos');
        Route::get('/edit/{id}', [App\Http\Controllers\VeiculoController::class, 'edit'])->name('veiculos.edit');
        Route::post('/delete', [App\Http\Controllers\VeiculoController::class, 'delete'])->name('veiculos.delete');
        Route::post('/deleteFoto', [App\Http\Controllers\VeiculoController::class, 'deleteFoto'])->name('veiculos.deleteFoto');
        Route::post('/buscar', [App\Http\Controllers\VeiculoController::class, 'buscar'])->name('veiculos.buscar');
    });

});
