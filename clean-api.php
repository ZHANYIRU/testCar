<?php     
if(!isset($_SESSION)){
    session_start();
}
unset($_SESSION['cart'],$_SESSION['rCart'],$_SESSION['tPrice']);
$cr = 'cart-list.php';

if(! isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
    $_SESSION['rCart'] = [];
    $_SESSION['tPrice'] =[];
    header("Location: {$cr}");
}
?>