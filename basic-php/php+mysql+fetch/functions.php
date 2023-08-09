<?php 

    //koneksi database
    $dbconn = new mysqli("localhost", "root", "", "phpdasar");

    function query($query){
        global $dbconn;
        $result = mysqli_query($dbconn, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }
?>