<?php
require_once ('../../init.php');

$pegawai_id = htmlspecialchars($_GET['pegawai_id']);
$pegawai = queryArray("SELECT * FROM pegawais WHERE id = $pegawai_id")[0];

if($pegawai == null) {
    $result = [
        'success' => false,
        'data' => [],
        'errors' => 'Pegawai id not found',
    ];
} else {

    $admin_id = $pegawai['admin_id'];

    $data = queryArray("SELECT * FROM stores WHERE admin_id = $admin_id AND active = 1");

    $result = [
        'success' => true,
        'data' => $data,
        'errors' => null,
    ];
}

echo json_encode($result);
