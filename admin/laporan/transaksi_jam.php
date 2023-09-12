<?php
require_once ('../../init.php');

$admin_id = $_GET['admin_id'];
$date = $_GET['date'];
$start = $date . ' 00:00:00';
$end = $date . ' 23:59:59';

$transactions = queryArray("SELECT transactions.*, stores.name as store FROM transactions
INNER JOIN stores ON stores.id = transactions.store_id
WHERE transactions.created_at BETWEEN '$start' AND '$end'
AND stores.admin_id = $admin_id");

echo json_encode([
    'success' => true,
    'data' => $transactions,
    'errors' => null
]);
