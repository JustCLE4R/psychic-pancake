<?php
    $mahasiswa = [
        [
            "nama" => "Dimas Yudistira",
            "nrp" => "0701213127",
            "email" => "dimas69@gmail.com",
            "jurusan" => "Ilmu Komputer",
            "gambar" => "CLE4R.png"
        ],
        [
            "nama" => "Lorem Dolor",
            "nrp" => "6969420699",
            "email" => "Dolor69@gmail.com",
            "jurusan" => "Ilmu Dolor",
            "gambar" => "darkness.jpeg"
        ],
        [
            "nama" => "Lorem Adispicing",
            "nrp" => "4204206969",
            "email" => "adispicing69@gmail.com",
            "jurusan" => "Ilmu Adispicing",
            "gambar" => "office.png"
        ],
        [
            "nama" => "Lorem Ipsum",
            "nrp" => "6969696969",
            "email" => "Ipsum69@gmail.com",
            "jurusan" => "Ilmu Ipsum",
            "gambar" => "prism.png"
        ],
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        .gambar{
            width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <?php foreach($mahasiswa as $mhs):?>
    <ul>
        <li><img class="gambar" src="./Assets/<?= $mhs["gambar"] ?>"></li>
        <li>Nama :<?= $mhs ["nama"] ?></li>
        <li>NRP :<?= $mhs ["nrp"] ?></li>
        <li>E-Mail :<?= $mhs ["email"] ?></li>
        <li>Jurusan :<?= $mhs ["jurusan"] ?></li>
        
    </ul>

    <?php endforeach;?>
</body>
</html>