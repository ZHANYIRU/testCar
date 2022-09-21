<?php 
session_start();

// header('Content-Type: text/plain');
header('Content-Type: application/json');

foreach($_SESSION['cart'] as $i) 


echo json_encode($i , JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);