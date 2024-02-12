@extends('layouts.main')

@section('container')
  <h1 class="mb-0" >Post Category: {{ $category }}</h1>
  <a class="d-block mb-5" href="/posts">Back to Blog</a>
  @foreach ($posts as $post)
    <article class="mb-4 border-bottom pb-3">
      <h2 class="mb-0"><a class="text-decoration-none" href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h2>

      <p class="ms-1 mb-1 text-muted text-capitalize">By. <a class="text-decoration-none" href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a class="text-decoration-none" href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>

      <p class="d-inline">{{ $post->excerpt }}</p> <a href="/posts/{{ $post->slug }}" class="text-decoration-none">Read more...</a>
    </article>
  @endforeach
@endsection