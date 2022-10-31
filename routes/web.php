<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OportunidadeController;

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login-post');

Route::group(['middleware' => 'auth.api'], function () {
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('oportunidades', OportunidadeController::class);
    Route::get('/oportunidades-dt', [OportunidadeController::class, 'datatables']);
});
