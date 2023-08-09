<?php 
    require "functions.php";
    $mahasiswa = qfetch("SELECT * FROM mahasiswa");
    $number = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <h1>Daftar Mahasiswa</h1>
    
    <div class="tambah">
        <a href="tambah.php" class="tambahdata">Tambah Data Mahasiswa</a>
    </div>
    <br><br>

    <table>

        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>

        <?php foreach ($mahasiswa as $row):?>
        <tr>
            <td><?php $number++; echo $number; ?></td>
            <td>
                <a href="">ubah</a> |
                <a href="hapus.php?id=<?= $row["id"] ?>" onclick="return confirm('Yakin ingin menghapus data?')">hapus</a>
            </td>
            <td><img src="../Assets/<?= $row["gambar"] ?>" alt="" width="50"></td>
            <td><?= $row["nrp"]; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["jurusan"]; ?></td>
        </tr>
        <?php endforeach; ?>

    </table>

</body>
</html>