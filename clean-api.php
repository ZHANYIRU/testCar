<?php     
if(!isset($_SESSION)){
    session_start();
}
unset($_SESSION['cart']);
$pr = 'cart-list.php';

if(! isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
    header("Location: {$pr}");
}

?>