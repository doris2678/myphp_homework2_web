<?php
session_start();
include_once "../api/db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>訂單管理</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css"
        integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style2.css">        
    
</head>

<body>
    <?php include 'bd_header.php'; ?>

    <main>
        <div class="container-fluid mt-3">
            <h2 class="text-center">訂單管理</h2>
            <?php $table = 'order1'; ?>
            <table class="table table-bordered table-hover table-fixed">
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
                    $all = count(${ucfirst($table)}->all());
                    $div = 8;
                    $pages = ceil($all / $div);
                    $now = $_GET['p'] ?? 1;
                    $start = ($now - 1) * $div;
                    $rows = ${ucfirst($table)}->all(" order by or_no desc limit $start,$div");
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
                                <a class="btn btn-danger" href="../api/delete_order.php?id=<?=$row['id'];?>&table=<?=$table;?>"><i
                                    class="fa-solid fa-trash-can"></i>刪除</a>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

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
        </div>

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
    </main>

    <!-- 載入 Bootstrap 5 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/js/bootstrap.bundle.min.js"
        integrity="sha512-Tc0i+vRogmX4NN7tuLbQfBxa8JkfUSAxSFVzmU31nVdHyiHElPPy2cWfFacmCJKw0VqovrzKhdd2TSTMdAxp2g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- 載入 jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function () {
            $('.view-details').on('click', function () {
                const or_no = $(this).data('or-no');
                console.log('or_no:', or_no);

                let url = '../api/get_order_details.php';
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