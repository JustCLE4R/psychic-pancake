@extends('dashboard.layouts.main')

@section('container')
<div class="container">
  <div class="row mb-5">
    <div class="col-lg-8">
      <h1 class="mb-3">{{ $post->title }}</h1>

      <a href="/dashboard/posts" class="btn btn-success btn-sm"><i class="bi bi-arrow-left"></i> Back to all posts</a>
      <a href="" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
      <a href="" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i> Delete</a>
    
      <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid mt-3" alt="{{ $post->category->name }}">

      <article class="my-3 fs-5">
        {!! $post->body !!}
      </article>
    
      <a class="d-block mt-4" href="/posts">Back to Blog</a>
    </div>
  </div>
</div>
@endsection