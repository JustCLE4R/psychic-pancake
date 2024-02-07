<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Table Page</title>
    <!-- Bootstrap CSS link -->
    <link href="/bootstrap-5.3.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Data Table</a>
        </div>
    </nav>

    <!-- Table Section -->
    <section class="table-section">
        <div class="container mt-5">
            <h2 class="text-center mb-4">Information Table</h2>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Nama</th>
                        <th class="text-center" scope="col">Umur</th>
                        <th class="text-center" scope="col">Alamat</th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($data as $index => $value)
                      <tr>
                          <th class="text-center" scope="row">{{ $index+1 }}</th>
                          <td>{{ $value['nama'] }}</td>
                          <td class="text-center">{{ $value['umur'] }}</td>
                          <td>{{ $value['alamat'] }}</td>
                          <td class="text-center">
                            <a href="{{ url("info/delete?index=$index") }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this entry?')">Delete</a>
                            | <a href="#{{ $index }}" class="btn btn-warning">Edit</a>
                        </td>
                      </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </section>

  <script src="/jquery-3.7.1/jquery.min.js"></script>    
  <script src="/bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
  <script src="/sweetalert2/sweetalert2.all.min.js"></script>
</body>

</html>
