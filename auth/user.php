<?php

require_once ('../init.php');

$email = htmlspecialchars($_POST['email']);

$data = queryArray("SELECT * FROM admins WHERE email = '$email'");

if (count($data) != 0 ){
    unset($data[0]['password']);
    $data[0]['role'] = 'admin';
    $result = [
        'success' => true,
        'data' => $data,
        'errors' => null,
    ];
} else {
    $data = queryArray("SELECT pegawais.*, receipt_phone, receipt_brand, receipt_message FROM pegawais INNER JOIN admins ON admins.id = pegawais.admin_id WHERE pegawais.email = '$email'");
    
    if(count($data) != 0){
        unset($data[0]['password']);
        $data[0]['role'] = 'user';
        $result = [
            'success' => true,
            'data' => $data,
            'errors' => null,
        ];
        
    } else {
        $result = [
            'success' => false,
            'data' => [],
            'errors' => 'Email doesnt exist'
        ];
    }
}

echo json_encode($result);

?>