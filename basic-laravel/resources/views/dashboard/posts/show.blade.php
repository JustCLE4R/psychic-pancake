@extends('dashboard.layouts.main')

@section('container')
<div class="container">
  <div class="row mb-5">
    <div class="col-lg-8">
      <h1 class="mb-3">{{ $post->title }}</h1>

      <a href="/dashboard/posts" class="btn btn-success btn-sm"><i class="bi bi-arrow-left"></i> Back to all posts</a>
      <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
      <form class="d-inline" action="/dashboard/posts/{{ $post->slug }}" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3"></i> Delete</button>
      </form>
      @if ($post->image)
        <img src="{{ asset('storage/'.$post->image) }}" class="img-fluid mt-3 d-block" alt="{{ $post->category->name }}" style="max-height: 400px">
      @else
        <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid mt-3" alt="{{ $post->category->name }}">
      @endif
      <article class="my-3 fs-5">
        {!! $post->body !!}
      </article>
    </div>
  </div>
</div>
@endsection