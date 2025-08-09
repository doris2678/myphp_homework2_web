<?php
 session_start();
 include_once "./api/db.php";
 ?>

<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>訂單查詢</title>
    <?php include "title_link.php" ?>

    <style>
    .order-section {
        margin-top: 120px;
        padding: 40px 20px;
        min-height: calc(100vh - 120px);
        background: linear-gradient(135deg, #fff8e1 0%, #f3e5f5 100%);
    }

    .order-container {
        max-width: 1200px;
        margin: 0 auto;
        background: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .order-title {
        text-align: center;
        color: #2c5530;
        margin-bottom: 30px;
        font-size: 2.5rem;
        font-weight: 700;
    }

    .order-subtitle {
        text-align: center;
        color: #666;
        margin-bottom: 40px;
        font-size: 1.2rem;
    }

    .order-table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 10px;
        overflow: hidden;
        background: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }

    .order-table th,
    .order-table td {
        padding: 15px;
        border: 1px solid #dee2e6;
        text-align: center;
        vertical-align: middle;
    }

    .order-table th {
        background: linear-gradient(135deg, #2c5530, #4a7c59);
        color: white;
        font-weight: 600;
    }

    .order-table tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    .order-table tr:hover {
        background-color: #e8f4ff;
    }

    .order-status {
        padding: 5px 15px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .status-pending {
        background: #fff3cd;
        color: #856404;
    }

    .status-processing {
        background: #cce5ff;
        color: #004085;
    }

    .status-completed {
        background: #d4edda;
        color: #155724;
    }

    .status-cancelled {
        background: #f8d7da;
        color: #721c24;
    }

    .btn-details {
        background: linear-gradient(135deg, #2c5530, #4a7c59);
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-details:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(44, 85, 48, 0.3);
        color: white;
        text-decoration: none;
    }

    .no-orders {
        text-align: center;
        padding: 50px;
        color: #666;
        font-size: 1.2rem;
    }

    .no-orders i {
        font-size: 3rem;
        color: #ddd;
        margin-bottom: 20px;
    }
    
     </style>
</head>

<body>
    <?php include 'header.php';?>

    <section class="order-section">
        <div class="order-container">
            <h2 class="order-title">訂單查詢</h2>
            <p class="order-subtitle">查看您的訂單記錄</p>

            <?php
            // 檢查用戶是否已登入
            if(isset($_SESSION['mem'])):
                $acc = $_SESSION['mem'];
                $table = 'order1';                
             ?>
                <table class="order-table">
                <thead>
                    <tr>
                        <th style="width: 10%;">訂單編號</th>
                        <th style="width: 10%;">日期</th>
                        <th style="width: 10%;">訂購者姓名</th>
                        <th style="width: 10%;">電話</th>
                        <th style="width: 10%;">訂購金額</th>
                        <th style="width: 20%;">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $all = count(${ucfirst($table)}->all(['acc'=>$acc]));
                    $div = 8;
                    $pages = ceil($all / $div);
                    $now = $_GET['p'] ?? 1;
                    $start = ($now - 1) * $div;
                    $rows = ${ucfirst($table)}->all(['acc'=>$acc]," order by or_no desc limit $start,$div");
                    foreach ($rows as $row):
                    ?>
                        <tr>
                            <td><?= $row['or_no']; ?></td>
                            <td><?= $row['date1']; ?></td>
                            <td><?= $row['name']; ?></td>
                            <td><?= $row['tel']; ?></td>
                            <td><?= $row['amt']; ?></td>
                            <td>
                                <button class="btn btn-info view-details" data-or-no="<?= $row['or_no']; ?>">
                                    <i class="fa-solid fa-eye"></i> 查詢明細
                                </button>
                                
                            </td>
                        </tr>                  
                    <?php                      
                      endforeach;
                    endif;

                    if(!isset($_SESSION['mem'])):
                    ?>    
                        <div class="no-orders">';
                          <i class="fas fa-user-lock"></i>';
                          <p>請先登入會員以查看訂單記錄</p>';
                        </div>
                      <?php
                       endif
                       ?>
                </tbody>
            </table>
                    
                
        </div>

            <!-- 分頁 -->    
            <div class="fixed-footer">
                <div class="container mt-3">
                    <ul class="pagination justify-content-center">
                        <?php if ($now - 1 > 0): ?>
                            <li class="page-item"><a class="page-link" href="?p=<?= $now - 1; ?>"><</a></li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $pages; $i++): ?>
                            <li class="page-item <?= ($now == $i) ? 'active' : ''; ?>">
                                <a class="page-link" href="?p=<?= $i; ?>"><?= $i; ?></a>
                            </li>
                        <?php endfor; ?>

                        <?php if ($now + 1 <= $pages): ?>
                            <li class="page-item"><a class="page-link" href="?p=<?= $now + 1; ?>">></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
    </section>

     <!-- 回傳訊息用 Modal -->
        <div class="modal fade" id="resultModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center">訂單明細</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-center" id="modalMessage">
                        <!-- 這裡放回傳訊息 -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
                    </div>
                </div>
            </div>
        </div>

    <?php include 'footer.php'; ?>

    <script>
        $(document).ready(function () {
            $('.view-details').on('click', function () {
                const or_no = $(this).data('or-no');
                console.log('or_no:', or_no);

                let url = './api/get_order_details.php';
                $.ajax({
                    type: "POST",
                    url: url,
                    data: { or_no: or_no },
                    dataType: "json",
                    success: function (response) {
                        $('#modalMessage').html('');

                        let table = `
                            <table class="table table-bordered">
                                <thead>
                                    <tr>                                        
                                        <th>品名</th>
                                        <th>單價</th>
                                        <th>數量</th>                                        
                                        <th>金額</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                        `;

                        response.forEach((item, idx) => {
                            table += `
                                <tr>                                  
                                    <td>${item.item_name}</td>
                                    <td>${item.price}</td>
                                    <td>${item.qty}</td>
                                    <td>${item.price*item.qty}</td>
                                </tr>
                            `;
                        });

                        table += `
                                </tbody>
                            </table>
                        `;

                        $('#modalMessage').html(table);

                        const modal = new bootstrap.Modal(document.getElementById('resultModal'));
                        modal.show();
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                        $('#modalMessage').text('無法載入訂單明細，請稍後再試。');
                        const modal = new bootstrap.Modal(document.getElementById('resultModal'));
                        modal.show();
                    }
                });
            });
        });
    </script>
    
</body>

</html>