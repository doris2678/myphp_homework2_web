<?php
 session_start();
 include_once "../api/db.php";
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>帳號管理</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css"
        integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style2.css">   

</head>
<body>
<div class="container-fluid mt-3">
    <main>
    <h2 class="text-center">帳號管理</h2>
    <?php $table='admin'?>
    <div class='btns'>
        <a class="btn btn-primary" href="add_admin.php?table=<?=$table;?>">
            <i class="fa-regular fa-pen-to-square"></i> 新增
        </a>
    </div>
    <table class="table table-bordered table-hover table-fixed">
        <thead>
            <tr>
                <th>帳號</th>
                <th>密碼</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php                       
             $rows=${ucfirst($table)}->all();         
             foreach ($rows as $row): 
            ?>
            <tr>
                <td><?=$row['acc'];?></td>
                <td><?=$row['pw'];?></td>
                <td>
                    <a class="btn btn-warning" href="update_admin.php?id=<?=$row['id'];?>&table=<?=$table;?>">
                        <i class="fa-solid fa-wrench"></i> 修改</a>
                    <a class="btn btn-danger" href="../api/delete.php?id=<?=$row['id'];?>&table=<?=$table;?>">
                        <i class="fa-solid fa-trash-can"></i> 刪除</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/js/bootstrap.bundle.min.js"
    integrity="sha512-Tc0i+vRogmX4NN7tuLbQfBxa8JkfUSAxSFVzmU31nVdHyiHElPPy2cWfFacmCJKw0VqovrzKhdd2TSTMdAxp2g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
