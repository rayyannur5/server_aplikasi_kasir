<?php
require_once ('../../init.php');

$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$parameter = parse_url($actual_link);
$parameter = explode('/', $parameter['path']);
$id = end($parameter);


$result_transactions = queryArray("SELECT transactions.*, pegawais.name as pegawai_name, stores.name as store, stores.admin_id FROM transactions 
INNER JOIN stores ON stores.id = transactions.store_id 
INNER JOIN pegawais ON transactions.pegawai_id = pegawais.id
WHERE transactions.id = $id");

if(empty($result_transactions)){
    $result_transactions = queryArray("SELECT transactions.*, admins.name as pegawai_name, stores.name as store, stores.admin_id FROM transactions 
    INNER JOIN stores ON stores.id = transactions.store_id 
    INNER JOIN admins ON stores.admin_id = admins.id
    WHERE transactions.id = $id");
}

$admin_id = $result_transactions[0]['admin_id'];
$admin = queryArray("SELECT * FROM admins WHERE id = $admin_id");

$result_transactions[0]['receipt_phone'] = $admin[0]['receipt_phone'];
$result_transactions[0]['receipt_brand'] = $admin[0]['receipt_brand'];
$result_transactions[0]['receipt_message'] = $admin[0]['receipt_message'];


$trx_id = $result_transactions[0]['trx_id'];
$items = queryArray("SELECT trollies.*, products.name as product_name FROM trollies 
INNER JOIN prices ON prices.id = trollies.price_id 
INNER JOIN products ON prices.product_id = products.id
WHERE trollies.trx_id = '$trx_id'");

$result_transactions[0]['items'] = $items;

$result = [
    'success' => true,
    'data' => $result_transactions,
    'errors' => null,
];

echo json_encode($result);