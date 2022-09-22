<?php require __DIR__ . '/parts/link_liu_db.php';
$pageName = 'campaign';


$sql = sprintf(
    "SELECT * FROM `campaign` ORDER BY `sid` DESC"
);
// $rows = [];
$rows = $pdo->query($sql)->fetchAll();


?>
<?php include __DIR__ .'/parts/html-head.php';?>
<?php include __DIR__ .'/parts/html-nav.php';?>
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
                <img src="./imgs/<?= $r['mainImage'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $r['name'] ?></h5>
                    <div>
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

            </div>
        <?php endforeach ?>
    </div>
</div>




<?php include __DIR__ .'/parts/html-script.php';?>
<?php include __DIR__ .'/parts/html-foot.php';?>