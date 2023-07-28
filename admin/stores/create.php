<?php

require_once ('../../init.php');

$device_id = htmlspecialchars($_GET['device_id']);

$data = queryArray("SELECT * FROM devices WHERE id = '$device_id'");


if (count($data) != 0 ){

    if($data[0]['active']){
        $result = [
            'success' => true,
            'data' => $data,
            'errors' => null,
        ];
    } else {
        $result = [
            'success' => false,
            'data' => $data,
            'errors' => "Device is not active",
        ];
    }

} else {
    $result = [
        'success' => false,
        'data' => [],
        'errors' => 'Device doesnt exist'
    ];
}

echo json_encode($result);

?>