@extends('layouts.main')

@section('container')
  <h1 class="mb-5">Halaman Kategori</h1>
  <ul>
    @foreach ($authors as $author)
      <li class="mb-2">
        <h2 class="mb-0">
          <a href="/authors/{{ $author->username }}">{{ $author->name }}</a>
        </h2>
        <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $author->email }}" class="text-decoration-none" target="_blank">{{ $author->email }}</a>
      </li>
    @endforeach
  </ul>
@endsection