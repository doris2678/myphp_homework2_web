<?php
 session_start(); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>首頁輪播圖片新增</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css"
        integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style2.css">
</head>

<body>
    <?php include './bd_header.php';?>

    <main>
        <div class="container mt-3">
            <h2 class="text-center">首頁輪播圖片新增</h2>
            <form action="../api/insert.php" method="post" enctype="multipart/form-data">              
                <div class="mb-3 mt-3">
                    <label for="pd1">商品名稱 :</label>
                    <input type="text" class="form-control" id="pd1" name="pd1">
                </div>

                <div class="mb-3 mt-3">
                    <label for="pd2">商品描述:</label>
                    <input type="text" class="form-control" id="pd2" name="pd2">
                </div>

                <div class="mb-3 mt-3 d-flex align-items-center">
                    <label for="img" class="me-2 mb-0" style="white-space: nowrap;">新增圖片：</label>
                    <input type="file" class="form-control" id="img" name="img" style="width: auto;">
                </div>               

                <!-- 新增圖片預覽 -->
                <div id="preview-container" class="mb-3 mt-3" style="display:none;">
                    <label for="preview-image" class="me-2 mb-0" style="white-space: nowrap;">新增圖片預覽</label>
                    <img id="preview-image" src="" alt="新增圖片預覽" style="max-width: 200px; max-height: 200px;">
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