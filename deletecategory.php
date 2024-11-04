<?php
    session_start();

    if($_SESSION['role'] == 'a') {
        $_SESSION["delet_category"] = "success";
        
        $id = $_GET['id'];

        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");

        $sql = "DELETE FROM category WHERE $id=id";

        $conn->exec($sql);

        $conn = null;

        header("location:category.php");
        
    } else {
        header("location:index.php");
    }
?>