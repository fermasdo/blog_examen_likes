<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
Route::get('/', function () {
    return view('inicio');
})->name('inicio');
Route::get('/posts/prueba/nuevoPrueba', [PostController::class, 'nuevoPrueba'])
->name('posts.nuevoPrueba');
Route::get('/posts/prueba/editarPrueba/{id}', [PostController::class, 'editarPrueba'])
->name('posts.editarPrueba');
Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::resource('posts', PostController::class)
  ->only(['index', 'show', 'create', 'edit', 'destroy', 'store']);

