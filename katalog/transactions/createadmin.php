<?php
require_once ('../../init.php');

$data = $_POST['data'];
$data = json_decode($data, true);

$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');


$trx_id = $data['trx_id'];
$customer = $data['customer'];
$store_id = $data['store_id'];
$paid = 0;

foreach ($data['data'] as $key => $item) {
    $price_id = $item['id'];
    $qty = $item['count'];

    $price = queryArray("SELECT price FROM prices WHERE id = $price_id")[0];
    $paid_per_item = $qty * $price['price'];


    queryBoolean("INSERT INTO trollies VALUES (NULL, $price_id, '$trx_id', $paid_per_item, $qty, 1, '$created_at', '$updated_at')");

    $paid = $paid + $paid_per_item;
}

queryBoolean("INSERT INTO transactions VALUES (NULL, 0, '$trx_id', $store_id, 0, '$customer', $paid, 1, 1, '$created_at', '$updated_at')");

$transaction = queryArray("SELECT * FROM transactions WHERE trx_id = '$trx_id'");

$result = [
    'success' => true,
    'data' => $transaction,
    'errors' => null,
];

echo json_encode($result);