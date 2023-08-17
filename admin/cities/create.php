<?php

require_once ('../../init.php');

$admin_id = htmlspecialchars($_POST['admin_id']);
$name = htmlspecialchars($_POST['name']);


if( count(queryArray("SELECT * FROM admins WHERE id = $admin_id")) == 0){
    $result = [
        'success' => false,
        'data' => [],
        'errors' => 'admin not found',
    ];
    echo json_encode($result);
    exit();
} 


if(count(queryArray("SELECT * FROM cities WHERE admin_id = $admin_id AND LOWER(`name`) = LOWER('$name')")) != 0 ) {
    $result = [
        'success' => false,
        'data' => [],
        'errors' => 'the city has already exist',
    ];
    echo json_encode($result);
    exit();
}

$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');

$res = queryBoolean("INSERT INTO cities VALUES (NULL, $admin_id, '$name', 1, '$created_at', '$updated_at')");

if($res) {
    $data = queryArray("SELECT * FROM cities WHERE admin_id = $admin_id AND `name` = '$name'");
    $result = [
        'success' => true,
        'data' => $data,
        'errors' => null,
    ];
} else {
    $result = [
        'success' => false,
        'data' => $data,
        'errors' => 'create city failed',
    ];
}

echo json_encode($result);