<?php
require_once ('../../init.php');

$pegawai_id = htmlspecialchars($_GET['pegawai_id']);

$data = queryArray("SELECT * FROM transactions WHERE pegawai_id = $pegawai_id");

$result = [
    'success' => true,
    'data' => $data,
    'errors' => null,
];

echo json_encode($result);