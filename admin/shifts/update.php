<?php

require_once ('../../init.php');

$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$parameter = parse_url($actual_link);
$parameter = explode('/', $parameter['path']);
$id = end($parameter);
$time_s1 = htmlspecialchars($_POST["time_s1"]);
$time_s2 = htmlspecialchars($_POST["time_s2"]);
$time_s3 = htmlspecialchars($_POST["time_s3"]);
$updated_at = date('Y-m-d H:i:s');


$store = queryArray("SELECT * FROM shifts WHERE id = '$id'")[0];

if($store == null){
    $result = [
        'success' => false,
        'data' => $store,
        'errors' => "id not found",
    ];
    echo json_encode($result);
    exit();
}

if($time_s1 != null){
    $r = queryBoolean("UPDATE shifts SET time_s1 = '$time_s1', updated_at = '$updated_at' WHERE id = $id");
    if($r) {
        $result = [
            'success' => true,
            'data' => $r,
            'errors' => null,
        ];
    } else {
        $result = [
            'success' => false,
            'data' => $r,
            'errors' => "update time_s1 failed",
        ];
    }
}
if($time_s2 != null){
    $r = queryBoolean("UPDATE shifts SET time_s2 = '$time_s2', updated_at = '$updated_at' WHERE id = $id");
    if($r) {
        $result = [
            'success' => true,
            'data' => $r,
            'errors' => null,
        ];
    } else {
        $result = [
            'success' => false,
            'data' => $r,
            'errors' => "update time_s2 failed",
        ];
    }
}
if($time_s3 != null){
    $r = queryBoolean("UPDATE shifts SET time_s3 = '$time_s3', updated_at = '$updated_at' WHERE id = $id");
    if($r) {
        $result = [
            'success' => true,
            'data' => $r,
            'errors' => null,
        ];
    } else {
        $result = [
            'success' => false,
            'data' => $r,
            'errors' => "update time_s3 failed",
        ];
    }
}

echo json_encode($result);
