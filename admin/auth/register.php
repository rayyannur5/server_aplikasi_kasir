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