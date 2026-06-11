<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionsController;

Route::get('/', function () {
    return view('welcome');
});

route::resource('/location', App\Http\Controllers\LocationsController::class);
route::resource('/vehicle', App\Http\Controllers\VehicletypesController::class);
route::resource('/transaction', App\Http\Controllers\TransactionsController::class);
Route::post('/transactions/enter', [TransactionsController::class, 'storeEnter'])->name('transaction.storeEnter');
Route::get('/transactions/ticket/{id}', [TransactionsController::class, 'downloadTicket'])->name('transaction.ticket.pdf');
Route::get('/transactions/list', [TransactionsController::class, 'list'])->name('transaction.list');
Route::post('/transactions/exit', [TransactionsController::class, 'processExit'])->name('transaction.exit');