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

$shifts = queryArray("SELECT shifts.*, stores.name AS store_name FROM shifts INNER JOIN stores ON shifts.store_id = stores.id WHERE stores.admin_id = $admin_id");


$result = [
    'success' => true,
    'data' => $shifts,
    'errors' => null,
];

echo json_encode($result);

