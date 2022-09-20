<?php
//資料庫連線
$db_host = '192.168.35.7';
$db_name = 'hiking';
$db_user = 'mountains';
$db_pass = '1214';

$dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8";
$pdo_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

$pdo = new PDO($dsn, $db_user, $db_pass, $pdo_options);

$p_sql = "SELECT * FROM `store`";

$total = $pdo->query($p_sql)->fetchAll();
echo json_encode($total , JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);

if(!isset($_SESSION)){
    session_start();
}


