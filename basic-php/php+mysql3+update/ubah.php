<?php 

    require "functions.php";
    $ident = $_GET["id"];
    $mahasiswa = qfetch("SELECT * FROM mahasiswa WHERE ID = $ident")[0];

    //cek tombol pernah di klik ato kaga
    if(isset($_POST["submit"])){

        //cek data berubah
        if(qchange($_POST) > 0){
            echo "
                <script>
                    alert('Data Berhasil diubah!');
                    document.location.href = 'index.php';
                </script>
            ";
        }
        else{
            echo "
                <script>
                    alert('Data Gagal diubah!');
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
    <title>Ubah Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Ubah Data Mahasiswa</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $mahasiswa['id'] ?>">
        <table>
            <tr>
                <td><label for="nrp">NRP :</label></td>
                <td><input type="text" name="nrp" id="nrp" value="<?= $mahasiswa["nrp"]; ?>" required></td>
            </tr>
            <tr>
                <td><label for="nama">Nama :</label></td>
                <td><input type="text" name="nama" id="nama" value="<?= $mahasiswa['nama']; ?>" required></td>
            </tr>
            <tr>
                <td><label for="email">Email :</label></td>
                <td><input type="text" name="email" id="email" value="<?= $mahasiswa['email']; ?>" required></td>
            </tr>
            <tr>
                <td><label for="jurusan">Jurusan :</label></td>
                <td><input type="text" name="jurusan" id="jurusan" value="<?= $mahasiswa['jurusan']; ?>" required></td>
            </tr>
            <tr>
                <td><label for="gambar">Gambar :</label></td>
                <td><input type="text" name="gambar" id="gambar" value="<?= $mahasiswa['gambar']; ?>" required></td>
            </tr>
            <tr>
                <td colspan="2" class="sapmit"><button type="submit" name="submit">Ubah Data!</button></td>
            </tr>
        </table>
    </form>
</body>
</html>