<?php
 session_start();
 ?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <title>後台管理系統</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    html,
    body {
        height: 100%;
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        overflow: hidden;
    }

    .sidebar {
        width: 200px;
        background-color: #343a40;
        color: white;
        padding-top: 1rem;
    }

    .sidebar a {
        color: white;
        text-decoration: none;
        padding: 10px 1rem;
        display: block;
        border-radius: 4px;
    }

    .sidebar a:hover {
        background-color: #1abc9c;
    }

    .main {
        flex: 1;
        overflow: hidden;
    }

    iframe {
        border: none;
        width: 100%;
        height: calc(100vh - 56px - 40px);
        /* 扣掉 navbar 和 footer 高度 */
    }

    .footer {
        height: 40px;
        background-color: #f8f9fa;
        color: #6c757d;
        text-align: center;
        line-height: 40px;
        font-size: 14px;
    }

    .layout {
        display: flex;
        height: calc(100vh - 56px);
        /* 扣掉 navbar */
    }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand">後台管理系統</span>
            <div class="dropdown ms-auto">
                <button class="btn btn-outline-light dropdown-toggle" type="button" id="userMenu"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    管理員
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <?php
                    if(isset($_SESSION['admin'])):                   
                    ?>
                    <li><a class="dropdown-item" href="./api/admin_logout.php">登出</a></li>
                    <?php
                    else:
                    ?>
                    <li><a class="dropdown-item" href="admin_login.php">登入</a></li>
                    <?php
                    endif;
                    ?>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Layout -->
    <div class="layout">
        <!-- Sidebar -->
        <div class="sidebar d-flex flex-column">

            <?php
                 if(isset($_SESSION['admin'])):                   
             ?>
            <div class="px-3 pb-2 fw-bold">管理選單</div>
            <a href="./backend/admin.php" target="contentFrame">帳號管理</a>
            <a href="./backend/member.php" target="contentFrame">會員管理</a>

            <!-- 可收合的子選單 -->
            <a data-bs-toggle="collapse" href="#photoMenu" role="button" aria-expanded="false"
                aria-controls="photoMenu">
                首頁圖片管理 ▾
            </a>
            <div class="collapse" id="photoMenu">
                <a href="./backend/first_img.php?table=first_img" target="contentFrame" class="ps-4">輪播圖片管理</a>
                <a href="./backend/second_img.php?table=second_img" target="contentFrame" class="ps-4">商品介紹圖片管理</a>
            </div>
            
            <!-- 可收合的子選單 -->
            <a data-bs-toggle="collapse" href="#productMenu" role="button" aria-expanded="false"
                aria-controls="productMenu">
                商品及訂單管理 ▾
            </a>
            <div class="collapse" id="productMenu">
                <a href="./backend/items.php?table=items" target="contentFrame" class="ps-4">商品管理</a>
                <a href="./backend/bd_query_order.php" target="contentFrame" class="ps-4">訂單管理</a>
            </div>

            <a class="nav-link" href="./api/admin_logout.php">登出</a>
            <?php
              else:
            ?>
            <a href="./backend/admin_login.php">登入</a>
            <?php
              endif;
            ?>
        </div>

        <!-- 主內容 -->
        <div class="main">
            <iframe name="contentFrame"></iframe>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2025 泰好喝有限公司 All rights reserved.</p>
    </div>

</body>

</html>