@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Posts</h1>
  </div>
  <div class="table-responsive col-lg-10">
    <a href="/dashboard/posts/create" class="btn btn-primary btn-sm mb-3"><i class="bi bi-plus-circle"></i> Create new post</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th class="col">#</th>
          <th class="col">Title</th>
          <th class="col">Category</th>
          <th class="col text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $post->title }}</td>
          <td>{{ $post->category->name }}</td>
          <td class="text-center">
            <a href="/dashboard/posts/{{ $post->slug }}" class="btn btn-info btn-sm px-1 py-0 text-white"><i class="bi bi-eye"></i></a>
            <a href="" class="btn btn-warning btn-sm px-1 py-0 text-white"><i class="bi bi-pencil-square"></i></a>
            <a href="" class="btn btn-danger btn-sm px-1 py-0 text-white"><i class="bi bi-trash3"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection