<?php
require_once ('../../init.php');

$pegawai_id = htmlspecialchars($_GET['pegawai_id']);

$tabungan = queryArray("SELECT SUM(paid) AS tabungan FROM `transactions` WHERE setor = 0 AND pegawai_id = $pegawai_id")[0];

if($tabungan['tabungan'] == null){
    $tabungan['tabungan'] = 0;
}

$result = [
    'success' => true,
    'data' => (int)$tabungan['tabungan'],
    'errors' => null,
];

echo json_encode($result);