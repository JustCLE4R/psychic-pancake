@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Create New Post</h1>
</div>

<div class="col-lg-9">
  <form action="/dashboard/posts" method="post">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control" id="slug" name="slug" readonly>
    </div>
    <div class="mb-3">
      <label for="category" class="form-label">Category</label>
      <select class="form-select" name="category_id" id="category">
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="body" class="form-label">Body</label>
      <input id="body" type="hidden" name="body">
      <trix-editor input="body"></trix-editor>
    </div>
    <button type="submit" class="btn btn-primary">Create Post!</button>
  </form>
</div>

<script src="\jquery-3.7.1\jquery.min.js"></script>
<script>
  const title = $('#title');
  const slug = $('#slug');

  title.on('change', () => {
    $.ajax({
      url: '/dashboard/posts/checkSlug',
      data: {
        title: title.val()
      }
    }).done((data) => {
      slug.val(data.slug);
    })
    })

  // title.on('input', function(){
  //   slug.val(title.val().replace(/ /g, '-').toLowerCase());
  // })

  $(document).on('trix-file-accept', (e) => {
    e.preventDefault();
  })
</script>

@endsection