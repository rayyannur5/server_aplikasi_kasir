<?php
require_once ('../../init.php');



$store_id = $_GET['store_id'];
$start = $_GET['start_date'] . ' 00:00:00';
$end = $_GET['end_date'] . ' 23:59:59';

$device_id = queryArray("SELECT * FROM stores WHERE id = $store_id")[0]['device_id'];


$data_transaksi = [
    [
        "type_dt" => 2,
        "device_product" => 1,
        "price" => 3000,
        "created_at" => '2023-09-10 00:00:01',
    ],
    [
        "type_dt" => 2,
        "device_product" => 1,
        "price" => 3000,
        "created_at" => '2023-09-10 08:00:01',
    ],
    [
        "type_dt" => 2,
        "device_product" => 1,
        "price" => 3000,
        "created_at" => '2023-09-10 10:00:01',
    ],
    [
        "type_dt" => 2,
        "device_product" => 1,
        "price" => 3000,
        "created_at" => '2023-09-10 11:00:01',
    ],
    [
        "type_dt" => 2,
        "device_product" => 1,
        "price" => 3000,
        "created_at" => '2023-09-10 12:00:01',
    ],
    [
        "type_dt" => 2,
        "device_product" => 1,
        "price" => 3000,
        "created_at" => '2023-09-10 13:00:01',
    ],
    [
        "type_dt" => 2,
        "device_product" => 1,
        "price" => 3000,
        "created_at" => '2023-09-10 13:00:01',
    ],
    [
        "type_dt" => 2,
        "device_product" => 1,
        "price" => 3000,
        "created_at" => '2023-09-10 23:00:01',
    ],
];

function cmp($a, $b){
    $ad = strtotime($a['created_at']);
    $bd = strtotime($b['created_at']);
    return ($ad-$bd);
}


$data = queryArray("SELECT $device_id.type_dt, $device_id.device_product, prices.price, $device_id.created_at  FROM `$device_id` 
INNER JOIN stores ON stores.device_id = '$device_id'
INNER JOIN prices ON stores.id = prices.store_id
WHERE type_dt = 1 
AND prices.device_product = $device_id.device_product
AND $device_id.created_at BETWEEN '$start' AND '$end'");


$arr = array_merge($data, $data_transaksi);
usort($arr, 'cmp');


echo json_encode([
    'success' => true,
    'data' => $arr,
    'errors' => null,
]);