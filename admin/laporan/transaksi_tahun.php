<?php
require_once ('../../init.php');

$admin_id = $_GET['admin_id'];
$transactions = queryArray("SELECT YEAR(transactions.created_at) as tahun, COUNT(transactions.id) as transaksi FROM transactions
INNER JOIN stores ON stores.id = transactions.store_id
WHERE stores.admin_id = $admin_id
GROUP BY tahun");

echo json_encode([
    'success' => true,
    'data' => $transactions,
    'errors' => null
]);
