<?php
require_once ('../../init.php');

$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$parameter = parse_url($actual_link);
$parameter = explode('/', $parameter['path']);
$id = end($parameter);

$product = queryArray("SELECT * FROM products WHERE id = '$id'");

if(count($product) != 0){
    $data = queryBoolean("UPDATE `products` SET `active` = '0' WHERE id = '$id'");
    if($data){
        $product = queryArray("SELECT * FROM products WHERE id = '$id'");
        $result = [
            'success' => true,
            'data' => $product,
            'errors' => null,
        ];
    } else {
        $result = [
            'success' => false,
            'data' => $product,
            'errors' => "Delete failed",
        ];
    }

}


echo json_encode($result);