<?php

require_once ('../../init.php');

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
$phone = htmlspecialchars($_POST['phone']);
$receipt_phone = htmlspecialchars($_POST['receipt_phone']);
$receipt_brand = htmlspecialchars($_POST['receipt_brand']);
$receipt_message = htmlspecialchars($_POST['receipt_message']);
$profile_picture = htmlspecialchars($_POST['profile_picture']);
$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');

$result = queryBoolean("INSERT INTO `admins` VALUES ('' ,'$name', '$email', '$password', '$phone', '$receipt_phone', '$receipt_brand', '$receipt_message', '$profile_picture', '$created_at', '$updated_at')");


if($result){
    $data = queryArray("SELECT * FROM admins WHERE email = '$email'");
    unset($data[0]['password']);
    $id = $data[0]['id'];
    
    queryBoolean("INSERT INTO `products` ( `id`, `admin_id`, `name`, `device_product`, `category`, `active`, `created_at`, `updated_at`) VALUES".
    "(NULL, $id, 'TAMBAH ANGIN MOTOR', 1, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),".
    "(NULL, $id, 'TAMBAH ANGIN MOBIL', 2, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),".
    "(NULL, $id, 'ISI BARU MOTOR', 3, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),".
    "(NULL, $id, 'ISI BARU MOBIL', 4, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),".
    "(NULL, $id, 'TAMBAL BAN MOTOR', 5, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),".
    "(NULL, $id, 'TAMBAL BAN MOBIL', 6, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),".
    "(NULL, $id, 'PAS MOTOR', 7, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),".
    "(NULL, $id, 'PAS MOBIL', 8, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),".
    "(NULL, $id, 'KURANGI MOTOR', 9, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),".
    "(NULL, $id, 'KURANGI MOBIL', 10, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),".
    "(NULL, $id, 'PAUSE MOTOR', 11, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),".
    "(NULL, $id, 'PAUSE MOBIL', 12, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),".
    "(NULL, $id, 'ERROR MOTOR', 13, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),".
    "(NULL, $id, 'ERROR MOBIL', 14, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00');");

    $result = [
        'success' => true,
        'data' => $data,
        'errors' => null,
    ];
} else {
    $result = [
        'success' => false,
        'data' => [],
        'errors' => "Register Failed",
    ];
}
echo json_encode($result);
?>