<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthController;

// ============================
// PAGE D'ACCUEIL
// ============================
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// ============================
// INSCRIPTION
// ============================
Route::get('/inscription', [AuthController::class, 'showRegisterForm'])->name('inscription.page');
Route::post('/inscription', [AuthController::class, 'register'])->name('inscription.submit');

// ============================
// CONNEXION
// ============================
Route::get('/connexion', [AuthController::class, 'showLoginForm'])->name('connexion.page');
Route::post('/connexion', [AuthController::class, 'login'])->name('connexion.submit');

// ============================
// DECONNEXION
// ============================
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ============================
// DASHBOARD SELON ROLE
// ============================
Route::get('/vendeur/dashboard', function () {
    return view('vendeur.dashboard');
})->name('vendeur.dashboard');

// ============================
// STATS POUR VENDEURS ET PAYS DISTINCTS
// ============================
Route::get('/stats', function() {
    $vendeursCount = DB::table('users')->where('role', 'vendeur')->count();

    $paysCount = DB::table('users')
                    ->where('role', 'vendeur')
                    ->whereNotNull('pays_id')
                    ->distinct('pays_id')
                    ->count('pays_id');

    return response()->json([
        'vendeurs' => $vendeursCount,
        'pays' => $paysCount
    ]);
})->name('stats');
