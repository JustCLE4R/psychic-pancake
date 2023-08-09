<?php
    $angka = [5,9,7,6,45,89,55,8,69,420];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrayanti</title>
    <style>
        .kotak{
            width: 50px;
            height: 50px;
            background-color: salmon;
            text-align: center;
            line-height: 50px;
            margin: 3px;
            float: left;
        }
        .clear{
            clear: both;
        }
    </style>
</head>
<body>
    <?php for($i=0;$i<count($angka);$i++) {?>
    <div class="kotak"><?=$angka[$i];?></div>
    <?php }?>

    <div class="clear"></div>

    <?php foreach($angka as $j) {?>
        <div class="kotak"><?= $j ?></div>
    <?php } ?>

    <div class="clear"></div>

    <?php foreach($angka as $j) : ?>
        <div class="kotak"><?= $j ?></div>
    <?php endforeach; ?>


</body>
</html>