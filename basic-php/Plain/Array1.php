<?php
    $hari = ["Senin", "Selasa", "Kamis", "Jum'at", "Sabtu"];
    
    // for($i=0;$i<7;$i++){
    //     echo $hari[$i], "<br>";
    // }

    $arr1 = [123, "Kompor", false];

    // var_dump($arr1);
    // echo "<br>";
    // print_r($hari);
    // echo "<br><br>";
    // echo $arr1[1];
    // echo "<br>";
    // echo $hari[3];

    var_dump($hari);
    $hari []= "Minggu"; //inject data array ke data paling akhir
    echo "<br>";
    var_dump($hari);

    
?>