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
        /* font-size: 30px; */
        color: white;
    }

    .card-text {
        font-size: 25px;
    }

    .form1 {
        /* display: none; */
    }

    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
</style>
<form class="form1">
    <input type="text" name="sid" id="sid">
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

            <div class="card" style="width: 18rem;">
                <img src="./imgs/<?= $r['room_img'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $r['room_name'] ?></h5>
                    <div>
                        <p class="card-text">
                            <i class="fa-solid fa-dollar-sign"></i>
                            <?= $r['room_price'] ?>
                        </p>
                        <label for="start">入住：</label>
                        <input type="date" id="start">
                        <label for="end">離開：</label>
                        <input type="date" id="end">
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

    }
</script>



<?php include __DIR__ . '/parts/html-foot.php'; ?>