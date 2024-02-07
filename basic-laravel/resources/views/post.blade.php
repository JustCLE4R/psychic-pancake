@extends('layouts.main')

@section('container')
  <article>
    <h2 class="mb-0">{{ $post['title'] }}</h2>
    <h6>by: {{ $post->author }}</h6>
    {!! $post->body !!}
  </article>

  <a href="/posts">Back to Blog</a>

@endsection