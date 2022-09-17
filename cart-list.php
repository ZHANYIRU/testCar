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
                foreach($_SESSION['cart'] as $r):
                    
                ?>
                <tr data_sid="<?= $r['sid']?>" class="item">
                    <td>
                        <a href="#">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>
                    </td>
                    <td>
                        <img src="./imgs/<?= $r['img_id']?>.jpg" alt="" width="150px">
                    </td>
                    <td><?= $r['pr_name']?></td>
                    <td class="price"><?= $r['price']?></td>
                    <td>
                        <select class="form-select">
                            <?php for ($i = 1; $i <= 10; $i++) : ?>
                                <option value="<?= $i ?>" <?= $r['qty'] ==$i ?"selected":"" ?>><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </td>
                    <td class="total"></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>




<?php include __DIR__ . '/parts/html-script.php'; ?>

<script>
    let total = document.querySelector('.total');
    let price = document.querySelector('.price');
    let sel = document.querySelector('.form-select');
    // console.log(Number(price.textContent));
    total.textContent = Number(price.textContent * sel.value);

</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>