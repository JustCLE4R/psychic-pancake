<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;

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
// Route::get('/categories/{category:slug}', [CategoryController::class, 'cat']); //udah ga kepake

// Route::get('/authors/{author:username}', [UserController::class, 'user']); //udah ga kepake
Route::get('/authors', [UserController::class, 'users']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
  return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');