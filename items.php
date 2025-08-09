<?php
 session_start();
 include_once "./api/db.php";
 ?>

<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>產品型錄 - 泰好喝手搖飲料專賣店</title>
    <?php include "title_link.php" ?>
    
    <style>
    .items-section {
        /* margin-top: 120px;
        padding: 40px 20px;
        min-height: calc(100vh - 120px); */
        background: linear-gradient(135deg, #fff8e1 0%, #f3e5f5 100%);
    }

    .items-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .items-title {
        text-align: center;
        color: #2c5530;
        margin-bottom: 40px;
        font-size: 2.5rem;
        font-weight: 700;
    }

    .items-subtitle {
        text-align: center;
        color: #666;
        margin-bottom: 50px;
        font-size: 1.2rem;
    }

    .items-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 30px;
        margin-bottom: 50px;
    }

    .item-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        text-align: center;
    }

    .item-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
    }

    .item-image {
        width: 100%;
        height: 150px;
        overflow: hidden;
    }

    .item-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .item-card:hover .item-image img {
        transform: scale(1.1);
    }

    .item-info {
        padding: 25px;
    }

    .item-info h3 {
        color: #2c5530;
        font-size: 1.5rem;
        margin-bottom: 10px;
        font-weight: 600;
    }

    .item-info p {
        color: #666;
        margin-bottom: 15px;
        line-height: 1.6;
    }

    .item-price {
        font-size: 1.8rem;
        font-weight: 700;
        color: #2c5530;
        margin-bottom: 20px;
    }

    .add-to-cart-btn {
        background: linear-gradient(135deg, #2c5530, #4a7c59);
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
    }
    </style>
</head>

<body>
    <?php include 'header.php';?>

    <section class="items-section">
        <div class="items-container">
            <h2 class="items-title">產品型錄</h2>
            <p class="items-subtitle">精選最優質的手搖飲料，每一杯都是用心調製</p>

            <div class="items-grid">
                <?php                                    
                     $table='items';
                     $rows=${ucfirst($table)}->all(" where sh=1 ");         
                    foreach ($rows as $row): 
                ?>
                <div class="item-card">
                    <div class="item-image">
                        <img src="./images/<?=$row['img'];?>" alt="<?=$row['item_name'];?>">
                    </div>
                    <div class="item-info">
                        <!-- <div class="item-name">品名: <?=$row['item_name'];?></div> -->
                        <h3><?=$row['item_name'];?></h3>
                        <div class="item-price">NT$ <?=$row['price'];?></div>          
                    </div>
                </div>
                <?php
                      endforeach;
                ?>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>

   </body>

</html>