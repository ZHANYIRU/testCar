<?php require __DIR__ . '/parts/connect_db.php';
$pageName = 'car';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
    $_SESSION['rCart'] = [];
}

?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/html-nav.php'; ?>
<style>
    .btn-primary:hover {
        --bs-btn-hover-bg: #cfe2ff;
        --bs-btn-hover-color: #084298;
        --bs-btn-active-bg: #cfe2ff
    }

    .coll {
        margin-bottom: 20px;
    }

    .text {
        text-align: center;
    }

    .form-select {
        width: 60%;
        display: inline-block;
    }

    .alert {
        display: flex;
        justify-content: space-between;
    }

    .alert p {
        margin-bottom: 0;
    }

    .form1 {
        display: none;
    }
</style>
<form class="form1">
    <input type="text" name="sid" id="sid">
    <input type="text" name="tPrice" id="tPrice">
</form>
<div class="container">
    <div class="row">
        <div class="alert alert-primary text" role="alert">
            商品
        </div>
        <div class="coll" id="rental">
            <div class="card card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">
                                <i class="fa-solid fa-trash-can"></i>
                            </th>
                            <th scope="col">封面</th>
                            <th scope="col">商品名稱</th>
                            <th scope="col">單價</th>
                            <th scope="col">數量</th>
                            <th scope="col">金額</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($_SESSION['cart'] as $p) :

                        ?>
                            <tr data_sid="<?= $p['sid'] ?>" class="item">
                                <td>
                                    <a href="javascript: delete_it(<?= $p['sid'] ?>)" data_sid="<?= $p['sid'] ?>">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                                <td>
                                    <img src="./imgs/<?= $p['img_id'] ?>.jpg" alt="" width="150px">
                                </td>
                                <td><?= $p['pr_name'] ?></td>
                                <td class="price">$<?= $p['price'] ?></td>
                                <td>
                                    
                                    <select class="form-select" onchange="change()">
                                        <?php for ($i = 1; $i <= 10; $i++) : ?>
                                            <option value="<?= $i ?>" <?= $p['qty'] == $i ? "selected" : "" ?> class="op"><?= $i ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </td>
                                <td class="total"></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="alert alert-info" role="alert">
                    <p>總金額：</p><span class="toAll"></span>
                </div>
            </div>
        </div>
        <div class="alert alert-primary text" role="alert">
            租借商品
        </div>
        <div class="coll" id="products">
            <div class="card card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">
                                <i class="fa-solid fa-trash-can"></i>
                            </th>
                            <th scope="col">封面</th>
                            <th scope="col">商品名稱</th>
                            <th scope="col">單價</th>
                            <th scope="col">數量</th>
                            <th scope="col">金額</th>
                        </tr>
                    </thead>
                </table>
                <div class="alert alert-info" role="alert">
                    <p>總金額：</p><span class="toAll"></span>
                </div>
            </div>
        </div>
        <div class="alert alert-primary text" role="alert">
            活動
        </div>
        <div class="coll" id="campaign">
            <div class="card card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">
                                <i class="fa-solid fa-trash-can"></i>
                            </th>
                            <th scope="col">封面</th>
                            <th scope="col">商品名稱</th>
                            <th scope="col">單價</th>
                            <th scope="col">數量</th>
                            <th scope="col">金額</th>
                        </tr>
                    </thead>
                </table>
                <div class="alert alert-info" role="alert">
                    <p>總金額：</p><span class="toAll"></span>
                </div>
            </div>
        </div>
        <div class="alert alert-primary text" role="alert">
            訂房管理
        </div>
        <div class="coll" id="room">
            <div class="card card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">
                                <i class="fa-solid fa-trash-can"></i>
                            </th>
                            <th scope="col">封面</th>
                            <th scope="col">商品名稱</th>
                            <th scope="col">單價</th>
                            <th scope="col">數量</th>
                            <th scope="col">金額</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($_SESSION['rCart'] as $r) :

                        ?>
                            <tr data_sid="<?= $r['room_sid'] ?>" class="item">
                                <td>
                                    <a href="javascript: delete_it(<?= $r['room_sid'] ?>)" data_sid="<?= $r['room_sid'] ?>">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                                <td>
                                    <img src="./imgs/<?= $r['room_img'] ?>" alt="" width="150px">
                                </td>
                                <td><?= $r['room_name'] ?></td>
                                <td class="price">$<?= $r['room_price'] ?></td>
                                <td>
                                    
                                    <select class="form-select" onchange="change()">
                                        <?php for ($i = 1; $i <= 10; $i++) : ?>
                                            <option value="<?= $i ?>" <?= $r['qty'] == $i ? "selected" : "" ?> class="op"><?= $i ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </td>
                                <td class="total"></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="alert alert-info" role="alert">
                    <p>總金額：</p><span class="toAll"></span>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-info" onclick="toBuy()">結帳</button>
