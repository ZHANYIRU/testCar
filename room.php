<?php require __DIR__ . '/parts/connect-db.php';
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
    <input type="text" name="s_date" id="s_date">
    <input type="text" name="e_date" id="e_date">
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
                        <label for="start">?????????</label>
                        <input type="date" id="start" name="start">
                        <br>
                        <label for="end">?????????</label>
                        <input type="date" id="end" name="end">
                        <br>
                        <label for="">?????????</label>
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
        //POST???sid
        let sid = btnE.getAttribute("data_sid");
        //POST?????????
        let qty = btnE.parentNode.querySelector('.form-select').value;
        //POST?????????
        let s_date = document.querySelector('#s_date');
        let e_date = document.querySelector('#e_date');

        let fs = document.querySelector('#sid');
        let fq = document.querySelector('#qty');
        let start = btnE.parentNode.querySelector('#start');
        let end = btnE.parentNode.querySelector('#end');
        fs.value = sid;
        fq.value = qty;
        s_date.value = start.value;
        e_date.value = end.value;
        let fd = new FormData(document.querySelector('.form1'));
        let cartNum = 0;
        let badge = document.querySelector('.badge');
        // ??????????????????
        if (start.value == 0 || end.value == 0) {
            Swal.fire(
                '???????????????',
                '',
                'error'
            )
        } else {
            //????????????????????????
            if (start.value.split('-').join('') - end.value.split('-').join('') >= 0) {
                Swal.fire(
                    '?????????????????????',
                    '',
                    'error'
                )
            } else {
                fetch('./cart-api/roomCart.php', {
                        method: "POST",
                        body: fd
                    })
                    .then(r => r.json())
                    .then(data => {
                        count(data)
                        console.log(data)
                    })
                Swal.fire({
                    icon: 'success',
                    title: '??????????????????',
                    showConfirmButton: false,
                    timer: 1000,
                });
            }
        }
    }
    // fetch('./cart-api/proCart.php')
    //     .then(r => r.json())
    //     .then(function(data) {
    //         count(data)
    //         console.log(data)
    //     });
</script>



<?php include __DIR__ . '/parts/html-foot.php'; ?>