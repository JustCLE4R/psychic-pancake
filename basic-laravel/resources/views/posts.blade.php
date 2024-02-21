@extends('layouts.main')

@section('container')
  <h1 class="mb-3 text-center">{{ $title }}</h1>

  <div class="row mb-3 justify-content-center">
    <div class="col-md-6">
      <form action="/posts">
        @if (request('author') || request('category'))
          <input type="hidden" name="author" value="{{ request('author') }}">
          <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        {{-- @if (request('category'))
        @endif --}}
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
          <button class="btn btn-outline-primary" type="submit">Search</button>
        </div>
      </form>
    </div>
  </div>

  @if ($posts->count())
    <div class="card mb-3">
      <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-black"><img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}"></a>
      <div class="card-body text-center">
        <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-black">{{ $posts[0]->title }}</a></h3>
        <p class="ms-1 mb-1 text-muted text-capitalize">
          <small>
            By. <a class="text-decoration-none" href="/posts?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a> in <a class="text-decoration-none" href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
          </small>
        </p>
        <p class="card-text">{{ $posts[0]->excerpt }}</p>
        <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary btn-sm">Read more...</a>
      </div>
    </div>

    <div class="container">
      <div class="row">
        @foreach ($posts->skip(1) as $post)
          <div class="col-md-4">
            <div class="card mb-4">
              <a href="/posts?category={{ $post->category->slug }}"><div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.5)">{{ $post->category->name }}</div></a>
              <a href="/posts/{{ $post->slug }}"><img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}"></a>
              <div class="card-body">
                <h5 class="card-title"><a class="text-decoration-none" href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h5>
                <p class="ms-1 mb-1 text-muted text-capitalize">
                  <small>
                    By. <a class="text-decoration-none" href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a> {{ $post->created_at->diffForHumans() }}
                  </small>
                </p>
                <p class="card-text">{{ $post->excerpt }}</p>
                <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>

  @else
    <p class="text-center fs-4 text-danger">No post found.</p>
  @endif

  <div class="d-flex justify-content-center">
    {{ $posts->links() }}
  </div>

@endsection