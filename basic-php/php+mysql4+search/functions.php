<?php 

    //koneksi database
    // $dbconn = new mysqli("localhost", "root", "", "phpdasar");
    $dbconn = mysqli_connect("localhost", "root", "", "phpdasar");

    function qfetch($query){
        global $dbconn;
        $result = mysqli_query($dbconn, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function qinsert($data_post){
        global $dbconn;
        $nrp = htmlspecialchars($data_post["nrp"]);
        $nama = htmlspecialchars($data_post["nama"]);
        $email = htmlspecialchars($data_post["email"]);
        $jurusan = htmlspecialchars($data_post["jurusan"]);
        $gambar = htmlspecialchars($data_post["gambar"]);

        $qinsert = "INSERT INTO mahasiswa
                    VALUES
                    ('0', '$nama', '$nrp', '$email', '$jurusan', '$gambar')
                    ";

        mysqli_query($dbconn, $qinsert);

        return mysqli_affected_rows($dbconn);
    }

    function qdelete($id){
        global $dbconn;
        mysqli_query($dbconn, "DELETE FROM mahasiswa WHERE ID = $id");
        return mysqli_affected_rows($dbconn);
    }

    function qchange($data_post){
        global $dbconn;
        $id = $data_post["id"];
        $nrp = htmlspecialchars($data_post["nrp"]);
        $nama = htmlspecialchars($data_post["nama"]);
        $email = htmlspecialchars($data_post["email"]);
        $jurusan = htmlspecialchars($data_post["jurusan"]);
        $gambar = htmlspecialchars($data_post["gambar"]);
        
        $qchange = "UPDATE mahasiswa SET
                        nrp = '$nrp',
                        nama = '$nama',
                        email = '$email',
                        jurusan = '$jurusan',
                        gambar = '$gambar'
                    WHERE id = $id
                    ";

        mysqli_query($dbconn, $qchange);

        return mysqli_affected_rows($dbconn);

    }

    function qsearch($keyword){
        $query = "SELECT * FROM mahasiswa
                WHERE
                    nama LIKE '%$keyword%' OR
                    nrp LIKE '%$keyword%' OR
                    email LIKE '%$keyword%' OR
                    jurusan LIKE '%$keyword%'
                ";
        return qfetch($query);
    }

?>