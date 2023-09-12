<?php

require_once ('../../init.php');

$admin_id = htmlspecialchars($_GET['admin_id']);


$store = queryArray("SELECT COUNT(id) as hasil FROM stores
WHERE admin_id = $admin_id AND device_status = 1")[0];

echo json_encode([
    'success' => true,
    'data' => (int)$store['hasil'],
 
    'errors' => null
]);