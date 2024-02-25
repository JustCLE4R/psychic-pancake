@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Create New Post</h1>
</div>

<div class="col-lg-9">
  <form class="mb-5" action="/dashboard/posts" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required autofocus>
      @error('title')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" required readonly>
      @error('slug')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="category" class="form-label">Category</label>
      <select class="form-select" name="category_id" id="category">
        @foreach ($categories as $category)
          @if (old('category_id') == $category->id)
            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
          @else
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endif
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Post Image</label>
      <img class="img-preview img-fluid mb-3 col-sm-5">
      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
      @error('image')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="body" class="form-label">Body</label>
      @error('body')
        <p class="text-danger" style="font-size: .9rem">{{ $message }}</p>
      @enderror
      <input id="body" type="hidden" name="body" value="{{ old('body') }}">
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

  function previewImage() {
    const imgPreview = $('.img-preview');
    // imgPreview.show();
    imgPreview.css('display', 'block');

    const blob = URL.createObjectURL($('#image')[0].files[0]);
    imgPreview.attr('src', blob);

    // const oFReader = new FileReader();
    // oFReader.readAsDataURL($('#image')[0].files[0]);

    // oFReader.onload = function(oFREvent) {
    //   imgPreview.attr('src', oFREvent.target.result);
    // }
  }
</script>

@endsection