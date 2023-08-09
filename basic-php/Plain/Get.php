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
        "nrp" => "696942069",
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
]
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>GET</title>
    <style>
        img {
            width: 100px;
        }

        ul li {
            list-style: none;
        }
    </style>
</head>

<body>

        <ul>
        <?php foreach ($mahasiswa as $mhs) : ?>
            <li>
                <a href="./Get2.php?nama=<?= $mhs["nama"]; ?>&nrp=<?= $mhs["nrp"]?>&email=<?= $mhs["email"]?>&jurusan=<?= $mhs["jurusan"]?>&gambar=<?= $mhs["gambar"] ?>"><?= $mhs["nama"]; ?></a>
            </li>
        <?php endforeach; ?>
        </ul>

</body>
</html>