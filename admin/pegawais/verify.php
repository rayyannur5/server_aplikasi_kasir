<?php

require_once ('../../init.php');

$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$parameter = parse_url($actual_link);
$parameter = explode('/', $parameter['path']);
$id = end($parameter);

$value = htmlspecialchars($_POST['value']);



$updated_at = date('Y-m-d H:i:s');
$data = queryArray("SELECT * FROM pegawais WHERE id = $id");

if(count($data) != 0) {
    if($value == 1) {
        $res = queryBoolean("UPDATE pegawais SET active = 1, updated_at = '$updated_at' WHERE id = $id");
        
        if($res) {
            $data = queryArray("SELECT * FROM pegawais WHERE id = $id");
            unset($data[0]['password']);
            $result = [
                'success' => true,
                'data' => $data,
                'errors' => null,
            ];
        } else {
            $result = [
                'success' => false,
                'data' => $data,
                'errors' => 'verify failed',
            ];
        }
    } else {
        $res = queryBoolean("DELETE FROM pegawais WHERE id = $id");
        
        if($res) {
            $result = [
                'success' => true,
                'data' => $res,
                'errors' => null,
            ];
        } else {
            $result = [
                'success' => false,
                'data' => $res,
                'errors' => 'verify failed',
            ];
        }
    }
} else {
    $result = [
        'success' => false,
        'data' => $data,
        'errors' => 'pegawai not found',
    ];
}

echo json_encode($result);