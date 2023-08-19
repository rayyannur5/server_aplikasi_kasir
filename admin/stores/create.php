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

// CREATE GROUP
$count = queryArray("SELECT admin_id, COUNT(device_id) AS `total` FROM `stores` WHERE admin_id = $admin_id");
$group = floor($count[0]['total'] / 10);


// GET LOCATION
$json = file_get_contents("https://api.geoapify.com/v1/geocode/reverse?lat=$lat&lon=$lon&lang=id&format=json&apiKey=$api_key");
$lokasi = json_decode($json, true);
$addr = $lokasi['results'][0]['formatted'];

// CREATE STORE

queryBoolean("INSERT INTO `stores` VALUES (NULL, '$admin_id', '$device_id', '$city_id', '$group', '$name', '$lat', '$lon', '$addr', 0, 1, '$created_at', '$updated_at' )");
queryBoolean("UPDATE `devices` SET `active` = '0' WHERE `id` = '$device_id'");


// GET STORE
$store = queryArray("SELECT * FROM stores WHERE device_id = '$device_id'");


// CREATE SHIFTS
$store_id = $store[0]['id'];
$shift = queryBoolean("INSERT INTO shifts VALUES(NULL, $store_id, '07:00:00', '12:00:00', '18:00:00', '$created_at', '$updated_at')");

// CREATE PRICE
$products = queryArray("SELECT id, device_product FROM products WHERE admin_id = '$admin_id' AND device_product <> 0");
foreach ($products as $key => $product) {
    $product_id = $product['id'];
    $device_product = $product['device_product'];
    $price = $_POST["device_product_$device_product"];
    $store_id = $store[0]['id'];
    queryBoolean("INSERT INTO prices VALUES (NULL, '$admin_id', '$product_id', '$store_id', '$device_product', 0, '$price', '$price', 0, 1,  '$created_at', '$updated_at')");
}

// RESULT
if(count($store) != 0) {
    $result = [
        'success' => true,
        'data' => $store,
        'errors' => null,
    ];
} else {
    $result = [
        'success' => false,
        'data' => $store,
        'errors' => 'Create store failed',
    ];
}
echo json_encode($result);

?>