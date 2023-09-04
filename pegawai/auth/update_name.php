<?php

require_once ('../../init.php');

$pegawai_id = htmlspecialchars($_POST['pegawai_id']);
$name = htmlspecialchars($_POST['name']);

$result = queryBoolean("UPDATE pegawais SET `name` = '$name' WHERE id = $pegawai_id");
if($result){
    echo json_encode([
        'success' => true,
        'errors' => null,
    ]);
} else {
    echo json_encode([
        'success' => false,
        'errors' => null,
    ]);
}