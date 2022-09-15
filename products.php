<?php $pageName = 'products'; ?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/html-nav.php'; ?>
<style>
    .form-select{
        width: 30%;
        display: inline-block;
    }
    .fa-solid{
        font-size: 30px;
        color:rgb(27, 27, 220);
    }
</style>
<div class="container">
    <div class="row">
        <div class="card" style="width: 18rem;">
            <img src="./imgs/9662616_R.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">日本限定款，避震三節式登山杖</h5>
                <p class="card-text">『避震登山杖』你的輔助💪
                    為什麼要使用登山杖?
                    <br>
                    🔅保持身體平衡，降低跌倒機率
                    <br>
                    🔅減緩膝蓋在下坡時承受的負擔
                    <br>
                    🔅借助手臂力量讓身體往前推進
                    <br>
                    🔅在爬行較陡峭的山坡地更省力
                </p>
                <select class="form-select">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="3">4</option>
                    <option value="3">5</option>
                    <option value="3">6</option>
                </select>
                <i class="fa-solid fa-cart-plus"></i>
            </div>
        </div>
    </div>
</div>




<?php include __DIR__ . '/parts/html-script.php'; ?>
<?php include __DIR__ . '/parts/html-foot.php'; ?>