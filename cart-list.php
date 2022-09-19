<?php
require __DIR__ . '/parts/connect_db.php';
$pageName = 'car';

// echo json_encode($_SESSION['cart']);
// foreach($_SESSION['cart'] as $k => $v){
//     echo json_encode($v['sid'] , JSON_UNESCAPED_UNICODE) ;
// }

// exit;

?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/html-nav.php'; ?>
<style>
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
</style>
<div class="container">
    <div class="row">
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
                foreach ($_SESSION['cart'] as $r) :

                ?>
                    <tr data_sid="<?= $r['sid'] ?>" class="item">
                        <td>
                            <a href="#">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </td>
                        <td>
                            <img src="./imgs/<?= $r['img_id'] ?>.jpg" alt="" width="150px">
                        </td>
                        <td><?= $r['pr_name'] ?></td>
                        <td class="price"><?= $r['price'] ?></td>
                        <td>
                            <select class="form-select" onchange="change(event)">
                                <?php for ($i = 1; $i <= 10; $i++) : ?>
                                    <?php ?>
                                    <option value="<?= $i ?>" <?= $r['qty'] == $i ? "selected" : "" ?>><?= $i ?></option>
                                    <? ?>
                                <?php endfor; ?>
                            </select>
                        </td>
                        <td class="total"></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="alert alert-primary" role="alert">
            <p>總金額：</p><span class="toAll"></span>
        </div>
    </div>
    <button type="button" class="btn btn-info">結帳</button>
</div>





<?php include __DIR__ . '/parts/html-script.php'; ?>

<script>
    let total = document.querySelectorAll('.total');
    let price = document.querySelectorAll('.price');
    let sel = document.querySelectorAll('.form-select');
    let clean = document.querySelector(".btn-warning");
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
                    'success'
                )
                // location.href = 'clean-api.php'
            }

        })

    });

    //金額
    let totalAll = 0;
    let toAll = document.querySelector('.toAll');
    for (let i = 0; i < total.length; i++) {
        total[i].textContent = Number(price[i].textContent) * Number(sel[i].value);
        // console.log(total[i].textContent);
        totalAll += Number(total[i].textContent);
    }
    //總金額
    toAll.textContent = `$${totalAll}`

    //更換數量
    function change(event) {
        let qty = event.target.value;
        price = event.target.parentNode.parentNode.childNodes[7].textContent;
        money = event.target.parentNode.parentNode.childNodes[11];
        money.textContent = Number(qty * price);
        for(let a of total){
            let b = b + Number(a.textContent);
            console.log(b)
        }
    }
</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>