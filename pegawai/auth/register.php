<?php

require_once ('../../init.php');

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$phone = htmlspecialchars($_POST['phone']);
$password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
$refferal = htmlspecialchars($_POST['refferal']);
$profile_picture = htmlspecialchars($_POST['profile_picture']);
$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');

$admin = queryArray("SELECT * FROM admins WHERE refferal = '$refferal'")[0];

if($admin != null){
    $city = queryArray("SELECT * FROM cities WHERE admin_id = {$admin['id']}")[0];
    
    $query = queryBoolean("INSERT INTO pegawais VALUES (null, {$city['id']}, {$admin['id']}, 0, 0, 0, '$name', '$email', '$phone', '$password', '$profile_picture', '$created_at', '$updated_at' )");
    
    if($query){
        $pegawais = queryArray("SELECT * FROM pegawais WHERE email = '$email'");
        $pegawais[0]['receipt_phone'] = $admin['receipt_phone'];
        $pegawais[0]['receipt_brand'] = $admin['receipt_brand'];
        $pegawais[0]['receipt_message'] = $admin['receipt_message'];
        $pegawais[0]['role'] = 'user';
        unset($pegawais[0]['password']);
        $result = [
            'success' => true,
            'data' => $pegawais,
            'errors' => null,
        ];
    } else {
        $result = [
            'success' => false,
            'data' => [],
            'errors' => 'register failed',
        ];
    }
} else {
    $result = [
        'success' => false,
        'data' => [],
        'errors' => 'refferal not found',
    ];
}


echo json_encode($result);