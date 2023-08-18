<?php

require_once ('../../init.php');

$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$parameter = parse_url($actual_link);
$parameter = explode('/', $parameter['path']);
$id = end($parameter);

$name = htmlspecialchars($_POST['name']);
$lat = htmlspecialchars($_POST['lat']);
$lon = htmlspecialchars($_POST['lon']);
$city_id = htmlspecialchars($_POST['city_id']);
$updated_at = date('Y-m-d H:i:s');


$store = queryArray("SELECT * FROM stores WHERE id = '$id'");
if(count($store) != 0){
    // GET LOCATION
    $json = file_get_contents("https://api.geoapify.com/v1/geocode/reverse?lat=$lat&lon=$lon&lang=id&format=json&apiKey=$api_key");
    $lokasi = json_decode($json, true);
    $addr = $lokasi['results'][0]['formatted'];

    $data = queryBoolean("UPDATE stores SET `name` = '$name', lat = '$lat', lon = '$lon', addr = '$addr', city_id = $city_id, updated_at = '$updated_at' WHERE id = '$id'");
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
            'errors' => "Update Failed",
        ];
    }
} else {
    $result = [
        'success' => false,
        'data' => $store,
        'errors' => "id not found",
    ];
}

echo json_encode($result);


