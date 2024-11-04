<?php
    session_start();
    $add = $_POST["cat"];

    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");  
    $sql = "INSERT INTO category (name) VALUES ('$add')";
    
    $conn->exec($sql);
    $conn = null;

    $_SESSION['add_category'] = "success";
    header("location:category.php");
    die();
?>