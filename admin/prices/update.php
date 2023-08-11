<?php
require_once ('../../init.php');

$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$parameter = parse_url($actual_link);
$parameter = explode('/', $parameter['path']);
$id = end($parameter);


$price = htmlspecialchars($_POST['price']);
$updated_at = date('Y-m-d H:i:s');

$data = queryArray("SELECT * FROM prices WHERE id = '$id'");

if(count($data) != 0){
    $r = queryBoolean("UPDATE `prices` SET `price` = '$price', `updated_at` = '$updated_at' WHERE id = '$id'");
    if($data){
        $data = queryArray("SELECT * FROM prices WHERE id = '$id'");
        $result = [
            'success' => true,
            'data' => $data,
            'errors' => null,
        ];
    } else {
        $result = [
            'success' => false,
            'data' => $data,
            'errors' => "Update failed",
        ];
    }

} else {
    $result = [
        'success' => false,
        'data' => $data,
        'errors' => "id not found",
    ];
}

echo json_encode($result);

