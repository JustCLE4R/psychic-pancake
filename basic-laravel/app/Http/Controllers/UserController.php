<?php 

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
  public function user(User $author){
    return view('posts', [
      'title' => "Post by Author : $author->name",
      'posts' => $author->post->load('category', 'author'), //agar tidak terjadi N+1 Problem untuk route model binding, tambah load()
    ]);
  }

  public function users(){
    return view('authors', [
      'title' => 'All Authors',
      'authors' => User::all(),
    ]);
  }
}
