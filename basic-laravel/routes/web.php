<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\postController;
use App\Models\postModel;

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
    'gambar' => 'dimas.jpg',
  ]);
});

Route::get('/posts', [postController::class, 'index']);

Route::get('/posts/{post:slug}', [postController::class, 'show']); //kalo ditambah ":" setelah wildcard dia akan mengirimkan sesuai dengan apa yang kita ketik (default jika tidak di ketik adalah ID)

Route::get('/info', [InfoController::class, 'showInfo']);
