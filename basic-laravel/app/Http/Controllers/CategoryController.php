<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function cat(Category $category){
    return view('posts', [
      'title' => "Post by Category : $category->name",
      'posts' => $category->post->load('category', 'author'), //agar tidak terjadi N+1 Problem untuk route model binding, tambah load()
    ]);
  }

  public function index(){
    return view('categories', [
      'title' => 'Categories',
      'categories' => Category::all()
    ]);
  }
}
