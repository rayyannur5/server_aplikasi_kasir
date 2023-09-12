<?php
require_once ('../../init.php');

$admin_id = $_GET['admin_id'];
$month = $_GET['month'];
$year = $_GET['year'];

$transactions = queryArray("SELECT DATE(transactions.created_at) as hari, COUNT(transactions.id) as transaksi FROM transactions
INNER JOIN stores ON stores.id = transactions.store_id
WHERE YEAR(transactions.created_at) = '$year'
AND MONTH(transactions.created_at) = '$month'
AND stores.admin_id = $admin_id
GROUP BY hari");

echo json_encode([
    'success' => true,
    'data' => $transactions,
    'errors' => null
]);
