<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\PlaylistController;

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

// Music
Route::get('/music/edit/{id}', [MusicController::class, 'edit'])->middleware('auth');
Route::put('/music/edit/{id}', [MusicController::class, 'update'])->middleware('auth');
Route::get('/dashboard', [MusicController::class, 'index'])->middleware('auth');
Route::get('/music/add', [MusicController::class, 'create'])->middleware('auth');
Route::post('/music/add', [MusicController::class, 'store'])->middleware('auth');
Route::get('/music/detail/{id}', [MusicController::class, 'show'])->middleware('auth');
Route::delete('/music/detail/{id}', [MusicController::class, 'destroy'])->middleware('auth');

// Playlist
Route::get('/playlist/edit/{id}', [PlaylistController::class, 'edit'])->middleware('auth');
Route::put('/playlist/edit/{id}', [PlaylistController::class, 'update'])->middleware('auth');
Route::get('/playlist', [PlaylistController::class, 'index'])->middleware('auth');
Route::get('/playlist/create/', [PlaylistController::class, 'create'])->middleware('auth');
Route::post('/playlist/create/', [PlaylistController::class, 'store'])->middleware('auth');
Route::get('/playlist/add/{id}', [PlaylistController::class, 'add'])->middleware('auth');
Route::post('/playlist/add/{id}', [PlaylistController::class, 'added'])->middleware('auth');
Route::delete('/playlist/detail/{id}', [PlaylistController::class, 'remove'])->middleware('auth');
Route::get('/playlist/detail/{id}', [PlaylistController::class, 'show'])->middleware('auth');
Route::delete('/playlist/{id}', [PlaylistController::class, 'destroy'])->middleware('auth');

require __DIR__.'/auth.php';
