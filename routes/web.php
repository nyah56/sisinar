<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\KesekretariatanController;
use App\Http\Controllers\KoordinatorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterAdminController;
use App\Http\Controllers\ReviewerController;
use App\Http\Controllers\SeminarController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */
Route::post('/login/store', [LoginController::class, 'loginAction']);
Route::get('/logout', [LoginController::class, 'Logout']);
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
// Admin Role
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/register/admin', [RegisterAdminController::class, 'index']);
    Route::post('/register/admin/action', [RegisterAdminController::class, 'actionregister']);
    Route::get('/jurnal', [JurnalController::class, 'index']);

    Route::get('/jurnal/tambah', [JurnalController::class, 'create']);
    Route::post('/jurnal/store', [JurnalController::class, 'store']);
    Route::get('/jurnal/edit/{id}', [JurnalController::class, 'edit']);
    Route::put('/jurnal/update/{id}', [JurnalController::class, 'update']);
    Route::get('/jurnal/destroy/{id}', [JurnalController::class, 'destroy']);
    Route::get('/seminar', [SeminarController::class, 'index']);

    Route::get('/seminar/entry', [SeminarController::class, 'create']);
    Route::post('/seminar/store', [SeminarController::class, 'store']);
    Route::get('/seminar/edit/{id}', [SeminarController::class, 'edit']);
    Route::put('/seminar/update/{id}', [SeminarController::class, 'update']);
    Route::get('/seminar/destroy/{id}', [SeminarController::class, 'destroy']);
    // reviewer
    Route::get('/reviewer', [ReviewerController::class, 'index']);
    Route::get('/reviewer/entry', [ReviewerController::class, 'create']);
    Route::post('/reviewer/store', [ReviewerController::class, 'store']);
    Route::get('/reviewer/edit/{id}', [ReviewerController::class, 'edit']);
    Route::put('/reviewer/update/{id}', [ReviewerController::class, 'update']);
    Route::get('/reviewer/destroy/{id}', [ReviewerController::class, 'destroy']);

});
// Kesek Role
Route::middleware(['auth', 'role:Admin,Kesekretariat'])->group(function () {
    Route::get('/kesekretariatan', [KesekretariatanController::class, 'index']);
    Route::get('/kesekretariatan/edit/{id}', [KesekretariatanController::class, 'edit']);
    Route::put('/kesekretariatan/update/{id}', [KesekretariatanController::class, 'update']);
});
// Koor Role
Route::middleware(['auth', 'role:Admin,Koordinator'])->group(function () {
    Route::get('/koordinator', [KoordinatorController::class, 'index']);
    Route::get('/koordinator/edit/{id}', [KoordinatorController::class, 'edit']);
    Route::put('/koordinator/update/{id}', [KoordinatorController::class, 'update']);
    Route::get('/koordinator/delete/{id}', [KoordinatorController::class, 'delete']);
});
//API
Route::middleware(['auth', 'role:Admin,Kesekretariat,Koordinator'])->group(function () {
    Route::get('/reviewer/fetch', [ReviewerController::class, 'fetchReviewer']); //json
    Route::get('/seminar/detail/{id}', [SeminarController::class, 'jsonSeminar']); //json
    Route::get('/jurnal/detail/{id}', [JurnalController::class, 'show']); //json
});
