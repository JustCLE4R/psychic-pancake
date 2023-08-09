<?php 
    if(!isset($_GET["nama"])){
        header("Location: Get.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>GET 2</title>
    <style>
        ul li{
            list-style: none;
        }
        img{
            width: 100px;
        }
    </style>
</head>
<body>
        <ul>
            <li><img src="./Assets/<?=$_GET["gambar"]?>" alt=""></li>
            <li>Nama : <?= $_GET["nama"]?></li>
            <li>NRP : <?= $_GET["nrp"]?></li>
            <li>E-Mail : <?= $_GET["email"]?></li>
            <li>Jurusan : <?= $_GET["jurusan"]?></li>
        </ul>
</body>
</html>