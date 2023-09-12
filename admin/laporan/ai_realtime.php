<?php
require_once ('../../init.php');

$store_id = $_GET['store_id'];

$start = $_GET['date'] . ' 00:00:00';
$end = $_GET['date'] . ' 23:59:59';

$page = $_GET['page'];

$size = 10;

$first_page = ($page>1) ? ($page * $size) - $size : 0;	


$store = queryArray("SELECT * FROM stores WHERE id = $store_id")[0];


$device_id = $store['device_id'];
$data = queryArray("SELECT  created_at, device_product  FROM `$device_id` WHERE type_dt = 1 AND created_at BETWEEN '$start' AND '$end' LIMIT $first_page, $size");

echo json_encode([
    'success' => true,
    'data' => $data,
    'errors' => null,
]);