<?php require __DIR__ . '/parts/connect_db.php';
$pageName = 'products';
//查詢總共有幾筆
$p_sql = "SELECT COUNT(1) FROM `products`";
//fetch(PDO::FETCH_NUM) 去掉欄位 .[0]只取值 得到有幾行的資料
$totalRows = $pdo->query($p_sql)->fetch(PDO::FETCH_NUM)[0];
//每頁放4筆
$perPage = 4;
//總共有幾頁 
$totalPages = ceil($totalRows / $perPage);




//查詢資料 降冪排序 LIMIT 0,5 
$sql = sprintf(
    "SELECT * FROM `products` ORDER BY sid DESC"
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
                <img src="./imgs/<?= $r['img_id'] ?>.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $r['pr_name'] ?></h5>
                    <p class="card-text">
                        <i class="fa-solid fa-dollar-sign"></i>
                        <?= $r['price'] ?>
                    </p>
                    <select class="form-select">
                        <?php for ($i = 1; $i <= 10; $i++) : ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                    <button type="button" class="btn btn-primary" data_sid="<?= $r['sid'] ?>" onclick="addToCar(event)"><i class="fa-solid fa-cart-plus"></i></button>
                </div>

            </div>

        <?php endforeach ?>

    </div>
</div>
<!-- <div class="div1"></div> -->




<?php include __DIR__ . '/parts/html-script.php'; ?>
<script>
    //querySelectorAll回傳陣列
    function addToCar(event) {
        let btn = event.currentTarget;
        let sid = btn.getAttribute("data_sid");
        let qty = btn.parentNode.querySelector('.form-select').value;
        let fs = document.querySelector('#sid');
        let fq = document.querySelector('#qty');
        fs.value = sid;
        fq.value = qty
        console.log(sid);
        console.log(qty);
        let fd = new FormData(document.querySelector('.form1'));
        fetch('handle-cart.php', {
                method: "POST",
                body: fd
            })
            .then(r => r.json())
            .then(obj => {
                console.log(obj);
            })
        Swal.fire({
            icon: 'success',
            title: '已加入購物車',
            showConfirmButton: false,
            timer: 1000,
        });
    }


    //用迴圈對陣列的每一筆做動作
    // for (let i = 0; i < btn.length; i++) {
    //     btn[i].addEventListener('click', () => {
    //         
    //         let ht = h[i].textContent; //標題
    //         let ptt = pt[i].textContent.trim(); //價錢
    //         let selt = sel[i].options.selectedIndex + 1; //數量
    //         //照片id
    //         let src = img[i].getAttribute('src').split('/')[2].split('.')[0];
    //         console.log(ht);
    //         console.log(ptt);
    //         console.log(selt);
    //         console.log(src);
    //         let a = {"name":ht, "qt":selt, "price":ptt, "img": src};
    //         // window.localStorage.setItem("data",JSON.stringify(a));
    //         fetch('add-car-api.php',{
    //             method:"POST",
    //             data: 
    //         })
    //         .then(r=>r.json())
    //         .then(obj=>{
    //             console.log(obj);
    //         })
    //     })
    // }
</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>