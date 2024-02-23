<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="/bootstrap-5.3.2/css/bootstrap.min.css">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="/css/style.css">

    <title>CLE4R Blog | {{ $title ?? $post->title }}</title>
  </head>
  <body>

    @include('partials.navbar')

    <div class="container mt-4">
      @yield('container')
    </div>

    {{-- Bootstrap JS --}}
    <script src="\bootstrap-5.3.2\js\bootstrap.bundle.min.js"></script>
  </body>
</html>