<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
  public function index()
  {
    return view('register.index', [
      'title' => 'Register',
    ]);
  }

  public function store()
  {
    $validatedData = request()->validate([
      'name' => 'required|max:255',
      'username' => 'required|min:3|max:255|unique:users',
      'email' => 'required|email:dns|unique:users',
      'password' => 'required|min:5|max:255',
    ]);

    User::create($validatedData);

    return redirect('/login')->with('success', 'Registration success, please login'); //mengirim flash sekalian (with)
  }
}
