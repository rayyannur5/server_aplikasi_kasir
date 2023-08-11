<?php

require_once ('../../init.php');

$store_id = htmlspecialchars($_GET['store_id']);

$prices = queryArray("SELECT prices.id, prices.admin_id, prices.product_id, products.name, products.icon, prices.price FROM prices INNER JOIN products ON products.id = prices.product_id WHERE store_id = '$store_id' AND prices.active = '1'");
$admin_id = $prices[0]['admin_id'];
$product_not_listed_on_prices = queryArray("SELECT products.id as product_id, products.name, products.icon FROM products WHERE id NOT IN (SELECT prices.product_id FROM prices WHERE store_id = '$store_id') AND admin_id = '$admin_id'");

foreach ($product_not_listed_on_prices as $key => $value) {
    array_push($prices, [
        'id' => null,
        'admin_id' => $admin_id,
        'product_id' => $value['product_id'],
        'name' => $value['name'],
        'icon' => $value['icon'],
        'price' => null,
    ]);
}


    
$result = [
    'success' => true,
    'data' => $prices,
    'errors' => null,
];



echo json_encode($result);

