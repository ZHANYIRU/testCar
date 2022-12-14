<?php require __DIR__ . '/parts/connect-db.php';
$pageName = 'products';
// //查詢總共有幾筆
// $p_sql = "SELECT COUNT(1) FROM `products`";
// //fetch(PDO::FETCH_NUM) 去掉欄位 .[0]只取值 得到有幾行的資料
// $totalRows = $pdo->query($p_sql)->fetch(PDO::FETCH_NUM)[0];
// //每頁放4筆
// $perPage = 4;
// //總共有幾頁 
// $totalPages = ceil($totalRows / $perPage);




//查詢資料 降冪排序 LIMIT 0,5 
$sql = sprintf(
    "SELECT * FROM `product` ORDER BY `product_sid` DESC"
);
// $rows = [];
$rows = $pdo->query($sql)->fetchAll();


?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/html-nav.php'; ?>
<style>
    .form-select {
        width: 30%;
        display: inline-block;
    }

    .fa-cart-plus {
        /* font-size: 30px; */
        color: white;
    }

    .card-text {
        font-size: 25px;
    }

    .form1 {
        display: none;
    }

    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
</style>
<form class="form1">
    <input type="text" name="sid" id="sid">
    <input type="text" name="qty" id="qty">
</form>
<div class="container">
    <div class="row">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#">
                        <i class="fa-solid fa-caret-left"></i>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        <i class="fa-solid fa-caret-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <?php foreach ($rows as $r) : ?>

            <div class="card" style="width: 18rem;">
                <img src="./imgs/<?= $r['picture'] ?>.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $r['product_name'] ?></h5>
                    <div>
                        <p class="card-text">
                            <i class="fa-solid fa-dollar-sign"></i>
                            <?= $r['product_price'] ?>
                        </p>
                        <select class="form-select">
                            <?php for ($i = 1; $i <= 10; $i++) : ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                        <button type="button" class="btn btn-primary" data_sid="<?= $r['product_sid'] ?>" onclick="addToCar(event)"><i class="fa-solid fa-cart-plus"></i></button>
                    </div>
                </div>

            </div>

        <?php endforeach ?>

    </div>
</div>


<?php include __DIR__ . '/parts/html-script.php'; ?>
<script>
    function addToCar(event) {
        let btnE = event.currentTarget;
        let sid = btnE.getAttribute("data_sid");
        let qty = btnE.parentNode.querySelector('.form-select').value;
        let fs = document.querySelector('#sid');
        let fq = document.querySelector('#qty');
        fs.value = sid;
        fq.value = qty
        let fd = new FormData(document.querySelector('.form1'));
        let cartNum = 0;
        let badge = document.querySelector('.badge');
        fetch('./cart-api/proCart.php', {
                method: "POST",
                body: fd
            })
            .then(r => r.json())
            .then(function(data){
                count(data)
                console.log(data)
            }
            )
        Swal.fire({
            icon: 'success',
            title: '已加入購物車',
            showConfirmButton: false,
            timer: 1000,
        });

    }
</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>