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

        //upload gambar
        $gambar = qupload();

        if(!$gambar){
            return false;
        }

        $qinsert = "INSERT INTO mahasiswa
                    VALUES
                    ('0', '$nama', '$nrp', '$email', '$jurusan', '$gambar')
                    ";

        mysqli_query($dbconn, $qinsert);

        return mysqli_affected_rows($dbconn);
    }

    function qupload(){
        $file = $_FILES['gambar'];
        $namaFile = $file['name'];
        $ukuranFile = $file['size'];
        $error = $file['error'];
        $tmpName = $file['tmp_name'];

        //cek ada yang diupload ato nggak
        if($error === 4){
            echo "
                <script>
                    alert('Pilih gambar terlebih dahulu!');
                </script>
            ";
            return false;
        }

        //cek apa yang diupload
        $cekEkstensiValid = ['jpg', 'jpeg', 'png', 'svg'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower($ekstensiGambar[array_key_last($ekstensiGambar)]);

        if(!in_array($ekstensiGambar, $cekEkstensiValid)){
            echo "
                <script>
                    alert('Harap upload gambar yang berekstensi JPG, JPEG, atau PNG!');
                </script>
            ";
            return false;
        }

        //cek ukuran
        if($ukuranFile > 2000000){
            echo "
                <script>
                    alert('Ukuran gambar (filesize) terlalu besar!');
                </script>
            ";
            return false;
        }

        //generate nama baru, biar ga tabrakan
        $namaFileBaru = uniqid().'.'.$ekstensiGambar;

        //lolos semua pengecekan
        move_uploaded_file($tmpName, '../assets/'.$namaFileBaru);
        return $namaFileBaru;
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
        $gambarLama = htmlspecialchars($data_post["gambarLama"]);

        //cek pilih gambar baru?
        if($_FILES['gambar']['error'] === 4){
            $gambar = $gambarLama;
        }else{
            $gambar = qupload();
        }
        
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


    function registrasi($data_post){
        global $dbconn;

        $username = stripslashes(strtolower($data_post['username']));
        $password = mysqli_real_escape_string($dbconn, $data_post['password']);
        $password2 = mysqli_real_escape_string($dbconn, $data_post['password2']);

        //cek duplikat user
        $result = mysqli_query($dbconn, "SELECT username FROM user WHERE username = '$username'");

        if(mysqli_fetch_assoc($result)){
            echo"
                <script>
                    alert('username yang dipilih sudah terdaftar');
                </script>
            ";

            return false;
        }

        //cek konfirmasi password
        if($password !== $password2){
            echo'
                <script>
                    alert("konfirmasi password tidak sesuai!");
                </script>
            ';
            return false;
        }

        //enksripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        //menambah userbaru ke database
        mysqli_query($dbconn, "INSERT INTO user VALUES(NULL, '$username', '$password')");

        return mysqli_affected_rows($dbconn);
    }



?>