<?php
require_once ('../../init.php');

$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$parameter = parse_url($actual_link);
$parameter = explode('/', $parameter['path']);
$id = end($parameter);

$attendance = queryArray("SELECT * FROM attendances WHERE id= $id")[0];

if($attendance == null) {
    echo json_encode([
        'success' => false,
        'errors' => 'id not found'
    ]);
    exit();
}

$pegawai_id = $attendance['pegawai_id'];
$created_at_attendance = $attendance['created_at'];
$updated_at_attendance = $attendance['created_at'] == $attendance['updated_at'] ? substr($attendance['updated_at'], 0, 10) . ' 23:59:59' : $attendance['updated_at'];
$transactions = queryArray("SELECT transactions.*, stores.name as store FROM transactions 
                            INNER JOIN stores ON stores.id = transactions.store_id 
                            WHERE transactions.pegawai_id = $pegawai_id AND transactions.created_at BETWEEN '$created_at_attendance' AND '$updated_at_attendance'");
$tabungan = queryArray("SELECT SUM(paid) AS tabungan FROM `transactions` WHERE setor = 0 AND pegawai_id = $pegawai_id");

$items = [];
$next = false;
foreach ($transactions as $key => $transaction) {
    $trx_id = $transaction['trx_id'];
    $trolly = queryArray("SELECT trollies.*, products.name as product_name, prices.price as product_price FROM trollies 
            INNER JOIN prices ON prices.id = trollies.price_id 
            INNER JOIN products ON prices.product_id = products.id
            WHERE trollies.trx_id = '$trx_id'");
    foreach ($trolly as $key => $item) {
        foreach ($items as $key => $temp) {
            if($temp['id'] == $item['price_id']){
                $items[$key]['qty'] += $item['qty'];
                $next = true;
            }
        }
        if(!$next){
            array_push($items, [
                'id' => $item['price_id'],
                'name' => $item['product_name'],
                'price' => $item['product_price'],
                'qty' => (int)$item['qty'],
            ]);
        }
        $next = false;
    }
}

$total = 0;
foreach ($items as $key => $data) {
    $total += ($data['price']*$data['qty']);
}

$result = [
    'success' => true,
    'data' => [
        'transactions' => $transactions,
        'recap' => [
            'tabungan' => $tabungan[0]['tabungan'],
            'total' => $total,
            'items' => $items,
        ]
    ],
    'errors' => null,
];

echo json_encode($result);