<?php

require_once ('../../init.php');

$admin_id = htmlspecialchars($_GET['admin_id']);

$start = date('Y-m-d') . ' 00:00:00';
$end = date('Y-m-d') . ' 23:59:59';

$kasir = queryArray("SELECT SUM(transactions.paid) as kasir FROM transactions
INNER JOIN stores ON stores.id = transactions.store_id
WHERE stores.admin_id = $admin_id AND transactions.created_at BETWEEN '$start' AND '$end'")[0];

$list_store = queryArray("SELECT * FROM stores WHERE admin_id = $admin_id");

foreach ($list_store as $key => $store) {
    
    $device_id = $store['device_id'];
    echo $device_id;
    try {
        //code...
        $r = mysqli_query($conn, "SELECT * FROM $device_id 
        INNER JOIN stores ON stores.device_id = '$device_id'
        INNER JOIN prices ON prices.store_id = stores.id
        WHERE $device_id.created_at BETWEEN '$start' AND '$end'
        AND type_dt = 1
        AND $device_id.device_product = prices.device_product");
        echo json_encode(mysqli_fetch_assoc($r));
    } catch (\Throwable $th) {
        echo $th;
    }
}
// $mesin = queryArray("SELECT * FROM ")/

echo json_encode([
    'success' => true,
    'data' =>[
        'kasir' => $kasir['kasir'] == null ? 0 : (int)$kasir['kasir'],
        'device' => 0,
    ] ,
    'errors' => null
]);