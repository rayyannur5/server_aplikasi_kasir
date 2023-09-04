<?php
require_once ('../../init.php');

$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$parameter = parse_url($actual_link);
$parameter = explode('/', $parameter['path']);
$id = end($parameter);

$data = queryArray("SELECT * FROM stores WHERE id = $id");

$result = [
    'success' => true,
    'data' => $data,
    'errors' => null,
];

echo json_encode($result);
