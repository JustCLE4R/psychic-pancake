<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class userController extends Controller
{
  public function getUserById(Request $request, $id)
  {
    return view('user', ['request' => $request, 'id' => $id]);
  }
}