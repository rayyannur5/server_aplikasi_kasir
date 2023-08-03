<?php

require_once ('../../init.php');

$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);


$data = queryArray("SELECT * FROM pegawais WHERE email = '$email'");


if (count($data) != 0 ){
    if(password_verify($password, $data[0]['password'])){
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
            'errors' => 'Wrong Password',
        ];
    }
} else {
    $result = [
        'success' => false,
        'data' => [],
        'errors' => 'Email doesnt exist'
    ];
}

echo json_encode($result);

?>