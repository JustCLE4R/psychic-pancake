@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Post Categories</h1>
  </div>

  @if (session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show col-lg-7" role="alert">
    <strong>Success!</strong> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <div class="table-responsive col-lg-7">
    <a href="/dashboard/categories/create" class="btn btn-primary btn-sm mb-3"><i class="bi bi-plus-circle"></i> Create new category</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th class="col">#</th>
          <th class="col">Category Name</th>
          <th class="col text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $category->name }}</td>
          <td class="text-center">
            <a href="/dashboard/categories/{{ $category->slug }}" class="btn btn-info btn-sm px-1 py-0 text-white"><i class="bi bi-eye"></i></a>
            <a href="/dashboard/categories/{{ $category->slug }}/edit" class="btn btn-warning btn-sm px-1 py-0 text-white"><i class="bi bi-pencil-square"></i></a>
            <form class="d-inline" action="/dashboard/categories/{{ $category->slug }}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm px-1 py-0 text-white" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection