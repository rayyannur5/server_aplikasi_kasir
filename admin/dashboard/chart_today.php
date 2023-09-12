<?php

require_once ('../../init.php');

$admin_id = htmlspecialchars($_GET['admin_id']);


$data = [];

for ($i=0; $i < 24; $i++) { 
    if($i < 10){
        $start = date('Y-m-d') . " 0$i:00:00";
        $end = date('Y-m-d') . " 0$i:59:59";
    } else {
        $start = date('Y-m-d') . " 0$i:00:00";
        $end = date('Y-m-d') . " $i:59:59";
    }

    $hasil = queryArray("SELECT COUNT(transactions.id) as hasil FROM transactions
    INNER JOIN stores ON stores.id = transactions.store_id
    WHERE stores.admin_id = $admin_id AND transactions.created_at BETWEEN '$start' AND '$end'");

    array_push($data, (int)$hasil[0]['hasil']);
}


echo json_encode([
    'success' => true,
    'data' => $data,
    'errors' => null
]);