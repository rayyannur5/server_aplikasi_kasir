<?php

require_once ('../../init.php');

$pegawai_id = htmlspecialchars($_POST['pegawai_id']);
$password_lama = htmlspecialchars($_POST['password_lama']);
$password_baru = htmlspecialchars($_POST['password_baru']);

$pegawai = queryArray("SELECT * FROM pegawais WHERE id = $pegawai_id")[0];
if(!password_verify($password_lama, $pegawai['password'])){
    echo json_encode([
        'success' => false,
        'errors' => 'password lama salah',
    ]);
    exit();
} 

$password_baru = password_hash($password_baru, PASSWORD_DEFAULT);
$result = queryBoolean("UPDATE pegawais SET `password` = '$password_baru' WHERE id = $pegawai_id");
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