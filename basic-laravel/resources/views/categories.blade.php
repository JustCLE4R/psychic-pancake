@extends('layouts.main')

@section('container')
  <h1 class="mb-5">Halaman Kategori</h1>
  <ul>
    @foreach ($categories as $category)
      <li class="mb-2">
        <h2 class="mb-0">
          <a href="/categories/{{ $category->slug }}">{{ $category->name }}</a>
        </h2>
      </li>
    @endforeach
  </ul>
@endsection