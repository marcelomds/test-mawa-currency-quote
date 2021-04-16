<?php

use App\Http\Controllers\Quote\QuoteController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Auth::routes();

// Página HOME
Route::get('/', function () {
   return redirect('/login');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rotas de Acesso ao Painel Administrativo

    // Rotas Cotaçao Moedas - Histórico
    Route::get('/quotes', [QuoteController::class, 'index'])->name('quotes.index');
    Route::get('/quote/create', [QuoteController::class, 'create'])->name('quotes.create');
    Route::post('/quote', [QuoteController::class, 'store'])->name('quotes.store');

    // Rotas - Configuração de Usuário
    Route::get('user', [UserController::class, 'userProfile'])->name('user.profile');
    Route::put('user/{id}/update', [UserController::class, 'update'])->name('user.update');

    Route::get('users/password', [UserController::class, 'usersPasswords'])->name('user.passwords.index');
    Route::put('user-change-password/{id}/update', [UserController::class, 'changePassword'])->name('user.password.change');

