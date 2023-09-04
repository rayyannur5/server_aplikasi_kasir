<?php
require_once ('../../init.php');

$pegawai_id = htmlspecialchars($_POST['pegawai_id']);
$data = $_POST['data'];
$data = json_decode($data, true);

$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');


// CEK PEGAWAI
$pegawai = queryArray("SELECT * FROM pegawais WHERE id = $pegawai_id")[0];

if($pegawai == null){
    $result = [
        'success' => false,
        'data' => [],
        'errors' => 'pegawai not found',
    ];
    echo json_encode($result);
    exit();
} 

if($pegawai['shift_active'] == 0) {
    $result = [
        'success' => false,
        'data' => [],
        'errors' => 'pegawai not presence yet',
    ];
    echo json_encode($result);
    exit();
}

$trx_id = $data['trx_id'];
$customer = $data['customer'];
$store_id = $pegawai['store_active_id'];
$shift = $pegawai['shift_active'];

$paid = 0;

foreach ($data['data'] as $key => $item) {
    $price_id = $item['id'];
    $qty = $item['count'];

    $price = queryArray("SELECT price FROM prices WHERE id = $price_id")[0];
    $paid_per_item = $qty * $price['price'];


    queryBoolean("INSERT INTO trollies VALUES (NULL, $price_id, '$trx_id', $paid_per_item, $qty, 1, '$created_at', '$updated_at')");

    $paid = $paid + $paid_per_item;
}

queryBoolean("INSERT INTO transactions VALUES (NULL, $pegawai_id, '$trx_id', $store_id, $shift, '$customer', $paid, 0, 1, '$created_at', '$updated_at')");

$transaction = queryArray("SELECT * FROM transactions WHERE trx_id = '$trx_id'");

$result = [
    'success' => true,
    'data' => $transaction,
    'errors' => null,
];

echo json_encode($result);