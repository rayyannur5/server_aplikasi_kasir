<?php

require_once ('../../init.php');

$store_id = htmlspecialchars($_GET['store_id']);

$prices = queryArray("SELECT prices.id, prices.admin_id, prices.product_id, products.name, products.icon, prices.price FROM prices INNER JOIN products ON products.id = prices.product_id WHERE store_id = '$store_id' AND prices.active = '1'");
    
$result = [
    'success' => true,
    'data' => $prices,
    'errors' => null,
];



echo json_encode($result);

