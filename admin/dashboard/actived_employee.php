<?php

require_once ('../../init.php');

$admin_id = htmlspecialchars($_GET['admin_id']);


$store = queryArray("SELECT COUNT(id) as hasil FROM pegawais
WHERE admin_id = $admin_id AND status_attendance = 1")[0];

echo json_encode([
    'success' => true,
    'data' => (int)$store['hasil'],
 
    'errors' => null
]);