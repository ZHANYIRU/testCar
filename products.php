<?php $pageName = 'products'; ?>
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
</style>
<div class="container">
    <div class="row">
        <div class="card" style="width: 18rem;">
            <img src="./imgs/9662616_R.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">日本限定款，避震三節式登山杖</h5>
                <p class="card-text">
                    <i class="fa-solid fa-dollar-sign"></i>
                    2,380
                </p>
                <select class="form-select">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="3">4</option>
                    <option value="3">5</option>
                    <option value="3">6</option>
                </select>
                <button type="button" class="btn btn-primary"><i class="fa-solid fa-cart-plus"></i></button>
            </div>
        </div>
    </div>
</div>




<?php include __DIR__ . '/parts/html-script.php'; ?>
<script>
    document.querySelector('.btn').addEventListener('click', () => {
        Swal.fire({
            icon: 'success',
            title: '已加入購物車',
            showConfirmButton: false,
            timer: 1000
        })
    })
</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>