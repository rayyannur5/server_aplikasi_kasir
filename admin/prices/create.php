<?php

require_once ('../../init.php');

$store_id = htmlspecialchars($_POST['store_id']);
$product_id = htmlspecialchars($_POST['product_id']);
$price = htmlspecialchars($_POST['price']);

$store = queryArray("SELECT * FROM stores WHERE id = '$store_id'");
if(count($store) == 0){
    $result = [
        'success' => false,
        'data' => [],
        'errors' => 'store not found',
    ];

    echo json_encode($result);
    exit();
}

$product = queryArray("SELECT * FROM products WHERE id = '$product_id'");
if(count($product) == 0){
    $result = [
        'success' => false,
        'data' => [],
        'errors' => 'product not found',
    ];

    echo json_encode($result);
    exit();
}

$admin_id = $store[0]['admin_id'];
$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');

$data = queryBoolean("INSERT INTO prices VALUES (NULL, '$admin_id', '$product_id', '$store_id', 0, 1, '$price', '$price', 0, 1, '$created_at', '$updated_at')");

if($data){
    $result = [
        'success' => true,
        'data' => $data,
        'errors' => null,
    ];
} else {
    $result = [
        'success' => false,
        'data' => $data,
        'errors' => "Create failed",
    ];
}

echo json_encode($result);