<?php 

    if(isset($_POST['sapmit'])){
        echo "Tombol submit ditekan".$_POST['username'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Git</title>
    <style>
        p{
            color : red;
            font-size: 20vh;
        }
    </style>
</head>
<body>
    <p class="test 1 2 3">Lorem ipsum dolor sit amet consectetur adipisicing elit. At quis velit eligendi aut dicta perferendis ducimus, obcaecati maiores hic ut veritatis fugit excepturi cum quisquam blanditiis accusamus impedit iure natus?</p>
    <form action="" method="post">
        <label for="username">username</label>
        <input type="text" name="username" id="username">
        <button name="sapmit">Submit</button>
    </form>
</body>
</html>
