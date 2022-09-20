<?php require __DIR__ . '/parts/connect_db.php';
$pageName = 'room';



$sql = sprintf(
    "SELECT * FROM `room` ORDER BY `room_sid` DESC"
);
// $rows = [];
$rows = $pdo->query($sql)->fetchAll();

// echo json_encode($rows,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
// exit;
?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/html-nav.php'; ?>
<style>
    .form-select {
        width: 30%;
        display: inline-block;
    }

    .fa-cart-plus {
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
    <input type="text" name="date" id="date">
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

            <div class="card" style="width: 20rem;">
                <img src="./imgs/<?= $r['room_img'] ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?= $r['room_name'] ?></h5>
                    <p class="card-text"><?= $r['room_details'] ?></p>
                    <div>
                        <p class="card-text">
                            <i class="fa-solid fa-dollar-sign"></i>
                            <?= $r['room_price'] ?>
                        </p>
                        <label for="start">入住：</label>
                        <input type="date" id="start">
                        <br>
                        <label for="end">離開：</label>
                        <input type="date" id="end">
                        <select class="form-select">
                            <?php for ($i = 1; $i <= 10; $i++) : ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                        <button type="button" class="btn btn-primary" data_sid="<?= $r['room_sid'] ?>" onclick="addToCar(event)"><i class="fa-solid fa-cart-plus"></i></button>
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
        let fdate = document.querySelector('#date');
        let fq = document.querySelector('#qty');
        fs.value = sid;
        fq.value = qty
        let fd = new FormData(document.querySelector('.form1'));
        let cartNum = 0;
        let badge = document.querySelector('.badge');
        fetch('./cart-api/roomCart.php', {
                method: "POST",
                body: fd
            })
            .then(r => r.json())
            .then(obj => {
                console.log(obj)
            })
        Swal.fire({
            icon: 'success',
            title: '已加入購物車',
            showConfirmButton: false,
            timer: 1000,
        });

    }
</script>



<?php include __DIR__ . '/parts/html-foot.php'; ?>