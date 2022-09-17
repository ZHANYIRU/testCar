<?php require __DIR__ .'/parts/connect_db.php';
$sql = "INSERT INTO `products`( 
    `pr_name`, 
    `pr_caption`, 
    `img_id`, 
    `price`, 
    `quantity`, 
    `created_time`
    ) VALUES (
        ?,
        ?,
        ?,
        ?,
        ?,
        NOW())";
    $stmt = $pdo->prepare($sql);

    for($i=0; $i<=40; $i++){
        $name = '日本限定款，避震三節式登山杖';
        $ca = '杖身採用堅固耐用的航太鋁合金材質';
        $img = 'PR'.$i;
        $price = rand(1000,5000);
        $quantity = 99;

        $stmt->execute([
            $name,
            $ca,
            $img,
            $price,
            $quantity,
        ]);
    }
    
    echo json_encode([
        $stmt->rowCount(),
        $pdo->lastInsertId()
    ]);



?>

