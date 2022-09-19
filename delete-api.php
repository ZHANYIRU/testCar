<?php 
if(!isset($_SESSION)){
    session_start();
}
$sid = isset($_POST['sid']) ? intval($_POST['sid']) : 0;

unset($_SESSION['cart'][$sid]);


echo json_encode($_SESSION['cart'],JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
