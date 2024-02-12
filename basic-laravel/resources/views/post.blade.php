@extends('layouts.main')

@section('container')
  <h1 class="mb-0">{{ $post->title }}</h1>

  <p>By. <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>

  {!! $post->body !!}

  <a class="d-block mt-4" href="/posts">Back to Blog</a>

@endsection