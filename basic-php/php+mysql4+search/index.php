<?php 
    require "functions.php";
    $mahasiswa = qfetch("SELECT * FROM mahasiswa");
    $number = 0;

    if(isset($_POST['cari'])){
        $mahasiswa = qsearch($_POST['keyword']);
    }
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
    <br>
    <form action="" method="post" class="search">
        <input type="text" name="keyword" autofocus size="48" placeholder="Search..." autocomplete="off">
        <button type="submit" name="cari">Cari!</button>
    </form>
    <br>
    <table>

        <tr>
            <th>No.</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>

        <?php foreach ($mahasiswa as $row):?>
        <tr>
            <td><?php $number++; echo $number; ?></td>
            <td><img src="../Assets/<?= $row["gambar"] ?>" alt="" width="50"></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["nrp"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["jurusan"]; ?></td>
            <td>
                <a class="tombol" href="ubah.php?id=<?= $row["id"] ?>">ubah</a> |
                <a class="tombol" href="hapus.php?id=<?= $row["id"] ?>" onclick="return confirm('Yakin ingin menghapus data?')">hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>

    </table>

</body>
</html>

<?php 
    mysqli_close($dbconn);
?>
