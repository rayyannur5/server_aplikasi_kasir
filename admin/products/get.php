<?php
require_once ('../../init.php');


$admin_id = htmlspecialchars($_GET['admin_id']);

$data = queryArray("SELECT * FROM products WHERE admin_id = $admin_id");

if (count($data) != 0 ){
    
    $result = [
        'success' => true,
        'data' => $data,
        'errors' => null,
    ];

} else {
    $result = [
        'success' => false,
        'data' => [],
        'errors' => 'blank data',
    ];
}

echo json_encode($result);