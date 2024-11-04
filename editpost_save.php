<?php
    session_start();
    $cat = $_POST['category'];
    $topic = $_POST['topic'];
    $content = $_POST['comment'];
    $id = $_GET['id'];

    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
    $sql = "UPDATE post SET title='$topic',content='$content',cat_id='$cat' WHERE id=$id";
    $conn->exec(statement: $sql);
    $conn = null;
    
    $_SESSION["edit_status"] = "success";
    header("location:editpost.php?id=$id");
    die();
?>