<?php

require_once ('../../init.php');

$admin_id = htmlspecialchars($_GET['admin_id']);

$refferal = queryArray("SELECT refferal FROM admins WHERE id = '$admin_id'");

if(count($refferal) == 0){
    $result = [
        'success' => false,
        'data' => $refferal,
        'errors' => 'admin id not found',
    ];
    
    echo json_encode($result);
    exit();   
}

if($refferal[0]['refferal'] == null) {
    $refferal_baru = uniqid("RF_");
    $updated_at = date('Y-m-d H:i:s');
    queryBoolean("UPDATE admins SET refferal = '$refferal_baru', updated_at = '$updated_at' WHERE id = $admin_id");
    $refferal = queryArray("SELECT refferal FROM admins WHERE id = '$admin_id'");
}

$result = [
    'success' => true,
    'data' => $refferal,
    'errors' => null,
];

echo json_encode($result);