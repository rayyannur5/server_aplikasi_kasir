<?php

require_once('../../init.php');

$admin_id = htmlspecialchars($_POST['admin_id']);
$name = htmlspecialchars($_POST['name']);
$icon = htmlspecialchars($_POST['icon']);
$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');
$device_product = 0;
$category = 1;
$active = 1;

$data = queryBoolean("INSERT INTO products VALUES (NULL, '$admin_id', '$name', 0, 1, $icon, 1, '$created_at', '$updated_at')");

if($data){
    $result = [
        'success' => true,
        'data' => $data,
        'errors' => null,
    ];
} else {
    $result = [
        'success' => false,
        'data' => $data,
        'errors' => "Create failed",
    ];
}

echo json_encode($result);