<?php session_start(); ?>
<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>會員中心 - 泰好喝手搖飲料專賣店</title>
    <?php include "title_link.php" ?>
    <style>
    .member-section {
        /* margin-top: 120px; */
        /* padding: 40px 20px; */
        min-height: calc(100vh - 120px);
        /* background: linear-gradient(135deg, #fff8e1 0%, #f3e5f5 100%); */
    }

    .member-container {
        max-width: 800px;
        margin: auto;
        background: white;
        /* padding: 40px; */
        padding: 10px;
        /* border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); */
    }

    .welcome-title {
        text-align: center;
        color: #2c5530;
        margin-bottom: 30px;
        font-size: 2.5rem;
        font-weight: 700;
    }

    .member-info {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 30px;
    }

    .member-info h3 {
        color: #2c5530;
        margin-bottom: 15px;
    }

    .quick-actions {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-top: 30px;
    }

    .action-card {
        background: linear-gradient(135deg, #2c5530, #4a7c59);
        color: white;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .action-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(44, 85, 48, 0.3);
        color: white;
        text-decoration: none;
    }

    .action-card i {
        font-size: 2rem;
        margin-bottom: 10px;
    }
    </style>
</head>

<body>
    <?php include 'header.php';?>

    <section class="member-section">
        <div class="member-container">
            <h2 class="welcome-title">歡迎光臨，<?= htmlspecialchars($_SESSION['mem']) ?></h2>

            <div class="member-info">
                <h3><i class="fas fa-user-circle"></i> 會員資訊</h3>
                <p>您已成功登入會員系統，可以享受以下服務：</p>
            </div>

            <div class="quick-actions">
                <a href="items.php" class="action-card">
                    <i class="fas fa-shopping-bag"></i>
                    <h4>產品型錄</h4>
                    <p>瀏覽所有飲品</p>
                </a>
                <a href="shopping_car.php" class="action-card">
                    <i class="fas fa-shopping-cart"></i>
                    <h4>購物車</h4>
                    <p>查看購物車</p>
                </a>
                <a href="query_order.php" class="action-card">
                    <i class="fas fa-list-alt"></i>
                    <h4>訂單查詢</h4>
                    <p>查看訂單記錄</p>
                </a>
            </div>
        </div>
    </section>

    <?php include 'footer.php';?>

</body>

</html>