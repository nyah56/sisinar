<?php

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

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/jurnal', function () {
    return view('jurnal.jurnal');
});
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

