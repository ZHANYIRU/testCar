<?php 
if(!isset($_SESSION)){
    session_start();
}

$all = $_SESSION['cart'];

$_SESSION['cart']['tPrice'] = $_POST['tPrice'];

foreach( $all as $a){
    echo json_encode($a['sid'],JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}



echo json_encode($_POST['tPrice'],JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);

?>