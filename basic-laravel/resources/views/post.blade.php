@extends('layouts.main')

@section('container')

  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-8">
        <h1 class="mb-0">{{ $post->title }}</h1>

        <p>By. <a href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>
      
        @if ($post->image)
          <img src="{{ asset('storage/'.$post->image) }}" class="img-fluid d-block" alt="{{ $post->category->name }}" style="max-height: 400px">
        @else
          <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid" alt="{{ $post->category->name }}">
        @endif

        <article class="my-3 fs-5">
          {!! $post->body !!}
        </article>
      
        <a class="d-block mt-4" href="/posts">Back to Blog</a>
      </div>
    </div>
  </div>



@endsection