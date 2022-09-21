<?php require __DIR__ . '/parts/connect_db.php';
$pageName = 'list';
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
    .text{
        text-align: center;
    }
</style>
<div class="container">
    <div class="row">
        <div class="alert alert-primary text" role="alert">
            商品
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
            </div>
        </div>
        <div class="alert alert-primary text" role="alert">
            租借商品
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
                </table>
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
                </table>
            </div>
        </div>
    </div>
</div>






<?php include __DIR__ . '/parts/html-script.php'; ?>
<?php include __DIR__ . '/parts/html-foot.php'; ?>