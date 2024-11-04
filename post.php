<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container-lg mt-3">
        <h1 style="text-align: center;" class="mt-3">WEBTOON</h1>

        <?php
            session_start();
            include "nav.php";
            $post_id = $_GET['id'];
        ?>

        <div class="card text-dark bg-white border-primary mt-3 col-lg-6 mx-auto">
            <?php
                $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");

<<<<<<< HEAD
                $sql = "SELECT post.title,post.content,post.post_date,user.login FROM post INNER JOIN user ON (post.user_id=user.id) WHERE $post_id=post.id";
=======
                $sql = "SELECT title,content,post_date FROM post WHERE $post_id=id";
>>>>>>> 1a2555786482b4b0d10423c74d1ef7e378e6cc4a

                $result = $conn->query($sql);

                $post_fetch = $result->fetch();
<<<<<<< HEAD
=======

                $i=1;
                while($row=$result->fetch()){
                    echo "<div class='card border info mt-3'>";
                    echo "<div class='card-header bg-info text-white'>ความคิดเห็นที่ $i</div>";
                    echo "<div class='card-body'>$row[0]";
                    echo "<div class='mt-2'>$row[1] - $row[2]</div></div></div>";
                    $i+=1;
                }
>>>>>>> 1a2555786482b4b0d10423c74d1ef7e378e6cc4a
            ?>
            <div class="card-header bg-primary text-white"><?php echo $post_fetch[0]?></div>
            <div class="card-body">
                <div class="mt-1"><?php echo $post_fetch[1]?></div>
<<<<<<< HEAD
                <div class="mt-3 fw-light fst-italic"><?php echo "$post_fetch[3] : $post_fetch[2]"?></div>
=======
                <div class="mt-3 fw-light fst-italic"><?php echo $post_fetch[2]?></div>
>>>>>>> 1a2555786482b4b0d10423c74d1ef7e378e6cc4a
            </div>
        </div>

        <?php
                $id = 0;
                $num = $_GET['id'];

<<<<<<< HEAD
                $sql_post = "SELECT comment.id,comment.content,comment.post_date,user.login,user.role FROM comment INNER JOIN user ON (comment.user_id=user.id) WHERE post_id=$num ORDER BY comment.post_date";
=======
                $sql_post = "SELECT comment.id,comment.content,comment.post_date,user.login FROM comment INNER JOIN user ON (comment.user_id=user.id) WHERE post_id=$num ORDER BY comment.post_date";
>>>>>>> 1a2555786482b4b0d10423c74d1ef7e378e6cc4a

                $result_post = $conn->query($sql_post);

                while($post_fetch_post = $result_post->fetch()){
<<<<<<< HEAD
                    if($post_fetch_post[4] != "b"){
                        $id = $id+1;
                        echo "<div class='card text-dark bg-white border-info mt-3 col-lg-6 mx-auto'>
                                <div class='card-header bg-info text-white'>ความคิดเห็นที่ $id</div>
                                <div class='card-body'>
                                    <div class='mt-1'>$post_fetch_post[1]</div>
                                    <div class='mt-3 fw-light fst-italic'>$post_fetch_post[3] : $post_fetch_post[2]</div>
                                </div>
                            </div>";
                    }
=======
                    $id = $id+1;
                    echo "<div class='card text-dark bg-white border-info mt-3 col-lg-6 mx-auto'>
                            <div class='card-header bg-info text-white'>ความคิดเห็นที่ $id</div>
                            <div class='card-body'>
                                <div class='mt-1'>$post_fetch_post[1]</div>
                                <div class='mt-3 fw-light fst-italic'>$post_fetch_post[3] : $post_fetch_post[2]</div>
                            </div>
                        </div>";
>>>>>>> 1a2555786482b4b0d10423c74d1ef7e378e6cc4a
                }
        ?>

        <div class="card text-dark bg-white border-success mt-3 col-lg-6 mx-auto">
            <div class="card-header bg-success text-white">แสดงความคิดเห็น</div>
            <div class="card-body">
                <form action="post_save.php" method="post">
                    <input type="hidden" name="post_id" value="<?= $_GET['id']; ?>">
                    <div class="row mb-3 justify-content-center">
                        <div class="col-lg-10">
                            <textarea name="comment" class="form-control" rows="8"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <center>
                                <button type="submit" class="btn btn-success btn-sm text-white">
                                    <i class="bi bi-box-arrow-up-right me-1"></i>ส่งข้อความ
                                </button>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>