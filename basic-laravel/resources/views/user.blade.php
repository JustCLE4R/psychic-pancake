<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User</title>
</head>
<body>
  <p>user id kamu adalah-{{ $id }}</p>
  @if ($request->has('nama'))
    <p>nama kamu adalah-{{ $request->input('nama') }}</p>
  @endif
  <form action="" method="GET">
    <label for="nama">nama</label>
    <input type="text" name="nama" id="nama">
  </form>
</body>
</html>