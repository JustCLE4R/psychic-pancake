<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CLE4R Blog | Dashboard</title>

    {{-- Bootstrap CSS --}}
    <link href="\bootstrap-5.3.2\css\bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">

    {{-- Trix --}}
    <link rel="stylesheet" href="/css/trix.css">

    <!-- Custom styles for this template -->
    <link href="\css\dashboard.css" rel="stylesheet">

    <style>
      trix-toolbar [data-trix-button-group="file-tools"]{
        display: none;
      }
    </style>

  </head>
  <body>

    @include('dashboard.layouts.header')

<div class="container-fluid">
  <div class="row">
    @include('dashboard.layouts.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      @yield('container')
    </main>
  </div>
</div>

    {{-- JQuery --}}
    <script src="\jquery-3.7.1\jquery.min.js"></script>

    {{-- Bootstrap JS --}}
    <script src="\bootstrap-5.3.2\js\bootstrap.bundle.min.js"></script>

    {{-- Sweetalert2 --}}
    <script src="/sweetalert2/sweetalert2.all.min.js"></script>

    {{-- Trix --}}
    <script src="/js/trix.js"></script>

    {{-- Custom JS --}}
    <script src="\js\dashboard.js"></script>

  </body>
</html>
