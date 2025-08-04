<?php
 session_start();
 include_once "../api/db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>會員管理</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css"
        integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style2.css">        

</head>

<body>
    <?php include 'bd_header.php';?>

    <main>
        <div class="container mt-3">
            <h2 class="text-center">會員管理</h2>
            <?php $table='member';?>     
            
            <table class="table table-bordered table-hover table-fixed">
                <thead>
                    <tr>
                        <th>使用者名稱</th>
                        <th>電子郵件</th>
                        <th>帳號</th>
                        <th>密碼</th>
                        <th>生日</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                     $rows=${ucfirst($table)}->all();         
                     foreach ($rows as $row): 
                    ?>
                    <tr>
                        <td><?=$row['name'];?></td>
                        <td><?=$row['email'];?></td>
                        <td><?=$row['acc'];?></td>
                        <td><?=$row['pw'];?></td>
                        <td><?=$row['birthday'];?></td>
                        <td>
                            <a class="btn btn-warning" href="update_member.php?id=<?=$row['id'];?>&table=<?=$table;?>">
                                <i class="fa-solid fa-wrench"></i>修改</a>
                            <a class="btn btn-danger" href="../api/delete.php?id=<?=$row['id'];?>&table=<?=$table;?>"><i
                                    class="fa-solid fa-trash-can"></i>刪除</a>
                        </td>
                    </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>

        </div>
        </div>
    </main>    

</body>

</html>