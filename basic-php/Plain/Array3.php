<?php
    $mahasiswa = [
        ["Dimas Yudistira", "0701213127", "Ilmu Komputer", "dimas420@gmail.com"],
        ["Fadhila", "1662201069", "Akuntansi", "fadhila69@gmail.com"],
        ["Bagas Aji", "464864565", "Sistem Informasi", "Bangji@gmail.com"],
        ["Lorem ipsum", "1234567890", "adipisicing elit", "doloremque@lorem.io"]
    ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <ul>
        <?php
            foreach($mahasiswa as $m) :
        ?>
        <li>Nama : <?= $m[0] ?></li>
        <li>NIM : <?= $m[1] ?></li>
        <li>Jurusan : <?= $m[2] ?></li>
        <li>E-Mail : <?= $m[3] ?></li>
        <?php
            echo "<br>";
            endforeach;
        ?>
    </ul>
</body>
</html>