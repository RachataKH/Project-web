<?php
    session_start();
    if (($_SESSION['role'] == "a")) {
        $user_id = $_POST['user-id'];
        $user_name = $_POST['user-name'];
        $user_gender = $_POST['user-gender'];
        $user_email = $_POST['user-email'];
        $user_role = $_POST['user-role'];
    
        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
        $sql = "UPDATE user SET name = '$user_name',gender = '$user_gender',email = '$user_email',role = '$user_role' where id = $user_id";

        $conn->exec($sql);

        $_SESSION['edit_user'] = "edit_success";
        
        $conn = null;
        header("location:user.php");
    
    } else {
        header("location:index.php");
    }
?>