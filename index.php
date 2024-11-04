<?php
    session_start();
    if(!isset($_GET['id'])){
        header("location:index.php?id=0");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Webboard</title>
</head>

<body>
    <div class="container-lg mt-3">
        <h1 style="text-align: center;" class="mt-3">WEBTOON</h1>

        <?php
            include "nav.php";
        ?>

        <br>

        <span class="dropdown">
            หมวดหมู่:
            <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php
                    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                    if($_GET['id'] == 0){
                        echo "ทั้งหมด";
                    }else{
                        $sql = "SELECT name FROM category WHERE id=$_GET[id]";
                        $result = $conn->query($sql);
                        $row = $result->fetch();
                        echo $row["name"];
                    }
                ?>
            </button>
            <ul class="dropdown-menu">
                <li><a href='index.php?id=0' class='dropdown-item'>ทั้งหมด</a></li>
                <?php
                $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                $sql = "SELECT * FROM category";
                foreach ($conn->query($sql) as $row) {
                    echo "<li><a href='index.php?id=$row[id]' class='dropdown-item'>$row[name]</a></li>";
                }
                $conn = null;
                ?>
            </ul>
        </span>



        <?php
        if (isset($_SESSION['id'])) {
            echo "<button type='button' class='btn btn-success' style='float:right;'><a class='link-light link-offset-2 link-underline link-underline-opacity-0' href='newpost.php'><i class='bi bi-plus'></i>สร้างกระทู้ใหม่</a></button>";
        }
        ?>

        <br>
        <br>

        <table class="table table-striped">
            <?php
            $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
            if($_GET['id'] == 0){
                $sql = "SELECT category.name,post.title,post.id,user.login,post.post_date,user.role FROM post INNER JOIN user ON (post.user_id=user.id) INNER JOIN category as category ON (post.cat_id=category.id) ORDER BY post.post_date DESC";
            }else{
                $sql = "SELECT category.name,post.title,post.id,user.login,post.post_date,user.role FROM post INNER JOIN user ON (post.user_id=user.id) INNER JOIN category as category ON (post.cat_id=category.id) WHERE category.id=$_GET[id] ORDER BY post.post_date DESC";
            }
            $result = $conn->query($sql);
            while ($row = $result->fetch()) {
                if($row[5] != "b"){
                    echo "<tr><td>[ $row[0] ] <a href=post.php?id=$row[2] style=text-decoration:none>$row[1]</a>";
                    if (isset($_SESSION['id']) && $_SESSION["role"] == 'a') {
                        echo "<a onclick='confirmdelete($row[2])' class='btn btn-danger' style='float:right' role='button'><i class='bi bi-trash'></i></a>";
                        if($row[3] == $_SESSION['username']){
                            echo "<a href='editpost.php?id=$row[2]' class='btn btn-warning me-2' style='float:right' role='button'><i class='bi bi-pencil'></i></i></a>";
                        }
                    }else if(isset($_SESSION['id'])){
                        if($row[3] == $_SESSION['username']){
                            echo "<a onclick='confirmdelete($row[2])' class='btn btn-danger' style='float:right' role='button'><i class='bi bi-trash'></i></a>";
                            echo "<a href='editpost.php?id=$row[2]' class='btn btn-warning me-2' style='float:right' role='button'><i class='bi bi-pencil'></i></i></a>";
                        }
                    }
                
                    echo "<br>$row[3] - $row[4]</td></tr>";
                }
            }
            $conn = null;
            ?>
        </table>
    </div>

    <ul class="dropdown-menu" aria-labelledby="Button2">
        <li><a href="#" class="dropdown-item"></a></li>
    </ul>

    <script>
        function confirmdelete(a) {
            if (confirm("คุณต้องการจะลบหรือไม่") == true) {
                location.href = `delete.php?id=${a}`;
            }
        }
    </script>
</body>

</html>