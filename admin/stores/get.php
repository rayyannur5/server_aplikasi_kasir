<?php
require_once ('../../init.php');

$admin_id = htmlspecialchars($_GET['admin_id']);

$data = queryArray("SELECT stores.*, cities.id AS city_id, cities.name AS city FROM stores INNER JOIN cities ON cities.id = stores.city_id WHERE stores.admin_id = $admin_id AND stores.active = 1");

    
$result = [
    'success' => true,
    'data' => $data,
    'errors' => null,
];


echo json_encode($result);
