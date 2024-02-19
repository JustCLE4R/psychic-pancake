<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PostController extends Controller
{
  public function index(){
    return view('posts', [
      'title' => 'All Posts',
      'posts' => Post::with(['author', 'category', ])->latest()->get(), //agar tidak terjadi N+1 Problem untuk bukan route model binding (manual Post::), tambah load()
    ]);
  }

  public function show(Post $post){
    return view('post', [
      'post' => $post,
    ]);
  }

}
