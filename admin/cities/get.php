<?php

require_once ('../../init.php');

$admin_id = htmlspecialchars($_GET['admin_id']);

if( count(queryArray("SELECT * FROM admins WHERE id = $admin_id")) == 0){
    $result = [
        'success' => false,
        'data' => [],
        'errors' => 'admin not found',
    ];
    echo json_encode($result);
    exit();
} 

$data = queryArray("SELECT * FROM cities WHERE admin_id = $admin_id");

$result = [
    'success' => true,
    'data' => $data,
    'errors' => null,
];

echo json_encode($result);