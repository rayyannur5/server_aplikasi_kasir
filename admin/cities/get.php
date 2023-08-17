<?php

require_once ('../../init.php');

$admin_id = htmlspecialchars($_GET['admin_id']);

$data = queryArray("SELECT * FROM cities WHERE admin_id = $admin_id");

$result = [
    'success' => true,
    'data' => $data,
    'errors' => null,
];

echo json_encode($result);