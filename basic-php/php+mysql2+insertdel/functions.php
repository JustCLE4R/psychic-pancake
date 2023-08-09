<?php 

    //koneksi database
    $dbconn = new mysqli("localhost", "root", "", "phpdasar");

    function qfetch($query){
        global $dbconn;
        $result = mysqli_query($dbconn, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function qinsert($insert){
        global $dbconn;
        $nrp = htmlspecialchars($insert["nrp"]);
        $nama = htmlspecialchars($insert["nama"]);
        $email = htmlspecialchars($insert["email"]);
        $jurusan = htmlspecialchars($insert["jurusan"]);
        $gambar = htmlspecialchars($insert["gambar"]);

        $qinsert = "INSERT INTO mahasiswa
                    VALUES
                    ('0', '$nama', '$nrp', '$email', '$jurusan' ,'$gambar')
                    ";

        mysqli_query($dbconn, $qinsert);

        return mysqli_affected_rows($dbconn);
    }

    function qdelete($id){
        global $dbconn;
        mysqli_query($dbconn, "DELETE FROM mahasiswa WHERE ID = $id");
        return mysqli_affected_rows($dbconn);
    }

?>