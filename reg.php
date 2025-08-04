<?php
 session_start();
 ?>
<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員註冊 - 泰好喝手搖飲料專賣店</title>
    <?php include "title_link.php" ?>
    <style>
    .register-section {
        margin-top: 50px;
        padding: 40px 20px;
        min-height: calc(100vh - 120px);
        background: linear-gradient(135deg, #fff8e1 0%, #f3e5f5 100%);
    }

    .register-container {
        max-width: 600px;
        margin: 0 auto;
        background: white;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .register-title {
        text-align: center;
        color: #2c5530;
        margin-bottom: 30px;
        font-size: 2rem;
        font-weight: 700;
    }

    .form-label {
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
    }

    .form-control {
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        padding: 12px 15px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #2c5530;
        box-shadow: 0 0 0 0.2rem rgba(44, 85, 48, 0.25);
    }

    .btn-primary {
        background: linear-gradient(135deg, #2c5530, #4a7c59);
        border: none;
        padding: 12px 30px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
        margin-right: 10px;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(44, 85, 48, 0.3);
    }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>

    <section class="register-section">
        <div class="register-container">
            <h2 class="register-title">會員註冊</h2>
            <!-- <form action="./api/insert.php" method="post"> -->
            <form>
                <div class="mb-4">
                    <label for="name" class="form-label">使用者名稱</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="form-label">電子郵件</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-4">
                    <label for="acc" class="form-label">帳號</label>
                    <input type="text" class="form-control" id="acc" name="acc" required>
                </div>

                <div class="mb-4">
                    <label for="pw" class="form-label">密碼</label>
                    <input type="password" class="form-control" id="pw" name="pw" required>
                </div>
                <div class="mb-4">
                    <label for="birthday" class="form-label">生日</label>
                    <input type="date" class="form-control" id="birthday" name="birthday" required>
                </div>

                <?php $table='member'?>
                <input type="hidden" name="table" value="<?=$table;?>">

                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <!-- <button type="submit" class="btn btn-primary">註冊</button> -->
                    <input type="button" class="btn btn-primary" value="註冊" onclick="reg()">
                    <button type="reset" class="btn btn-primary">重置</button>
                </div>
            </form>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    <script>
    function reg() {
        let data = {
            acc: $("#acc").val(),
            pw: $("#pw").val(),
            name: $("#name").val(),
            birthday: $("#birthday").val(),
            email: $("#email").val()
        }

        if (data.acc == '' || data.pw == '' || data.name == '' || data.email == '') {
            alert("不可空白");
        } else {
            $.get("./api/chk_acc.php", data, (res) => {
                if (parseInt(res)) {
                    alert("帳號重複")
                } else {
                    $.post("./api/reg.php", data, (res) => {
                        console.log(res);
                        if (parseInt(res)) {
                            alert("註冊成功，歡迎加入")
                            location.href = "login.php";
                        } else {
                            alert("註冊失敗，請稍後再試")
                        }
                    })
                }
            })
        }

    }
    </script>
</body>

</html>