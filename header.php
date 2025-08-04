    <!-- 導航欄 -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <i class="fas fa-glass-whiskey"></i>
                <span>泰好喝</span>
            </div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">首頁</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="items.php">產品型錄</a>
                </li>

                <?php
                     if(isset($_SESSION['mem'])):                   
                    ?>
                <li class="nav-item">
                    <a class="nav-link" href="main.php">會員中心</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shopping_car.php"><i class="fas fa-shopping-cart"></i>購物車</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="query_order.php">訂單查詢</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./api/logout.php">登出</a>
                </li>

                <?php
                    else:
                    ?>
                <li class="nav-item">
                    <a class="nav-link" href="reg.php">註冊</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">登入</a>
                </li>
                <?php
                    endif;
                   ?>

            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
    </nav>