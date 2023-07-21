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
        Route::post('/edit', [App\Http\Controllers\MarcaController::class, 'edit'])->name('marcas.edit');
    });
    
});
