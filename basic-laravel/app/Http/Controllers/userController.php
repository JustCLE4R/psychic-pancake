<?php 

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
  public function user(User $author){
    return view('posts', [
      'flag' => 'author',
      'title' => $author->name,
      'posts' => $author->post,
    ]);
  }
}