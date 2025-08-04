<?php
 session_start();
 include_once "./api/db.php";
?>
<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>購物車 - 泰好喝手搖飲料專賣店</title>
    <?php include "title_link.php" ?>
    <style>
    body {
        background: linear-gradient(135deg, #fff8e1 0%, #f3e5f5 100%);
        min-height: 100vh;
        font-family: 'Noto Sans TC', sans-serif;
    }

    .cart-section {
        margin-top: 120px;
        padding: 40px 0;
        min-height: calc(100vh - 120px);
        display: flex;
        align-items: flex-start;
        justify-content: center;
    }

    .cart-container {
        max-width: 950px;
        width: 100%;
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 10px 32px rgba(44, 85, 48, 0.10);
        padding: 2.5rem 2rem 2rem 2rem;
        margin: 0 auto;
    }

    .cart-title {
        text-align: center;
        color: #2c5530;
        font-weight: 700;
        margin-bottom: 2rem;
        letter-spacing: 2px;
        font-size: 2.2rem;
    }

    .cart-table th {
        background: linear-gradient(135deg, #2c5530, #4a7c59);
        color: #fff;
        font-weight: 600;
        text-align: center;
        vertical-align: middle;
    }

    .cart-table td {
        vertical-align: middle;
        text-align: center;
        background: #f8f9fa;
    }

    .cart-table img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
    }

    .cart-table input[type="number"] {
        width: 70px;
        padding: 8px;
        border-radius: 6px;
        border: 2px solid #e0e0e0;
        text-align: center;
        font-size: 1rem;
        transition: all 0.3s;
    }

    .cart-table input[type="number"]:focus {
        border-color: #2c5530;
        box-shadow: 0 0 0 0.15rem rgba(44, 85, 48, 0.15);
    }

    .cart-total-row td {
        background: #fffde7;
        font-size: 1.2rem;
        font-weight: 700;
        color: #2c5530;
        text-align: right;
        padding-right: 2rem;
        border-top: 2px solid #4a7c59;
    }

    .cart-btn-row {
        text-align: center;
        padding-top: 1.5rem;
    }

    .btn-primary {
        background: linear-gradient(135deg, #2c5530, #4a7c59);
        border: none;
        font-weight: 600;
        border-radius: 8px;
        font-size: 1.1rem;
        padding: 12px 40px;
        transition: all 0.2s;
    }

    .btn-primary:hover {
        background: #2c5530;
        box-shadow: 0 5px 15px rgba(44, 85, 48, 0.15);
    }

    .form-title {
        background: linear-gradient(135deg, #2c5530, #4a7c59);
        color: white;
        padding: 12px 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        font-weight: 600;
        font-size: 1.1rem;
        letter-spacing: 1px;
    }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <section class="cart-section">
        <div class="cart-container">
            <h2 class="cart-title">購物車</h2>
            <form action="" method="post">
                <div class="form-title mb-4">訂購者資料</div>
                <?php $rows_mem=$Member->find(['acc'=>$_SESSION['mem']]); ?>
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <label for="date1" class="form-label">訂購日期</label>
                        <input type="text" class="form-control" id="date1" name="date1"
                            value="<?php echo date("Y-m-d");?>" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="name" class="form-label">姓名</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?=$rows_mem['name']?>"
                            readonly>
                        <input type="hidden" class="form-control" id="acc" name="acc" value="<?=$rows_mem['acc']?>">
                    </div>
                    <div class="col-md-4">
                        <label for="tel" class="form-label">電話</label>
                        <input type="text" class="form-control" id="tel" name="tel" required>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table cart-table align-middle">
                        <colgroup>
                            <col style="width: 10%">
                            <col style="width: 20%">
                            <col style="width: 15%">
                            <col style="width: 10%">
                            <col style="width: 20%">
                            <col style="width: 25%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>品號</th>
                                <th>品名</th>
                                <th>產品圖</th>
                                <th>單價</th>
                                <th>數量</th>
                                <th>金額</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                        $table='items';
                        $rows=${ucfirst($table)}->all(" where sh=1 ");
                        foreach ($rows as $row): 
                        ?>
                            <tr>
                                <td><span class="item_no"><?=$row['item_no'];?></span></td>
                                <td><span class="item_name"><?=$row['item_name'];?></span></td>
                                <td><img src="./images/<?=$row['img'];?>" alt="<?=$row['item_name'];?>"></td>
                                <td><span class="price"><?=$row['price'];?></span></td>
                                <td><input class="counts" data-price="<?=$row['price'];?>" type="number" value="0"
                                        min="0"></td>
                                <td><span class="totals">0</span></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr class="cart-total-row">
                                <td colspan="6">
                                    總金額: <span id="originPrice" class="sumprice1">0</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" class="cart-btn-row">
                                    <button type="button" class="btn btn-primary" onclick="add()">送出訂單</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </form>
            <!-- 回傳訊息用 Modal -->
            <div class="modal fade" id="resultModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center">系統訊息</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body text-center" id="modalMessage">
                            <!-- 這裡放回傳訊息 -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="location.href='index.php'">關閉</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    
    <?php include 'footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/js/bootstrap.bundle.min.js"
        integrity="sha512-Tc0i+vRogmX4NN7tuLbQfBxa8JkfUSAxSFVzmU31nVdHyiHElPPy2cWfFacmCJKw0VqovrzKhdd2TSTMdAxp2g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    $(document).ready(function() {
        const counts = $('.counts');
        const totals = $('.totals');
        const originPrice = $('#originPrice');

        function sumFun() {
            let tmpTotals = $('.totals');
            let sum = 0;
            $.each(tmpTotals, function(key, value) {
                let tmpValue = Number($(value).text());
                sum += tmpValue;
            });
            return sum;
        }
        counts.change(function() {
            let tmpCount = Number($(this).val());
            let tmpPrice = Number($(this).attr('data-price'));
            let result = tmpCount * tmpPrice;
            let tmpTr = $(this).parent().parent();
            let tmpTotal = tmpTr.find('.totals');
            tmpTotal.text(result);
            // 總計顯示
            let resultSum = Number(sumFun());
            originPrice.text(resultSum);
        });
    });

    function add() {
        let mydata = [];
        $("tr").each(function() {
            const item_no = $(this).find("td").eq(0).text().trim();
            const item_name = $(this).find("td").eq(1).text().trim();
            const price = parseFloat($(this).find("td").eq(3).text());
            const qty = parseInt($(this).find("input.counts").val());
            // 檢查是否為有效數量
            if (!isNaN(qty) && qty > 0) {
                mydata.push({
                    item_no: item_no,
                    item_name: item_name,
                    price: price,
                    qty: qty
                });
            }
        });
        if (mydata.length === 0) {
            alert("請選擇至少一項商品");
            return;
        }
        const date1 = $('#date1').val();
        const acc = $('#acc').val();
        const name = $('#name').val();
        const tel = $('#tel').val();
        const originPrice = $('#originPrice'); // 抓總金額元素
        const amt = Number(originPrice.text()); // 取得總金額文字並轉成數字         
        fetch('./api/insert_order.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    date1: date1,
                    acc: acc,
                    name: name,
                    amt: amt,
                    tel: tel,
                    mydata: mydata
                })
            })
            .then(res => res.json())
            .then(data => {
                //alert(data.message);
                $('#modalMessage').text(data.message);
                const modal = new bootstrap.Modal(document.getElementById('resultModal'));
                modal.show();
            })
            .catch(err => {
                //alert(data.message);
                //console.error('錯誤:', err);
            });
    }
    </script>

</body>

</html>