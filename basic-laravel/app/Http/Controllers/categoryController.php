<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function cat(Category $category){
    return view('category', [
      'title' => $category->name,
      'posts' => $category->post,
      'category' => $category->name
    ]);
  }

  public function index(){
    return view('categories', [
      'title' => 'Categories',
      'categories' => Category::all()
    ]);
  }
}