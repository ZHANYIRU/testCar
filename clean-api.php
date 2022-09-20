<?php     
if(!isset($_SESSION)){
    session_start();
}
unset($_SESSION['cart'],$_SESSION['rCart']);
$cr = 'cart-list.php';

if(! isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
    $_SESSION['rCart'] = [];
    header("Location: {$cr}");
}
?>