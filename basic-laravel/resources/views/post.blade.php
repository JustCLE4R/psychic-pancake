@extends('layouts.main')

@section('container')
  <article>
    <h2>{{ $post['title'] }}</h2>
    <h5>by: {{ $post->author }}</h5>
    {!! $post->body !!}
  </article>

  <a href="/posts">Back to Blog</a>

@endsection