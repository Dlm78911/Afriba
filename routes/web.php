<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// INSCRIPTION
Route::get('/inscription', [AuthController::class, 'showRegisterForm'])->name('inscription.page');
Route::post('/inscription', [AuthController::class, 'register'])->name('inscription.submit');

// CONNEXION
Route::get('/connexion', [AuthController::class, 'showLoginForm'])->name('connexion.page');
Route::post('/connexion', [AuthController::class, 'login'])->name('connexion.submit');

// DECONNEXION
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// DASHBOARDS SELON ROLE
Route::get('/vendeur/dashboard', function () {
    return view('vendeur.dashboard');
})->name('vendeur.dashboard');
