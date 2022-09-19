<?php     
if(!isset($_SESSION)){
    session_start();
}
unset($_SESSION['cart']);
$cr = 'cart-list.php';

if(! isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
    header("Location: {$cr}");
}
?>