<?php

require_once ('../../init.php');

$admin_id = htmlspecialchars($_GET['admin_id']);

$pegawais = queryArray("SELECT * FROM pegawais WHERE admin_id = '$admin_id'");

$result = [
    'success' => true,
    'data' => $pegawais,
    'errors' => null,
];

echo json_encode($result);