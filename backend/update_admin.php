<?php
 session_start();
 include_once "../api/db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯帳號</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css"
        integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style2.css">
</head>
<body>
    <?php include 'bd_header.php';?>

    <main>
        <div class="container mt-3">
            <h2 class="text-center">編輯帳號</h2>
            <?php
                $table=$_GET['table'];
                $db=${ucfirst($table)};
                $row=$db->find($_GET['id']);                                 
                if (!$row) {
                    echo "<h2>帳號不存在</h2>";
                    exit;
                }
            ?>
            <form action="../api/update.php" method="post">
                <div class="mb-3 mt-3">
                    <label for="acc">帳號:</label>
                    <input type="text" class="form-control" id="acc" name="acc" value="<?=$row['acc'];?>">
                </div>

                <div class="mb-3 mt-3">
                    <label for="pw">密碼:</label>
                    <input type="password" class="form-control" id="pw" name="pw" value="<?=$row['pw'];?>">
                </div>

                <div class="mb-3 mt-3">
                    <div class="row">
                        <button type="submit" class="btn btn-primary">編輯</button>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?=$_GET['id'];?>">
                <input type="hidden" name="table" value="<?=$_GET['table'];?>">
            </form>
        </div>
    </main>

    

</body>

</html>