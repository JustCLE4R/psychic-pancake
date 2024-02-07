@extends('layouts.main')

@section('container')
  <h1>Halaman About</h1>
  <table>
    <tr>
      <td class="fs-5 fw-normal">Nama</td>
      <td class="fs-5 fw-normal">: {{ $nama }}</td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>: {{ $alamat }}</td>
    </tr>
    <tr>
      <td colspan="2"><div class="thumbnail rounded-circle shadow mt-3" style="background-image: url(/img/{{ $gambar }}); background-size: cover; width: 200px; height: 200px"></div></td>
    </tr>
  </table>
@endsection