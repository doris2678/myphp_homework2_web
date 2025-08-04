<?php
 session_start(); 
 include_once "./api/db.php";
 ?>

<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>泰好喝手搖飲料專賣店</title>
    <?php include "title_link.php" ?>
</head>

<body>
    <?php include 'header.php';?>

    <!-- 首頁區塊 -->
    <section id="home" class="hero">
        <!-- 輪播圖片 -->
        <div class="carousel">
            <div class="carousel-container">
                <?php                                    
                    $table='first_img';
                    $rows=${ucfirst($table)}->all(" where sh=1");         
                    foreach ($rows as $row): 
                ?>

                <div class="carousel-slide active">
                    <img src="./images/<?=$row['img'];?>" alt="<?=$row['pd1'];?>">
                    <div class="carousel-content">
                        <h2><?=$row['pd1'];?></h2>
                        <p><?=$row['pd2'];?></p>
                        <button class="cta-button">立即訂購</button>
                    </div>
                </div>
                <?php
                      endforeach;
                ?>
            </div>
            <button class="carousel-btn prev">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="carousel-btn next">
                <i class="fas fa-chevron-right"></i>
            </button>
            <div class="carousel-dots">
                <span class="dot active" data-slide="0"></span>
                <span class="dot" data-slide="1"></span>
                <span class="dot" data-slide="2"></span>
            </div>
        </div>
    </section>

<!-- 產品介紹區塊 -->
    <section id="products" class="products">
        <div class="container">
            <h2 class="section-title">熱門產品</h2>
            <p class="section-subtitle">精選最受歡迎的飲品，每一杯都是用心調製</p>

            <div class="products-grid">
                <?php                                    
                    $table='second_img';
                    $rows=${ucfirst($table)}->all(" where sh=1 order by id desc");         
                    foreach ($rows as $row): 
                ?>

                <div class="product-card">
                    <div class="product-image">
                        <img src="./images/<?=$row['img'];?>" alt="<?=$row['pd1'];?>">
                    </div>
                    <div class="product-info">
                        <h3><?=$row['pd1'];?></h3>
                        <p><?=$row['pd2'];?></p>
                        <?php
                         if(isset($_SESSION['mem'])){
                          echo "<a href='shopping_car.php'><button class='order-btn'>我要購買</button></a>";
                         };
                        ?>                        
                    </div>
                </div>
                 <?php
                      endforeach;
                ?>
            </div>
        </div>
    </section>

    <!-- 特色介紹 -->
    <section class="features">
        <div class="container">
            <div class="features-grid">
                <div class="feature-item">
                    <i class="fas fa-leaf"></i>
                    <h3>天然原料</h3>
                    <p>嚴選天然原料，無人工添加物，健康美味</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-clock"></i>
                    <h3>快速製作</h3>
                    <p>專業調製，3分鐘內完成，新鮮現做</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-heart"></i>
                    <h3>用心服務</h3>
                    <p>親切服務，客製化調整，滿足您的需求</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 載入script.js -->
    <script src="script.js"></script>
    <?php include 'footer.php'; ?>
</body>

</html>