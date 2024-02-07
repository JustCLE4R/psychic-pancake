@extends('layouts.main')

@section('container')

  @foreach ($posts as $post)
    <article class="mb-5">
      <h2 class="mb-0">
        <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
      </h2>
      <h6>by: {{ $post->author }}</h6>
      <p>{{ $post->excerpt }}</p>
    </article>
  @endforeach

@endsection