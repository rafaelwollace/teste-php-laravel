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
Route::get('/list-vaga', [App\Http\Controllers\VagaController::class, 'lista'])->name('lista');
Route::middleware('autenticacao')->get('/vaga', [App\Http\Controllers\VagaController::class, 'index'])->name('vaga');
Route::middleware('autenticacao')->get('/candidato', [App\Http\Controllers\CandidatoController::class, 'index'])->name('candidato');