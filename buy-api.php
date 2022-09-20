<?php 
if(!isset($_SESSION)){
    session_start();
}
if(! isset($_SESSION['tPrice'])){
    $_SESSION['tPrice'] = [];
}
$all = $_SESSION['cart'];

$_SESSION['tPrice'] = $_POST['tPrice'];

foreach( $all as $a){
    echo json_encode($a['sid'],JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}



echo json_encode($_SESSION['tPrice'],JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);

?>