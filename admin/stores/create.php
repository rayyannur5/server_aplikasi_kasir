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

// GET _DEVICE
$device = queryArray("SELECT * FROM devices WHERE `barcode` = '$device_id' ")[0];
$device_id_table = $device['id'];


// CREATE STORE
queryBoolean("INSERT INTO `stores` VALUES (NULL, '$admin_id', '$device_id_table', '$city_id', '$group', '$name', '$lat', '$lon', '$addr', 0, 1, '$created_at', '$updated_at' )");
queryBoolean("UPDATE `devices` SET `active` = '0' WHERE `barcode` = '$device_id'");


// CREATE TABLE
queryBoolean("CREATE TABLE `$device_id_table` (
`id` bigint(20) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
`type_dt` tinyint UNSIGNED NOT NULL,
`qty_dt` int DEFAULT 0,
`device_product` int DEFAULT 0,
`dt_1` int DEFAULT 0,
`dt_2` int DEFAULT 0,
`dt_3` int DEFAULT 0,
`dt_4` int DEFAULT 0,
`dt_5` int DEFAULT 0,
`dt_6` int DEFAULT 0,
`dt_7` int DEFAULT 0,
`dt_8` int DEFAULT 0,
`dt_9` int DEFAULT 0,
`dt_10` int DEFAULT 0,
`dt_11` int DEFAULT 0,
`dt_12` int DEFAULT 0,
`dt_13` int DEFAULT 0,
`dt_14` int DEFAULT 0,
`created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; ");


queryBoolean("ALTER TABLE `$device_id_table`
ADD KEY `transactions_created_at` (`created_at`);");


// GET STORE
$store = queryArray("SELECT * FROM stores WHERE device_id = '$device_id_table'");


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