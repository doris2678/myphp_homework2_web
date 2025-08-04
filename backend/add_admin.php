<?php
 session_start();  
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>帳號管理</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css"
        integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style2.css">
</head>

<body>
    <?php include './bd_header.php';?>

    <main>
        <div class="container mt-3">
            <h2 class="text-center">帳號管理</h2>
            <form action="../api/insert.php" method="post">
                <div class="mb-3 mt-3">
                    <label for="acc">帳號:</label>
                    <input type="text" class="form-control" id="acc" name="acc">
                </div>

                <div class="mb-3 mt-3">
                    <label for="pw">密碼:</label>
                    <input type="password" class="form-control" id="pw" name="pw">
                </div>

                <div class="mb-3 mt-3">
                    <div class="row">
                        <button type="submit" class="btn btn-primary">新增</button>&nbsp;&nbsp;<button type="reset"
                            class="btn btn-primary">重置</button>
                    </div>
                </div>
                
                <input type="hidden" name="table" value="<?=$_GET['table'];?>">
            </form>
        </div>
    </main>

    
</body>

</html>