<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VendaController;

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

Route::get('/vendas', [VendaController::class, 'listarVendas']);

Route::get('/vendas/ver/{id}', [VendaController::class, 'verVenda']);

Route::get('/vendas/nova/{produto}/{preco}/{quantidade}', [VendaController::class, 'cadastrarVenda']);

Route::get('/vendas/atualizar/{id}/{produto}/{preco}/{quantidade}', [VendaController::class, 'atualizarVenda']);

Route::get('/vendas/excluir/{id}', [VendaController::class, 'excluirVenda']);
