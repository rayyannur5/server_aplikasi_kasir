<?php
require_once ('../../init.php');

$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$parameter = parse_url($actual_link);
$parameter = explode('/', $parameter['path']);
$id = end($parameter);

$name = htmlspecialchars($_POST['name']);
$category = htmlspecialchars($_POST['category']);
$icon = htmlspecialchars($_POST['icon']);
$updated_at = date('Y-m-d H:i:s');


$product = queryArray("SELECT * FROM products WHERE id = '$id'");


if(count($product) != 0){
    $data = queryBoolean("UPDATE `products` SET `name` = '$name', `category` = '$category', `icon` = '$icon', `updated_at` = '$updated_at' WHERE id = '$id'");
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
            'errors' => "Update failed",
        ];
    }
} else {
    $result = [
        'success' => false,
        'data' => $product,
        'errors' => "id not found",
    ];
}


echo json_encode($result);