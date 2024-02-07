<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/bootstrap-5.3.2/css/bootstrap.min.css">

    <title>CLE4R Blog | {{ $title ?? $post->title }}</title>
  </head>
  <body>

    @include('partials.navbar')

    <div class="container mt-4">
      @yield('container')
    </div>


    <script src="/bootstrap-5.3.2/js/bootstrap.min.js"></script>
  </body>
</html>