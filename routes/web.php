<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\CheckUserActive;
use Illuminate\Support\Facades\Route;

/*/
Route::get('/', function () {
    return view('welcome');
});
*/

// Ruta protegida con middleware personalizado
Route::get('/', [LoginController::class, 'showLogin']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware([CheckUserActive::class]);