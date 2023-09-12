<?php
require_once ('../../init.php');

$store_id = $_GET['store_id'];

$start = $_GET['date'] . ' 00:00:00';
$end = $_GET['date'] . ' 23:59:59';

$store = queryArray("SELECT * FROM stores WHERE id = $store_id")[0];


$device_id = $store['device_id'];
$data = queryArray("SELECT $device_id.device_product, SUM($device_id.qty_dt) as qty, prices.price  FROM `$device_id` 
INNER JOIN stores ON stores.device_id = '$device_id'
INNER JOIN prices ON stores.id = prices.store_id
WHERE type_dt = 1 
AND prices.device_product = $device_id.device_product
AND $device_id.created_at BETWEEN '$start' AND '$end' GROUP BY device_product");


echo json_encode([
    'success' => true,
    'data' => $data,
    'errors' => null,
]);