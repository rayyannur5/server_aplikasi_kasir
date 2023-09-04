<?php

require_once ('../../init.php');

$pegawai_id = htmlspecialchars($_GET['pegawai_id']);
$start_date = htmlspecialchars($_GET['start_date']) . ' 00:00:00';
$end_date = htmlspecialchars($_GET['end_date']) . ' 23:59:59';

$result_transactions = queryArray("SELECT transactions.*, stores.name as store FROM transactions INNER JOIN stores ON stores.id = transactions.store_id WHERE transactions.created_at BETWEEN '$start_date' AND '$end_date' AND transactions.pegawai_id = $pegawai_id");

$result = [
    'success' => true,
    'data' => $result_transactions,
    'errors' => null,
];

echo json_encode($result);