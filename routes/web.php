<?php

use App\Http\Controllers\JurnalController;
use App\Http\Controllers\ReviewerController;
use App\Http\Controllers\SeminarController;
use App\Http\Controllers\KesekretariatanController;
use App\Http\Controllers\LoginController;
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
Route::post('/tes/store', [LoginController::class, 'tes']);
Route::get('/', function () {
    return view('dashboard');
});
Route::get('/jurnal', [JurnalController::class, 'index']);
Route::get('/jurnal/detail/{id}', [JurnalController::class, 'show']);
Route::get('/jurnal/tambah', [JurnalController::class, 'create']);
Route::post('/jurnal/store', [JurnalController::class, 'store']);
Route::get('/jurnaledit/{id}',[JurnalController::class, 'edit']);
Route::put('/jurnal/update/{id}',[JurnalController::class, 'update']);
Route::get('/jurnal/destroy/{id}',[JurnalController::class, 'destroy']);

Route::get('/seminar', [SeminarController::class, 'index']);
Route::get('/seminar/detail/{id}', [SeminarController::class, 'jsonSeminar']);
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
// Kesekretariatan
Route::get('/kesekretariatan',[KesekretariatanController::class,'index']);
Route::post('/kesekretariatanupdate/{id}',[KesekretariatanController::class,'update']);

