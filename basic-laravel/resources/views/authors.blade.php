@extends('layouts.main')

@section('container')
  <h1 class="mb-5">Halaman Kategori</h1>

  <div class="container">
    <div class="row">
      @foreach ($authors as $author)
        <div class="col-md-4 mb-4">
          <a href="/posts?author={{ $author->username }}">
            <div class="card text-bg-dark">
              <img src="https://source.unsplash.com/500x400?user={{ $author->username }}" class="card-img" alt="{{ $author->name }}">
              <div class="card-img-overlay d-flex align-items-center p-0">
                <h5 class="card-title text-center flex-fill p-3 fs-3" style="background-color: rgba(0, 0, 0, 0.6)">{{ $author ->name }}</h5>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>

@endsection