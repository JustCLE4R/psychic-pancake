<?php 

    require "functions.php";

    //cek tombol pernah di klik ato kaga
    if(isset($_POST["submit"])){

        //cek data masuk
        if(qinsert($_POST) > 0){
            echo "
                <script>
                    alert('Data Berhasil ditambahkan!');
                    document.location.href = 'index.php';
                </script>
            ";
        }
        else{
            echo "
                <script>
                    alert('Data Gagal ditambahkan!');
                    document.location.href = 'index.php';
                </script>
            ";
        }

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="nrp">NRP :</label></td>
                <td><input type="text" size="30" name="nrp" id="nrp" required></td>
            </tr>
            <tr>
                <td><label for="nama">Nama :</label></td>
                <td><input type="text" size="30" name="nama" id="nama" required></td>
            </tr>
            <tr>
                <td><label for="email">Email :</label></td>
                <td><input type="text" size="30" name="email" id="email" required></td>
            </tr>
            <tr>
                <td><label for="jurusan">Jurusan :</label></td>
                <td><input type="text" size="30" name="jurusan" id="jurusan" required></td>
            </tr>
            <tr>
                <td><label for="gambar">Gambar :</label></td>
                <td><input type="file" name="gambar" id="gambar" required></td>
            </tr>
            <tr>
                <td colspan="2" class="sapmit"><button type="submit" name="submit">Tambah Data!</button></td>
            </tr>
        </table>
    </form>
</body>
</html>