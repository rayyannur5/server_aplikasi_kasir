<?php

require_once ('../../init.php');

$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$parameter = parse_url($actual_link);
$parameter = explode('/', $parameter['path']);
$id = end($parameter);

$store = queryArray("SELECT * FROM stores WHERE id = '$id'");

if(count($store) != 0){
    $data = queryBoolean("UPDATE `stores` SET `active` = '0' WHERE id = '$id'");
    if($data){
        $store = queryArray("SELECT * FROM stores WHERE id = '$id'");
        $result = [
            'success' => true,
            'data' => $store,
            'errors' => null,
        ];
    } else {
        $result = [
            'success' => false,
            'data' => $store,
            'errors' => "Delete failed",
        ];
    }

}


echo json_encode($result);