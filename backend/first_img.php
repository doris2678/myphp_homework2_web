<?php
 session_start();
 include_once "../api/db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>首頁輪播圖片管理</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css"
        integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style2.css">    
    
</head>

<body>
    <?php include 'bd_header.php';?>

    <main>
        <div class="container-fluid mt-3">

            <h2 class="text-center">首頁輪播圖片管理</h2>
            <?php $table='first_img'?>
            <div class='btns'><a class="btn btn-primary" href="add_firstimg.php?table=<?=$table;?>"><i
                        class="fa-regular fa-pen-to-square"></i>新增</a>
            </div>
            <table class="table table-bordered table-hover table-fixed">
                <thead>
                    <tr>
                        <th style="width: 20%;">產品名稱</th>
                        <th style="width: 30%;">產品描述</th>
                        <th style="width: 10%;">首頁輪播圖片</th>                        
                        <th style="width: 10%;">是否顯示</th>
                        <th style="width: 20%;">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php             
                     $all=count(${ucfirst($table)}->all());
                     $div=8;
                     $pages=ceil($all/$div);
                     $now=$_GET['p']??1;
                     $start=($now-1)*$div;
                     $rows=${ucfirst($table)}->all(" limit $start,$div");
                     //$rows=${ucfirst($table)}->all();         
                     foreach ($rows as $row): 
                    ?>
                    <tr>
                        <td><?=$row['pd1'];?></td>
                        <td><?=$row['pd2'];?></td>
                        <td>
                            <img src="../images/<?=$row['img'];?>" style='max-width: 200px; max-height: 200px;'>
                        </td>
                        <td>                            
                          <input type="checkbox" class="noclick" name="sh" value="<?=$row['id'];?>" <?=($row['sh']==1)?"checked":"";?>>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="update_firstimg.php?id=<?=$row['id'];?>&table=<?=$table;?>">
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

            <!-- 分頁 -->
            <div class="fixed-footer">
                <div class="container mt-3">
                    <ul class="pagination justify-content-center">
                        <?php if($now-1>0): ?>
                         <li class="page-item"><a class="page-link" href="?p=<?=$now-1;?>"><</a></li>
                        <?php endif ;?>

                        <?php for($i=1;$i<=$pages;$i++): ?>
                         <li class="page-item <?=($now==$i)?'active':'';?>"><a class="page-link"
                                href="?p=<?=$i;?>"><?=$i;?></a></li>
                        <?php endfor;?>

                        <?php if($now+1<=$pages):?>
                         <li class="page-item"><a class="page-link" href="?p=<?=$now+1;?>">></a></li>
                        <?php endif ;?>
                    </ul>
                </div>
            </div>

        </div>
        </div>
    </main>

    <script>
    $(document).ready(function() {
        previewImg = $('#img');

        previewImg.change(function(event) {
            const file = event.target.files[0];
            if (!file) return;

            // 顯示圖片預覽區塊
            $('#preview-container').show();

            const reader = new FileReader();
            reader.onload = function(e) {
                $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        });
    });
    </script>


</body>

</html>