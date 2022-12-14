<?php require __DIR__ . '/parts/connect-db.php';

$pageName = 'order';

$order = "SELECT * FROM `order`";
$order_stmt = $pdo->query($order)->fetchAll();

?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/html-nav.php'; ?>

<div class="container">
    <div class="row">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">訂單編號</th>
                    <th scope="col">金額</th>
                    <th scope="col">詳細訂單</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($order_stmt as $o):?>
                <tr>
                    <td><?= $o['order_num']?></td>
                    <td><?= $o['total']?></td>
                    <td>@twitter</td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<?php include __DIR__ . '/parts/html-script.php'; ?>
<?php include __DIR__ . '/parts/html-foot.php'; ?>