<?php

require_once ('../../init.php');


$admin_id = htmlspecialchars($_POST['admin_id']);
$device_id = htmlspecialchars($_POST['device_id']);
$city_id = htmlspecialchars($_POST['city_id']);
$name = htmlspecialchars($_POST['name']);
$lat = htmlspecialchars($_POST['lat']);
$lon = htmlspecialchars($_POST['lon']);
$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');

$api_key = "a773865cb9ad49e0adfb4bd1a0b9d76b";

$count = queryArray("SELECT admin_id, COUNT(device_id) AS `total` FROM `stores` WHERE admin_id = $admin_id");

$group = floor($count[0]['total'] / 10);


$json = file_get_contents("https://api.geoapify.com/v1/geocode/reverse?lat=$lat&lon=$lon&lang=id&format=json&apiKey=$api_key");
$lokasi = json_decode($json, true);
$addr = $lokasi['results'][0]['formatted'];


$data = MultiQueryBoolean(
"INSERT INTO `stores` VALUES (NULL, '$admin_id', '$device_id', '$city_id', '$group', '$name', '$lat', '$lon', '$addr', 0, 1, '$created_at', '$updated_at' );".
"UPDATE `devices` SET `active` = '0' WHERE `id` = '$device_id';"
);

if($data) {
    $result = [
        'success' => true,
        'data' => $data,
        'errors' => null,
    ];
} else {
    $result = [
        'success' => false,
        'data' => $data,
        'errors' => 'Create store failed',
    ];
}
echo json_encode($result);

?>