<?php 

    if($_POST["username"] != "dimas" || $_POST["password"] != "root"){
        header("Location: login.php?error");
        exit;
    }else{
        $welcome = $_POST["username"];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin!</title>
</head>
<body>
    <h1>Selamat Datang, <?= $welcome; ?></h1>
    <br>
    <a href="login.php">Log Out!</a>
</body>
</html>