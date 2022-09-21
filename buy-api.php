<?php require __DIR__ . '/parts/connect_db.php';
if (!isset($_SESSION)) {
    session_start();
}
header('Content-Type: application/json');

if (!isset($_SESSION['tPrice'])) {
    $_SESSION['tPrice'] = [];
}
$_SESSION['tPrice'] = $_POST['tPrice'];


$output = [
    'success' => false,
    'error' => '',
];


//新增母訂單
$order = "INSERT INTO `order`( 
    `order_num`, 
    `member_sid`, 
    `total`,
    `created_time`
    ) VALUES (
        ?,
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
$order_num = implode('', $date);

$m = 2;
$stmt->execute([
    $order_num,
    $m,
    $_SESSION['tPrice'],
]);
//回傳結果
if ($stmt->rowCount()) {
    $output['success'] = true;
}

//如果產品購物車不是空的 新增產品訂單
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $p) {
        $p_order = "INSERT INTO `product_order`( 
            `order_num`, 
            `products_sid`, 
            `qty`, 
            `total`, 
            `created_time`) VALUES (
                ?,
                ?,
                ?,
                ?,
                NOW())";
        $p_stmt = $pdo->prepare($p_order);
        $p_total = $p['qty'] * $p['price'];
        $p_stmt->execute([
            $order_num,
            $p['sid'],
            $p['qty'],
            $p_total
        ]);
    }
}

// if (!empty($_SESSION['rCart'])) {
//     foreach ($_SESSION['rCart'] as $r) {
//         $r_order = "INSERT INTO `booking_order`( 
//             `order_num`, 
//             `products_sid`, 
//             `qty`, 
//             `total`, 
//             `created_time`) VALUES (
//                 ?,
//                 ?,
//                 ?,
//                 ?,
//                 NOW())";
//         $p_stmt = $pdo->prepare($p_order);
//         $p_total = $p['qty'] * $p['price'];
//         $p_stmt->execute([
//             $order_num,
//             $p['sid'],
//             $p['qty'],
//             $p_total
//         ]);
//     }
// }



// echo json_encode($output, JSON_UNESCAPED_UNICODE);