</div>






<?php include __DIR__ . '/parts/html-script.php'; ?>
<script>
    let total = document.querySelectorAll('.total');
    let price = document.querySelectorAll('.price');
    let sel = document.querySelectorAll('.form-select');
    let clean = document.querySelector(".btn-warning");
    let sid = document.querySelector('#sid');
    //清空購物車
    clean.addEventListener('click', () => {
        Swal.fire({
            title: '確定要清空嗎?',
            text: "您將清空購物車!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: '確定!',
            cancelButtonText: '取消',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                setTimeout('location.href = "clean-api.php"', 800);
                Swal.fire(
                    '已完成',
                    '',
                    'success',
                )
            }
        })
    });
    //顯示金額
    let totalAll = 0;
    let toAll = document.querySelector('.toAll');
    for (let i = 0; i < total.length; i++) {
        total[i].textContent = `$${Number(price[i].textContent.split('$')[1] * sel[i].value)}`;
        totalAll += Number(total[i].textContent.split('$')[1]);
    }
    //總金額
    toAll.textContent = `$${totalAll}`;
    //更換數量
    let qty = 0
    function change() {
        qty = event.target.value;
        money = event.target.parentNode.parentNode.childNodes[7].textContent.split('$')[1];
        moneyAll = event.target.parentNode.parentNode.childNodes[11];
        moneyAll.textContent = Number(qty) * Number(money);
        toAll.textContent = ""
        totalAll = 0;
        for (let i = 0; i < total.length; i++) {
            total[i].textContent = `$${Number(price[i].textContent.split('$')[1]) * Number(sel[i].value)}`;
            totalAll += Number(total[i].textContent.split('$')[1]);
        }
        toAll.textContent = `$${totalAll}`;
    }
    //刪除單筆
    function delete_it(event) {
        sid.value = event;
        let fd = new FormData(document.querySelector('.form1'))
        Swal.fire({
            title: '確定要刪除嗎?',
            text: "您將刪除此筆資料!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: '確定!',
            cancelButtonText: '取消',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                fetch('./cart-api/proCart.php', {
                        method: "POST",
                        body: fd
                    })
                    .then(r => r.json())
                    .then(obj => console.log(obj))
                Swal.fire(
                    '已完成',
                    '',
                    'success'
                )
                setTimeout('location.href="cart-list.php"', 600);
            }

        })
    }
    //購物車沒商品 隱藏btn
    let tbody = document.querySelector('tbody');
    let btn = document.querySelector('.btn-info')
    if (tbody.textContent == 0) {
        btn.style.display = "none"
    }

    function toBuy() {
        let tPrice = document.querySelector('#tPrice');
        tPrice.value = toAll.textContent.split('$')[1];
        let fd = new FormData(document.querySelector('.form1'));
        fetch('buy-api.php', {
                method: "POST",
                body: fd
            })
            .then(r => r.text())
            .then(obj => console.log(obj));
        // Swal.fire({
        //     title: '確定要結帳嗎?',
        //     icon: 'warning',
        //     showCancelButton: true,
        //     confirmButtonText: '確定!',
        //     cancelButtonText: '取消',
        //     reverseButtons: true
        // }).then((result) => {
        //     if (result.isConfirmed) {
        //         Swal.fire(
        //             '已完成',
        //             '',
        //             'success',
        //         )
        //     }
        // })
    }
</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>