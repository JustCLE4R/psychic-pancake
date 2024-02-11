<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
  public function index(Category $category){
    return view('category', [
      'title' => $category->name,
      'posts' => $category->post,
      'category' => $category->name
    ]);
  }
}