<style>
    .container .row .clicked {
        background-color: #0d6efd;
        color: white;
        border-radius: 10px;
    }

    .badge:empty {
        display: inline-block;
    }

    .badge {
        background-color: #17a2b8;
    }

    .none {
        display: none;
    }
</style>

<div class="container">
    <div class="row">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <h1 class="logo">爬山趣</h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == 'products' ? 'clicked' : '' ?>" href="./products.php">產品</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == 'rent' ? 'clicked' : '' ?>" href="#">租借商品</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == 'activity' ? 'clicked' : '' ?>" href="#">活動</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == 'room' ? 'clicked' : '' ?>" href="room.php">訂房</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == 'car' ? 'clicked' : '' ?>" href="./cart-list.php">購物車
                                <span class="badge"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == 'list' ? 'clicked' : '' ?>" href="./list.php">訂單管理</a>
                        </li>
                    </ul>
                </div>

                <button type="button" class="btn btn-warning <?= $pageName == 'car' ? "" : "none" ?>">清空購物車</button>
            </div>
        </nav>
    </div>
</div>
