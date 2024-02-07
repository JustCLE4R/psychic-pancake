<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class infoController extends Controller
{
  public $data = [
    [
      'nama' => 'John Doe',
      'umur' => 25,
      'alamat' => 'New York'
    ],
    [
      'nama' => 'Jane Smith',
      'umur' => 30,
      'alamat' => 'San Francisco'
    ],
    [
      'nama' => 'Bob Johnson',
      'umur' => 35,
      'alamat' => 'Los Angeles'
    ],
    [
      'nama' => 'Alice Brown',
      'umur' => 28,
      'alamat' => 'Chicago'
    ],
  ];
  
  public function showInfo(){
    return view('info', ['data' => $this->data]);
  }

}