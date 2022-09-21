<?php require __DIR__ . '/parts/connect_db.php';
if (!isset($_SESSION)) {
    session_start();
}
header('Content-Type: application/json');

if (!isset($_SESSION['tPrice'])) {
    $_SESSION['tPrice'] = [];
}
//新增母訂單
$order = "INSERT INTO `order`( 
    `order_num`, 
    `member_sid`, 
    `created_time`
    ) VALUES (
        ?,
        ?,
        NOW())";
$stmt = $pdo->prepare($order);
//抓當前時間
$date = new DateTime();
//轉換格式
$date = explode("/", date('Y/m/d/h/i/s'));
//時間轉換字串陣列
list($Y, $M, $D, $H, $I, $S) = $date;
//陣列透過join變成一個字串
$order_num = implode('',$date);
    
$m = 2;
$output = [
    'success' => false,
    'error' =>'',
];
$stmt->execute([
    $order_num,
    $m
]);
//回傳結果
if($stmt->rowCount()){
    $output['success'] = true;
}





echo json_encode($output, JSON_UNESCAPED_UNICODE);
