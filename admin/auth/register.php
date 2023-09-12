<?php

require_once ('../../init.php');

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
$phone = htmlspecialchars($_POST['phone']);
$city = htmlspecialchars($_POST['city']);
$receipt_phone = htmlspecialchars($_POST['phone']);
$receipt_brand = 'NITROGEN';
$receipt_message = 'SEMOGA SELAMAT SAMPAI TUJUAN';
$profile_picture = htmlspecialchars($_POST['profile_picture']);
$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');

$result = queryBoolean("INSERT INTO `admins` VALUES (NULL ,'$name', '$email', '$password', '$phone', '$receipt_phone', '$receipt_brand', '$receipt_message', '$profile_picture', null, '$created_at', '$updated_at')");


if($result){
    $data = queryArray("SELECT * FROM admins WHERE email = '$email'");
    unset($data[0]['password']);
    $data[0]['role'] = 'admin';
    $id = $data[0]['id'];
    
    queryBoolean("INSERT INTO `products` ( `id`, `admin_id`, `name`, `device_product`, `category`, `icon`, `active`, `created_at`, `updated_at`) VALUES".
    "(NULL, $id, 'TAMBAH ANGIN MOTOR', 1, 0, 4, 1, '$created_at', '$updated_at'),".
    "(NULL, $id, 'TAMBAH ANGIN MOBIL', 2, 0, 7, 1, '$created_at', '$updated_at'),".
    "(NULL, $id, 'ISI BARU MOTOR', 3, 0, 4, 1, '$created_at', '$updated_at'),".
    "(NULL, $id, 'ISI BARU MOBIL', 4, 0, 7, 1, '$created_at', '$updated_at'),".
    "(NULL, $id, 'TAMBAL BAN MOTOR', 5, 0, 4, 1, '$created_at', '$updated_at'),".
    "(NULL, $id, 'TAMBAL BAN MOBIL', 6, 0, 7, 1, '$created_at', '$updated_at'),".
    "(NULL, $id, 'PAS MOTOR', 7, 0, 4, 1, '$created_at', '$updated_at'),".
    "(NULL, $id, 'PAS MOBIL', 8, 0, 7, 1, '$created_at', '$updated_at'),".
    "(NULL, $id, 'KURANGI MOTOR', 9, 0, 4, 1, '$created_at', '$updated_at'),".
    "(NULL, $id, 'KURANGI MOBIL', 10, 0, 7, 1, '$created_at', '$updated_at'),".
    "(NULL, $id, 'PAUSE MOTOR', 11, 0, 4, 1, '$created_at', '$updated_at'),".
    "(NULL, $id, 'PAUSE MOBIL', 12, 0, 7, 1, '$created_at', '$updated_at'),".
    "(NULL, $id, 'ERROR MOTOR', 13, 0, 4, 1, '$created_at', '$updated_at'),".
    "(NULL, $id, 'ERROR MOBIL', 14, 0, 7, 1, '$created_at', '$updated_at');");

    queryBoolean("INSERT INTO cities VALUES (NULL, $id, '$city', 1, '$created_at', '$updated_at')");

    $city = queryArray("SELECT * FROM cities WHERE admin_id = $id AND LOWER(`name`) = LOWER('$city')")[0];

    $data[0]['first_city_id'] = $city['id'];

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