<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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
  return view('landing');
});

Route::get('/user/{id}', [UserController::class, 'getUserById']);

Route::get('/home', function () {
  return view('home', [
    'title' => 'Home',
  ]);
});

Route::get('/about', function () {
  return view('about', [
    'title' => 'About',
    'nama' => 'Dimas Yudistira',
    'alamat' => 'Sambirejo',
    'gambar' => 'placeholder.png',
  ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']); //kalo ditambah ":" setelah wildcard dia akan mengirimkan sesuai dengan apa yang kita ketik (default jika tidak di ketik adalah ID)

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category:slug}', [CategoryController::class, 'cat']);

Route::get('/authors/{author:username}', [UserController::class, 'user']);
Route::get('/authors', [UserController::class, 'users']);