<?php
require_once ('../../init.php');

$admin_id = $_GET['admin_id'];
$year = $_GET['year'];

$transactions = queryArray("SELECT MONTH(transactions.created_at) as bulan, COUNT(transactions.id) as transaksi FROM transactions
INNER JOIN stores ON stores.id = transactions.store_id
WHERE YEAR(transactions.created_at) = '$year'
AND stores.admin_id = $admin_id
GROUP BY bulan");

echo json_encode([
    'success' => true,
    'data' => $transactions,
    'errors' => null
]);
