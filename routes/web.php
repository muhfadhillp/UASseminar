<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SeminarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendaftaranController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'admin'])->get('/user',
[UserController::class, 'index']);
Route::middleware(['auth', 'admin'])->get('/user/create',
[UserController::class, 'create']);
Route::middleware(['auth', 'admin'])->post('/user/store',
[UserController::class, 'store']);
Route::middleware(['auth', 'admin'])->get('/user/edit/{id}',
[UserController::class, 'edit']);
Route::middleware(['auth', 'admin'])->post('/user/update/{id}',
[UserController::class, 'update']);

Route::middleware(['auth', 'admin'])->post('/user/destroy/{id}',
[UserController::class, 'destroy']);

Route::middleware(['auth', 'admin'])->get('/seminar',
[SeminarController::class, 'index']);
Route::middleware(['auth', 'admin'])->get('/seminar/create',
[SeminarController::class, 'create']);
Route::middleware(['auth', 'admin'])->post('/seminar/store',
[SeminarController::class, 'store']);
Route::middleware(['auth', 'admin'])->get('/seminar/edit/{id}',
[SeminarController::class, 'edit']);
Route::middleware(['auth', 'admin'])->post('/seminar/update/{id}',
[SeminarController::class, 'update']);
Route::middleware(['auth', 'admin'])->post('/seminar/destroy/{id}',
[SeminarController::class, 'destroy']);

Route::middleware(['auth'])->get('/pendaftaran/create',
[PendaftaranController::class, 'create']);
Route::middleware(['auth'])->post('/pendaftaran/store',
[PendaftaranController::class, 'store']);
Route::middleware(['auth'])->get('/dashboard',
[DashboardController::class, 'index']);

Route::middleware(['auth', 'admin'])->get('/pendaftaran',
[PendaftaranController::class, 'index']);
Route::middleware(['auth', 'admin'])->post('/pendaftaran/terima/{id}',
[PendaftaranController::class, 'terima']);
Route::middleware(['auth', 'admin'])->post('/pendaftaran/tolak/{id}',
[PendaftaranController::class, 'tolak']);