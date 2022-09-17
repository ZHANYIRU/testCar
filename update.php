<?php require __DIR__ . '/parts/connect_db.php';

$fakeName = [
    "原廠授權歐盟認證，TANERDD 登山杖",
    "TANERDD，6061鋁合金登山杖，五節鋁合金款",
    "摺疊登山杖，伸縮登山杖，登山露營健走杖",
    "四節鋁合金登山杖，升級版避震功能",
    "山海戶外，臺灣現貨'NH Naturehike'，初雪，登山杖",
    "2D直握把，卡榫式調節登山杖",
    "T型握把，卡榫式調節登山杖",
    "3D直握把，旋鈕式調節緩震登山杖",
];



for ($i = 126; $i <= 166; $i++) {
    $sql = "UPDATE `products` SET `pr_name` = ? WHERE `sid` = ? ";
    $stmt = $pdo->prepare($sql);
    shuffle($fakeName);
    $name = $fakeName[0];
    $stmt->execute([$name, $i]);
}
