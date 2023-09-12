<?php

require_once ('../../init.php');

$admin_id = htmlspecialchars($_GET['admin_id']);

$start = date('Y-m-d') . ' 00:00:00';
$end = date('Y-m-d') . ' 23:59:59';

$kasir = queryArray("SELECT COUNT(transactions.id) as kasir FROM transactions
INNER JOIN stores ON stores.id = transactions.store_id
WHERE stores.admin_id = $admin_id AND transactions.created_at BETWEEN '$start' AND '$end'")[0];

echo json_encode([
    'success' => true,
    'data' => (int)$kasir['kasir'],
 
    'errors' => null
]);