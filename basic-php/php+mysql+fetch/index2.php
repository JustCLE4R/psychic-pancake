<?php 
    //koneksi database
    $dbconn = mysqli_connect("localhost", "root", "", "phpdasar");

    //query database
    $result = mysqli_query($dbconn, "SELECT * FROM mahasiswa");
    $number = 0;
    //fethcing data 
    // mysqli_fetch_row() mengembalikan array numerik
    // mysqli_fetch_assoc() mengembalikan array asosiatif
    // mysqli_fetch_array() mengembalikan array numerik dan asosiatif
    // mysqli_fetch_object() mengembalikan array dengan object (->)

    // while($mhs = mysqli_fetch_assoc($result)){
    //     var_dump($mhs);
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    
    <h1>Daftar Mahasiswa</h1>

    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)):?>
        <tr>
            <td><?php $number++; echo $number; ?></td>
            <td>
                <a href="">ubah</a> |
                <a href="">hapus</a>
            </td>
            <td><img src="../Assets/<?= $row["gambar"] ?>" alt="" width="50"></td>
            <td><?= $row["nrp"]; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["jurusan"]; ?></td>
        </tr>
        <?php endwhile; ?>

    </table>

</body>
</html>