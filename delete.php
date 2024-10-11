<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if($_SESSION['role'] == 'a'){
            $id = $_GET['id'];

            $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
            
            $sql_comment = "DELETE FROM comment WHERE $id=post_id";
            $sql_post = "DELETE FROM post WHERE $id=id";

            $conn->exec($sql_comment);
            $conn->exec($sql_post);

            $conn = null;

            header("location:index.php");
        }else{
            header("location:index.php");
        }
    ?>
</body>
</html>